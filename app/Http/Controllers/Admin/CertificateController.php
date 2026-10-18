<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CertificateController extends Controller
{
    /**
     * Display a listing of certificates with search & filters.
     */
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('q', ''));
        $selectedCourse = trim((string) $request->query('course', ''));

        $query = Certificate::query()->latest('id');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('student_name', 'like', "%{$search}%")
                  ->orWhere('certificate_code', 'like', "%{$search}%")
                  ->orWhere('course', 'like', "%{$search}%")
                  ->orWhere('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%");
            });
        }

        if (!empty($selectedCourse)) {
            $query->where('course', $selectedCourse);
        }

        $certificates = $query->paginate(25)->withQueryString();

        // Get top distinct courses for quick filtering & dropdown suggestions
        $courses = Certificate::select('course')
            ->distinct()
            ->orderBy('course')
            ->pluck('course')
            ->all();

        return view('admin.certificates.index', [
            'certificates' => $certificates,
            'search' => $search,
            'selectedCourse' => $selectedCourse,
            'courses' => $courses,
            'totalCount' => Certificate::count(),
        ]);
    }

    /**
     * Store a newly created certificate in storage.
     */
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'student_name' => ['required', 'string', 'max:255'],
            'first_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'course' => ['required', 'string', 'max:255'],
            'certificate_code' => ['required', 'string', 'max:255', 'unique:certificates,certificate_code'],
            'issue_date' => ['required', 'date'],
        ]);

        $code = strtoupper(trim($validated['certificate_code']));
        $studentName = strtoupper(trim($validated['student_name']));
        $course = strtoupper(trim($validated['course']));

        // Auto-split first/last name if not explicitly specified
        $firstName = !empty($validated['first_name']) ? strtoupper(trim($validated['first_name'])) : null;
        $lastName = !empty($validated['last_name']) ? strtoupper(trim($validated['last_name'])) : null;

        if (!$firstName && !$lastName) {
            $parts = explode(' ', $studentName, 2);
            $firstName = $parts[0] ?? $studentName;
            $lastName = $parts[1] ?? '';
        }

        $certificate = Certificate::create([
            'student_name' => $studentName,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'course' => $course,
            'certificate_code' => $code,
            'issue_date' => $validated['issue_date'],
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => "Certificate {$certificate->certificate_code} registered successfully.",
                'certificate' => $certificate,
            ]);
        }

        return redirect()->route('admin.certificates.index')->with(
            'success',
            "Certificate {$certificate->certificate_code} for {$certificate->student_name} registered successfully!"
        );
    }

    /**
     * Update the specified certificate in storage.
     */
    public function update(Request $request, Certificate $certificate): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'student_name' => ['required', 'string', 'max:255'],
            'first_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'course' => ['required', 'string', 'max:255'],
            'certificate_code' => [
                'required',
                'string',
                'max:255',
                'unique:certificates,certificate_code,' . $certificate->id,
            ],
            'issue_date' => ['required', 'date'],
        ]);

        $firstName = !empty($validated['first_name']) ? strtoupper(trim($validated['first_name'])) : $certificate->first_name;
        $lastName = !empty($validated['last_name']) ? strtoupper(trim($validated['last_name'])) : $certificate->last_name;

        $certificate->update([
            'student_name' => strtoupper(trim($validated['student_name'])),
            'first_name' => $firstName,
            'last_name' => $lastName,
            'course' => strtoupper(trim($validated['course'])),
            'certificate_code' => strtoupper(trim($validated['certificate_code'])),
            'issue_date' => $validated['issue_date'],
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => "Certificate updated successfully.",
                'certificate' => $certificate,
            ]);
        }

        return redirect()->route('admin.certificates.index')->with(
            'success',
            "Certificate {$certificate->certificate_code} updated successfully."
        );
    }

    /**
     * Remove the specified certificate from storage.
     */
    public function destroy(Request $request, Certificate $certificate): RedirectResponse|JsonResponse
    {
        $code = $certificate->certificate_code;
        $name = $certificate->student_name;
        $certificate->delete();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => "Certificate {$code} removed successfully.",
            ]);
        }

        return redirect()->route('admin.certificates.index')->with(
            'success',
            "Certificate record {$code} for {$name} deleted successfully."
        );
    }
}
