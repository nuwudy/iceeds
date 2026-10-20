<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InquiryController extends Controller
{
    /**
     * Display a paginated listing of contact inquiries with search and filtering.
     */
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('q', ''));
        $subject = trim((string) $request->query('subject', ''));

        $query = ContactInquiry::query()->latest('id');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        if (!empty($subject)) {
            $query->where('subject', $subject);
        }

        $inquiries = $query->paginate(15)->withQueryString();

        $subjects = ContactInquiry::select('subject')
            ->distinct()
            ->orderBy('subject')
            ->pluck('subject')
            ->all();

        return view('admin.inquiries.index', [
            'inquiries' => $inquiries,
            'search' => $search,
            'selectedSubject' => $subject,
            'subjects' => $subjects,
            'totalCount' => ContactInquiry::count(),
        ]);
    }

    /**
     * Display the full details of a specific inquiry.
     */
    public function show(ContactInquiry $inquiry): View
    {
        return view('admin.inquiries.show', [
            'inquiry' => $inquiry,
        ]);
    }

    /**
     * Remove the specified inquiry from storage.
     */
    public function destroy(ContactInquiry $inquiry): RedirectResponse
    {
        $name = $inquiry->name;
        $inquiry->delete();

        return redirect()->route('admin.inquiries.index')->with(
            'success',
            "Inquiry from {$name} has been deleted successfully."
        );
    }
}
