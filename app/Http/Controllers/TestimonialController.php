<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    /**
     * Display the public testimonials page.
     */
    public function index(Request $request): View
    {
        $ratingFilter = $request->query('rating');

        $query = Testimonial::approved()->latest();

        if ($ratingFilter && in_array((int)$ratingFilter, [4, 5])) {
            $query->where('rating', (int)$ratingFilter);
        }

        $testimonials = $query->paginate(9)->withQueryString();
        $totalApproved = Testimonial::approved()->count();
        $averageRating = Testimonial::approved()->avg('rating') ?: 5.0;

        return view('pages.testimonials.index', [
            'testimonials' => $testimonials,
            'totalApproved' => $totalApproved,
            'averageRating' => round($averageRating, 1),
            'ratingFilter' => $ratingFilter,
        ]);
    }

    /**
     * Handle public submission of a new testimonial.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'content' => ['required', 'string', 'min:10', 'max:1500'],
            'rating' => ['nullable', 'integer', 'min:1', 'max:5'],
            'role_or_course' => ['nullable', 'string', 'max:150'],
        ]);

        $rating = !empty($validated['rating']) ? (int) $validated['rating'] : 5;

        // Business Rule: Testimonials with 4 or 5 stars are auto-approved;
        // Testimonials with less than 4 stars require admin approval before showing publicly.
        $isApproved = ($rating >= 4);

        Testimonial::create([
            'name' => $validated['name'],
            'content' => $validated['content'],
            'rating' => $rating,
            'role_or_course' => $validated['role_or_course'] ?? 'Verified Alumnus / Candidate',
            'is_approved' => $isApproved,
            'is_featured' => false,
        ]);

        if ($isApproved) {
            return back()->with('success', 'Thank you! Your testimonial has been verified and published.');
        }

        return back()->with('success', 'Thank you for your valuable feedback! Your submission has been received and forwarded to the administrator for review.');
    }
}
