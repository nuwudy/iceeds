<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth antialiased">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'iCEEDS | Innovation Council for Exquisite Education & Development of Skills')</title>
    <meta name="description" content="@yield('meta_description', 'iCEEDS is a self-governing educational trust registered under the Indian Trusts Act, 1882, providing ISO-accredited certifications, vocational training, and verified academic credentials.')">

    <!-- Favicons & PWA Manifest -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="192x192" href="{{ asset('android-chrome-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="512x512" href="{{ asset('android-chrome-512x512.png') }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#0197b2">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="iCEEDS">
    <meta name="application-name" content="iCEEDS">
    <meta name="mobile-web-app-capable" content="yes">

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
        /* Prevent horizontal overflow without breaking position: sticky */
        body {
            overflow-x: clip;
            max-width: 100%;
        }

        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        }
        h1, h2, h3, .font-heading {
            font-family: 'Outfit', 'Plus Jakarta Sans', system-ui, sans-serif;
        }
        .font-mono {
            font-family: 'JetBrains Mono', monospace;
        }

        /* Explainer Popover Styles for Emblems (Hero & Footer Ticker) */
        .emblem-popover {
            display: none;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            max-width: min(calc(100vw - 24px), 340px) !important;
            box-sizing: border-box;
            z-index: 9999 !important;
            transition: opacity 0.15s ease, visibility 0.15s ease;
        }

        /* Active / Visible state controlled programmatically by JS */
        .emblem-popover.popover-visible {
            display: block !important;
            opacity: 1 !important;
            visibility: visible !important;
            pointer-events: auto !important;
        }

        /* Desktop cursor hover fallback */
        @media (hover: hover) and (pointer: fine) {
            .emblem-popover-trigger:hover .emblem-popover {
                display: block !important;
                opacity: 1 !important;
                visibility: visible !important;
                pointer-events: auto !important;
            }
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
        .emblem-popover-trigger {
            position: relative;
        }
        .emblem-popover-trigger:hover,
        .emblem-popover-trigger.popover-active {
            z-index: 70;
        }

        /* Philosophy & Theology Header Dropdown */
        #deptDropdownContainer:hover #deptDropdownPanel,
        #deptDropdownContainer.dropdown-open #deptDropdownPanel {
            opacity: 1 !important;
            visibility: visible !important;
            pointer-events: auto !important;
            transform: translateY(0) !important;
        }
        #deptDropdownContainer:hover #deptDropdownChevron,
        #deptDropdownContainer.dropdown-open #deptDropdownChevron {
            transform: rotate(180deg);
        }
        #deptDropdownPanel {
            transition: opacity 160ms cubic-bezier(0.16, 1, 0.3, 1), transform 160ms cubic-bezier(0.16, 1, 0.3, 1), visibility 160ms;
            transform: translateY(4px);
        }
        /* Invisible hover bridge to prevent mouse cursor disconnect when moving to panel */
        #deptDropdownPanel::before {
            content: '';
            position: absolute;
            top: -12px;
            left: 0;
            right: 0;
            height: 12px;
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
<body class="min-h-screen flex flex-col bg-portal-gradient text-slate-800 relative">

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
                <span class="text-[11px] sm:text-xs font-black text-slate-900 tracking-tight mt-2.5 block font-heading uppercase">
                    INNOVATION COUNCIL FOR EXQUISITE EDUCATION &amp; DEVELOPMENT OF SKILLS
                </span>
                <span class="text-[10.5px] sm:text-[11.5px] font-bold text-[#0097b1] tracking-normal mt-0.5 block">
                    उत्तम शिक्षा और कौशल के विकास के लिए नवाचार परिषद
                </span>
                <span class="text-[9.5px] sm:text-[10.5px] font-semibold italic text-slate-700 tracking-tight mt-0.5 block">
                    Skill for Growth. Skill for Future. Skill for Life.
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
                    <a href="{{ route('home') }}" class="flex items-center gap-3 sm:gap-4.5 group min-w-0" title="iCEEDS - INNOVATION COUNCIL FOR EXQUISITE EDUCATION &amp; DEVELOPMENT OF SKILLS">
                        <picture class="shrink-0">
                            <source srcset="{{ asset('images/logo.webp') }}?v={{ file_exists(public_path('images/logo.webp')) ? filemtime(public_path('images/logo.webp')) : time() }}" type="image/webp">
                            <img src="{{ asset('images/logo.png') }}?v={{ file_exists(public_path('images/logo.png')) ? filemtime(public_path('images/logo.png')) : time() }}" alt="iCEEDS Logo" class="h-9 sm:h-13 md:h-15 w-auto object-contain group-hover:scale-[1.02] transition-transform duration-200">
                        </picture>
                        <!-- Desktop / Tablet Only: Full Form Expansion Displayed Alongside Logo -->
                        <div class="hidden sm:flex flex-col justify-center min-w-0">
                            <span class="text-xs sm:text-[13px] md:text-sm lg:text-[14.5px] font-black tracking-tight text-slate-900 font-heading leading-tight group-hover:text-blue-700 transition uppercase">
                                INNOVATION COUNCIL FOR EXQUISITE EDUCATION &amp; DEVELOPMENT OF SKILLS
                            </span>
                            <span class="text-[11px] sm:text-xs md:text-[12.5px] font-bold text-[#0097b1] leading-tight tracking-normal mt-0.5">
                                उत्तम शिक्षा और कौशल के विकास के लिए नवाचार परिषद
                            </span>
                            <div class="flex items-center gap-2 mt-0.5 flex-wrap">
                                <span class="text-[10px] sm:text-[11px] font-bold text-slate-700 italic">Skill for Growth. Skill for Future. Skill for Life.</span>
                                <span class="text-slate-300 hidden md:inline">&bull;</span>
                                <span class="text-[10px] sm:text-[11px] font-semibold text-emerald-700 hidden md:inline">Reg. under the Indian Trusts Act, 1882</span>
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

                <!-- Mobile Only: Clean Multi-line Brand Header Under the Logo Row -->
                <a 
                    href="{{ route('home') }}" 
                    class="sm:hidden block mt-1.5 pt-1.5 border-t border-slate-100 hover:text-blue-700 transition" 
                    title="INNOVATION COUNCIL FOR EXQUISITE EDUCATION &amp; DEVELOPMENT OF SKILLS"
                >
                    <div class="text-[9.5px] xs:text-[10.5px] font-black text-slate-900 tracking-tight leading-tight uppercase truncate">
                        INNOVATION COUNCIL FOR EXQUISITE EDUCATION &amp; DEVELOPMENT OF SKILLS
                    </div>
                    <div class="text-[9px] xs:text-[10px] font-bold text-[#0097b1] leading-tight truncate mt-0.5">
                        उत्तम शिक्षा और कौशल के विकास के लिए नवाचार परिषद
                    </div>
                    <div class="text-[8.5px] xs:text-[9.5px] italic text-slate-600 font-medium truncate mt-0.5">
                        Skill for Growth. Skill for Future. Skill for Life.
                    </div>
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

                    <!-- Dropdown Menu: Department of Philosophy & Theology (Pure CSS Hover + JS Click Toggle) -->
                    <div class="relative group" id="deptDropdownContainer">
                        <div class="inline-flex items-center rounded-lg transition {{ request()->routeIs('departments.*') ? 'text-blue-700 bg-blue-100/70 font-extrabold shadow-2xs' : 'text-slate-700 hover:text-slate-950 hover:bg-white' }}">
                            <a href="{{ route('departments.philosophy-theology') }}" 
                               class="px-3 py-1.5 text-xs font-bold transition flex items-center gap-1">
                                <span>Philosophy &amp; Theology</span>
                            </a>
                            <button type="button" 
                                    id="deptDropdownBtn"
                                    aria-label="Toggle Philosophy and Theology Menu"
                                    class="pr-2.5 py-1.5 text-slate-400 hover:text-blue-700 cursor-pointer focus:outline-none">
                                <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:rotate-180" id="deptDropdownChevron" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </div>

                        <!-- Dropdown Panel (Shows on Hover & Click) -->
                        <div id="deptDropdownPanel"
                             class="absolute top-full left-0 mt-1 w-[460px] bg-white rounded-2xl shadow-2xl border border-slate-200/90 p-3 z-[60] overflow-hidden transition-all duration-150 ease-out opacity-0 invisible pointer-events-none group-hover:opacity-100 group-hover:visible group-hover:pointer-events-auto">
                            
                            <!-- Header Link -->
                            <div class="px-3 py-2 bg-slate-900 text-white rounded-xl mb-2.5 flex items-center justify-between">
                                <div>
                                    <span class="text-[10px] font-mono uppercase tracking-wider text-amber-400 font-bold block">Academic Faculty</span>
                                    <a href="{{ route('departments.philosophy-theology') }}" class="text-xs font-black hover:text-amber-300 transition flex items-center gap-1">
                                        <span>Department of Philosophy &amp; Theology</span>
                                        <svg class="w-3 h-3 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                                    </a>
                                </div>
                                <a href="{{ route('departments.philosophy-theology') }}" class="text-[10px] px-2 py-0.5 rounded bg-white/10 text-slate-300 font-mono hover:text-white hover:bg-white/20 transition">Overview &rarr;</a>
                            </div>

                            <div class="grid grid-cols-2 gap-2 text-xs">
                                
                                <!-- Department of Philosophy -->
                                <div class="p-2.5 rounded-xl bg-blue-50/60 border border-blue-100 hover:bg-blue-50 transition">
                                    <a href="{{ route('departments.philosophy') }}" class="font-extrabold text-blue-950 flex items-center gap-1.5 hover:text-blue-700 mb-1.5">
                                        <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                                        <span class="font-heading">Dept. of Philosophy</span>
                                    </a>
                                    <ul class="space-y-1 pl-3 border-l-2 border-blue-200 text-[11px] text-slate-600">
                                        <li>
                                            <a href="{{ route('departments.philosophy.psychology') }}" class="hover:text-blue-700 hover:font-bold block py-0.5">
                                                Psychology
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('departments.philosophy.sociology') }}" class="hover:text-blue-700 hover:font-bold block py-0.5">
                                                Sociology
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Department of Theology -->
                                <div class="p-2.5 rounded-xl bg-amber-50/60 border border-amber-100 hover:bg-amber-50 transition">
                                    <a href="{{ route('departments.theology') }}" class="font-extrabold text-amber-950 flex items-center gap-1.5 hover:text-amber-700 mb-1.5">
                                        <span class="w-2 h-2 rounded-full bg-amber-600"></span>
                                        <span class="font-heading">Dept. of Theology</span>
                                    </a>
                                    <ul class="space-y-1 pl-3 border-l-2 border-amber-200 text-[11px] text-slate-600">
                                        <li>
                                            <a href="{{ route('departments.theology.hindutva') }}" class="hover:text-amber-700 hover:font-bold block py-0.5">
                                                Chamber of Hindutva Studies
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('departments.theology.islamic') }}" class="hover:text-emerald-700 hover:font-bold block py-0.5">
                                                Chamber of Islamic Studies
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('departments.theology.christian') }}" class="hover:text-rose-700 hover:font-bold block py-0.5">
                                                Chamber of Christian Studies
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                    <a href="{{ route('services') }}" class="px-3.5 py-1.5 text-xs font-bold rounded-lg transition {{ request()->routeIs('services') ? 'text-blue-700 bg-blue-100/70 font-extrabold shadow-2xs' : 'text-slate-700 hover:text-slate-950 hover:bg-white' }}">
                        Services &amp; Programs
                    </a>
                    <a href="{{ route('blog.index') }}" class="px-3.5 py-1.5 text-xs font-bold rounded-lg transition {{ request()->routeIs('blog.*') ? 'text-blue-700 bg-blue-100/70 font-extrabold shadow-2xs' : 'text-slate-700 hover:text-slate-950 hover:bg-white' }}">
                        Blog
                    </a>
                    <a href="{{ route('testimonials.index') }}" class="px-3.5 py-1.5 text-xs font-bold rounded-lg transition {{ request()->routeIs('testimonials.*') ? 'text-blue-700 bg-blue-100/70 font-extrabold shadow-2xs' : 'text-slate-700 hover:text-slate-950 hover:bg-white' }}">
                        Testimonials
                    </a>
                    <a href="{{ route('gallery') }}" class="px-3.5 py-1.5 text-xs font-bold rounded-lg transition {{ request()->routeIs('gallery*') ? 'text-blue-700 bg-blue-100/70 font-extrabold shadow-2xs' : 'text-slate-700 hover:text-slate-950 hover:bg-white' }}">
                        Media Gallery
                    </a>
                    <a href="{{ route('contact') }}" class="px-3.5 py-1.5 text-xs font-bold rounded-lg transition {{ request()->routeIs('contact') ? 'text-blue-700 bg-blue-100/70 font-extrabold shadow-2xs' : 'text-slate-700 hover:text-slate-950 hover:bg-white' }}">
                        Contact
                    </a>
                    <a href="{{ route('atc.create') }}" class="px-3 py-1.5 text-xs font-bold rounded-lg transition flex items-center gap-1.5 {{ request()->routeIs('atc.*') ? 'text-blue-700 bg-blue-100/70 font-extrabold shadow-2xs' : 'text-slate-700 hover:text-slate-950 hover:bg-white' }}">
                        <span>ATC Affiliation</span>
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

                <!-- Mobile Philosophy & Theology Accordion (Vanilla JS) -->
                <div class="rounded-xl overflow-hidden border border-slate-200/80">
                    <div class="flex items-center justify-between {{ request()->routeIs('departments.*') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                        <a href="{{ route('departments.philosophy-theology') }}" class="flex-1 px-4 py-2.5 text-sm font-semibold flex items-center gap-2">
                            <span class="text-amber-600 font-bold">🏛</span>
                            <span>Philosophy &amp; Theology</span>
                        </a>
                        <button type="button" 
                                onclick="toggleMobileDeptMenu()" 
                                aria-label="Toggle Submenu"
                                class="px-3 py-2.5 text-slate-400 hover:text-blue-700 cursor-pointer">
                            <svg id="mobileDeptChevron" class="w-4 h-4 transition-transform duration-200 {{ request()->routeIs('departments.*') ? 'rotate-180 text-blue-700' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
                    
                    <div id="mobileDeptSubmenu" class="{{ request()->routeIs('departments.*') ? '' : 'hidden' }} bg-slate-50 px-4 py-3 space-y-3 text-xs border-t border-slate-200/60">
                        <div>
                            <a href="{{ route('departments.philosophy-theology') }}" class="font-bold text-slate-900 block pb-1 border-b border-slate-200 hover:text-blue-700">
                                &rarr; Department Overview
                            </a>
                        </div>
                        <div class="space-y-1">
                            <a href="{{ route('departments.philosophy') }}" class="font-bold text-blue-900 block hover:text-blue-700">
                                Department of Philosophy
                            </a>
                            <div class="pl-3 space-y-1 text-slate-600">
                                <a href="{{ route('departments.philosophy.psychology') }}" class="block hover:text-blue-700">&bull; Psychology</a>
                                <a href="{{ route('departments.philosophy.sociology') }}" class="block hover:text-blue-700">&bull; Sociology</a>
                            </div>
                        </div>
                        <div class="space-y-1 pt-1 border-t border-slate-200">
                            <a href="{{ route('departments.theology') }}" class="font-bold text-amber-900 block hover:text-amber-700">
                                Department of Theology
                            </a>
                            <div class="pl-3 space-y-1 text-slate-600">
                                <a href="{{ route('departments.theology.hindutva') }}" class="block hover:text-amber-700">&bull; Chamber of Hindutva Studies</a>
                                <a href="{{ route('departments.theology.islamic') }}" class="block hover:text-emerald-700">&bull; Chamber of Islamic Studies</a>
                                <a href="{{ route('departments.theology.christian') }}" class="block hover:text-rose-700">&bull; Chamber of Christian Studies</a>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('services') }}" class="px-4 py-2.5 text-sm font-semibold rounded-xl {{ request()->routeIs('services') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                    Services & Programs
                </a>
                <a href="{{ route('blog.index') }}" class="px-4 py-2.5 text-sm font-semibold rounded-xl {{ request()->routeIs('blog.*') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                    Blog &amp; Insights
                </a>
                <a href="{{ route('testimonials.index') }}" class="px-4 py-2.5 text-sm font-semibold rounded-xl {{ request()->routeIs('testimonials.*') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                    Testimonials
                </a>
                <a href="{{ route('gallery') }}" class="px-4 py-2.5 text-sm font-semibold rounded-xl {{ request()->routeIs('gallery*') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                    Media Gallery
                </a>
                <a href="{{ route('contact') }}" class="px-4 py-2.5 text-sm font-semibold rounded-xl {{ request()->routeIs('contact') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                    Contact
                </a>
                <a href="{{ route('atc.create') }}" class="px-4 py-2.5 text-sm font-semibold rounded-xl flex items-center justify-between {{ request()->routeIs('atc.*') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                    <span>ATC Registration</span>
                    <span class="text-[10px] px-1.5 py-0.5 rounded bg-blue-100 text-blue-700 font-bold">Affiliation</span>
                </a>
                <div class="pt-3 mt-2 border-t border-slate-100 flex flex-col gap-2">
                    <button type="button" onclick="openPoliceDocModal('original')" class="w-full flex items-center justify-center gap-2 py-2.5 px-4 rounded-xl font-bold text-xs text-slate-800 bg-slate-100 hover:bg-slate-200 border border-slate-300 transition cursor-pointer">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <span>View Police Verification Report</span>
                    </button>
                    <!-- Google Play Store Button (Mobile Drawer) -->
                    <a 
                        href="https://play.google.com/store/apps/details?id=com.nrichlearning.iceeds" 
                        target="_blank" 
                        rel="noopener noreferrer" 
                        class="w-full flex items-center justify-center gap-2.5 py-2.5 px-4 rounded-xl font-bold text-xs text-white bg-slate-900 hover:bg-slate-800 border border-slate-700 shadow-xs transition"
                        title="Get iCEEDS App on Google Play Store"
                    >
                        <svg class="w-4 h-4 shrink-0" viewBox="0 0 512 512">
                            <path fill="#4caf50" d="M12.2,40.1c-6.8,7.3-10.7,18.1-10.7,31.7v368.5c0,13.6,3.9,24.3,10.7,31.7l1.7,1.6L234.3,253.2v-4.4L13.9,38.5L12.2,40.1z"/>
                            <path fill="#ffeb3b" d="M307.7,326.6l-73.4-73.4v-4.4l73.4-73.4l1.6,0.9l87.1,49.5c24.8,14.1,24.8,37.2,0,51.3l-87.1,49.5L307.7,326.6z"/>
                            <path fill="#f44336" d="M309.3,325.7L234.3,250.7L13.9,471c8.2,8.7,21.8,9.7,37.1,1.1L309.3,325.7z"/>
                            <path fill="#2196f3" d="M309.3,174.3L51,29.9c-15.3-8.7-28.9-7.7-37.1,1.1l220.4,220.4L309.3,174.3z"/>
                        </svg>
                        <span>Install on Google Play Store</span>
                    </a>

                    <!-- PWA Install Button (Mobile Drawer) -->
                    <button 
                        type="button" 
                        id="pwaInstallBtnMobile" 
                        onclick="installIceedsPWA()" 
                        class="pwa-install-btn hidden w-full items-center justify-center gap-2.5 py-2.5 px-4 rounded-xl font-bold text-sm text-cyan-950 bg-gradient-to-r from-cyan-100 to-sky-100 border border-cyan-300 hover:from-cyan-200 hover:to-sky-200 shadow-xs transition cursor-pointer"
                    >
                        <img src="{{ asset('storage/media/2026/10/iceeds-pwa-igaapf.webp') }}" alt="iCEEDS App" class="w-5 h-5 rounded-md object-contain shrink-0">
                        <span>Install iCEEDS</span>
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
    <div class="no-print bg-slate-50/95 border-b border-slate-200/90 py-2 sm:py-3 relative z-40 shadow-xs overflow-visible">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-2.5 sm:gap-3 lg:gap-4">
                
                <!-- Label Badge on Desktop & Mobile -->
                <div class="shrink-0 flex items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 px-2.5 sm:px-3 py-1 sm:py-1.5 rounded-full bg-blue-50 border border-blue-200/80 text-[10px] sm:text-[11px] font-bold text-blue-800 uppercase tracking-wider">
                        <svg class="w-3.5 h-3.5 text-blue-600 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Accreditation &amp; Quality Emblems</span>
                    </span>
                </div>

                <!-- 10 Prominent Recognition Emblems with Interactive Explainer Popovers -->
                <div class="w-full lg:w-auto flex flex-wrap items-center justify-center lg:justify-end gap-1.5 sm:gap-2.5 md:gap-3 max-w-full">
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
                            [
                                'url' => 'https://iceeds.com/storage/media/2026/10/iceeds-accreditation-14-5td9zf.webp',
                                'title' => 'Exclusive and Authorised Channel Partner - ARISE',
                                'desc' => 'ARISE is the exclusive and authorised channel partner for the marketing and promotional activities of TSSR Council all over India for all the Skill/Certificate/Diploma courses in Paramedical/Allied Health Science/Alternative Medical Courses and for courses or assessments in different theology and philosophy chambers.'
                            ],
                        ];
                    @endphp

                    @foreach($emblems as $emblem)
                        <div class="relative group emblem-popover-trigger" tabindex="0" role="button" aria-haspopup="true" aria-label="{{ $emblem['title'] }}">
                            <!-- Emblem Box -->
                            <div class="h-9 sm:h-12 md:h-13 px-1.5 sm:px-3 py-1 sm:py-1.5 rounded-lg sm:rounded-xl bg-white border border-slate-200/90 shadow-2xs group-hover:shadow-lg group-hover:border-blue-400 group-hover:ring-2 group-hover:ring-blue-400/30 group-hover:scale-105 active:scale-95 transition-all duration-200 flex items-center justify-center shrink-0 cursor-pointer">
                                <img 
                                    src="{{ $emblem['url'] }}" 
                                    alt="{{ $emblem['title'] }}" 
                                    loading="lazy" 
                                    class="h-6 sm:h-9 md:h-10 w-auto max-w-[50px] xs:max-w-[65px] sm:max-w-[95px] md:max-w-[105px] object-contain pointer-events-none"
                                >
                            </div>

                            <!-- Popover / Explainer Card (Shows on Cursor Hover or Touch) -->
                            <div class="emblem-popover pointer-events-none group-hover:pointer-events-auto opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 ease-out absolute z-[100] top-full mt-2.5 left-1/2 -translate-x-1/2 w-64 sm:w-72 max-w-[calc(100vw-24px)] p-3.5 bg-slate-950/95 backdrop-blur-md text-white rounded-2xl shadow-2xl border border-slate-700/80 text-left">
                                <!-- Top Pointer Arrow (Dynamically aligned with active emblem center) -->
                                <div class="popover-arrow absolute -top-1.5 w-3 h-3 bg-slate-950 border-t border-l border-slate-700/80 rotate-45 pointer-events-none transition-all duration-150" style="left: 50%; transform: translateX(-50%) rotate(45deg);"></div>

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
    <div class="no-print bg-slate-900 border-b border-slate-800 text-xs py-2.5 overflow-hidden shadow-inner relative z-20 select-none">
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

                    <!-- Official Mobile Apps (Google Play Store & Web App) -->
                    <div class="pt-3 border-t border-slate-900">
                        <span class="text-[11px] font-bold text-slate-300 uppercase tracking-wider block mb-2">Get Official iCEEDS App</span>
                        <div class="flex items-center gap-2.5 flex-wrap">
                            <a 
                                href="https://play.google.com/store/apps/details?id=com.nrichlearning.iceeds" 
                                target="_blank" 
                                rel="noopener noreferrer" 
                                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-xl bg-slate-900 hover:bg-slate-800 border border-slate-800 hover:border-slate-700 text-white transition group shadow-xs"
                                title="Download iCEEDS Android App on Google Play Store"
                            >
                                <svg class="w-5 h-5 shrink-0" viewBox="0 0 512 512">
                                    <path fill="#4caf50" d="M12.2,40.1c-6.8,7.3-10.7,18.1-10.7,31.7v368.5c0,13.6,3.9,24.3,10.7,31.7l1.7,1.6L234.3,253.2v-4.4L13.9,38.5L12.2,40.1z"/>
                                    <path fill="#ffeb3b" d="M307.7,326.6l-73.4-73.4v-4.4l73.4-73.4l1.6,0.9l87.1,49.5c24.8,14.1,24.8,37.2,0,51.3l-87.1,49.5L307.7,326.6z"/>
                                    <path fill="#f44336" d="M309.3,325.7L234.3,250.7L13.9,471c8.2,8.7,21.8,9.7,37.1,1.1L309.3,325.7z"/>
                                    <path fill="#2196f3" d="M309.3,174.3L51,29.9c-15.3-8.7-28.9-7.7-37.1,1.1l220.4,220.4L309.3,174.3z"/>
                                </svg>
                                <div class="text-left">
                                    <div class="text-[8.5px] uppercase tracking-wider text-slate-400 leading-none">GET IT ON</div>
                                    <div class="text-[11.5px] font-bold text-white leading-tight font-heading">Google Play</div>
                                </div>
                            </a>

                            <button 
                                type="button" 
                                onclick="installIceedsPWA()" 
                                class="pwa-install-btn inline-flex items-center gap-2 px-3 py-1.5 rounded-xl bg-slate-900 hover:bg-slate-800 border border-slate-800 hover:border-cyan-500/40 text-cyan-300 transition cursor-pointer"
                                title="Install iCEEDS Web Application"
                            >
                                <img src="{{ asset('storage/media/2026/10/iceeds-pwa-igaapf.webp') }}" alt="iCEEDS App" class="w-5 h-5 rounded-md object-contain">
                                <div class="text-left">
                                    <div class="text-[8.5px] uppercase tracking-wider text-slate-400 leading-none">WEB APP</div>
                                    <div class="text-[11.5px] font-bold text-cyan-300 leading-tight">Install Direct</div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Col 2: Navigation Links -->
                <div>
                    <h3 class="text-sm font-bold text-white font-heading uppercase tracking-wider mb-4">Quick Links</h3>
                    <ul class="space-y-2.5 text-xs text-slate-400">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition">Home</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-white transition">About iCEEDS</a></li>
                        <li><a href="{{ route('courses') }}" class="hover:text-white transition text-blue-300 font-semibold flex items-center gap-1.5">
                            <span>Course Directory (4,000+)</span>
                            <span class="text-[10px] px-1.5 py-0.2 rounded bg-blue-500/20 text-blue-300 border border-blue-500/30">Catalog</span>
                        </a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-white transition">Services &amp; Programs</a></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-white transition text-slate-300 flex items-center gap-1.5">
                            <span>Blog &amp; Knowledge Hub</span>
                            <span class="text-[10px] px-1.5 py-0.2 rounded bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">Articles</span>
                        </a></li>
                        <li><a href="{{ route('testimonials.index') }}" class="hover:text-white transition text-amber-300 flex items-center gap-1.5 font-medium">
                            <span>Candidate Testimonials</span>
                            <span class="text-[10px] px-1.5 py-0.2 rounded bg-amber-500/20 text-amber-300 border border-amber-500/30">Reviews</span>
                        </a></li>
                        <li><a href="{{ route('gallery') }}" class="hover:text-white transition">Media Gallery</a></li>
                        <li><a href="{{ route('verify') }}" class="hover:text-white transition flex items-center gap-1.5 text-emerald-400 font-semibold">
                            <span>Certificate Verification</span>
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                        </a></li>
                        <li><a href="{{ route('atc.create') }}" class="hover:text-white transition flex items-center gap-1.5 text-sky-400 font-semibold">
                            <span>ATC Registration</span>
                            <span class="text-[10px] px-1.5 py-0.2 rounded bg-sky-500/20 text-sky-300 border border-sky-500/30">Affiliation</span>
                        </a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-white transition">Contact &amp; Inquiries</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-white transition flex items-center gap-1.5 text-slate-500 hover:text-blue-400">
                            <svg class="w-3 h-3 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" /></svg>
                            <span>Admin Login</span>
                        </a></li>
                    </ul>
                </div>

                <!-- Col 3: Academic Faculties & Chambers (Active Links) -->
                <div>
                    <h3 class="text-sm font-bold text-white font-heading uppercase tracking-wider mb-4">Academic Departments</h3>
                    <ul class="space-y-2.5 text-xs text-slate-400">
                        <li>
                            <a href="{{ route('departments.philosophy-theology') }}" class="hover:text-white transition text-amber-300 font-bold flex items-center gap-1.5">
                                <span>Philosophy &amp; Theology Hub</span>
                                <span class="text-[10px] px-1.5 py-0.2 rounded bg-amber-500/20 text-amber-300 border border-amber-500/30">Faculty</span>
                            </a>
                        </li>
                        <li class="pt-1">
                            <a href="{{ route('departments.philosophy') }}" class="hover:text-white transition text-blue-300 font-semibold flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-400"></span>
                                <span>Dept. of Philosophy</span>
                            </a>
                        </li>
                        <li class="pl-3.5">
                            <a href="{{ route('departments.philosophy.psychology') }}" class="hover:text-blue-300 transition text-slate-400 block py-0.5">
                                &bull; Psychology
                            </a>
                        </li>
                        <li class="pl-3.5">
                            <a href="{{ route('departments.philosophy.sociology') }}" class="hover:text-blue-300 transition text-slate-400 block py-0.5">
                                &bull; Sociology
                            </a>
                        </li>
                        <li class="pt-1.5">
                            <a href="{{ route('departments.theology') }}" class="hover:text-white transition text-amber-300 font-semibold flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                                <span>Dept. of Theology</span>
                            </a>
                        </li>
                        <li class="pl-3.5">
                            <a href="{{ route('departments.theology.hindutva') }}" class="hover:text-amber-300 transition text-slate-400 block py-0.5">
                                &bull; Chamber of Hindutva Studies
                            </a>
                        </li>
                        <li class="pl-3.5">
                            <a href="{{ route('departments.theology.islamic') }}" class="hover:text-emerald-300 transition text-slate-400 block py-0.5">
                                &bull; Chamber of Islamic Studies
                            </a>
                        </li>
                        <li class="pl-3.5">
                            <a href="{{ route('departments.theology.christian') }}" class="hover:text-rose-300 transition text-slate-400 block py-0.5">
                                &bull; Chamber of Christian Studies
                            </a>
                        </li>
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

        <!-- Notice on Certification Authority Strip -->
        <div class="border-t border-slate-900 bg-slate-950/70 py-4 text-xs text-slate-400">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="p-3.5 rounded-xl bg-slate-900/60 border border-slate-800/80 leading-relaxed text-slate-400 text-[11px] sm:text-xs">
                    <strong class="font-bold text-slate-200 block sm:inline mb-0.5 sm:mb-0">Notice on Certification Authority:</strong>
                    Alongside University and NSDC-affiliated offerings, ICEEDS also awards proprietary certifications in personal, professional and skill development under applicable legal and constitutional frameworks. While these certificates hold professional merit in private, public, and voluntary sectors, they are standalone credentials and are not equivalent to statutory degrees or diplomas conferred by regulatory bodies like the UGC or AICTE.
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
        class="no-print fixed bottom-20 sm:bottom-6 right-4 sm:right-6 z-40 group flex items-center gap-2 bg-emerald-600 hover:bg-emerald-500 text-white p-3 sm:px-4 sm:py-3 rounded-full shadow-lg shadow-emerald-900/30 hover:shadow-emerald-600/40 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 cursor-pointer"
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

            let activeTrigger = null;

            function positionPopover(trigger) {
                const popover = trigger.querySelector('.emblem-popover');
                if (!popover) return;
                const arrow = popover.querySelector('.popover-arrow');

                // Ensure popover is rendered for accurate geometry calculation
                popover.style.display = 'block';
                popover.style.left = '50%';
                popover.style.transform = 'translateX(-50%)';

                const triggerRect = trigger.getBoundingClientRect();
                const popoverRect = popover.getBoundingClientRect();
                const popoverWidth = popoverRect.width || popover.offsetWidth || 280;
                const badgeCenter = triggerRect.left + (triggerRect.width / 2);
                const popoverLeft = badgeCenter - (popoverWidth / 2);
                const popoverRight = badgeCenter + (popoverWidth / 2);

                const padding = 12; // 12px safe margin from viewport edges
                const viewportWidth = window.innerWidth || document.documentElement.clientWidth;

                let shiftX = 0;
                if (popoverLeft < padding) {
                    // Bleeding off left screen edge -> shift right
                    shiftX = padding - popoverLeft;
                } else if (popoverRight > viewportWidth - padding) {
                    // Bleeding off right screen edge -> shift left
                    shiftX = (viewportWidth - padding) - popoverRight;
                }

                // Apply horizontal shift relative to center
                if (shiftX !== 0) {
                    popover.style.transform = `translateX(calc(-50% + ${shiftX}px))`;
                } else {
                    popover.style.transform = 'translateX(-50%)';
                }

                // Dynamically lock the pointer arrow directly onto the active emblem's center
                if (arrow) {
                    const actualLeft = popoverLeft + shiftX;
                    const arrowOffset = badgeCenter - actualLeft;
                    const clampedArrow = Math.max(16, Math.min(popoverWidth - 16, arrowOffset));
                    arrow.style.left = clampedArrow + 'px';
                    arrow.style.transform = 'translateX(-50%) rotate(45deg)';
                }
            }

            function showPopover(trigger) {
                if (activeTrigger && activeTrigger !== trigger) {
                    hidePopover(activeTrigger);
                }
                activeTrigger = trigger;
                const popover = trigger.querySelector('.emblem-popover');
                if (!popover) return;

                positionPopover(trigger);
                popover.classList.add('popover-visible');
            }

            function hidePopover(trigger) {
                if (!trigger) return;
                const popover = trigger.querySelector('.emblem-popover');
                if (popover) {
                    popover.classList.remove('popover-visible');
                    popover.style.display = '';
                }
                trigger.blur();
                if (activeTrigger === trigger) {
                    activeTrigger = null;
                }
            }

            function hideAll() {
                triggers.forEach(t => hidePopover(t));
            }

            triggers.forEach(trigger => {
                // Desktop Mouse hover: shows on hover, disappears immediately when cursor leaves
                trigger.addEventListener('mouseenter', () => {
                    showPopover(trigger);
                });
                trigger.addEventListener('mouseleave', () => {
                    hidePopover(trigger);
                });

                // Mobile Touch: shows on touch, disappears immediately when finger is removed!
                trigger.addEventListener('touchstart', () => {
                    showPopover(trigger);
                }, { passive: true });

                trigger.addEventListener('touchend', () => {
                    hidePopover(trigger);
                }, { passive: true });

                trigger.addEventListener('touchcancel', () => {
                    hidePopover(trigger);
                }, { passive: true });

                // Pointer Events for hybrid / stylus devices
                trigger.addEventListener('pointerdown', (e) => {
                    if (e.pointerType === 'touch' || e.pointerType === 'pen') {
                        showPopover(trigger);
                    }
                });

                trigger.addEventListener('pointerup', (e) => {
                    if (e.pointerType === 'touch' || e.pointerType === 'pen') {
                        hidePopover(trigger);
                    }
                });

                trigger.addEventListener('pointercancel', () => {
                    hidePopover(trigger);
                });
            });

            // Dismiss when scrolling (finger drag on mobile)
            window.addEventListener('scroll', () => {
                if (activeTrigger) hideAll();
            }, { passive: true });

            // Dismiss when touching/clicking anywhere outside
            document.addEventListener('pointerdown', (e) => {
                if (!e.target.closest('.emblem-popover-trigger')) {
                    hideAll();
                }
            }, { passive: true });
        })();

        // Mobile Department Accordion Handler
        window.toggleMobileDeptMenu = function() {
            const sub = document.getElementById('mobileDeptSubmenu');
            const chev = document.getElementById('mobileDeptChevron');
            if (sub) sub.classList.toggle('hidden');
            if (chev) chev.classList.toggle('rotate-180');
        };

        // Desktop Department Dropdown Click Toggle
        (function() {
            const container = document.getElementById('deptDropdownContainer');
            const btn = document.getElementById('deptDropdownBtn');
            if (container && btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    container.classList.toggle('dropdown-open');
                });

                document.addEventListener('click', function(e) {
                    if (!container.contains(e.target)) {
                        container.classList.remove('dropdown-open');
                    }
                });
            }
        })();

        // ==========================================
        // iCEEDS Progressive Web App (PWA) Controller
        // ==========================================
        let deferredPwaPrompt = null;

        function isPwaInstalled() {
            return window.matchMedia('(display-mode: standalone)').matches || 
                   window.navigator.standalone === true || 
                   localStorage.getItem('iceeds_pwa_installed') === 'true';
        }

        function hideAllPwaInstallButtons() {
            document.querySelectorAll('.pwa-install-btn').forEach(btn => {
                btn.classList.add('hidden');
                btn.style.setProperty('display', 'none', 'important');
            });
        }

        function showAllPwaInstallButtons() {
            if (isPwaInstalled()) {
                hideAllPwaInstallButtons();
                return;
            }
            document.querySelectorAll('.pwa-install-btn').forEach(btn => {
                if (btn.id === 'pwaInstallFloatingBar' && sessionStorage.getItem('iceeds_pwa_floating_dismissed') === 'true') {
                    btn.classList.add('hidden');
                    btn.style.setProperty('display', 'none', 'important');
                    return;
                }
                btn.classList.remove('hidden');
                if (btn.id === 'pwaInstallFloatingBar') {
                    btn.style.setProperty('display', 'block', 'important');
                } else {
                    btn.style.display = btn.classList.contains('w-full') ? 'flex' : 'inline-flex';
                }
            });
        }

        window.dismissPwaFloatingBar = function() {
            const bar = document.getElementById('pwaInstallFloatingBar');
            if (bar) {
                bar.classList.add('hidden');
                bar.style.setProperty('display', 'none', 'important');
            }
            sessionStorage.setItem('iceeds_pwa_floating_dismissed', 'true');
        };

        window.installIceedsPWA = function() {
            if (deferredPwaPrompt) {
                deferredPwaPrompt.prompt();
                deferredPwaPrompt.userChoice.then((choiceResult) => {
                    if (choiceResult && choiceResult.outcome === 'accepted') {
                        console.log('[PWA] User accepted the iCEEDS install prompt');
                        hideAllPwaInstallButtons();
                        localStorage.setItem('iceeds_pwa_installed', 'true');
                    } else {
                        console.log('[PWA] User dismissed the iCEEDS install prompt');
                    }
                    deferredPwaPrompt = null;
                });
            } else {
                const isIos = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
                if (isIos) {
                    alert('To install iCEEDS: tap the Safari "Share" button (⎋) at the bottom of your screen and select "Add to Home Screen".');
                } else {
                    alert('To install iCEEDS: open your browser menu (⋮ or ...) and select "Install iCEEDS" or "Add to Home screen".');
                }
            }
        };

        // Capture PWA install event before prompt
        window.addEventListener('beforeinstallprompt', (e) => {
            e.preventDefault();
            deferredPwaPrompt = e;
            showAllPwaInstallButtons();
        });

        // Instant disappearance upon installation
        window.addEventListener('appinstalled', () => {
            console.log('[PWA] iCEEDS was installed successfully');
            hideAllPwaInstallButtons();
            localStorage.setItem('iceeds_pwa_installed', 'true');
            deferredPwaPrompt = null;
        });

        // Initialize state on DOM ready & register Service Worker
        document.addEventListener('DOMContentLoaded', () => {
            if (isPwaInstalled()) {
                hideAllPwaInstallButtons();
            } else {
                showAllPwaInstallButtons();
            }

            if ('serviceWorker' in navigator) {
                navigator.serviceWorker.register('/sw.js')
                    .then(reg => {
                        console.log('[PWA] Service Worker registered with scope:', reg.scope);
                    })
                    .catch(err => {
                        console.warn('[PWA] Service Worker registration failed:', err);
                    });
            }
        });
    </script>

    <!-- Persistent Floating PWA & Google Play Install Action (Bottom Center Float Button) -->
    <aside 
        id="pwaInstallFloatingBar" 
        class="pwa-install-btn hidden fixed bottom-3 sm:bottom-6 left-1/2 -translate-x-1/2 z-[999] w-[calc(100%-1rem)] max-w-sm sm:max-w-lg transition-all duration-300 ease-out transform pointer-events-auto"
        aria-label="Install iCEEDS App"
    >
        <div class="relative bg-slate-950/95 text-white px-2.5 sm:px-4 py-2 sm:py-2.5 rounded-2xl shadow-2xl shadow-slate-950/80 backdrop-blur-xl border border-cyan-400/50 flex items-center justify-between gap-1.5 sm:gap-3 group ring-1 ring-white/10 hover:border-cyan-300">
            
            <!-- Left: App Icon & Brand Description -->
            <div class="flex items-center gap-2 min-w-0 cursor-pointer flex-1" onclick="installIceedsPWA()" title="Install iCEEDS Official App">
                <div class="relative shrink-0">
                    <img 
                        src="{{ asset('storage/media/2026/10/iceeds-pwa-igaapf.webp') }}" 
                        alt="iCEEDS App" 
                        class="w-9 h-9 sm:w-11 sm:h-11 rounded-xl object-contain bg-slate-900 ring-2 ring-cyan-400/50 shadow-md group-hover:scale-105 transition-transform"
                    >
                    <span class="absolute -top-1 -right-1 flex h-2.5 w-2.5">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-cyan-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-cyan-500"></span>
                    </span>
                </div>
                <div class="min-w-0 text-left">
                    <div class="flex items-center gap-1.5">
                        <span class="text-xs sm:text-sm font-extrabold text-white tracking-tight leading-tight truncate">iCEEDS App</span>
                        <span class="text-[8.5px] font-bold px-1.5 py-0.2 rounded-full bg-cyan-500/20 text-cyan-300 border border-cyan-500/30 shrink-0">Official</span>
                    </div>
                    <p class="text-[9.5px] sm:text-[11px] text-slate-300 truncate mt-0.5 hidden xs:block">Verification &amp; courses</p>
                </div>
            </div>

            <!-- Right: Google Play Button + Web App Install + Dismiss -->
            <div class="flex items-center gap-1 sm:gap-1.5 shrink-0">
                <!-- Google Play Store Installation Button -->
                <a 
                    href="https://play.google.com/store/apps/details?id=com.nrichlearning.iceeds" 
                    target="_blank" 
                    rel="noopener noreferrer" 
                    class="inline-flex items-center gap-1 sm:gap-1.5 px-2 sm:px-2.5 py-1.5 rounded-xl font-bold text-xs text-white bg-slate-900 hover:bg-slate-800 border border-slate-700 active:scale-95 shadow-xs transition"
                    title="Install from Google Play Store"
                >
                    <svg class="w-3.5 h-3.5 shrink-0" viewBox="0 0 512 512">
                        <path fill="#4caf50" d="M12.2,40.1c-6.8,7.3-10.7,18.1-10.7,31.7v368.5c0,13.6,3.9,24.3,10.7,31.7l1.7,1.6L234.3,253.2v-4.4L13.9,38.5L12.2,40.1z"/>
                        <path fill="#ffeb3b" d="M307.7,326.6l-73.4-73.4v-4.4l73.4-73.4l1.6,0.9l87.1,49.5c24.8,14.1,24.8,37.2,0,51.3l-87.1,49.5L307.7,326.6z"/>
                        <path fill="#f44336" d="M309.3,325.7L234.3,250.7L13.9,471c8.2,8.7,21.8,9.7,37.1,1.1L309.3,325.7z"/>
                        <path fill="#2196f3" d="M309.3,174.3L51,29.9c-15.3-8.7-28.9-7.7-37.1,1.1l220.4,220.4L309.3,174.3z"/>
                    </svg>
                    <span class="text-[11px] sm:text-xs">Play</span>
                </a>

                <!-- PWA Direct Install Button -->
                <button 
                    type="button" 
                    onclick="installIceedsPWA()" 
                    class="inline-flex items-center gap-1 px-2 sm:px-2.5 py-1.5 rounded-xl font-black text-[11px] sm:text-xs text-slate-950 bg-gradient-to-r from-cyan-400 via-sky-300 to-teal-300 hover:from-cyan-300 hover:to-teal-200 active:scale-95 shadow-md shadow-cyan-500/25 transition cursor-pointer"
                    title="Install Web App directly"
                >
                    <svg class="w-3.5 h-3.5 text-slate-950 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    <span>Install</span>
                </button>

                <!-- Dismiss Button -->
                <button 
                    type="button" 
                    onclick="dismissPwaFloatingBar()" 
                    aria-label="Dismiss install prompt" 
                    class="p-1 text-slate-400 hover:text-white hover:bg-slate-800 rounded-lg transition cursor-pointer"
                    title="Dismiss"
                >
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </aside>

    <!-- Police Verification Report Interactive Scrollable Modal Partial -->
    @include('partials.police-verification-modal')

    @stack('scripts')
</body>
</html>
