<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CertificateVerificationController extends Controller
{
    /**
     * Display the certificate verification portal.
     */
    public function index(Request $request): View
    {
        $code = trim((string) $request->query('code', ''));
        $searched = !empty($code);
        $certificate = null;

        if ($searched) {
            $certificate = Certificate::whereRaw(
                'LOWER(certificate_code) = ?',
                [strtolower($code)]
            )->first();
        }

        return view('verify', [
            'searched' => $searched,
            'code' => $code,
            'certificate' => $certificate,
        ]);
    }

    /**
     * Handle search form submission and redirect to a clean shareable URL.
     */
    public function verify(Request $request): RedirectResponse
    {
        $code = trim((string) $request->input('code', ''));

        if (empty($code)) {
            return redirect()->route('verify');
        }

        return redirect()->route('verify', ['code' => $code]);
    }

    /**
     * REST API endpoint for third-party automated certificate verification.
     * GET /api/v1/verify/{code}
     */
    public function apiVerify(string $code): JsonResponse
    {
        $sanitizedCode = trim($code);

        if (empty($sanitizedCode)) {
            return response()->json([
                'status' => 'error',
                'verified' => false,
                'message' => 'A valid certificate serial code is required.',
            ], 400);
        }

        $certificate = Certificate::whereRaw(
            'LOWER(certificate_code) = ?',
            [strtolower($sanitizedCode)]
        )->first();

        if (!$certificate) {
            return response()->json([
                'status' => 'error',
                'verified' => false,
                'message' => 'No credential record found matching the requested serial number.',
                'requested_code' => $sanitizedCode,
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'verified' => true,
            'data' => [
                'id' => $certificate->id,
                'certificate_code' => $certificate->certificate_code,
                'student_name' => $certificate->student_name,
                'first_name' => $certificate->first_name,
                'last_name' => $certificate->last_name,
                'course' => $certificate->course,
                'issue_date' => $certificate->issue_date?->format('Y-m-d'),
                'issuing_authority' => 'iCEEDS (Institute for Career Enhancement, Employability & Development Studies)',
                'authenticity_hash' => $certificate->authenticity_hash,
            ],
            'verified_at' => now()->toIso8601String(),
        ]);
    }
}
