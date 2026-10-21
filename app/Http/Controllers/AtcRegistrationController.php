<?php

namespace App\Http\Controllers;

use App\Models\AtcRegistration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AtcRegistrationController extends Controller
{
    /**
     * Show the public iCEEDS ATC Registration Form.
     */
    public function create(): View
    {
        return view('pages.atc-registration');
    }

    /**
     * Process and store a submitted ATC registration.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'centre_name' => ['required', 'string', 'max:255'],
            'director_name' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'string', 'max:50'],
            'office_number' => ['nullable', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
            'centre_address' => ['required', 'string', 'max:2000'],
            'course_details' => ['required', 'string', 'max:2000'],
            'director_address' => ['required', 'string', 'max:2000'],
            'year_of_establishment' => ['required', 'string', 'max:50'],
            'director_photo' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png,webp,pdf',
                'max:10240', // 10MB limit as on Google Form
            ],
            'declaration' => ['required', 'accepted'],
        ], [
            'centre_name.required' => 'Please provide the Name of the Study Centre in capital letters.',
            'director_name.required' => 'Please provide the Name of the Director or Manager.',
            'contact_number.required' => 'Please provide an active Contact Number.',
            'email.required' => 'Official E-MAIL ID is required.',
            'email.email' => 'Please provide a valid official email address.',
            'centre_address.required' => 'Address of Study Centre including PIN Code is required.',
            'course_details.required' => 'Please specify your Course Name & Duration.',
            'director_address.required' => 'Address of Director/Manager including PIN Code is required.',
            'year_of_establishment.required' => 'Please enter the Year of Establishment.',
            'director_photo.required' => 'Photograph of Director/Manager is required (Max 10 MB).',
            'director_photo.mimes' => 'The photograph/file must be a JPG, PNG, WEBP image, or PDF document.',
            'director_photo.max' => 'The uploaded file exceeds the maximum allowed size of 10 MB.',
            'declaration.accepted' => 'You must accept the declaration to submit your application.',
        ]);

        // Upload and store the file securely
        $file = $request->file('director_photo');
        $extension = $file->getClientOriginalExtension();
        $safeName = 'director_' . time() . '_' . Str::random(8) . '.' . $extension;
        $storedPath = $file->storeAs('atc_documents', $safeName, 'public');

        // Generate unique institutional reference number
        $year = date('Y');
        $referenceNo = 'ATC-' . $year . '-' . strtoupper(Str::random(6));

        // Ensure uniqueness
        while (AtcRegistration::where('reference_no', $referenceNo)->exists()) {
            $referenceNo = 'ATC-' . $year . '-' . strtoupper(Str::random(6));
        }

        $registration = AtcRegistration::create([
            'reference_no' => $referenceNo,
            'centre_name' => mb_strtoupper(trim($validated['centre_name'])),
            'director_name' => trim($validated['director_name']),
            'contact_number' => trim($validated['contact_number']),
            'office_number' => !empty($validated['office_number']) ? trim($validated['office_number']) : null,
            'email' => strtolower(trim($validated['email'])),
            'centre_address' => trim($validated['centre_address']),
            'course_details' => trim($validated['course_details']),
            'director_address' => trim($validated['director_address']),
            'year_of_establishment' => trim($validated['year_of_establishment']),
            'director_photo_path' => $storedPath,
            'director_photo_original_name' => $file->getClientOriginalName(),
            'declaration_accepted' => true,
            'status' => 'pending',
            'ip_address' => $request->ip(),
        ]);

        Log::info("New iCEEDS ATC Application submitted [{$registration->reference_no}]", [
            'centre' => $registration->centre_name,
            'director' => $registration->director_name,
            'email' => $registration->email,
            'phone' => $registration->contact_number,
        ]);

        return redirect()->route('atc.create')->with([
            'submission_success' => true,
            'reference_no' => $registration->reference_no,
            'centre_name' => $registration->centre_name,
            'director_name' => $registration->director_name,
            'email' => $registration->email,
        ]);
    }

    /**
     * Securely serve uploaded ATC documents to authorized admins/staff.
     */
    public function serveFile(AtcRegistration $registration): BinaryFileResponse
    {
        // Require authentication to access applicant documents
        if (!Auth::check()) {
            abort(403, 'Unauthorized access to applicant documentation.');
        }

        $path = storage_path('app/public/' . $registration->director_photo_path);

        if (!file_exists($path)) {
            abort(404, 'The requested document file could not be found.');
        }

        return response()->file($path, [
            'Content-Disposition' => 'inline; filename="' . ($registration->director_photo_original_name ?: basename($path)) . '"',
        ]);
    }
}
