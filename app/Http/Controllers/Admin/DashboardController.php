<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AtcRegistration;
use App\Models\BlogPost;
use App\Models\Certificate;
use App\Models\ContactInquiry;
use App\Models\MediaFile;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the Central Administrative Dashboard.
     */
    public function index(): View
    {
        $stats = [
            'certificates_count' => Certificate::count(),
            'media_count' => MediaFile::count(),
            'inquiries_count' => ContactInquiry::count(),
            'users_count' => User::count(),
            'pending_users_count' => User::where('is_approved', false)->count(),
            'atc_count' => AtcRegistration::count(),
            'atc_pending_count' => AtcRegistration::where('status', 'pending')->count(),
            'testimonials_count' => Testimonial::count(),
            'testimonials_pending_count' => Testimonial::where('is_approved', false)->count(),
            'blogs_count' => BlogPost::count(),
        ];

        $recentCertificates = Certificate::latest('id')->take(6)->get();
        $recentMedia = MediaFile::latest('id')->take(6)->get();
        $recentInquiries = ContactInquiry::latest('id')->take(5)->get();
        $recentAtc = AtcRegistration::latest('id')->take(5)->get();

        return view('admin.dashboard', [
            'stats' => $stats,
            'recentCertificates' => $recentCertificates,
            'recentMedia' => $recentMedia,
            'recentInquiries' => $recentInquiries,
            'recentAtc' => $recentAtc,
        ]);
    }
}
