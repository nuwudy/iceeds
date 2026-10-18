<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth antialiased">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'iCEEDS | Innovation Council for Exquisite Education & Development of Skills')</title>
    <meta name="description" content="@yield('meta_description', 'iCEEDS is an autonomous body registered under the Government of India providing ISO-accredited certifications, skill development programs, and academic credentials.')">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Google Fonts: Plus Jakarta Sans & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        }
        h1, h2, h3, .font-heading {
            font-family: 'Outfit', 'Plus Jakarta Sans', system-ui, sans-serif;
        }
        .font-mono {
            font-family: 'JetBrains Mono', monospace;
        }

        /* Subtle mesh background */
        .bg-portal-gradient {
            background-color: #f8fafc;
            background-image: 
                radial-gradient(at 0% 0%, rgba(29, 78, 216, 0.05) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(5, 150, 105, 0.05) 0px, transparent 50%),
                radial-gradient(at 50% 100%, rgba(217, 119, 6, 0.03) 0px, transparent 50%);
        }

        /* Dedicated Print Stylesheet */
        @media print {
            .no-print {
                display: none !important;
            }
            body {
                background: #ffffff !important;
                color: #0f172a !important;
            }
            @page {
                size: A4 portrait;
                margin: 1.5cm;
            }
        }
    </style>
    @stack('styles')
