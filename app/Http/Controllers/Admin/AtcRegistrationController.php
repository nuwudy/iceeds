<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AtcRegistration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AtcRegistrationController extends Controller
{
    /**
     * Display a listing of ATC applications with search and filters.
     */
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('q', ''));
        $status = trim((string) $request->query('status', ''));

        $query = AtcRegistration::query()->latest('id');

        if (!empty($search)) {
            $query->search($search);
        }

        if (!empty($status) && $status !== 'all') {
            $query->status($status);
        }

        $registrations = $query->paginate(15)->withQueryString();

        // Metrics for tabs
        $counts = [
            'total' => AtcRegistration::count(),
            'pending' => AtcRegistration::where('status', 'pending')->count(),
            'under_review' => AtcRegistration::where('status', 'under_review')->count(),
            'approved' => AtcRegistration::where('status', 'approved')->count(),
            'rejected' => AtcRegistration::where('status', 'rejected')->count(),
        ];

        return view('admin.atc.index', [
            'registrations' => $registrations,
            'search' => $search,
            'selectedStatus' => $status,
            'counts' => $counts,
        ]);
    }

    /**
     * Display the full details of a specific ATC application.
     */
    public function show(AtcRegistration $registration): View
    {
        return view('admin.atc.show', [
            'registration' => $registration,
        ]);
    }

    /**
     * Update the status and admin notes of an ATC application.
     */
    public function update(Request $request, AtcRegistration $registration): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,under_review,approved,rejected'],
            'admin_notes' => ['nullable', 'string', 'max:5000'],
        ]);

        $registration->update([
            'status' => $validated['status'],
            'admin_notes' => $validated['admin_notes'] ?? null,
        ]);

        return redirect()->route('admin.atc.show', $registration)->with(
            'success',
            "ATC Application [{$registration->reference_no}] has been updated successfully to " . $registration->status_label . "."
        );
    }

    /**
     * Delete an ATC application and its associated document.
     */
    public function destroy(AtcRegistration $registration): RedirectResponse
    {
        $referenceNo = $registration->reference_no;
        $centreName = $registration->centre_name;

        // Delete uploaded photo if stored in public storage
        if ($registration->director_photo_path && Storage::disk('public')->exists($registration->director_photo_path)) {
            Storage::disk('public')->delete($registration->director_photo_path);
        }

        $registration->delete();

        return redirect()->route('admin.atc.index')->with(
            'success',
            "ATC Application for {$centreName} ({$referenceNo}) has been deleted."
        );
    }

    /**
     * Export ATC applications to CSV.
     */
    public function exportCsv(Request $request): StreamedResponse
    {
        $search = trim((string) $request->query('q', ''));
        $status = trim((string) $request->query('status', ''));

        $query = AtcRegistration::query()->latest('id');

        if (!empty($search)) {
            $query->search($search);
        }

        if (!empty($status) && $status !== 'all') {
            $query->status($status);
        }

        $records = $query->get();

        $filename = 'iceeds-atc-applications-' . date('Y-m-d_His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        return response()->stream(function () use ($records) {
            $handle = fopen('php://output', 'w');
            
            // UTF-8 BOM for Excel compatibility
            fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));

            // CSV Header Row
            fputcsv($handle, [
                'Reference No',
                'Status',
                'Study Centre Name',
                'Director / Manager Name',
                'Contact Number',
                'Office Number',
                'Official Email',
                'Centre Address & PIN',
                'Course Name & Duration',
                'Director Address & PIN',
                'Year of Establishment',
                'Document File',
                'Declaration Accepted',
                'Admin Notes',
                'Submitted At',
                'IP Address',
            ]);

            foreach ($records as $row) {
                fputcsv($handle, [
                    $row->reference_no,
                    $row->status_label,
                    $row->centre_name,
                    $row->director_name,
                    $row->contact_number,
                    $row->office_number ?: 'N/A',
                    $row->email,
                    $row->centre_address,
                    $row->course_details,
                    $row->director_address,
                    $row->year_of_establishment,
                    $row->director_photo_original_name ?: $row->director_photo_path,
                    $row->declaration_accepted ? 'YES' : 'NO',
                    $row->admin_notes ?: '',
                    $row->created_at->format('Y-m-d H:i:s'),
                    $row->ip_address ?: 'N/A',
                ]);
            }

            fclose($handle);
        }, 200, $headers);
    }
}
