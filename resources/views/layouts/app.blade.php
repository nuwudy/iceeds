<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth antialiased">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'iCEEDS | Innovation Council for Exquisite Education & Development of Skills')</title>
    <meta name="description" content="@yield('meta_description', 'iCEEDS is a self-governing educational trust registered under the Indian Trusts Act, 1882, providing ISO-accredited certifications, vocational training, and verified academic credentials.')">

    <!-- Favicons & Mobile Home Screen Icons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <meta name="theme-color" content="#0f172a">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="iCEEDS">

    <!-- Social Media Open Graph (WhatsApp, Facebook, LinkedIn, Telegram, iMessage) -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="iCEEDS Central Academic Repository">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'iCEEDS | Accredited Certifications & Central Academic Repository')">
    <meta property="og:description" content="@yield('meta_description', 'Official portal of iCEEDS: A Self-Governing Educational Trust (Registered under the Indian Trusts Act, 1882). Instant online certificate verification and ISO-accredited vocational programs.')">
    <meta property="og:image" content="{{ asset('images/og-image.png') }}">
    <meta property="og:image:secure_url" content="{{ asset('images/og-image.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="iCEEDS Official Accreditation & Verification Portal">

    <!-- Twitter / X Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('title', 'iCEEDS | Accredited Certifications & Central Academic Repository')">
    <meta name="twitter:description" content="@yield('meta_description', 'Official portal of iCEEDS: A Self-Governing Educational Trust (Registered under the Indian Trusts Act, 1882). Instant online certificate verification and ISO-accredited vocational programs.')">
    <meta name="twitter:image" content="{{ asset('images/og-image.png') }}">

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

        /* Seamless ticker animation */
        @keyframes ticker-slide {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-ticker {
            display: inline-flex;
            white-space: nowrap;
            animation: ticker-slide 85s linear infinite;
        }
        .animate-ticker:hover {
            animation-play-state: paused;
        }

        /* iCEEDS Brand Preloader Styles */
        #site-preloader {
            position: fixed;
            inset: 0;
            z-index: 999999;
            background: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: opacity 0.4s ease-out, visibility 0.4s ease-out;
        }

        #site-preloader.preloader-hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        .iceeds-brand-title {
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            color: #0197b2;
            letter-spacing: -0.025em;
            text-shadow: 0 4px 20px rgba(1, 151, 178, 0.2);
        }

        /* Continuous Luminous Shimmer Effect across iCEEDS text */
        .iceeds-shimmer-text {
            background: linear-gradient(
                90deg, 
                #0197b2 0%, 
                #0197b2 35%, 
                #38bdf8 50%, 
                #0197b2 65%, 
                #0197b2 100%
            );
            background-size: 200% 100%;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: iceedsShine 2.2s infinite ease-in-out;
        }

        @keyframes iceedsShine {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        .iceeds-preloader-line {
            width: 140px;
            height: 3px;
            background: #f1f5f9;
            border-radius: 9999px;
            overflow: hidden;
            position: relative;
        }

        .iceeds-preloader-bar {
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, #0197b2, #38bdf8, #0197b2);
            background-size: 200% 100%;
            animation: iceedsProgress 1.4s infinite cubic-bezier(0.65, 0, 0.35, 1);
        }

        @keyframes iceedsProgress {
            0% { transform: translateX(-100%); }
            50% { transform: translateX(0%); }
            100% { transform: translateX(100%); }
        }

        @keyframes iceedsPulseGlow {
            0%, 100% { transform: scale(0.96); opacity: 0.3; }
            50% { transform: scale(1.06); opacity: 0.65; }
        }

        .iceeds-aura {
            animation: iceedsPulseGlow 2.5s infinite ease-in-out;
        }

        /* Explainer Popover Styles for Emblems (Hover & Touch) */
        .emblem-popover-trigger.popover-active .emblem-popover {
            opacity: 1 !important;
            visibility: visible !important;
            pointer-events: auto !important;
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

    <!-- iCEEDS Brand Preloader (Hidden in Print) -->
    <div id="site-preloader" class="no-print" aria-hidden="true">
        <div class="relative flex flex-col items-center px-4 select-none">
            <!-- Ambient Brand Glow in official #0197b2 cyan-teal -->
            <div class="absolute -inset-10 bg-gradient-to-tr from-[#0197b2]/20 via-sky-300/20 to-[#0197b2]/15 rounded-full blur-2xl pointer-events-none iceeds-aura"></div>
            
            <!-- Single Stylized Brand Typography in exact color code #0197b2 with loading shimmer animation -->
            <div class="relative text-center">
                <span class="iceeds-brand-title iceeds-shimmer-text text-5xl sm:text-6xl md:text-7xl font-black tracking-tight leading-none block">
                    iCEEDS
                </span>
                <span class="text-[11px] sm:text-xs font-bold text-slate-700 tracking-tight mt-2.5 block font-heading">
                    Innovation Council for Exquisite Education &amp; Development of Skills
                </span>
                <span class="text-[9.5px] sm:text-[10.5px] font-semibold text-emerald-700 tracking-normal mt-0.5 block">
                    A Self-Governing Educational Trust &bull; Reg. under Indian Trusts Act, 1882
                </span>
            </div>

            <!-- Sleek Loading Progress Animation in #0197b2 -->
            <div class="iceeds-preloader-line mt-5">
                <div class="iceeds-preloader-bar"></div>
            </div>
        </div>
    </div>

    <!-- Top Institutional Banner (Hidden in Print) -->
    <div class="no-print bg-slate-950 text-slate-300 text-[11px] sm:text-xs py-2 border-b border-slate-800/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-2 text-center sm:text-left">
            <div class="flex items-center gap-2 flex-wrap justify-center sm:justify-start">
                <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded bg-emerald-500/20 text-emerald-400 font-semibold border border-emerald-500/30">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                    Registered under the Indian Trusts Act, 1882
                </span>
                <span class="text-slate-400 hidden sm:inline">&bull;</span>
                <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded bg-blue-500/20 text-blue-300 font-semibold border border-blue-500/30">
                    NITI Aayog Registered (Darpan ID / Government of India)
                </span>
                <span class="text-slate-400 hidden md:inline">&bull;</span>
                <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded bg-purple-500/20 text-purple-300 font-semibold border border-purple-500/30">
                    ISO Accredited / Certified
                </span>
                <span class="text-slate-400 hidden lg:inline">&bull;</span>
                <span class="text-slate-400 hidden xl:inline">NSDC Aligned</span>
            </div>
            <div class="flex items-center gap-4 text-slate-400">
                <a href="mailto:lettertoiceeds@gmail.com" class="hover:text-emerald-400 transition flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                    <span>lettertoiceeds@gmail.com</span>
                </a>
                <span class="text-slate-700 hidden sm:inline">|</span>
                <a href="tel:+917510200095" class="hover:text-emerald-400 transition hidden sm:flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                    <span>+91 75102 00095</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Sticky Glassmorphic Two-Tier Institutional Header (Hidden in Print) -->
    <header class="no-print sticky top-0 z-50 backdrop-blur-md bg-white/98 border-b border-slate-200/80 shadow-sm transition-all duration-200">
        <!-- TOP TIER: Prominent Logo, Full Form Institutional Name & Direct Actions -->
        <div class="border-b border-slate-100 py-2 sm:py-2.5">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between gap-3 sm:gap-6">
                    <!-- Brand Logo & Full Form (Desktop side-by-side, Mobile logo only in row) -->
                    <a href="{{ route('home') }}" class="flex items-center gap-3 sm:gap-4.5 group min-w-0" title="iCEEDS - Innovation Council for Exquisite Education & Development of Skills">
                        <picture class="shrink-0">
                            <source srcset="{{ asset('images/logo.webp') }}?v={{ file_exists(public_path('images/logo.webp')) ? filemtime(public_path('images/logo.webp')) : time() }}" type="image/webp">
                            <img src="{{ asset('images/logo.png') }}?v={{ file_exists(public_path('images/logo.png')) ? filemtime(public_path('images/logo.png')) : time() }}" alt="iCEEDS Logo" class="h-9 sm:h-13 md:h-15 w-auto object-contain group-hover:scale-[1.02] transition-transform duration-200">
                        </picture>
                        <!-- Desktop / Tablet Only: Full Form Expansion Displayed Alongside Logo -->
                        <div class="hidden sm:flex flex-col justify-center min-w-0">
                            <span class="text-xs sm:text-sm md:text-base lg:text-[15px] font-black tracking-tight text-slate-900 font-heading leading-tight group-hover:text-blue-700 transition">
                                Innovation Council for Exquisite Education &amp; Development of Skills
                            </span>
                            <div class="flex items-center gap-2 mt-0.5 flex-wrap">
                                <span class="text-[10px] sm:text-xs font-bold text-slate-700">A Self-Governing Educational Trust</span>
                                <span class="text-slate-300 hidden sm:inline">&bull;</span>
                                <span class="text-[10px] sm:text-[11px] font-semibold text-emerald-700 hidden sm:inline">Reg. under the Indian Trusts Act, 1882</span>
                            </div>
                        </div>
                    </a>

                    <!-- Top Tier Action Buttons & Mobile Trigger -->
                    <div class="flex items-center gap-2 sm:gap-2.5 shrink-0">
                        <!-- Certificate Verification Primary CTA -->
                        <a 
                            href="{{ route('verify') }}" 
                            class="inline-flex items-center gap-1.5 sm:gap-2 px-3 sm:px-4.5 py-1.5 sm:py-2.5 rounded-xl font-bold text-xs sm:text-sm text-white bg-slate-950 hover:bg-blue-700 active:bg-blue-800 shadow-md shadow-slate-950/15 hover:shadow-blue-700/25 transition-all duration-150 cursor-pointer"
                        >
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-emerald-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="hidden sm:inline">Certificate Verification</span>
                            <span class="sm:hidden">Verify</span>
                        </a>

                        <!-- Mobile Hamburger Button -->
                        <button 
                            type="button" 
                            id="mobileMenuBtn" 
                            aria-label="Toggle navigation menu" 
                            class="lg:hidden p-1.5 sm:p-2 rounded-xl text-slate-700 hover:text-slate-900 hover:bg-slate-100 focus:outline-none transition cursor-pointer"
                        >
                            <svg id="hamburgerIcon" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg id="closeIcon" class="w-6 h-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Only: Clean Single Line Full Form Under the Logo Header Row -->
                <a 
                    href="{{ route('home') }}" 
                    class="sm:hidden block mt-1.5 pt-1 border-t border-slate-100 text-[9.5px] xs:text-[10.5px] font-extrabold text-slate-800 tracking-tight leading-tight whitespace-nowrap overflow-hidden text-ellipsis hover:text-blue-700 transition" 
                    title="Innovation Council for Exquisite Education & Development of Skills"
                >
                    Innovation Council for Exquisite Education &amp; Development of Skills
                </a>
            </div>
        </div>

        <!-- LOWER TIER: Dedicated Navigation Menu Bar (Desktop) -->
        <div class="hidden lg:block bg-slate-50/90 border-t border-slate-200/60">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-11 flex items-center justify-between">
                <!-- Navigation Links -->
                <nav class="flex items-center gap-1 xl:gap-2">
                    <a href="{{ route('home') }}" class="px-3.5 py-1.5 text-xs font-bold rounded-lg transition {{ request()->routeIs('home') ? 'text-blue-700 bg-blue-100/70 font-extrabold shadow-2xs' : 'text-slate-700 hover:text-slate-950 hover:bg-white' }}">
                        Home
                    </a>
                    <a href="{{ route('about') }}" class="px-3.5 py-1.5 text-xs font-bold rounded-lg transition {{ request()->routeIs('about') ? 'text-blue-700 bg-blue-100/70 font-extrabold shadow-2xs' : 'text-slate-700 hover:text-slate-950 hover:bg-white' }}">
                        About Us
                    </a>
                    <a href="{{ route('courses') }}" class="px-3.5 py-1.5 text-xs font-bold rounded-lg transition {{ request()->routeIs('courses*') ? 'text-blue-700 bg-blue-100/70 font-extrabold shadow-2xs' : 'text-slate-700 hover:text-slate-950 hover:bg-white' }}">
                        Courses &amp; Syllabi (4,000+)
                    </a>
                    <a href="{{ route('services') }}" class="px-3.5 py-1.5 text-xs font-bold rounded-lg transition {{ request()->routeIs('services') ? 'text-blue-700 bg-blue-100/70 font-extrabold shadow-2xs' : 'text-slate-700 hover:text-slate-950 hover:bg-white' }}">
                        Services &amp; Programs
                    </a>
                    <a href="{{ route('gallery') }}" class="px-3.5 py-1.5 text-xs font-bold rounded-lg transition {{ request()->routeIs('gallery*') ? 'text-blue-700 bg-blue-100/70 font-extrabold shadow-2xs' : 'text-slate-700 hover:text-slate-950 hover:bg-white' }}">
                        Media Gallery
                    </a>
                    <a href="{{ route('contact') }}" class="px-3.5 py-1.5 text-xs font-bold rounded-lg transition {{ request()->routeIs('contact') ? 'text-blue-700 bg-blue-100/70 font-extrabold shadow-2xs' : 'text-slate-700 hover:text-slate-950 hover:bg-white' }}">
                        Contact
                    </a>
                </nav>

                <!-- Statutory & Quality Credentials Pill Badges -->
                <div class="flex items-center gap-1.5 text-[10px] font-bold">
                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-white text-emerald-800 border border-emerald-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        <span>Trusts Act, 1882</span>
                    </span>
                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-white text-blue-700 border border-blue-200">
                        <span>NITI Aayog NGO</span>
                    </span>
                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-white text-purple-700 border border-purple-200">
                        <span>ISO 9001:2015</span>
                    </span>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Drawer -->
        <div id="mobileMenu" class="lg:hidden hidden border-t border-slate-200 bg-white/98 px-4 pt-3 pb-6 shadow-xl transition-all duration-200">
            <div class="flex flex-col gap-1.5">
                <a href="{{ route('home') }}" class="px-4 py-2.5 text-sm font-semibold rounded-xl {{ request()->routeIs('home') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                    Home
                </a>
                <a href="{{ route('about') }}" class="px-4 py-2.5 text-sm font-semibold rounded-xl {{ request()->routeIs('about') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                    About Us
                </a>
                <a href="{{ route('courses') }}" class="px-4 py-2.5 text-sm font-semibold rounded-xl {{ request()->routeIs('courses*') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                    Courses
                </a>
                <a href="{{ route('services') }}" class="px-4 py-2.5 text-sm font-semibold rounded-xl {{ request()->routeIs('services') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                    Services & Programs
                </a>
                <a href="{{ route('gallery') }}" class="px-4 py-2.5 text-sm font-semibold rounded-xl {{ request()->routeIs('gallery*') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                    Media Gallery
                </a>
                <a href="{{ route('contact') }}" class="px-4 py-2.5 text-sm font-semibold rounded-xl {{ request()->routeIs('contact') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                    Contact
                </a>
                <div class="pt-3 mt-2 border-t border-slate-100 flex flex-col gap-2">
                    <button type="button" onclick="openPoliceDocModal('original')" class="w-full flex items-center justify-center gap-2 py-2.5 px-4 rounded-xl font-bold text-xs text-slate-800 bg-slate-100 hover:bg-slate-200 border border-slate-300 transition cursor-pointer">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <span>View Police Verification Report</span>
                    </button>
                    <a href="{{ route('verify') }}" class="w-full flex items-center justify-center gap-2 py-3 px-4 rounded-xl font-semibold text-sm text-white bg-slate-900 hover:bg-blue-700 transition">
                        <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Certificate Verification</span>
                    </a>
                    <a href="https://wa.me/917510200095" target="_blank" rel="noopener noreferrer" class="w-full flex items-center justify-center gap-2 py-2.5 px-4 rounded-xl font-semibold text-xs text-emerald-800 bg-emerald-50 border border-emerald-200 hover:bg-emerald-100 transition">
                        <span>Chat via WhatsApp (+91 75102 00095)</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- INSTITUTIONAL ACCREDITATION & QUALITY EMBLEMS (Just Above Ticker) -->
    <div class="no-print bg-slate-50/95 border-b border-slate-200/90 py-2.5 sm:py-3 relative z-30 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-3 lg:gap-4">
                
                <!-- Label Badge on Desktop & Mobile -->
                <div class="shrink-0 flex items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-blue-50 border border-blue-200/80 text-[11px] font-bold text-blue-800 uppercase tracking-wider">
                        <svg class="w-3.5 h-3.5 text-blue-600 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Accreditation &amp; Quality Emblems</span>
                    </span>
                </div>

                <!-- 10 Prominent Recognition Emblems with Interactive Explainer Popovers -->
                <div class="w-full lg:w-auto flex flex-wrap items-center justify-center lg:justify-end gap-2 sm:gap-2.5 md:gap-3">
                    @php
                        $emblems = [
                            [
                                'url' => 'https://iceeds.com/storage/media/2026/10/iceeds-accreditation-hqqxuz.webp',
                                'title' => 'ISO 9001:2015',
                                'desc' => 'Certifies that the organization follows the international standard for a Quality Management System (QMS), ensuring consistent delivery of quality services and customer satisfaction.'
                            ],
                            [
                                'url' => 'https://iceeds.com/storage/media/2026/10/iceeds-accreditation-1-j9jtqq.webp',
                                'title' => 'IAF (International Accreditation Forum)',
                                'desc' => 'The global association for conformity assessment accreditation bodies. When paired with an ISO badge, it indicates that the auditing body granting the ISO certificate is recognized internationally.'
                            ],
                            [
                                'url' => 'https://iceeds.com/storage/media/2026/10/iceeds-accreditation-2-wuygca.webp',
                                'title' => 'US Certification Badge',
                                'desc' => 'A third-party compliance seal representing registration or certification under an American or international assessment board (often seen on commercial certifications for quality and business standards).'
                            ],
                            [
                                'url' => 'https://iceeds.com/storage/media/2026/10/iceeds-accreditation-3-yacox0.webp',
                                'title' => 'FICS (First International Certification System)',
                                'desc' => 'An independent certification/auditing registrar that audits organizations and issues ISO and standard compliance certificates.'
                            ],
                            [
                                'url' => 'https://iceeds.com/storage/media/2026/10/iceeds-accreditation-4-qtqoqm.webp',
                                'title' => 'EIAC (Emirates International Accreditation Centre)',
                                'desc' => 'The national accreditation body of the United Arab Emirates (based in Dubai), granting official accreditation to certification bodies and training testing systems worldwide.'
                            ],
                            [
                                'url' => 'https://iceeds.com/storage/media/2026/10/iceeds-accreditation-8-4qzjn2.webp',
                                'title' => 'EGAC (Egyptian Accreditation Council - المجلس الوطني للاعتماد)',
                                'desc' => 'The official national accreditation body of Egypt, recognized internationally under IAF and ILAC multi-lateral recognition agreements.'
                            ],
                            [
                                'url' => 'https://iceeds.com/storage/media/2026/10/iceeds-accreditation-9-5p97l0.webp',
                                'title' => 'Heraldic Crest / UK-style Academic Coat of Arms',
                                'desc' => 'A traditional institutional crest commonly used by UK-affiliated academic bodies, awarding organisations, or heritage collegiate bodies to indicate an educational partnership or UK curriculum alignment.'
                            ],
                            [
                                'url' => 'https://iceeds.com/storage/media/2026/10/iceeds-accreditation-10-fxjgr0.webp',
                                'title' => 'Accredited Body / Quality Seal',
                                'desc' => 'A formal guarantee/security seal symbolizing verified accreditation, authenticity, or standard verification from a certifying agency.'
                            ],
                            [
                                'url' => 'https://iceeds.com/storage/media/2026/10/iceeds-accreditation-11-6d5uxy.webp',
                                'title' => 'NSDC (National Skill Development Corporation)',
                                'desc' => 'A public-private partnership under India’s Ministry of Skill Development & Entrepreneurship (MSDE) that facilitates and funds vocational training and skill programs in India.'
                            ],
                            [
                                'url' => 'https://iceeds.com/storage/media/2026/10/iceeds-accreditation-12-gcfvex.webp',
                                'title' => 'Skill India (कौशल भारत - कुशल भारत)',
                                'desc' => 'The flagship campaign launched by the Government of India to provide industry-relevant vocational training and certification to Indian youth.'
                            ],
                        ];
                    @endphp

                    @foreach($emblems as $emblem)
                        <div class="relative group emblem-popover-trigger" tabindex="0" role="button" aria-haspopup="true" aria-label="{{ $emblem['title'] }}">
                            <!-- Emblem Box -->
                            <div class="h-11 sm:h-12 md:h-13 px-2.5 sm:px-3 py-1.5 rounded-xl bg-white border border-slate-200/90 shadow-2xs group-hover:shadow-lg group-hover:border-blue-400/80 group-hover:scale-105 active:scale-95 transition-all duration-200 flex items-center justify-center shrink-0 cursor-pointer">
                                <img 
                                    src="{{ $emblem['url'] }}" 
                                    alt="{{ $emblem['title'] }}" 
                                    loading="lazy" 
                                    class="h-8 sm:h-9 md:h-10 w-auto max-w-[85px] sm:max-w-[95px] md:max-w-[105px] object-contain pointer-events-none"
                                >
                            </div>

                            <!-- Popover / Explainer Card (Shows on Cursor Hover or Touch) -->
                            <div class="emblem-popover pointer-events-none group-hover:pointer-events-auto opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 ease-out absolute z-50 top-full mt-2.5 left-1/2 -translate-x-1/2 w-64 sm:w-72 p-3.5 bg-slate-950/95 backdrop-blur-md text-white rounded-2xl shadow-2xl border border-slate-700/80 text-left">
                                <!-- Top Pointer Arrow -->
                                <div class="absolute -top-1.5 left-1/2 -translate-x-1/2 w-3 h-3 bg-slate-950 border-t border-l border-slate-700/80 rotate-45 pointer-events-none"></div>

                                <div class="relative z-10 space-y-1">
                                    <h5 class="font-extrabold text-sky-400 text-xs sm:text-[13px] font-heading leading-tight tracking-tight">
                                        {{ $emblem['title'] }}
                                    </h5>
                                    <p class="text-slate-300 text-[11px] leading-relaxed">
                                        {{ $emblem['desc'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <!-- LIVE CREDENTIALS & ACCREDITATIONS TICKER (Above Hero / Main Content) -->
    <div class="no-print bg-slate-900 border-b border-slate-800 text-xs py-2.5 overflow-hidden shadow-inner relative z-30 select-none">
        <div class="flex items-center">
            <!-- Label Badge fixed on the left -->
            <div class="shrink-0 pl-4 pr-3 py-1 flex items-center gap-2 bg-slate-900 z-10 border-r border-slate-800/80 shadow-[6px_0_12px_-2px_rgba(15,23,42,0.8)]">
                <span class="flex h-2 w-2 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                </span>
                <span class="text-[11px] font-black uppercase tracking-wider text-emerald-400 font-mono">Accreditations &amp; Registrations</span>
            </div>

            <!-- Continuous Marquee / Ticker -->
            <div class="overflow-hidden whitespace-nowrap flex-1 mask-linear-fade">
                <div class="animate-ticker inline-flex items-center gap-6 text-slate-300 text-xs">
                    
                    <!-- Track Block 1 -->
                    <div class="inline-flex items-center gap-6">
                        <span class="inline-flex items-center gap-1.5 font-medium">
                            <span class="px-1.5 py-0.5 rounded text-[10px] font-bold uppercase bg-blue-500/20 text-blue-300 border border-blue-500/30 font-mono">ISO 9001:2015</span>
                            <span>Certified Quality Management System for Educational &amp; Vocational Training</span>
                        </span>
                        <span class="text-slate-700">&bull;</span>
                        <span class="inline-flex items-center gap-1.5 font-medium">
                            <span class="px-1.5 py-0.5 rounded text-[10px] font-bold uppercase bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 font-mono">Indian Trusts Act, 1882</span>
                            <span>Self-Governing Educational Organization</span>
                        </span>
                        <span class="text-slate-700">&bull;</span>
                        <span class="inline-flex items-center gap-1.5 font-medium">
                            <span class="px-1.5 py-0.5 rounded text-[10px] font-bold uppercase bg-amber-500/20 text-amber-300 border border-amber-500/30 font-mono">NSDC Aligned</span>
                            <span>Skill Training &amp; Certification Support (Ministry of Skill Development &amp; Entrepreneurship, Govt. of India)</span>
                        </span>
                        <span class="text-slate-700">&bull;</span>
                        <span class="inline-flex items-center gap-1.5 font-medium">
                            <span class="px-1.5 py-0.5 rounded text-[10px] font-bold uppercase bg-purple-500/20 text-purple-300 border border-purple-500/30 font-mono">Global Recognition</span>
                            <span>EGAC (Egyptian Accreditation Council) &bull; EIAC (Emirates International Accreditation Centre)</span>
                        </span>
                        <span class="text-slate-700">&bull;</span>
                        <span class="inline-flex items-center gap-1.5 font-medium">
                            <span class="px-1.5 py-0.5 rounded text-[10px] font-bold uppercase bg-sky-500/20 text-sky-300 border border-sky-500/30 font-mono">International Councils</span>
                            <span>QEAA &bull; FICS (Forum for Internationally Certified Scholars) &bull; US &amp; UK International Accreditation Support</span>
                        </span>
                        <span class="text-slate-700">&bull;</span>
                        <span class="inline-flex items-center gap-1.5 font-medium">
                            <span class="px-1.5 py-0.5 rounded text-[10px] font-bold uppercase bg-rose-500/20 text-rose-300 border border-rose-500/30 font-mono">NITI Aayog</span>
                            <span>Enrolled under NGO Darpan Initiative (Government of India)</span>
                        </span>
                        <span class="text-slate-700">&bull;</span>
                        <span class="inline-flex items-center gap-1.5 font-medium">
                            <span class="px-1.5 py-0.5 rounded text-[10px] font-bold uppercase bg-indigo-500/20 text-indigo-300 border border-indigo-500/30 font-mono">MSME Registered</span>
                            <span>Ministry of Micro, Small &amp; Medium Enterprises, Govt. of India</span>
                        </span>
                        <span class="text-slate-700">&bull;</span>
                        <span class="inline-flex items-center gap-1.5 font-medium">
                            <span class="px-1.5 py-0.5 rounded text-[10px] font-bold uppercase bg-teal-500/20 text-teal-300 border border-teal-500/30 font-mono">Employment Exchanges</span>
                            <span>Eligible for Registration as Additional Skill Qualification Across India</span>
                        </span>
                        <span class="text-slate-700">&bull;</span>
                        <span class="inline-flex items-center gap-1.5 font-medium">
                            <span class="px-1.5 py-0.5 rounded text-[10px] font-bold uppercase bg-cyan-500/20 text-cyan-300 border border-cyan-500/30 font-mono">IP Protected</span>
                            <span>Curricula, Certifications &amp; Brand Protected Under Copyright &amp; Trademark (Govt. of India)</span>
                        </span>
                        <span class="text-slate-700">&bull;</span>
                    </div>

                    <!-- Track Block 2 (Duplicate for Seamless Loop) -->
                    <div class="inline-flex items-center gap-6">
                        <span class="inline-flex items-center gap-1.5 font-medium">
                            <span class="px-1.5 py-0.5 rounded text-[10px] font-bold uppercase bg-blue-500/20 text-blue-300 border border-blue-500/30 font-mono">ISO 9001:2015</span>
                            <span>Certified Quality Management System for Educational &amp; Vocational Training</span>
                        </span>
                        <span class="text-slate-700">&bull;</span>
                        <span class="inline-flex items-center gap-1.5 font-medium">
                            <span class="px-1.5 py-0.5 rounded text-[10px] font-bold uppercase bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 font-mono">Indian Trusts Act, 1882</span>
                            <span>Self-Governing Educational Organization</span>
                        </span>
                        <span class="text-slate-700">&bull;</span>
                        <span class="inline-flex items-center gap-1.5 font-medium">
                            <span class="px-1.5 py-0.5 rounded text-[10px] font-bold uppercase bg-amber-500/20 text-amber-300 border border-amber-500/30 font-mono">NSDC Aligned</span>
                            <span>Skill Training &amp; Certification Support (Ministry of Skill Development &amp; Entrepreneurship, Govt. of India)</span>
                        </span>
                        <span class="text-slate-700">&bull;</span>
                        <span class="inline-flex items-center gap-1.5 font-medium">
                            <span class="px-1.5 py-0.5 rounded text-[10px] font-bold uppercase bg-purple-500/20 text-purple-300 border border-purple-500/30 font-mono">Global Recognition</span>
                            <span>EGAC (Egyptian Accreditation Council) &bull; EIAC (Emirates International Accreditation Centre)</span>
                        </span>
                        <span class="text-slate-700">&bull;</span>
                        <span class="inline-flex items-center gap-1.5 font-medium">
                            <span class="px-1.5 py-0.5 rounded text-[10px] font-bold uppercase bg-sky-500/20 text-sky-300 border border-sky-500/30 font-mono">International Councils</span>
                            <span>QEAA &bull; FICS (Forum for Internationally Certified Scholars) &bull; US &amp; UK International Accreditation Support</span>
                        </span>
                        <span class="text-slate-700">&bull;</span>
                        <span class="inline-flex items-center gap-1.5 font-medium">
                            <span class="px-1.5 py-0.5 rounded text-[10px] font-bold uppercase bg-rose-500/20 text-rose-300 border border-rose-500/30 font-mono">NITI Aayog</span>
                            <span>Enrolled under NGO Darpan Initiative (Government of India)</span>
                        </span>
                        <span class="text-slate-700">&bull;</span>
                        <span class="inline-flex items-center gap-1.5 font-medium">
                            <span class="px-1.5 py-0.5 rounded text-[10px] font-bold uppercase bg-indigo-500/20 text-indigo-300 border border-indigo-500/30 font-mono">MSME Registered</span>
                            <span>Ministry of Micro, Small &amp; Medium Enterprises, Govt. of India</span>
                        </span>
                        <span class="text-slate-700">&bull;</span>
                        <span class="inline-flex items-center gap-1.5 font-medium">
                            <span class="px-1.5 py-0.5 rounded text-[10px] font-bold uppercase bg-teal-500/20 text-teal-300 border border-teal-500/30 font-mono">Employment Exchanges</span>
                            <span>Eligible for Registration as Additional Skill Qualification Across India</span>
                        </span>
                        <span class="text-slate-700">&bull;</span>
                        <span class="inline-flex items-center gap-1.5 font-medium">
                            <span class="px-1.5 py-0.5 rounded text-[10px] font-bold uppercase bg-cyan-500/20 text-cyan-300 border border-cyan-500/30 font-mono">IP Protected</span>
                            <span>Curricula, Certifications &amp; Brand Protected Under Copyright &amp; Trademark (Govt. of India)</span>
                        </span>
                        <span class="text-slate-700">&bull;</span>
                    </div>

                </div>
            </div>
        </div>
    </div>

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
                        <div class="w-12 h-12 rounded-xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-sm font-heading">A Self-Governing Educational Trust</h4>
                            <p class="text-xs text-slate-400">Registered under the Indian Trusts Act, 1882</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-center md:justify-start gap-4 p-4 rounded-2xl bg-slate-900/40 border border-slate-800/80">
                        <div class="w-12 h-12 rounded-xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-sm font-heading">NITI Aayog Registered</h4>
                            <p class="text-xs text-slate-400">Darpan ID / Government of India</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-center md:justify-start gap-4 p-4 rounded-2xl bg-slate-900/40 border border-slate-800/80">
                        <div class="w-12 h-12 rounded-xl bg-purple-500/10 border border-purple-500/20 flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-sm font-heading">ISO Accredited / Certified</h4>
                            <p class="text-xs text-slate-400">ISO 9001:2015 International Benchmarks</p>
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
                            <picture>
                                <source srcset="{{ asset('images/logo.webp') }}?v={{ file_exists(public_path('images/logo.webp')) ? filemtime(public_path('images/logo.webp')) : time() }}" type="image/webp">
                                <img src="{{ asset('images/logo.png') }}?v={{ file_exists(public_path('images/logo.png')) ? filemtime(public_path('images/logo.png')) : time() }}" alt="iCEEDS Logo" class="h-8 w-auto object-contain">
                            </picture>
                        </div>
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed max-w-sm">
                        iCEEDS (Innovation Council for Exquisite Education &amp; Development of Skills) is a self-governing educational organization established under the Indian Trusts Act, 1882. As an independent skill development, training, and certification entity, the Trust designs and conducts vocational and professional courses guided by an expert Academic Board of Studies, with certification support aligned with the NSDC under the Ministry of Skill Development and Entrepreneurship, Govt. of India.
                    </p>
                    <div class="pt-2 flex flex-wrap gap-2 text-[11px]">
                        <span class="px-2.5 py-1 rounded-md bg-slate-900 border border-slate-800 text-emerald-400 font-medium">Registered under Indian Trusts Act, 1882</span>
                        <span class="px-2.5 py-1 rounded-md bg-slate-900 border border-slate-800 text-blue-300 font-medium">NITI Aayog Registered (Darpan ID)</span>
                        <span class="px-2.5 py-1 rounded-md bg-slate-900 border border-slate-800 text-purple-300 font-medium">ISO Accredited / Certified</span>
                        <span class="px-2.5 py-1 rounded-md bg-slate-900 border border-slate-800 text-slate-300">NSDC Aligned &amp; MSME Registered</span>
                    </div>
                </div>

                <!-- Col 2: Navigation Links -->
                <div>
                    <h3 class="text-sm font-bold text-white font-heading uppercase tracking-wider mb-4">Quick Links</h3>
                    <ul class="space-y-2.5 text-xs">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition">Home</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-white transition">About iCEEDS</a></li>
                        <li><a href="{{ route('courses') }}" class="hover:text-white transition text-blue-300 font-semibold flex items-center gap-1.5">
                            <span>Courses Catalog</span>
                            <span class="text-[10px] px-1.5 py-0.2 rounded bg-blue-500/20 text-blue-300 border border-blue-500/30">New</span>
                        </a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-white transition">Services &amp; Programs</a></li>
                        <li><a href="{{ route('gallery') }}" class="hover:text-white transition">Media Gallery</a></li>
                        <li><a href="{{ route('verify') }}" class="hover:text-white transition flex items-center gap-1.5 text-emerald-400 font-semibold">
                            <span>Certificate Verification</span>
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                        </a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-white transition">Contact &amp; Inquiries</a></li>
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

                <!-- Col 4: Administrative Offices & Contacts -->
                <div class="space-y-3">
                    <h3 class="text-sm font-bold text-white font-heading uppercase tracking-wider mb-4">Official Offices</h3>
                    <div class="text-xs space-y-3">
                        <div>
                            <span class="text-white font-semibold block text-[11px] uppercase tracking-wider text-blue-300">Corporate Office</span>
                            <p class="text-slate-400 mt-0.5 leading-relaxed">
                                iCEEDS, Plot No:90, 3rd Cross Street, Phase-2/Thirumalai Nagar Annexe, Perungudi, Greater Chennai, Pin: 600096, Tamilnadu State
                            </p>
                        </div>
                        <div>
                            <span class="text-white font-semibold block text-[11px] uppercase tracking-wider text-emerald-300">Central Administrative Office</span>
                            <p class="text-slate-400 mt-0.5 leading-relaxed">
                                Suit No: 15/413-15, Athanikkal, Calicut-Palaghat Highway, Valluvambram (PO), Malappuram, Kerala State, Pin: 673642
                            </p>
                        </div>
                        <div class="pt-2 border-t border-slate-900 space-y-1 text-[11px] text-slate-400">
                            <p><strong class="text-slate-300">Admin Support:</strong> <a href="tel:+917510200095" class="hover:text-emerald-400 font-mono">+91 75102 00095</a> <span class="text-emerald-400 font-semibold">(WhatsApp)</span></p>
                            <p><strong class="text-slate-300">Tech Assistance:</strong> <a href="tel:+917510200090" class="hover:text-blue-400 font-mono">+91 75102 00090</a></p>
                            <p><strong class="text-slate-300">Grievance Officer:</strong> <a href="tel:+919061202443" class="hover:text-amber-400 font-mono">+91 90612 02443</a></p>
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
                    <a href="{{ route('verify') }}" class="hover:text-slate-300 transition">Certificate Verification</a>
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
        href="https://wa.me/917510200095" 
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

    <!-- iCEEDS Preloader Auto-Dismissal Script -->
    <script>
        (function() {
            const preloader = document.getElementById('site-preloader');
            if (!preloader) return;

            function dismissPreloader() {
                if (!preloader.classList.contains('preloader-hidden')) {
                    preloader.classList.add('preloader-hidden');
                    setTimeout(function() {
                        preloader.style.display = 'none';
                    }, 450);
                }
            }

            if (document.readyState === 'complete') {
                setTimeout(dismissPreloader, 350);
            } else {
                window.addEventListener('load', function() {
                    setTimeout(dismissPreloader, 350);
                });
            }

            // Safety timeout: always dismiss within 1500ms max so visitor is never blocked
            setTimeout(dismissPreloader, 1500);
        })();
    </script>

    <!-- Emblems Touch / Hover Explainer Popover Handler -->
    <script>
        (function() {
            const triggers = document.querySelectorAll('.emblem-popover-trigger');
            if (!triggers.length) return;

            function positionPopover(popover) {
                if (!popover) return;
                // Reset styles to compute natural geometry
                popover.style.left = '50%';
                popover.style.right = 'auto';
                popover.style.transform = 'translateX(-50%)';

                const rect = popover.getBoundingClientRect();
                const padding = 12;

                if (rect.right > window.innerWidth - padding) {
                    popover.style.left = 'auto';
                    popover.style.right = '0';
                    popover.style.transform = 'none';
                } else if (rect.left < padding) {
                    popover.style.left = '0';
                    popover.style.right = 'auto';
                    popover.style.transform = 'none';
                }
            }

            triggers.forEach(trigger => {
                const popover = trigger.querySelector('.emblem-popover');
                
                trigger.addEventListener('mouseenter', () => {
                    positionPopover(popover);
                });

                trigger.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const wasActive = trigger.classList.contains('popover-active');
                    triggers.forEach(t => t.classList.remove('popover-active'));
                    if (!wasActive) {
                        trigger.classList.add('popover-active');
                        positionPopover(popover);
                    }
                });
            });

            // Dismiss when touching/clicking anywhere outside
            document.addEventListener('click', () => {
                triggers.forEach(t => t.classList.remove('popover-active'));
            });
        })();
    </script>

    <!-- Police Verification Report Interactive Scrollable Modal Partial -->
    @include('partials.police-verification-modal')

    @stack('scripts')
</body>
</html>
