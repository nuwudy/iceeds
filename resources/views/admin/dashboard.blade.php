@extends('admin.layouts.app')

@section('title', 'Administrative Dashboard')

@section('content')

    <!-- Welcome & Quick Action Banner -->
    <div class="mb-8 p-6 sm:p-8 rounded-3xl bg-gradient-to-r from-slate-900 via-blue-950/60 to-slate-900 border border-slate-800 shadow-xl flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-500/10 text-blue-300 text-xs font-semibold border border-blue-500/20 mb-3">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                Registry Status: Active & Synced
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-white font-heading tracking-tight">
                Welcome back, {{ Auth::user()->name }}
            </h1>
            <p class="text-xs sm:text-sm text-slate-300 mt-1 max-w-2xl leading-relaxed">
                Central control portal for issuing student qualifications, monitoring historical registries, organizing institutional media, and managing authorized staff.
            </p>
        </div>

        <!-- Quick Action Buttons -->
        <div class="flex flex-wrap items-center gap-3 shrink-0">
            <a href="{{ route('admin.certificates.index', ['action' => 'new']) }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-bold text-xs tracking-wide shadow-lg shadow-blue-600/30 transition cursor-pointer">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                <span>Add Certificate</span>
            </a>

            <a href="{{ route('admin.media') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 font-bold text-xs tracking-wide border border-slate-700 transition cursor-pointer">
                <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                <span>Upload Media</span>
            </a>

            @if(Auth::user()->isAdmin())
                <a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 font-bold text-xs tracking-wide border border-slate-700 transition cursor-pointer">
                    <svg class="w-4 h-4 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    <span>Manage Staff</span>
                </a>
            @endif
        </div>
    </div>

    <!-- 5 Key Metrics Cards -->
    <!-- Key Metrics Cards Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 mb-10">
        
        <!-- Card 1: Certificates -->
        <a href="{{ route('admin.certificates.index') }}" class="bg-slate-900/90 rounded-3xl p-5 border border-slate-800 hover:border-blue-500/50 shadow-lg transition-all duration-200 group block">
            <div class="flex items-center justify-between mb-3">
                <span class="text-[11px] uppercase font-bold tracking-wider text-slate-400">Certificates</span>
                <div class="w-8 h-8 rounded-xl bg-blue-500/10 text-blue-400 border border-blue-500/20 flex items-center justify-center group-hover:scale-110 transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
            </div>
            <div class="text-2xl font-black text-white font-heading tracking-tight">
                {{ number_format($stats['certificates_count']) }}
            </div>
            <p class="text-[10.5px] text-slate-400 mt-1 flex items-center gap-1 font-medium">
                <span>Total Certificates</span>
                <span class="text-blue-400 font-bold group-hover:translate-x-1 transition">&rarr;</span>
            </p>
        </a>

        <!-- Card 2: ATC Registrations -->
        <a href="{{ route('admin.atc.index') }}" class="bg-slate-900/90 rounded-3xl p-5 border border-slate-800 hover:border-teal-500/50 shadow-lg transition-all duration-200 group block">
            <div class="flex items-center justify-between mb-3">
                <span class="text-[11px] uppercase font-bold tracking-wider text-teal-400">ATC Centres</span>
                <div class="w-8 h-8 rounded-xl bg-teal-500/10 text-teal-400 border border-teal-500/20 flex items-center justify-center group-hover:scale-110 transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
            </div>
            <div class="text-2xl font-black text-white font-heading tracking-tight">
                {{ number_format($stats['atc_count']) }}
            </div>
            <p class="text-[10.5px] text-slate-400 mt-1 flex items-center gap-1 font-medium">
                @if($stats['atc_pending_count'] > 0)
                    <span class="text-amber-400 font-bold">{{ $stats['atc_pending_count'] }} Pending</span>
                @else
                    <span>Active Centres</span>
                @endif
                <span class="text-teal-400 font-bold group-hover:translate-x-1 transition">&rarr;</span>
            </p>
        </a>

        <!-- Card 3: Media Files -->
        <a href="{{ route('admin.media') }}" class="bg-slate-900/90 rounded-3xl p-5 border border-slate-800 hover:border-sky-500/50 shadow-lg transition-all duration-200 group block">
            <div class="flex items-center justify-between mb-3">
                <span class="text-[11px] uppercase font-bold tracking-wider text-slate-400">Media Library</span>
                <div class="w-8 h-8 rounded-xl bg-sky-500/10 text-sky-400 border border-sky-500/20 flex items-center justify-center group-hover:scale-110 transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            <div class="text-2xl font-black text-white font-heading tracking-tight">
                {{ number_format($stats['media_count']) }}
            </div>
            <p class="text-[10.5px] text-slate-400 mt-1 flex items-center gap-1 font-medium">
                <span>Media Assets</span>
                <span class="text-sky-400 font-bold group-hover:translate-x-1 transition">&rarr;</span>
            </p>
        </a>

        <!-- Card 4: Blog Articles -->
        <a href="{{ route('admin.blog.index') }}" class="bg-slate-900/90 rounded-3xl p-5 border border-slate-800 hover:border-purple-500/50 shadow-lg transition-all duration-200 group block">
            <div class="flex items-center justify-between mb-3">
                <span class="text-[11px] uppercase font-bold tracking-wider text-purple-400">Blog Posts</span>
                <div class="w-8 h-8 rounded-xl bg-purple-500/10 text-purple-400 border border-purple-500/20 flex items-center justify-center group-hover:scale-110 transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>
            </div>
            <div class="text-2xl font-black text-white font-heading tracking-tight">
                {{ number_format($stats['blogs_count']) }}
            </div>
            <p class="text-[10.5px] text-slate-400 mt-1 flex items-center gap-1 font-medium">
                <span>Published Articles</span>
                <span class="text-purple-400 font-bold group-hover:translate-x-1 transition">&rarr;</span>
            </p>
        </a>

        <!-- Card 5: Testimonials -->
        <a href="{{ route('admin.testimonials.index') }}" class="bg-slate-900/90 rounded-3xl p-5 border border-slate-800 hover:border-amber-500/50 shadow-lg transition-all duration-200 group block">
            <div class="flex items-center justify-between mb-3">
                <span class="text-[11px] uppercase font-bold tracking-wider text-amber-400">Testimonials</span>
                <div class="w-8 h-8 rounded-xl bg-amber-500/10 text-amber-400 border border-amber-500/20 flex items-center justify-center group-hover:scale-110 transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                </div>
            </div>
            <div class="text-2xl font-black text-white font-heading tracking-tight">
                {{ number_format($stats['testimonials_count']) }}
            </div>
            <p class="text-[10.5px] text-slate-400 mt-1 flex items-center gap-1 font-medium">
                @if($stats['testimonials_pending_count'] > 0)
                    <span class="text-amber-400 font-bold">{{ $stats['testimonials_pending_count'] }} Awaiting Review</span>
                @else
                    <span>All Approved</span>
                @endif
                <span class="text-amber-400 font-bold group-hover:translate-x-1 transition">&rarr;</span>
            </p>
        </a>

        <!-- Card 6: Inquiries -->
        <a href="{{ route('admin.inquiries.index') }}" class="bg-slate-900/90 rounded-3xl p-5 border border-slate-800 hover:border-rose-500/50 shadow-lg transition-all duration-200 group block">
            <div class="flex items-center justify-between mb-3">
                <span class="text-[11px] uppercase font-bold tracking-wider text-slate-400">Inquiries</span>
                <div class="w-8 h-8 rounded-xl bg-rose-500/10 text-rose-400 border border-rose-500/20 flex items-center justify-center group-hover:scale-110 transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            <div class="text-2xl font-black text-white font-heading tracking-tight">
                {{ number_format($stats['inquiries_count']) }}
            </div>
            <p class="text-[10.5px] text-slate-400 mt-1 font-medium flex items-center justify-between">
                <span>Messages</span>
                <span class="text-rose-400 font-bold group-hover:translate-x-1 transition">&rarr;</span>
            </p>
        </a>
    </div>
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            <div class="text-2xl sm:text-3xl font-black text-white font-heading tracking-tight">
                {{ number_format($stats['inquiries_count']) }}
            </div>
            <p class="text-[11px] text-slate-400 mt-1 font-medium flex items-center justify-between">
                <span>Contact Messages</span>
                <span class="text-amber-400 font-bold group-hover:translate-x-1 transition">&rarr;</span>
            </p>
        </a>
    </div>

    <!-- Two Column Grid: Recent Certificates & Recent Media -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-10">
        
        <!-- Left 7 cols: Recent Certificates -->
        <div class="lg:col-span-7 bg-slate-900/90 rounded-3xl p-6 sm:p-7 border border-slate-800 shadow-xl space-y-5">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-white font-heading">Recent Certificates</h3>
                    <p class="text-xs text-slate-400">Latest qualifications registered in the database</p>
                </div>
                <a href="{{ route('admin.certificates.index') }}" class="text-xs font-bold text-blue-400 hover:text-blue-300 transition">
                    View All &rarr;
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="border-b border-slate-800 text-[11px] uppercase tracking-wider text-slate-400">
                            <th class="pb-3 font-semibold">Student Name</th>
                            <th class="pb-3 font-semibold">Serial Code</th>
                            <th class="pb-3 font-semibold">Course</th>
                            <th class="pb-3 font-semibold text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60">
                        @forelse($recentCertificates as $cert)
                            <tr class="hover:bg-slate-800/40 transition">
                                <td class="py-3.5 pr-2 font-bold text-white">
                                    {{ $cert->student_name }}
                                </td>
                                <td class="py-3.5 pr-2 font-mono text-emerald-400 font-semibold">
                                    {{ $cert->certificate_code }}
                                </td>
                                <td class="py-3.5 pr-2 text-slate-300 max-w-[160px] truncate" title="{{ $cert->course }}">
                                    {{ $cert->course }}
                                </td>
                                <td class="py-3.5 text-right shrink-0">
                                    <a href="{{ route('verify', ['code' => $cert->certificate_code]) }}" target="_blank" class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-slate-800 text-blue-300 hover:text-white hover:bg-blue-600 font-semibold text-[11px] transition">
                                        <span>Verify</span>
                                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-6 text-center text-slate-500">
                                    No certificate records registered yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Right 5 cols: Recent Media & Contact Activity -->
        <div class="lg:col-span-5 space-y-6">
            
            <!-- Recent Media Files -->
            <div class="bg-slate-900/90 rounded-3xl p-6 sm:p-7 border border-slate-800 shadow-xl space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-base font-bold text-white font-heading">Recent Media Uploads</h3>
                        <p class="text-xs text-slate-400">Library assets & optimized images</p>
                    </div>
                    <a href="{{ route('admin.media') }}" class="text-xs font-bold text-emerald-400 hover:text-emerald-300 transition">
                        Manage &rarr;
                    </a>
                </div>

                <div class="grid grid-cols-3 gap-3">
                    @forelse($recentMedia as $media)
                        <div class="aspect-square rounded-2xl bg-slate-950 border border-slate-800 overflow-hidden relative group">
                            @if($media->isImage())
                                <img src="{{ $media->url }}" alt="{{ $media->title }}" class="w-full h-full object-cover group-hover:scale-105 transition">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center p-2 text-center text-slate-400">
                                    <span class="font-mono text-[10px] font-bold uppercase text-blue-400">{{ $media->extension }}</span>
                                    <span class="text-[9px] truncate w-full mt-1">{{ $media->title }}</span>
                                </div>
                            @endif
                        </div>
                    @empty
                        <div class="col-span-3 py-6 text-center text-slate-500 text-xs">
                            No media files uploaded yet.
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Recent Inquiries -->
            <div class="bg-slate-900/90 rounded-3xl p-6 sm:p-7 border border-slate-800 shadow-xl space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-base font-bold text-white font-heading">Recent Contact Inquiries</h3>
                        <p class="text-xs text-slate-400">Messages submitted via website form</p>
                    </div>
                    <a href="{{ route('admin.inquiries.index') }}" class="text-xs font-bold text-amber-400 hover:text-amber-300 transition">
                        View All &rarr;
                    </a>
                </div>
                <div class="space-y-3">
                    @forelse($recentInquiries as $inquiry)
                        <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="p-3.5 rounded-xl bg-slate-950/70 border border-slate-800 hover:border-slate-700 text-xs space-y-1 block transition group">
                            <div class="flex items-center justify-between text-slate-400 text-[11px]">
                                <span class="font-bold text-white group-hover:text-blue-400 transition">{{ $inquiry->name }}</span>
                                <span>{{ $inquiry->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-blue-300 font-medium">{{ $inquiry->subject }}</p>
                            <p class="text-slate-400 text-[11px] truncate">{{ $inquiry->message }}</p>
                        </a>
                    @empty
                        <p class="text-xs text-slate-500 text-center py-4">No contact messages received yet.</p>
                    @endforelse
                </div>
            </div>

            <!-- Recent ATC Registrations -->
            <div class="bg-slate-900/90 rounded-3xl p-6 sm:p-7 border border-slate-800 shadow-xl space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-base font-bold text-white font-heading">Recent ATC Applications</h3>
                        <p class="text-xs text-slate-400">Authorized Training Centre registration requests</p>
                    </div>
                    <a href="{{ route('admin.atc.index') }}" class="text-xs font-bold text-sky-400 hover:text-sky-300 transition">
                        View All &rarr;
                    </a>
                </div>
                <div class="space-y-3">
                    @forelse($recentAtc as $atc)
                        <a href="{{ route('admin.atc.show', $atc) }}" class="p-3.5 rounded-xl bg-slate-950/70 border border-slate-800 hover:border-slate-700 text-xs space-y-1.5 block transition group">
                            <div class="flex items-center justify-between">
                                <span class="font-mono text-[11px] font-bold text-sky-400">{{ $atc->reference_no }}</span>
                                <span class="text-[10px] text-slate-400">{{ $atc->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-white font-bold group-hover:text-sky-300 transition uppercase tracking-tight">{{ $atc->centre_name }}</p>
                            <div class="flex items-center justify-between text-[11px] text-slate-400">
                                <span>{{ $atc->director_name }}</span>
                                @if($atc->status === 'approved')
                                    <span class="text-emerald-400 font-semibold">Approved</span>
                                @elseif($atc->status === 'rejected')
                                    <span class="text-red-400 font-semibold">Rejected</span>
                                @elseif($atc->status === 'under_review')
                                    <span class="text-sky-400 font-semibold">Under Review</span>
                                @else
                                    <span class="text-amber-400 font-semibold">Pending</span>
                                @endif
                            </div>
                        </a>
                    @empty
                        <p class="text-xs text-slate-500 text-center py-4">No ATC applications submitted yet.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

@endsection
