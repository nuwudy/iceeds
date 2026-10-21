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
    </style>
    @stack('styles')
</head>
<body class="min-h-screen flex flex-col bg-slate-950 text-slate-200">

    <!-- Top Navigation Header -->
    <header class="bg-slate-900 border-b border-slate-800 sticky top-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between gap-4">
            
            <!-- Brand & Navigation Links -->
            <div class="flex items-center gap-6 xl:gap-8">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 shrink-0 group">
                    <div class="bg-white/95 px-3 py-1.5 rounded-xl border border-white/20 shadow-sm flex items-center justify-center">
                        <picture>
                            <source srcset="{{ asset('images/logo.webp') }}?v={{ file_exists(public_path('images/logo.webp')) ? filemtime(public_path('images/logo.webp')) : time() }}" type="image/webp">
                            <img src="{{ asset('images/logo.png') }}?v={{ file_exists(public_path('images/logo.png')) ? filemtime(public_path('images/logo.png')) : time() }}" alt="iCEEDS Logo" class="h-7 w-auto object-contain">
                        </picture>
                    </div>
                    <div class="hidden sm:block">
                        <span class="text-[10px] uppercase font-bold tracking-wider px-2 py-0.5 rounded bg-blue-500/20 text-blue-300 border border-blue-500/30">
                            Admin Portal
                        </span>
                    </div>
                </a>

                <!-- Desktop Navigation Tabs -->
                <nav class="hidden md:flex items-center gap-1.5 text-xs font-semibold">
                    <a href="{{ route('admin.dashboard') }}" class="px-3.5 py-2 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('admin.certificates.index') }}" class="px-3.5 py-2 rounded-xl transition flex items-center gap-1.5 {{ request()->routeIs('admin.certificates.*') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800' }}">
                        <span>Certificates</span>
                        <span class="px-1.5 py-0.5 rounded text-[10px] {{ request()->routeIs('admin.certificates.*') ? 'bg-blue-800 text-blue-100' : 'bg-slate-800 text-slate-400' }}">
                            Registry
                        </span>
                    </a>
                    <a href="{{ route('admin.media') }}" class="px-3.5 py-2 rounded-xl transition {{ request()->routeIs('admin.media*') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800' }}">
                        Media Library
                    </a>
                    <a href="{{ route('admin.atc.index') }}" class="px-3.5 py-2 rounded-xl transition flex items-center gap-1.5 {{ request()->routeIs('admin.atc.*') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800' }}">
                        <span>ATC Centres</span>
                        @php
                            $pendingAtcCount = \App\Models\AtcRegistration::where('status', 'pending')->count();
                        @endphp
                        @if($pendingAtcCount > 0)
                            <span class="px-1.5 py-0.2 rounded text-[10px] font-bold bg-amber-500/30 text-amber-300 border border-amber-500/40 font-mono">
                                {{ $pendingAtcCount }}
                            </span>
                        @endif
                    </a>
                    <a href="{{ route('admin.inquiries.index') }}" class="px-3.5 py-2 rounded-xl transition flex items-center gap-1.5 {{ request()->routeIs('admin.inquiries.*') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800' }}">
                        <span>Inquiries</span>
                    </a>
                    @if(Auth::user()->isAdmin())
                        <a href="{{ route('admin.users.index') }}" class="px-3.5 py-2 rounded-xl transition flex items-center gap-1.5 {{ request()->routeIs('admin.users.*') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800' }}">
                            <span>Users & Staff</span>
                        </a>
                    @endif
                </nav>
            </div>

            <!-- Right Controls: User Profile & Actions -->
            <div class="flex items-center gap-3 sm:gap-4">
                <a href="{{ route('home') }}" target="_blank" class="hidden lg:flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold text-slate-300 hover:text-white bg-slate-800 hover:bg-slate-700 transition">
                    <svg class="w-3.5 h-3.5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                    <span>View Site</span>
                </a>

                <div class="flex items-center gap-3 pl-3 border-l border-slate-800">
                    <div class="hidden sm:block text-right">
                        <div class="flex items-center justify-end gap-1.5">
                            <span class="text-xs font-bold text-white block">{{ Auth::user()->name }}</span>
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
                        <span class="text-[10px] text-slate-400 block font-mono">{{ Auth::user()->email }}</span>
                    </div>

                    <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" title="Logout" class="p-2 sm:px-3 sm:py-1.5 rounded-xl text-xs font-semibold text-red-400 hover:text-white bg-red-500/10 hover:bg-red-600 border border-red-500/20 transition flex items-center gap-1.5 cursor-pointer">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span class="hidden sm:inline">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Sub-bar -->
        <div class="md:hidden flex items-center justify-around border-t border-slate-800/80 px-2 py-2 text-xs font-semibold bg-slate-900/90 overflow-x-auto">
            <a href="{{ route('admin.dashboard') }}" class="px-3 py-1.5 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white font-bold' : 'text-slate-400' }}">
                Dashboard
            </a>
            <a href="{{ route('admin.certificates.index') }}" class="px-3 py-1.5 rounded-lg {{ request()->routeIs('admin.certificates.*') ? 'bg-blue-600 text-white font-bold' : 'text-slate-400' }}">
                Certificates
            </a>
            <a href="{{ route('admin.atc.index') }}" class="px-3 py-1.5 rounded-lg {{ request()->routeIs('admin.atc.*') ? 'bg-blue-600 text-white font-bold' : 'text-slate-400' }}">
                ATC
            </a>
            <a href="{{ route('admin.media') }}" class="px-3 py-1.5 rounded-lg {{ request()->routeIs('admin.media*') ? 'bg-blue-600 text-white font-bold' : 'text-slate-400' }}">
                Media
            </a>
            <a href="{{ route('admin.inquiries.index') }}" class="px-3 py-1.5 rounded-lg {{ request()->routeIs('admin.inquiries.*') ? 'bg-blue-600 text-white font-bold' : 'text-slate-400' }}">
                Inquiries
            </a>
            @if(Auth::user()->isAdmin())
                <a href="{{ route('admin.users.index') }}" class="px-3 py-1.5 rounded-lg {{ request()->routeIs('admin.users.*') ? 'bg-blue-600 text-white font-bold' : 'text-slate-400' }}">
                    Users
                </a>
            @endif
        </div>
    </header>

    <!-- Main Admin Content Area -->
    <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
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

    <!-- Footer -->
    <footer class="border-t border-slate-900 bg-slate-950 py-6 text-center text-xs text-slate-500">
        <div class="max-w-7xl mx-auto px-4 flex flex-col sm:flex-row items-center justify-between gap-2">
            <p>iCEEDS Administration Portal &bull; Self-Governing Educational Organization under Indian Trusts Act, 1882</p>
            <p class="font-mono text-[11px] text-slate-600">v2.0 &bull; Verified Database: 2,875+ Records</p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
