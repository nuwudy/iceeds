<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaFile;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class MediaController extends Controller
{
    /**
     * Display the Media Library gallery & manager.
     */
    public function index(Request $request): View
    {
        $currentType = $request->query('type', 'all');
        $search = $request->query('q');

        $query = MediaFile::query()
            ->ofType($currentType)
            ->search($search)
            ->latest();

        $mediaFiles = $query->paginate(24)->withQueryString();

        // Calculate media metrics
        $stats = [
            'total' => MediaFile::count(),
            'images' => MediaFile::where('file_type', 'image')->count(),
            'audios' => MediaFile::where('file_type', 'audio')->count(),
            'videos' => MediaFile::where('file_type', 'video')->count(),
            'pdfs' => MediaFile::where('file_type', 'pdf')->count(),
            'documents' => MediaFile::where('file_type', 'document')->count(),
            'total_size' => $this->formatBytes((int) MediaFile::sum('file_size')),
        ];

        return view('admin.media.index', [
            'mediaFiles' => $mediaFiles,
            'currentType' => $currentType,
            'search' => $search,
            'stats' => $stats,
        ]);
    }

    /**
     * Handle media file upload(s).
     */
    public function upload(Request $request): RedirectResponse|JsonResponse
    {
        $request->validate([
            'files' => ['nullable', 'array'],
            'files.*' => [
                'required',
                'file',
                'max:102400', // 100MB max per file
                'mimes:jpg,jpeg,png,webp,svg,gif,mp3,wav,ogg,m4a,mp4,webm,mov,pdf,doc,docx,txt',
            ],
            'file' => [
                'nullable',
                'file',
                'max:102400',
                'mimes:jpg,jpeg,png,webp,svg,gif,mp3,wav,ogg,m4a,mp4,webm,mov,pdf,doc,docx,txt',
            ],
            'title' => ['nullable', 'string', 'max:255'],
            'alt_text' => ['nullable', 'string', 'max:255'],
        ]);

        $uploadedItems = [];

        // Support both single file and array of files
        $filesToProcess = [];
        if ($request->hasFile('files')) {
            $filesToProcess = $request->file('files');
        } elseif ($request->hasFile('file')) {
            $filesToProcess = [$request->file('file')];
        }

        if (empty($filesToProcess)) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'No files were provided for upload.'], 422);
            }
            return back()->with('error', 'Please select at least one file to upload.');
        }

        foreach ($filesToProcess as $file) {
            $originalName = $file->getClientOriginalName();
            $extension = strtolower($file->getClientOriginalExtension());
            $mimeType = $file->getMimeType() ?? 'application/octet-stream';
            $fileSize = $file->getSize();
            $fileType = $this->classifyFileType($extension, $mimeType);

            // Create clean title from original name
            $title = $request->input('title') ?: pathinfo($originalName, PATHINFO_FILENAME);
            $title = Str::headline($title);

            // Generate safe, unique storage path
            $safeBaseName = Str::slug(pathinfo($originalName, PATHINFO_FILENAME));
            $randomSuffix = Str::lower(Str::random(6));
            $storedFileName = "{$safeBaseName}-{$randomSuffix}.{$extension}";

            $directory = 'media/' . date('Y/m');
            $filePath = $file->storeAs($directory, $storedFileName, 'public');

            $media = MediaFile::create([
                'title' => $title,
                'file_name' => $originalName,
                'file_path' => $filePath,
                'disk' => 'public',
                'file_type' => $fileType,
                'mime_type' => $mimeType,
                'file_size' => $fileSize,
                'extension' => $extension,
                'alt_text' => $request->input('alt_text') ?: $title,
                'description' => $request->input('description'),
            ]);

            $uploadedItems[] = $media;
        }

        $count = count($uploadedItems);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => "Successfully uploaded {$count} media file(s).",
                'media' => $uploadedItems,
            ]);
        }

        return redirect()->route('admin.media')->with(
            'success',
            "Successfully uploaded {$count} media file(s) to the library."
        );
    }

    /**
     * Update media details (title, alt text, description).
     */
    public function update(Request $request, MediaFile $media): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'alt_text' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
        ]);

        $media->update($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Media metadata updated successfully.',
                'media' => $media,
            ]);
        }

        return back()->with('success', 'Media asset updated successfully.');
    }

    /**
     * Delete media file from storage and database.
     */
    public function destroy(MediaFile $media): RedirectResponse|JsonResponse
    {
        $fileName = $media->file_name;
        $media->delete();

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => "Deleted '{$fileName}' permanently.",
            ]);
        }

        return redirect()->route('admin.media')->with(
            'success',
            "Media asset '{$fileName}' deleted permanently."
        );
    }

    /**
     * Classify file type based on extension and mime type.
     */
    private function classifyFileType(string $extension, string $mimeType): string
    {
        $images = ['jpg', 'jpeg', 'png', 'webp', 'svg', 'gif', 'bmp', 'ico'];
        $audios = ['mp3', 'wav', 'ogg', 'm4a', 'aac', 'flac'];
        $videos = ['mp4', 'webm', 'mov', 'avi', 'mkv'];
        $documents = ['doc', 'docx', 'txt', 'rtf', 'odt', 'xls', 'xlsx', 'csv'];

        if ($extension === 'pdf' || str_contains($mimeType, 'pdf')) {
            return 'pdf';
        }

        if (in_array($extension, $images) || str_starts_with($mimeType, 'image/')) {
            return 'image';
        }

        if (in_array($extension, $audios) || str_starts_with($mimeType, 'audio/')) {
            return 'audio';
        }

        if (in_array($extension, $videos) || str_starts_with($mimeType, 'video/')) {
            return 'video';
        }

        if (in_array($extension, $documents)) {
            return 'document';
        }

        return 'document';
    }

    /**
     * Format bytes to human-readable size.
     */
    private function formatBytes(int $bytes): string
    {
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        }
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        }
        if ($bytes >= 1024) {
            return number_format($bytes / 1024, 1) . ' KB';
        }
        return $bytes . ' B';
    }
}
