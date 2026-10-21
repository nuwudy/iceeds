<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Portal') | iCEEDS Administration</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', system-ui, sans-serif; }
        h1, h2, h3, h4, .font-heading { font-family: 'Outfit', sans-serif; }
        .font-mono { font-family: 'JetBrains Mono', monospace; }
        .dragover { border-color: #3b82f6 !important; background-color: rgba(59, 130, 246, 0.1) !important; }
        
        /* Custom scrollbar for sidebar */
        .sidebar-scroll::-webkit-scrollbar { width: 4px; }
        .sidebar-scroll::-webkit-scrollbar-track { background: transparent; }
        .sidebar-scroll::-webkit-scrollbar-thumb { background: #334155; border-radius: 4px; }
    </style>
    @stack('styles')
</head>
<body class="min-h-screen bg-slate-950 text-slate-200 antialiased">

    @php
        $pendingTestimonialsCount = \App\Models\Testimonial::where('is_approved', false)->count();
        $pendingAtcCount = \App\Models\AtcRegistration::where('status', 'pending')->count();
    @endphp

    <!-- ========================================================================= -->
    <!-- DESKTOP VERTICAL SIDEBAR (Fixed Left, 72 Width = 288px) -->
    <!-- ========================================================================= -->
    <aside class="hidden lg:flex lg:flex-col lg:w-72 lg:fixed lg:inset-y-0 lg:z-50 bg-slate-900 border-r border-slate-800 shadow-2xl">
        
        <!-- Sidebar Brand Header -->
        <div class="h-20 flex items-center justify-between px-6 border-b border-slate-800/80 bg-slate-950/50">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 group">
                <div class="bg-white/95 px-3 py-1.5 rounded-xl border border-white/20 shadow-sm flex items-center justify-center group-hover:scale-105 transition-transform">
                    <picture>
                        <source srcset="{{ asset('images/logo.webp') }}?v={{ file_exists(public_path('images/logo.webp')) ? filemtime(public_path('images/logo.webp')) : time() }}" type="image/webp">
                        <img src="{{ asset('images/logo.png') }}?v={{ file_exists(public_path('images/logo.png')) ? filemtime(public_path('images/logo.png')) : time() }}" alt="iCEEDS Logo" class="h-7 w-auto object-contain">
                    </picture>
                </div>
                <div>
                    <span class="text-[10px] uppercase font-bold tracking-wider px-2 py-0.5 rounded bg-blue-500/20 text-blue-300 border border-blue-500/30 font-mono block">
                        Admin Portal
                    </span>
                    <span class="text-[9px] text-slate-500 font-mono block mt-0.5">v2.0 &bull; Synced</span>
                </div>
            </a>
        </div>

        <!-- Sidebar Navigation Menu Links -->
        <nav class="flex-1 px-4 py-6 space-y-6 overflow-y-auto sidebar-scroll text-xs">
            
            <!-- Group 1: Overview -->
            <div>
                <span class="px-3 text-[10px] font-mono font-bold uppercase tracking-wider text-slate-500 block mb-2">
                    Main Overview
                </span>
                <div class="space-y-1">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-bold transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800' }}">
                        <svg class="w-4 h-4 shrink-0 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-blue-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <span>Dashboard</span>
                    </a>
                </div>
            </div>

            <!-- Group 2: Registry & Assets -->
            <div>
                <span class="px-3 text-[10px] font-mono font-bold uppercase tracking-wider text-slate-500 block mb-2">
                    Credentials &amp; Media
                </span>
                <div class="space-y-1">
                    <a href="{{ route('admin.certificates.index') }}" 
                       class="flex items-center justify-between px-3.5 py-2.5 rounded-xl font-bold transition-all {{ request()->routeIs('admin.certificates.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 shrink-0 {{ request()->routeIs('admin.certificates.*') ? 'text-white' : 'text-emerald-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                            <span>Certificates</span>
                        </div>
                        <span class="px-1.5 py-0.5 rounded text-[10px] font-mono {{ request()->routeIs('admin.certificates.*') ? 'bg-blue-800 text-blue-100' : 'bg-slate-800 text-slate-400' }}">
                            Registry
                        </span>
                    </a>

                    <a href="{{ route('admin.media') }}" 
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-bold transition-all {{ request()->routeIs('admin.media*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800' }}">
                        <svg class="w-4 h-4 shrink-0 {{ request()->routeIs('admin.media*') ? 'text-white' : 'text-sky-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span>Media Library</span>
                    </a>
                </div>
            </div>

            <!-- Group 3: Content & Inquiries -->
            <div>
                <span class="px-3 text-[10px] font-mono font-bold uppercase tracking-wider text-slate-500 block mb-2">
                    Content &amp; Engagement
                </span>
                <div class="space-y-1">
                    <a href="{{ route('admin.blog.index') }}" 
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-bold transition-all {{ request()->routeIs('admin.blog.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800' }}">
                        <svg class="w-4 h-4 shrink-0 {{ request()->routeIs('admin.blog.*') ? 'text-white' : 'text-purple-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                        </svg>
                        <span>Blog Articles</span>
                    </a>

                    <a href="{{ route('admin.testimonials.index') }}" 
                       class="flex items-center justify-between px-3.5 py-2.5 rounded-xl font-bold transition-all {{ request()->routeIs('admin.testimonials.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 shrink-0 {{ request()->routeIs('admin.testimonials.*') ? 'text-white' : 'text-amber-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                            </svg>
                            <span>Testimonials</span>
                        </div>
                        @if($pendingTestimonialsCount > 0)
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500 text-slate-950 font-mono shadow-xs animate-pulse">
                                {{ $pendingTestimonialsCount }}
                            </span>
                        @endif
                    </a>

                    <a href="{{ route('admin.atc.index') }}" 
                       class="flex items-center justify-between px-3.5 py-2.5 rounded-xl font-bold transition-all {{ request()->routeIs('admin.atc.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 shrink-0 {{ request()->routeIs('admin.atc.*') ? 'text-white' : 'text-teal-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                            <span>ATC Centres</span>
                        </div>
                        @if($pendingAtcCount > 0)
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/30 text-amber-300 border border-amber-500/40 font-mono">
                                {{ $pendingAtcCount }}
                            </span>
                        @endif
                    </a>

                    <a href="{{ route('admin.inquiries.index') }}" 
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-bold transition-all {{ request()->routeIs('admin.inquiries.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800' }}">
                        <svg class="w-4 h-4 shrink-0 {{ request()->routeIs('admin.inquiries.*') ? 'text-white' : 'text-rose-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span>Inquiries</span>
                    </a>
                </div>
            </div>

            <!-- Group 4: Administration & Access -->
            @if(Auth::user()->isAdmin())
                <div>
                    <span class="px-3 text-[10px] font-mono font-bold uppercase tracking-wider text-slate-500 block mb-2">
                        Administration
                    </span>
                    <div class="space-y-1">
                        <a href="{{ route('admin.users.index') }}" 
                           class="flex items-center justify-between px-3.5 py-2.5 rounded-xl font-bold transition-all {{ request()->routeIs('admin.users.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800' }}">
                            <div class="flex items-center gap-3">
                                <svg class="w-4 h-4 shrink-0 {{ request()->routeIs('admin.users.*') ? 'text-white' : 'text-indigo-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                                <span>Users &amp; Staff</span>
                            </div>
                            <span class="px-1.5 py-0.2 rounded text-[9px] font-mono uppercase bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 font-bold">
                                Admin
                            </span>
                        </a>
                    </div>
                </div>
            @endif

        </nav>

        <!-- Sidebar Bottom Footer User Info & Logout -->
        <div class="p-4 border-t border-slate-800/80 bg-slate-950/60 space-y-3">
            
            <a href="{{ route('home') }}" target="_blank" class="flex items-center justify-between px-3 py-2 rounded-xl text-xs font-semibold text-slate-300 hover:text-white bg-slate-800/60 hover:bg-slate-800 transition group">
                <span class="flex items-center gap-2">
                    <svg class="w-3.5 h-3.5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                    <span>View Public Website</span>
                </span>
                <span class="text-slate-500 group-hover:text-blue-400 transition">&rarr;</span>
            </a>

            <!-- User Profile Box -->
            <div class="flex items-center justify-between gap-3 p-2.5 rounded-xl bg-slate-800/40 border border-slate-800">
                <div class="flex items-center gap-2.5 min-w-0">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-blue-600 to-indigo-600 text-white font-bold text-xs flex items-center justify-center shrink-0 shadow-sm font-heading">
                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                    </div>
                    <div class="min-w-0 flex-1">
                        <span class="text-xs font-bold text-white block truncate">{{ Auth::user()->name }}</span>
                        <div class="flex items-center gap-1.5 mt-0.5">
                            @if(Auth::user()->isAdmin())
                                <span class="px-1.5 py-0.2 rounded text-[9px] font-bold uppercase tracking-wider bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 font-mono">
                                    Admin
                                </span>
                            @else
                                <span class="px-1.5 py-0.2 rounded text-[9px] font-bold uppercase tracking-wider bg-blue-500/20 text-blue-300 border border-blue-500/30 font-mono">
                                    Staff
                                </span>
                            @endif
                            <span class="text-[10px] text-slate-500 truncate font-mono">{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                </div>

                <form action="{{ route('admin.logout') }}" method="POST" class="shrink-0">
                    @csrf
                    <button type="submit" title="Logout" class="p-2 rounded-lg text-red-400 hover:text-white bg-red-500/10 hover:bg-red-600 border border-red-500/20 transition cursor-pointer">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- ========================================================================= -->
    <!-- MOBILE SIDEBAR SLIDE-OVER DRAWER (Responsive, Off-canvas) -->
    <!-- ========================================================================= -->
    <div id="mobileAdminDrawer" class="lg:hidden fixed inset-0 z-50 hidden" role="dialog" aria-modal="true">
        <!-- Backdrop -->
        <div id="mobileDrawerBackdrop" onclick="closeAdminDrawer()" class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm transition-opacity"></div>

        <!-- Off-canvas panel -->
        <div class="fixed inset-y-0 left-0 w-72 bg-slate-900 border-r border-slate-800 shadow-2xl flex flex-col z-10 text-xs">
            
            <!-- Mobile Drawer Header -->
            <div class="h-16 flex items-center justify-between px-5 border-b border-slate-800 bg-slate-950">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5">
                    <div class="bg-white px-2.5 py-1 rounded-lg">
                        <img src="{{ asset('images/logo.png') }}" alt="iCEEDS Logo" class="h-6 w-auto object-contain">
                    </div>
                    <span class="text-[10px] uppercase font-bold tracking-wider px-2 py-0.5 rounded bg-blue-500/20 text-blue-300 border border-blue-500/30 font-mono">
                        Admin Portal
                    </span>
                </a>
                <button type="button" onclick="closeAdminDrawer()" class="p-1.5 rounded-lg text-slate-400 hover:text-white bg-slate-800 cursor-pointer">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <!-- Drawer Links -->
            <nav class="flex-1 px-4 py-4 space-y-2 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-bold {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800' }}">
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.certificates.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl font-bold {{ request()->routeIs('admin.certificates.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800' }}">
                    <span>Certificates Registry</span>
                </a>
                <a href="{{ route('admin.media') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-bold {{ request()->routeIs('admin.media*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800' }}">
                    <span>Media Library</span>
                </a>
                <a href="{{ route('admin.blog.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-bold {{ request()->routeIs('admin.blog.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800' }}">
                    <span>Blog Articles</span>
                </a>
                <a href="{{ route('admin.testimonials.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl font-bold {{ request()->routeIs('admin.testimonials.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800' }}">
                    <span>Testimonials</span>
                    @if($pendingTestimonialsCount > 0)
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500 text-slate-950 font-mono">
                            {{ $pendingTestimonialsCount }}
                        </span>
                    @endif
                </a>
                <a href="{{ route('admin.atc.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl font-bold {{ request()->routeIs('admin.atc.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800' }}">
                    <span>ATC Centres</span>
                    @if($pendingAtcCount > 0)
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/30 text-amber-300 border border-amber-500/40 font-mono">
                            {{ $pendingAtcCount }}
                        </span>
                    @endif
                </a>
                <a href="{{ route('admin.inquiries.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-bold {{ request()->routeIs('admin.inquiries.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800' }}">
                    <span>Inquiries</span>
                </a>
                @if(Auth::user()->isAdmin())
                    <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-bold {{ request()->routeIs('admin.users.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800' }}">
                        <span>Users &amp; Staff</span>
                    </a>
                @endif
            </nav>

            <!-- Drawer Footer Logout -->
            <div class="p-4 border-t border-slate-800 bg-slate-950/80">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full py-2.5 px-4 rounded-xl text-xs font-bold text-red-400 hover:text-white bg-red-500/10 hover:bg-red-600 border border-red-500/20 transition flex items-center justify-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        <span>Logout ({{ Auth::user()->name }})</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- MAIN WORKSPACE CONTAINER (Offset by 72 / 288px on Large Screens) -->
    <!-- ========================================================================= -->
    <div class="lg:pl-72 flex flex-col flex-1 min-w-0">
        
        <!-- Top Sub-Header Bar -->
        <header class="sticky top-0 z-40 h-16 bg-slate-900/90 backdrop-blur-md border-b border-slate-800/90 flex items-center justify-between px-4 sm:px-6 lg:px-8">
            
            <!-- Left: Mobile Trigger & Breadcrumb -->
            <div class="flex items-center gap-3 sm:gap-4">
                <button type="button" 
                        onclick="openAdminDrawer()" 
                        class="lg:hidden p-2 rounded-xl text-slate-300 hover:text-white hover:bg-slate-800 focus:outline-none cursor-pointer"
                        aria-label="Open Sidebar Navigation">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <div class="flex items-center gap-2">
                    <span class="text-xs font-mono text-slate-400 hidden sm:inline">Administration Desk &bull;</span>
                    <h2 class="text-sm font-bold text-white font-heading">
                        @yield('title', 'Admin Dashboard')
                    </h2>
                </div>
            </div>

            <!-- Right: Public Site Link & Quick Profile -->
            <div class="flex items-center gap-3 sm:gap-4">
                <a href="{{ route('home') }}" target="_blank" class="hidden sm:flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-semibold text-slate-300 hover:text-white bg-slate-800 hover:bg-slate-700 transition">
                    <svg class="w-3.5 h-3.5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                    <span>View Site</span>
                </a>

                <div class="flex items-center gap-2 pl-3 border-l border-slate-800">
                    <span class="text-xs font-bold text-white hidden md:inline">{{ Auth::user()->name }}</span>
                    @if(Auth::user()->isAdmin())
                        <span class="px-1.5 py-0.2 rounded text-[9px] font-bold uppercase tracking-wider bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 font-mono">
                            Admin
                        </span>
                    @else
                        <span class="px-1.5 py-0.2 rounded text-[9px] font-bold uppercase tracking-wider bg-blue-500/20 text-blue-300 border border-blue-500/30 font-mono">
                            Staff
                        </span>
                    @endif
                </div>
            </div>
        </header>

        <!-- Main Workspace Body -->
        <main class="flex-1 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            
            <!-- Flash Messages -->
            @if(session('success'))
                <div class="mb-6 p-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 text-sm flex items-center justify-between gap-3 shadow-lg">
                    <div class="flex items-center gap-2.5">
                        <svg class="w-5 h-5 text-emerald-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                    <button type="button" onclick="this.parentElement.remove()" class="text-emerald-400/60 hover:text-emerald-300 text-xs font-bold">&times;</button>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 rounded-2xl bg-red-500/10 border border-red-500/30 text-red-300 text-sm flex items-center justify-between gap-3 shadow-lg">
                    <div class="flex items-center gap-2.5">
                        <svg class="w-5 h-5 text-red-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ session('error') }}</span>
                    </div>
                    <button type="button" onclick="this.parentElement.remove()" class="text-red-400/60 hover:text-red-300 text-xs font-bold">&times;</button>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 p-4 rounded-2xl bg-red-500/10 border border-red-500/30 text-red-300 text-sm space-y-1 shadow-lg">
                    <p class="font-bold">Please correct the following errors:</p>
                    <ul class="list-disc list-inside text-xs space-y-0.5">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>

        <!-- Admin Workspace Footer -->
        <footer class="border-t border-slate-900 bg-slate-950 py-6 text-center text-xs text-slate-500 mt-auto">
            <div class="max-w-7xl mx-auto px-4 flex flex-col sm:flex-row items-center justify-between gap-2">
                <p>iCEEDS Administration Portal &bull; Self-Governing Educational Organization under Indian Trusts Act, 1882</p>
                <p class="font-mono text-[11px] text-slate-600">v2.0 &bull; Verified Database: 2,875+ Records</p>
            </div>
        </footer>

    </div>

    <!-- Vanilla JS for Mobile Sidebar Drawer -->
    <script>
        function openAdminDrawer() {
            const drawer = document.getElementById('mobileAdminDrawer');
            if (drawer) {
                drawer.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            }
        }

        function closeAdminDrawer() {
            const drawer = document.getElementById('mobileAdminDrawer');
            if (drawer) {
                drawer.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        }

        window.openAdminDrawer = openAdminDrawer;
        window.closeAdminDrawer = closeAdminDrawer;

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeAdminDrawer();
        });
    </script>

    @stack('scripts')
</body>
</html>