</head>
<body class="min-h-screen flex flex-col bg-portal-gradient text-slate-800">

    <!-- Top Institutional Banner (Hidden in Print) -->
    <div class="no-print bg-slate-950 text-slate-300 text-[11px] sm:text-xs py-2 border-b border-slate-800/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-2 text-center sm:text-left">
            <div class="flex items-center gap-2 flex-wrap justify-center sm:justify-start">
                <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded bg-emerald-500/20 text-emerald-400 font-semibold border border-emerald-500/30">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                    Indian Trusts Act, 1882
                </span>
                <span class="text-slate-400 hidden md:inline">&bull;</span>
                <span class="text-slate-300 hidden md:inline">NSDC Aligned (Ministry of Skill Development & Entrepreneurship, Govt. of India)</span>
                <span class="text-slate-400 hidden lg:inline">&bull;</span>
                <span class="text-slate-400 hidden lg:inline">ISO Accredited</span>
            </div>
            <div class="flex items-center gap-4 text-slate-400">
                <a href="mailto:lettertoiceeds@gmail.com" class="hover:text-emerald-400 transition flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                    <span>lettertoiceeds@gmail.com</span>
                </a>
                <span class="text-slate-700 hidden sm:inline">|</span>
                <a href="tel:+918943997003" class="hover:text-emerald-400 transition hidden sm:flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                    <span>+91 89439 97003</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Sticky Glassmorphic Header (Hidden in Print) -->
    <header class="no-print sticky top-0 z-50 backdrop-blur-md bg-white/95 border-b border-slate-200/80 shadow-sm transition-all duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <img src="{{ asset('images/logo.png') }}" alt="iCEEDS - Innovation Council for Exquisite Education & Development of Skills" class="h-9 sm:h-11 w-auto object-contain group-hover:opacity-95 transition">
                <div class="hidden md:block pl-3 border-l border-slate-200">
                    <div class="flex items-center gap-1.5">
                        <span class="text-[10px] font-bold tracking-wider uppercase px-2 py-0.5 rounded bg-blue-50 text-blue-700 border border-blue-200/80">Indian Trusts Act, 1882</span>
                        <span class="text-[10px] font-bold tracking-wider uppercase px-1.5 py-0.5 rounded bg-emerald-50 text-emerald-700 border border-emerald-200/80">ISO Certified</span>
                    </div>
                    <p class="text-[10px] text-slate-500 tracking-tight font-medium mt-0.5">Academic Board of Studies &bull; NSDC Aligned</p>
                </div>
            </a>

            <!-- Desktop Navigation Links -->
            <nav class="hidden lg:flex items-center gap-1 xl:gap-2">
                <a href="{{ route('home') }}" class="px-3.5 py-2 text-sm font-semibold rounded-lg transition {{ request()->routeIs('home') ? 'text-blue-700 bg-blue-50/80 font-bold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                    Home
                </a>
                <a href="{{ route('about') }}" class="px-3.5 py-2 text-sm font-semibold rounded-lg transition {{ request()->routeIs('about') ? 'text-blue-700 bg-blue-50/80 font-bold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                    About Us
                </a>
                <a href="{{ route('services') }}" class="px-3.5 py-2 text-sm font-semibold rounded-lg transition {{ request()->routeIs('services') ? 'text-blue-700 bg-blue-50/80 font-bold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                    Services & Programs
                </a>
                <a href="{{ route('contact') }}" class="px-3.5 py-2 text-sm font-semibold rounded-lg transition {{ request()->routeIs('contact') ? 'text-blue-700 bg-blue-50/80 font-bold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                    Contact
                </a>
            </nav>

            <!-- Action Buttons: Verify Certificate & Mobile Menu Trigger -->
            <div class="flex items-center gap-3">
                <a href="{{ route('verify') }}" class="inline-flex items-center gap-2 px-4 sm:px-5 py-2.5 rounded-xl font-semibold text-xs sm:text-sm text-white bg-slate-900 hover:bg-blue-700 active:bg-blue-800 shadow-md shadow-slate-900/10 hover:shadow-blue-700/20 transition-all duration-150 cursor-pointer">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Verify Certificate</span>
                </a>

                <!-- Mobile Hamburger Button -->
                <button type="button" id="mobileMenuBtn" aria-label="Toggle navigation menu" class="lg:hidden p-2.5 rounded-xl text-slate-700 hover:text-slate-900 hover:bg-slate-100 focus:outline-none transition">
                    <svg id="hamburgerIcon" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="closeIcon" class="w-6 h-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Drawer -->
        <div id="mobileMenu" class="lg:hidden hidden border-t border-slate-200 bg-white/98 px-4 pt-3 pb-6 shadow-xl transition-all duration-200">
            <div class="flex flex-col gap-1.5">
                <a href="{{ route('home') }}" class="px-4 py-3 text-sm font-semibold rounded-xl {{ request()->routeIs('home') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                    Home
                </a>
                <a href="{{ route('about') }}" class="px-4 py-3 text-sm font-semibold rounded-xl {{ request()->routeIs('about') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                    About Us
                </a>
                <a href="{{ route('services') }}" class="px-4 py-3 text-sm font-semibold rounded-xl {{ request()->routeIs('services') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                    Services & Programs
                </a>
                <a href="{{ route('contact') }}" class="px-4 py-3 text-sm font-semibold rounded-xl {{ request()->routeIs('contact') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                    Contact
                </a>
                <div class="pt-3 mt-2 border-t border-slate-100 flex flex-col gap-2">
                    <a href="{{ route('verify') }}" class="w-full flex items-center justify-center gap-2 py-3 px-4 rounded-xl font-semibold text-sm text-white bg-slate-900 hover:bg-blue-700 transition">
                        <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Certificate Verification Portal</span>
                    </a>
                    <a href="https://wa.me/918943997003" target="_blank" rel="noopener noreferrer" class="w-full flex items-center justify-center gap-2 py-2.5 px-4 rounded-xl font-semibold text-xs text-emerald-800 bg-emerald-50 border border-emerald-200 hover:bg-emerald-100 transition">
                        <span>Chat via WhatsApp (+91 89439 97003)</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Institutional Footer (Hidden in Print) -->
    <footer class="no-print bg-slate-950 text-slate-400 border-t border-slate-900 mt-20">
        <!-- Top Institutional Footer Banner -->
        <div class="border-b border-slate-900 bg-slate-900/60 py-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center md:text-left">
                    <div class="flex items-center justify-center md:justify-start gap-4 p-4 rounded-2xl bg-slate-900/40 border border-slate-800/80">
                        <div class="w-12 h-12 rounded-xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-sm font-heading">Autonomous Statutory Body</h4>
                            <p class="text-xs text-slate-400">Registered Under the Government of India</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-center md:justify-start gap-4 p-4 rounded-2xl bg-slate-900/40 border border-slate-800/80">
                        <div class="w-12 h-12 rounded-xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-sm font-heading">ISO Accredited Quality</h4>
                            <p class="text-xs text-slate-400">Strict Compliance with International Standards</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-center md:justify-start gap-4 p-4 rounded-2xl bg-slate-900/40 border border-slate-800/80">
                        <div class="w-12 h-12 rounded-xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-sm font-heading">Tamper-Proof Verification</h4>
                            <p class="text-xs text-slate-400">Instant Real-Time Credential Validation</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Footer Links & Locations -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10">
                <!-- Col 1: Identity & Summary (2 cols on large) -->
                <div class="lg:col-span-2 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="bg-white/95 px-3.5 py-2 rounded-xl border border-white/10 shadow-sm inline-block">
                            <img src="{{ asset('images/logo.png') }}" alt="iCEEDS Logo" class="h-8 w-auto object-contain">
                        </div>
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed max-w-sm">
                        iCEEDS (Innovation Council for Exquisite Education & Development of Skills) is a self-governing educational organization established under the Indian Trusts Act, 1882. As an independent skill development, training, and certification entity, the Trust designs and conducts vocational and professional courses guided by an expert Academic Board of Studies, with certification support aligned with the NSDC under the Ministry of Skill Development and Entrepreneurship, Govt. of India.
                    </p>
                    <div class="pt-2 flex flex-wrap gap-2 text-[11px]">
                        <span class="px-2.5 py-1 rounded-md bg-slate-900 border border-slate-800 text-slate-300">Indian Trusts Act, 1882</span>
                        <span class="px-2.5 py-1 rounded-md bg-slate-900 border border-slate-800 text-slate-300">Academic Board of Studies</span>
                        <span class="px-2.5 py-1 rounded-md bg-slate-900 border border-slate-800 text-slate-300">NSDC Aligned</span>
                        <span class="px-2.5 py-1 rounded-md bg-slate-900 border border-slate-800 text-slate-300">ISO Accredited</span>
                    </div>
                </div>

                <!-- Col 2: Navigation Links -->
                <div>
                    <h3 class="text-sm font-bold text-white font-heading uppercase tracking-wider mb-4">Quick Links</h3>
                    <ul class="space-y-2.5 text-xs">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition">Home</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-white transition">About iCEEDS</a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-white transition">Services & Programs</a></li>
                        <li><a href="{{ route('verify') }}" class="hover:text-white transition flex items-center gap-1.5 text-emerald-400 font-semibold">
                            <span>Verify Certificate</span>
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                        </a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-white transition">Contact & Inquiries</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-white transition flex items-center gap-1.5 text-slate-400 hover:text-blue-400">
                            <svg class="w-3 h-3 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" /></svg>
                            <span>Admin Login</span>
                        </a></li>
                    </ul>
                </div>

                <!-- Col 3: Programs & Offerings -->
                <div>
                    <h3 class="text-sm font-bold text-white font-heading uppercase tracking-wider mb-4">Academic Programs</h3>
                    <ul class="space-y-2.5 text-xs text-slate-400">
                        <li><span class="text-slate-300">Counselling Psychology</span></li>
                        <li><span class="text-slate-300">Learning Difficulty Management</span></li>
                        <li><span class="text-slate-300">Special Education Needs (SEN)</span></li>
                        <li><span class="text-slate-300">Child & Adolescent Psychology</span></li>
                        <li><span class="text-slate-300">Corporate Leadership Training</span></li>
                        <li><span class="text-slate-300">Career Development Coaching</span></li>
                    </ul>
                </div>

                <!-- Col 4: Administrative Offices -->
                <div class="space-y-3">
                    <h3 class="text-sm font-bold text-white font-heading uppercase tracking-wider mb-4">Administrative Offices</h3>
                    <div class="text-xs space-y-3">
                        <div>
                            <span class="text-white font-semibold block text-[11px] uppercase tracking-wider text-slate-300">Central Administrative Office</span>
                            <p class="text-slate-400 mt-0.5 leading-relaxed">
                                132/76 Mogappair Road, Thiruvalluvar, Chennai, Tamil Nadu — Pin: 600050
                            </p>
                        </div>
                        <div>
                            <span class="text-white font-semibold block text-[11px] uppercase tracking-wider text-slate-300">Regional Administrative Office</span>
                            <p class="text-slate-400 mt-0.5 leading-relaxed">
                                AQAAB Arcade, Athanikkal, Valluvambram PO, Malappuram District, Kerala — Pin: 676517
                            </p>
                        </div>
                        <div>
                            <span class="text-white font-semibold block text-[11px] uppercase tracking-wider text-slate-300">Operations Hub</span>
                            <p class="text-slate-400 mt-0.5">Aluva, Ernakulam District, Kerala</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Copyright Strip -->
        <div class="border-t border-slate-900 py-6 text-xs text-slate-500">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-3 text-center sm:text-left">
                <p>Copyright &copy; {{ date('Y') }} - iCEEDS. All rights reserved.</p>
                <div class="flex items-center gap-4">
                    <a href="{{ route('verify') }}" class="hover:text-slate-300 transition">Online Verification</a>
                    <span>&bull;</span>
                    <a href="{{ route('contact') }}" class="hover:text-slate-300 transition">Institutional Support</a>
                    <span>&bull;</span>
                    <a href="{{ route('login') }}" class="hover:text-slate-300 transition">Admin Login</a>
                    <span>&bull;</span>
                    <span class="text-slate-600">ISO 9001:2015 Accredited</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Quick-Chat Button (Hidden in Print) -->
    <a 
        href="https://wa.me/918943997003" 
        target="_blank" 
        rel="noopener noreferrer" 
        aria-label="Chat with iCEEDS on WhatsApp" 
        class="no-print fixed bottom-6 right-6 z-40 group flex items-center gap-2.5 bg-emerald-600 hover:bg-emerald-500 text-white p-3.5 sm:px-4 sm:py-3 rounded-full shadow-lg shadow-emerald-900/30 hover:shadow-emerald-600/40 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 cursor-pointer"
    >
        <svg class="w-6 h-6 shrink-0 fill-current" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
        </svg>
        <span class="hidden sm:inline text-xs font-bold tracking-wide">Quick Chat</span>
    </a>

    <!-- Vanilla JS for Mobile Menu Toggle -->
    <script>
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const hamburgerIcon = document.getElementById('hamburgerIcon');
        const closeIcon = document.getElementById('closeIcon');

        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', function() {
                const isExpanded = !mobileMenu.classList.contains('hidden');
                if (isExpanded) {
                    mobileMenu.classList.add('hidden');
                    hamburgerIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                } else {
                    mobileMenu.classList.remove('hidden');
                    hamburgerIcon.classList.add('hidden');
                    closeIcon.classList.remove('hidden');
                }
            });
        }
    </script>
    @stack('scripts')
</body>
</html>
