<?php

namespace App\Http\Controllers;

use App\Models\ContactInquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Display the official iCEEDS Contact page.
     */
    public function index(): View
    {
        return view('pages.contact');
    }

    /**
     * Handle incoming contact inquiries.
     */
    public function submit(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['nullable', 'string', 'max:40'],
            'subject' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'min:10', 'max:3000'],
        ]);

        try {
            $inquiry = ContactInquiry::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'ip_address' => $request->ip(),
            ]);

            Log::info("iCEEDS Contact Inquiry Registered [ID: {$inquiry->id}]", [
                'name' => $inquiry->name,
                'email' => $inquiry->email,
                'subject' => $inquiry->subject,
                'phone' => $inquiry->phone,
            ]);
        } catch (\Throwable $e) {
            Log::error('Failed to save contact inquiry to database: ' . $e->getMessage(), [
                'input' => $request->except(['_token']),
            ]);
        }

        return redirect()->route('contact')->with(
            'success',
            'Thank you for reaching out! Your message has been received by the iCEEDS Academic Registry. Our administrative team will get in touch with you shortly.'
        );
    }
}
