<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    /**
     * Display a listing of testimonials for administrative moderation.
     */
    public function index(Request $request): View
    {
        $status = $request->query('status', 'all');
        $search = $request->query('search');

        $query = Testimonial::query()->latest();

        if ($status === 'pending') {
            $query->where('is_approved', false);
        } elseif ($status === 'approved') {
            $query->where('is_approved', true);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('role_or_course', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $testimonials = $query->paginate(15)->withQueryString();

        $stats = [
            'total' => Testimonial::count(),
            'approved' => Testimonial::where('is_approved', true)->count(),
            'pending' => Testimonial::where('is_approved', false)->count(),
            'featured' => Testimonial::where('is_featured', true)->count(),
        ];

        return view('admin.testimonials.index', [
            'testimonials' => $testimonials,
            'stats' => $stats,
            'currentStatus' => $status,
            'search' => $search,
        ]);
    }

    /**
     * Toggle approval status for a testimonial.
     */
    public function toggleApproval(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->is_approved = !$testimonial->is_approved;
        $testimonial->save();

        $statusStr = $testimonial->is_approved ? 'approved and published' : 'marked as unapproved';
        return back()->with('success', "Testimonial by {$testimonial->name} has been {$statusStr}.");
    }

    /**
     * Toggle featured status on homepage.
     */
    public function toggleFeatured(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->is_featured = !$testimonial->is_featured;
        $testimonial->save();

        $statusStr = $testimonial->is_featured ? 'featured on the homepage' : 'removed from featured';
        return back()->with('success', "Testimonial by {$testimonial->name} is now {$statusStr}.");
    }

    /**
     * Remove a testimonial from storage.
     */
    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        $name = $testimonial->name;
        $testimonial->delete();

        return back()->with('success', "Testimonial by {$name} has been permanently deleted.");
    }
}
