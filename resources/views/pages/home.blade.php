@extends('layouts.app')

@section('title', 'iCEEDS | Official Portal - Accredited Certifications & Skill Development')
@section('meta_description', 'Welcome to iCEEDS, a self-governing educational trust registered under the Indian Trusts Act, 1882, providing ISO-accredited skill development programs and certificate verification.')

@section('content')

    <!-- HERO SECTION (With Subtle Loop Background Video & Enhanced Text Contrast) -->
    <section class="relative overflow-hidden pt-8 pb-16 sm:pt-14 sm:pb-24 border-b border-slate-200/70 bg-slate-950 text-slate-100">
        
        <!-- Background Video Element -->
        <div class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none select-none z-0">
            <video 
                id="heroBackgroundVideo"
                autoplay 
                muted 
                loop 
                playsinline 
                webkit-playsinline
                preload="auto" 
                class="w-full h-full object-cover filter brightness-105 contrast-105 transition-opacity duration-700"
            >
                <source src="https://iceeds.com/storage/media/2026/10/video-project-26-1-euyqjz.mp4" type="video/mp4">
            </video>
            
            <!-- Ultra-Clean Lightweight Gradient Overlay: Maximum video visibility and clarity -->
            <!-- Very soft left shadow ensures typography readability while keeping the video action open & bright -->
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950/50 via-slate-950/10 to-transparent"></div>
            <!-- Minimal edge feathering -->
            <div class="absolute inset-0 bg-gradient-to-b from-slate-950/20 via-transparent to-slate-950/25"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 max-w-full overflow-visible">
            
            <!-- VERIFICATION RESULT BANNER (If searched via query param or search form) -->
            @if(isset($searched) && $searched)
                <div class="mb-12">
                    @if(isset($certificate) && $certificate)
                        <!-- Verified Certificate Card -->
                        <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-2xl shadow-emerald-950/10 border-2 border-emerald-500/90 overflow-hidden">
                            <!-- Certificate Header with iCEEDS Logo & Star Badge -->
                            <div class="bg-gradient-to-r from-slate-950 via-slate-900 to-slate-950 p-6 sm:p-7 text-white flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 border-b border-slate-800">
                                <div class="flex items-center gap-3.5">
                                    <div class="bg-white p-2 rounded-2xl shadow-md border border-white/20 shrink-0 flex items-center justify-center">
                                        <img 
                                            src="{{ asset('storage/media/2026/10/iceedslogo-1-3jjrrr.webp') }}" 
                                            onerror="this.onerror=null; this.src='{{ asset('images/logo.png') }}';" 
                                            alt="iCEEDS Logo" 
                                            class="h-10 sm:h-12 w-auto object-contain"
                                        >
                                    </div>
                                    <div>
                                        <h3 class="text-sm sm:text-base font-extrabold font-heading text-white tracking-tight leading-tight uppercase">
                                            Innovation Council for Exquisite Education &amp; Development of Skills
                                        </h3>
                                        <p class="text-[11px] sm:text-xs font-bold text-sky-400 leading-tight mt-0.5">
                                            उत्तम शिक्षा और कौशल के विकास के लिए नवाचार परिषद
                                        </p>
                                        <div class="flex flex-wrap items-center gap-1.5 mt-1.5 text-[9px] sm:text-[10px] text-slate-300 font-medium">
                                            <span class="px-2 py-0.5 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 font-bold uppercase tracking-wider">
                                                Official Digital Credential Verified
                                            </span>
                                            <span>&bull;</span>
                                            <span class="px-1.5 py-0.2 rounded bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 font-semibold font-mono">Indian Trusts Act, 1882</span>
                                            <span>&bull;</span>
                                            <span class="px-1.5 py-0.2 rounded bg-blue-500/20 text-blue-300 border border-blue-500/30 font-semibold font-mono">ISO 9001:2015</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Star Shaped Verified Badge -->
                                <div class="flex items-center gap-3 shrink-0 self-end sm:self-center">
                                    <div class="shrink-0 relative inline-flex items-center justify-center" title="Officially Verified Credential">
                                        <svg viewBox="0 0 100 100" class="w-16 h-16 sm:w-18 sm:h-18 drop-shadow-lg">
                                            <defs>
                                                <radialGradient id="homeStarGreen" cx="50%" cy="50%" r="50%">
                                                    <stop offset="0%" stop-color="#34d399"/>
                                                    <stop offset="65%" stop-color="#059669"/>
                                                    <stop offset="100%" stop-color="#064e3b"/>
                                                </radialGradient>
                                                <linearGradient id="homeGoldRim" x1="0%" y1="0%" x2="100%" y2="100%">
                                                    <stop offset="0%" stop-color="#fef08a"/>
                                                    <stop offset="50%" stop-color="#eab308"/>
                                                    <stop offset="100%" stop-color="#ca8a04"/>
                                                </linearGradient>
                                            </defs>
                                            <polygon 
                                                points="50.00,2.00 58.10,9.30 68.37,5.65 73.06,15.49 83.94,16.06 84.51,26.94 94.35,31.63 90.70,41.90 98.00,50.00 90.70,58.10 94.35,68.37 84.51,73.06 83.94,83.94 73.06,84.51 68.37,94.35 58.10,90.70 50.00,98.00 41.90,90.70 31.63,94.35 26.94,84.51 16.06,83.94 15.49,73.06 5.65,68.37 9.30,58.10 2.00,50.00 9.30,41.90 5.65,31.63 15.49,26.94 16.06,16.06 26.94,15.49 31.63,5.65 41.90,9.30" 
                                                fill="url(#homeStarGreen)" 
                                                stroke="url(#homeGoldRim)" 
                                                stroke-width="2"
                                            />
                                            <circle cx="50" cy="50" r="37.5" fill="none" stroke="#fef08a" stroke-width="0.9" stroke-dasharray="2 1.5" opacity="0.95" />
                                            <circle cx="50" cy="50" r="31" fill="#ffffff" stroke="#10b981" stroke-width="1.8" />
                                            <text x="50" y="32" text-anchor="middle" font-size="5" font-weight="900" fill="#047857" font-family="'Outfit', sans-serif" letter-spacing="0.8">iCEEDS</text>
                                            <path d="M37 51 L46 60 L64 40" fill="none" stroke="#059669" stroke-width="5.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <text x="50" y="72" text-anchor="middle" font-size="6.5" font-weight="900" fill="#065f46" font-family="'Outfit', sans-serif" letter-spacing="1">VERIFIED</text>
                                        </svg>
                                    </div>

                                    <div class="hidden sm:block text-right">
                                        <span class="text-[10px] uppercase tracking-wider text-slate-400 font-semibold block">Serial Identifier</span>
                                        <span class="font-mono text-emerald-400 font-bold text-sm tracking-wider block">{{ $certificate->certificate_code }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="p-6 sm:p-8 space-y-6">
                                <div class="bg-slate-50 rounded-2xl p-5 border border-slate-200/80">
                                    <span class="text-xs uppercase tracking-wider font-semibold text-slate-500 block mb-1">Conferred Upon Candidate</span>
                                    <h4 class="text-2xl sm:text-3xl font-black text-slate-900 font-heading">
                                        {{ $certificate->student_name }}
                                    </h4>
                                    @if($certificate->first_name && $certificate->last_name)
                                        <p class="text-xs text-slate-600 mt-1 font-medium">
                                            First Name: <span class="text-slate-800 font-bold">{{ $certificate->first_name }}</span> &bull; 
                                            Last Name / Initials: <span class="text-slate-800 font-bold">{{ $certificate->last_name }}</span>
                                        </p>
                                    @endif
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="bg-white rounded-xl p-4 border border-slate-200 shadow-2xs">
                                        <span class="text-xs uppercase tracking-wider font-semibold text-slate-500 block mb-1">Program of Study</span>
                                        <p class="text-base font-bold text-slate-900 leading-snug">{{ $certificate->course }}</p>
                                    </div>
                                    <div class="bg-white rounded-xl p-4 border border-slate-200 shadow-2xs">
                                        <span class="text-xs uppercase tracking-wider font-semibold text-slate-500 block mb-1">Date of Issuance</span>
                                        <p class="text-base font-bold text-slate-900 font-mono">{{ $certificate->issue_date ? $certificate->issue_date->format('F d, Y') : 'N/A' }}</p>
                                    </div>
                                    <div class="bg-white rounded-xl p-4 border border-slate-200 shadow-2xs">
                                        <span class="text-xs uppercase tracking-wider font-semibold text-slate-500 block mb-1">Issuing Authority</span>
                                        <p class="text-sm font-bold text-slate-900">iCEEDS (Innovation Council for Exquisite Education &amp; Development of Skills)</p>
                                    </div>
                                    <div class="bg-white rounded-xl p-4 border border-slate-200 shadow-2xs">
                                        <span class="text-xs uppercase tracking-wider font-semibold text-slate-500 block mb-1">Registry Record ID &amp; Serial</span>
                                        <p class="text-sm font-bold text-slate-900 font-mono">#ICEEDS-{{ str_pad($certificate->id, 6, '0', STR_PAD_LEFT) }}</p>
                                        <p class="text-xs font-mono text-emerald-600 font-bold mt-0.5">Serial: {{ $certificate->certificate_code }}</p>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex flex-wrap items-center justify-between gap-4 pt-4 border-t border-slate-200">
                                    <a href="{{ route('verify', ['code' => $certificate->certificate_code]) }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-xs sm:text-sm font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-700 hover:from-emerald-500 hover:to-teal-600 shadow-lg shadow-emerald-600/25 transition">
                                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <span>Download Official PDF / Print Single Page</span>
                                    </a>
                                    <a href="{{ route('home') }}" class="text-xs font-semibold text-slate-500 hover:text-slate-800 transition">Close Result</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Not Found Card -->
                        <div class="max-w-2xl mx-auto bg-white rounded-3xl shadow-xl shadow-red-950/5 border border-red-200 p-6 sm:p-8">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center shrink-0">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full bg-red-100 text-red-700 text-xs font-bold uppercase tracking-wider mb-1">
                                        Record Not Found
                                    </span>
                                    <h4 class="text-lg font-bold text-slate-900 font-heading">No Credential Found for "{{ $code }}"</h4>
                                    <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                                        Please double-check the serial number formatting (e.g. <code class="font-mono font-bold text-slate-800">ICEEDS/SAMPLE/2026/01</code>) or visit our dedicated verification page.
                                    </p>
                                    <div class="mt-4 flex gap-3">
                                        <a href="{{ route('verify') }}" class="text-xs font-semibold text-blue-700 hover:underline">Go to Certificate Verification &rarr;</a>
                                        <a href="{{ route('home') }}" class="text-xs font-medium text-slate-500 hover:underline">Clear Search</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endif

            <!-- Main Hero Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                <!-- Left: Headline & Content -->
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    <!-- Institutional Trust Legal Badge (Glassy) -->
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/40 backdrop-blur-md border border-white/20 text-blue-300 text-xs font-bold uppercase tracking-wider shadow-lg flex-wrap justify-center lg:justify-start">
                        <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-white font-semibold">A Self-Governing Educational Trust</span>
                        <span class="text-slate-400 hidden sm:inline">&bull;</span>
                        <span class="text-emerald-400">Registered under the Indian Trusts Act, 1882</span>
                    </div>

                    <!-- Main Headline (Crisply Outlined against background video) -->
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-[1.1] font-heading hero-heading-outlined">
                        Elevate Your Skills with <span class="text-emerald-400">Accredited Certifications</span>
                    </h1>

                    <!-- Transparent Subtitle (No thick black box: crystal clear video visibility with outlined typography) -->
                    <div class="p-4 sm:p-5 rounded-2xl bg-black/20 backdrop-blur-[2px] border border-white/15 max-w-2xl mx-auto lg:mx-0 shadow-xl">
                        <p class="text-sm sm:text-base text-white/95 font-medium leading-relaxed hero-text-outlined">
                            <strong class="text-white font-extrabold">iCEEDS</strong> (<em class="text-slate-200">Innovation Council for Exquisite Education &amp; Development of Skills</em>) is <strong class="text-white font-bold">A Self-Governing Educational Trust</strong> registered under the <strong class="text-emerald-300 font-bold">Indian Trusts Act, 1882</strong>. As an independent skill development and certification entity, the Trust designs and conducts vocational and professional courses to empower students with industry-relevant skills. Guided and monitored by an expert <strong class="text-blue-200 font-bold">Academic Board of Studies</strong>, iCEEDS ensures high standards in curriculum design and quality evaluation, while facilitating certification support aligned with the <strong class="text-amber-300 font-bold">National Skill Development Corporation (NSDC)</strong> under the Ministry of Skill Development and Entrepreneurship, Govt. of India.
                        </p>
                    </div>

                    <!-- Mobile Only: 3 Cute National Emblems in a Row (NSDC, Skill India, DigiLocker) with Hover & Tap Explanations -->
                    <div class="lg:hidden mt-5">
                        @include('partials.national-emblems-row')
                    </div>

                    <!-- Mobile Only: Prominently Seen Hero Police Verification Card (Immediate High-Impact Visibility on Mobile) -->
                    <div class="lg:hidden bg-slate-950/60 backdrop-blur-md rounded-2xl p-4 border border-emerald-500/40 shadow-2xl relative overflow-hidden text-left">
                        <div class="flex items-center gap-3 relative z-10">
                            <!-- Official Kerala Police Logo Crest -->
                            <div class="shrink-0 w-14 h-14 bg-white/95 rounded-xl p-1 shadow-md border border-slate-200 flex items-center justify-center">
                                <img 
                                    src="{{ asset('images/verification/kerala-police-logo.png') }}" 
                                    alt="Kerala Police Official Crest" 
                                    class="w-full h-full object-contain"
                                >
                            </div>

                            <!-- Police Verification Details -->
                            <div class="min-w-0 flex-1">
                                <div class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-emerald-500/20 border border-emerald-400/30 text-[9.5px] font-mono font-bold uppercase tracking-wider text-emerald-300 mb-0.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                    <span>DySP Malappuram &bull; Govt. Clearance</span>
                                </div>
                                <h3 class="text-xs xs:text-sm font-extrabold font-heading text-white tracking-tight hero-heading-outlined">
                                    Official Kerala Police Verification Report
                                </h3>
                                <p class="text-[10.5px] text-slate-300 leading-snug font-mono hero-text-outlined">
                                    No. 43/CMO/SDOM/2026 &bull; <span class="text-emerald-400 font-bold">Verified &amp; Lawful</span>
                                </p>
                            </div>
                        </div>

                        <!-- Mobile Action Buttons -->
                        <div class="mt-3 pt-2.5 border-t border-white/15 flex items-center gap-2 relative z-10">
                            <button 
                                type="button" 
                                onclick="openPoliceDocModal('original')" 
                                class="flex-1 inline-flex items-center justify-center gap-1.5 px-3 py-2 rounded-xl text-xs font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 shadow-md transition cursor-pointer"
                            >
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <span>View Police Report (Popup)</span>
                            </button>
                            <button 
                                type="button" 
                                onclick="openPoliceDocModal('translation')" 
                                class="inline-flex items-center justify-center gap-1 px-2.5 py-2 rounded-xl text-xs font-semibold text-slate-200 bg-white/10 hover:bg-white/20 border border-white/15 transition cursor-pointer"
                            >
                                <span>English Translation</span>
                            </button>
                        </div>
                    </div>

                    <!-- CTAs -->
                    <div class="pt-2 flex flex-wrap items-center justify-center lg:justify-start gap-3.5">
                        <a href="{{ route('courses') }}" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl font-bold text-sm text-white bg-blue-600 hover:bg-blue-500 shadow-lg shadow-blue-600/30 transition-all duration-150 cursor-pointer">
                            <span>Browse 4,000+ Courses &amp; Syllabi</span>
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                        </a>
                        <a href="{{ route('verify') }}" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl font-bold text-sm text-slate-900 bg-white hover:bg-slate-100 shadow-md transition-all duration-150 cursor-pointer">
                            <svg class="w-4 h-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span>Certificate Verification</span>
                        </a>
                        <a href="{{ route('about') }}" class="inline-flex items-center gap-1.5 px-4 py-3.5 text-sm font-semibold text-slate-200 hover:text-white transition hero-text-outlined">
                            <span>Know More &rarr;</span>
                        </a>
                    </div>

                    <!-- Quick Verification Search Bar -->
                    <div class="pt-4 max-w-xl mx-auto lg:mx-0">
                        <form action="{{ route('verify.submit') }}" method="POST" class="flex flex-col sm:flex-row gap-2 bg-black/40 backdrop-blur-md p-2 rounded-2xl border border-white/20 shadow-2xl">
                            @csrf
                            <div class="relative flex-1">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                                </div>
                                <input 
                                    type="text" 
                                    name="code" 
                                    placeholder="Enter Serial Code (e.g. ICEEDS/SAMPLE/2026/01)" 
                                    class="w-full pl-10 pr-3 py-2.5 bg-transparent border-0 text-white font-mono text-xs sm:text-sm font-bold uppercase tracking-wider placeholder-slate-400 focus:outline-none"
                                    required
                                >
                            </div>
                            <button type="submit" class="inline-flex items-center justify-center gap-1.5 px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-bold text-xs tracking-wide transition cursor-pointer shadow-md shadow-blue-600/20">
                                <span>Verify</span>
                                <svg class="w-3.5 h-3.5 text-emerald-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                            </button>
                        </form>
                        <p class="text-[11px] text-slate-300 mt-2 text-center lg:text-left hero-text-outlined">
                            Instant online verification for over <strong class="text-white">{{ number_format($totalCertificates) }}+</strong> verified credentials across <strong class="text-white">4,000+</strong> course syllabi.
                        </p>
                    </div>
                </div>

                <!-- Right: Visual Bento Showcase with Kerala Police Report & Digital Counters -->
                <div class="lg:col-span-5 space-y-4">
                    
                    <!-- Desktop Only: 3 Cute National Emblems in a Row (NSDC, Skill India, DigiLocker) with Hover & Tap Explanations -->
                    <div class="hidden lg:block">
                        @include('partials.national-emblems-row')
                    </div>

                    <!-- Desktop Only: Kerala Police Verification Report Card (Prominently Placed Above Counters) -->
                    <div class="hidden lg:block bg-slate-950/45 backdrop-blur-md rounded-3xl p-5 sm:p-6 border border-emerald-500/35 shadow-2xl relative overflow-hidden group hover:border-emerald-400/60 hover:bg-slate-950/55 transition-all duration-300">
                        <div class="absolute -top-10 -right-10 w-36 h-36 bg-emerald-500/15 rounded-full blur-2xl pointer-events-none"></div>

                        <div class="flex items-center gap-3.5 sm:gap-4 relative z-10">
                            <!-- Official Kerala Police Logo Crest -->
                            <div class="shrink-0 w-16 h-16 sm:w-20 sm:h-20 bg-white/95 rounded-2xl p-1 shadow-md border border-slate-200 flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                                <img 
                                    src="{{ asset('images/verification/kerala-police-logo.png') }}" 
                                    alt="Kerala Police Official Crest" 
                                    class="w-full h-full object-contain"
                                >
                            </div>

                            <!-- Police Verification Details -->
                            <div class="min-w-0 flex-1">
                                <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-500/20 border border-emerald-400/30 text-[10px] font-mono font-bold uppercase tracking-wider text-emerald-300 mb-1">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                    <span>DySP Malappuram &bull; Govt. Clearance</span>
                                </div>
                                <h3 class="text-sm sm:text-base font-extrabold font-heading text-white tracking-tight hero-heading-outlined">
                                    Official Kerala Police Verification Report
                                </h3>
                                <p class="text-[11px] text-slate-300 leading-snug font-mono mt-0.5 hero-text-outlined">
                                    No. 43/CMO/SDOM/2026 &bull; <span class="text-emerald-400 font-bold">Verified &amp; Lawful</span>
                                </p>
                            </div>
                        </div>

                        <!-- Card Action Buttons -->
                        <div class="mt-4 pt-3.5 border-t border-white/15 flex flex-wrap items-center justify-between gap-2 relative z-10">
                            <button 
                                type="button" 
                                onclick="openPoliceDocModal('original')" 
                                class="flex-1 inline-flex items-center justify-center gap-2 px-3.5 py-2.5 rounded-xl text-xs font-bold text-white bg-gradient-to-r from-emerald-600 via-teal-600 to-emerald-700 hover:from-emerald-500 hover:to-teal-500 shadow-md shadow-emerald-950/40 transition cursor-pointer"
                            >
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <span>View Police Report (Popup)</span>
                            </button>
                            <button 
                                type="button" 
                                onclick="openPoliceDocModal('translation')" 
                                class="inline-flex items-center justify-center gap-1.5 px-3 py-2.5 rounded-xl text-xs font-semibold text-slate-200 bg-white/10 hover:bg-white/20 border border-white/15 transition cursor-pointer"
                            >
                                <span>English Translation</span>
                                <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                            </button>
                        </div>
                    </div>

                    <!-- Dynamic Digital Counters (Credentials & 4,000+ Courses) -->
                    <div class="grid grid-cols-2 gap-4">
                        
                        <!-- Dynamic Digital Counter Card 1: Verified Credentials -->
                        <div class="bg-slate-950/35 backdrop-blur-md rounded-3xl p-5 sm:p-6 border border-white/15 shadow-2xl relative overflow-hidden group hover:border-emerald-400/50 hover:bg-slate-950/45 transition-all duration-300">
                            <div class="flex items-center justify-between mb-3">
                                <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-500/20 border border-emerald-400/30 text-[10px] font-mono font-bold uppercase tracking-wider text-emerald-300">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                    <span>Live Registry</span>
                                </div>
                                <div class="w-9 h-9 rounded-xl bg-emerald-500/15 border border-emerald-500/30 text-emerald-400 flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" /></svg>
                                </div>
                            </div>
                            
                            <!-- Digital Counter Readout -->
                            <div class="flex items-baseline gap-1 my-1">
                                <span 
                                    class="digital-counter font-mono font-black text-3xl sm:text-4xl text-emerald-400 digital-glow-emerald tracking-tight"
                                    data-target="{{ $totalCertificates }}"
                                >
                                    0
                                </span>
                                <span class="text-2xl sm:text-3xl font-black text-emerald-400 digital-glow-emerald">+</span>
                            </div>
                            <p class="text-xs sm:text-sm font-extrabold text-white mt-1 hero-text-outlined">Credentials Verified</p>
                            <p class="text-[11px] text-slate-300 mt-0.5 leading-snug hero-text-outlined">Verified by students &amp; employers</p>
                        </div>

                        <!-- Dynamic Digital Counter Card 2: 4,000+ Courses & Programs -->
                        <div class="bg-slate-950/35 backdrop-blur-md rounded-3xl p-5 sm:p-6 border border-white/15 shadow-2xl relative overflow-hidden group hover:border-sky-400/50 hover:bg-slate-950/45 transition-all duration-300">
                            <div class="flex items-center justify-between mb-3">
                                <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-sky-500/20 border border-sky-400/30 text-[10px] font-mono font-bold uppercase tracking-wider text-sky-300">
                                    <span class="w-1.5 h-1.5 rounded-full bg-sky-400 animate-pulse"></span>
                                    <span>Accredited</span>
                                </div>
                                <div class="w-9 h-9 rounded-xl bg-sky-500/15 border border-sky-500/30 text-sky-400 flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                                </div>
                            </div>

                            <!-- Digital Counter Readout -->
                            <div class="flex items-baseline gap-1 my-1">
                                <span 
                                    class="digital-counter font-mono font-black text-3xl sm:text-4xl text-sky-400 digital-glow-sky tracking-tight"
                                    data-target="4000"
                                >
                                    0
                                </span>
                                <span class="text-2xl sm:text-3xl font-black text-sky-400 digital-glow-sky">+</span>
                            </div>
                            <p class="text-xs sm:text-sm font-extrabold text-white mt-1 hero-text-outlined">Skill Courses</p>
                            <p class="text-[11px] text-slate-300 mt-0.5 leading-snug hero-text-outlined">NSDC &amp; UGC aligned curricula</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <script>
            (function() {
                var vid = document.getElementById('heroBackgroundVideo');
                if (vid) {
                    vid.muted = true;
                    var playVid = function() {
                        var p = vid.play();
                        if (p !== undefined) {
                            p.catch(function() {
                                var unlock = function() {
                                    vid.play();
                                    window.removeEventListener('touchstart', unlock);
                                    window.removeEventListener('click', unlock);
                                };
                                window.addEventListener('touchstart', unlock, { passive: true });
                                window.addEventListener('click', unlock, { passive: true });
                            });
                        }
                    };
                    if (vid.readyState >= 2) {
                        playVid();
                    } else {
                        vid.addEventListener('loadeddata', playVid);
                    }
                }
            })();

            // Dynamic Digital Counter Engine for Hero Section
            (function() {
                function animateDigitalCounters() {
                    var counters = document.querySelectorAll('.digital-counter');
                    if (!counters.length) return;
                    
                    counters.forEach(function(counter) {
                        var target = parseInt(counter.getAttribute('data-target'), 10) || 0;
                        var duration = 1800; // 1.8s smooth count-up
                        var startTime = null;

                        function step(timestamp) {
                            if (!startTime) startTime = timestamp;
                            var elapsed = timestamp - startTime;
                            var progress = Math.min(elapsed / duration, 1);
                            
                            // Ease-out cubic curve: fast start, sleek digital deceleration
                            var easeOut = 1 - Math.pow(1 - progress, 3);
                            var currentVal = Math.floor(easeOut * target);
                            
                            counter.textContent = currentVal.toLocaleString();
                            
                            if (progress < 1) {
                                window.requestAnimationFrame(step);
                            } else {
                                counter.textContent = target.toLocaleString();
                            }
                        }

                        window.requestAnimationFrame(step);
                    });
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', animateDigitalCounters);
                } else {
                    animateDigitalCounters();
                }
            })();
        </script>
    </section>

    <!-- INSTITUTIONAL GALLERY & CAMPUS HIGHLIGHTS SLIDER -->
    <section class="py-12 sm:py-16 bg-slate-950 text-slate-100 border-b border-slate-800 relative overflow-hidden">
        <!-- Ambient decorative blurs -->
        <div class="absolute -top-24 left-1/4 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-24 right-1/4 w-96 h-96 bg-emerald-600/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-8">
                <div class="max-w-2xl">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-500/10 border border-blue-400/20 text-blue-300 text-xs font-bold uppercase tracking-wider mb-2.5">
                        <span class="w-2 h-2 rounded-full bg-blue-400 animate-pulse"></span>
                        <span>Campus &amp; Training Highlights</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white tracking-tight font-heading">
                        Excellence in Action at <span class="bg-gradient-to-r from-blue-400 via-sky-300 to-emerald-400 bg-clip-text text-transparent">iCEEDS</span>
                    </h2>
                    <p class="mt-2 text-xs sm:text-sm text-slate-300 leading-relaxed">
                        A visual journey through our state-of-the-art vocational workshops, academic sessions, and milestone events empowering students across India.
                    </p>
                </div>

                <!-- Navigation Controls -->
                <div class="flex items-center gap-3 self-start md:self-end shrink-0">
                    <span class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-900/80 border border-slate-800 text-[11px] text-slate-400 font-medium">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span>Auto-looping &bull; Hover to pause</span>
                    </span>
                    <button 
                        type="button" 
                        id="sliderPrevBtn" 
                        class="w-10 h-10 sm:w-11 sm:h-11 rounded-2xl bg-slate-900/90 border border-slate-700/80 text-slate-300 hover:text-white hover:border-blue-500/50 hover:bg-slate-800 flex items-center justify-center transition shadow-lg shadow-black/30 focus:outline-none cursor-pointer"
                        aria-label="Previous Slide"
                    >
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button 
                        type="button" 
                        id="sliderNextBtn" 
                        class="w-10 h-10 sm:w-11 sm:h-11 rounded-2xl bg-slate-900/90 border border-slate-700/80 text-slate-300 hover:text-white hover:border-blue-500/50 hover:bg-slate-800 flex items-center justify-center transition shadow-lg shadow-black/30 focus:outline-none cursor-pointer"
                        aria-label="Next Slide"
                    >
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Slider Track Container -->
            <div class="relative group">
                <!-- Carousel Scroll Viewport (Continuous infinite loop, at least 4 visible on PCs) -->
                <div 
                    id="iceedsImageSlider" 
                    class="flex gap-4 sm:gap-6 overflow-x-auto py-2 pb-4 select-none cursor-grab active:cursor-grabbing [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden"
                >
                    <!-- Slide Items (10 Images duplicated for seamless infinite loop) -->
                    @php
                        $sliderImages = [
                            [
                                'url' => 'https://iceeds.com/storage/media/2026/10/iceeds-13-2xiq7h.webp',
                                'title' => 'Technical & Vocational Campuses',
                                'tag' => 'Infrastructure',
                                'desc' => 'Modern training facilities and vocational infrastructure across regional centers.'
                            ],
                            [
                                'url' => 'https://iceeds.com/storage/media/2026/10/iceeds-12-ecleff.webp',
                                'title' => 'Empowered Student Community',
                                'tag' => 'Student Life',
                                'desc' => 'Encouraging holistic growth, practical mastery, and industry readiness.'
                            ],
                            [
                                'url' => 'https://iceeds.com/storage/media/2026/10/iceeds-10-pvqx8l.webp',
                                'title' => 'Vocational Training & Practice',
                                'tag' => 'Hands-On Labs',
                                'desc' => 'Technical vocational mastery and practical equipment training.'
                            ],
                            [
                                'url' => 'https://iceeds.com/storage/media/2026/10/iceeds-9-yxtqa0.webp',
                                'title' => 'Academic Board of Studies',
                                'tag' => 'Curriculum Design',
                                'desc' => 'High standards monitored by distinguished academic experts.'
                            ],
                            [
                                'url' => 'https://iceeds.com/storage/media/2026/10/iceeds-11-3c8lnq.webp',
                                'title' => 'Skill Development Seminars',
                                'tag' => 'Faculty Mentorship',
                                'desc' => 'Specialized workshops aligned with modern industry competencies.'
                            ],
                            [
                                'url' => 'https://iceeds.com/storage/media/2026/10/iceeds-6-6ofhuj.webp',
                                'title' => 'Student Career Empowerment',
                                'tag' => 'Interactive Learning',
                                'desc' => 'Transformative educational sessions fostering professional growth.'
                            ],
                            [
                                'url' => 'https://iceeds.com/storage/media/2026/10/iceeds-5-pfhkya.webp',
                                'title' => 'Technical Workshop Facilities',
                                'tag' => 'Infrastructure',
                                'desc' => 'Well-equipped facilities for vocational competence and practice.'
                            ],
                            [
                                'url' => 'https://iceeds.com/storage/media/2026/10/iceeds-3-iheexd.webp',
                                'title' => 'Institutional Assessment Standards',
                                'tag' => 'ISO 9001:2015',
                                'desc' => 'Rigorous skill evaluation processes ensuring quality assurance.'
                            ],
                            [
                                'url' => 'https://iceeds.com/storage/media/2026/10/iceeds-1-6dmgps.webp',
                                'title' => 'Collaborative Excellence',
                                'tag' => 'Campus Life',
                                'desc' => 'Fostering teamwork, innovation, and leadership among candidates.'
                            ],
                            [
                                'url' => 'https://iceeds.com/storage/media/2026/10/iceeds-decbwr.webp',
                                'title' => 'National Trust Credentials',
                                'tag' => 'Self-Governing Trust',
                                'desc' => 'Empowering youth under the Indian Trusts Act, 1882.'
                            ]
                        ];
                        // Duplicate array for an infinite loop with zero visual seam
                        $loopSliderImages = array_merge($sliderImages, $sliderImages);
                    @endphp

                    @foreach($loopSliderImages as $index => $item)
                        <div 
                            class="slider-card shrink-0 w-[80vw] sm:w-[46vw] md:w-[31vw] lg:w-[calc(25%-18px)] xl:w-[calc(25%-18px)] relative rounded-3xl overflow-hidden bg-slate-900 border border-slate-800 shadow-xl group/card transition-all duration-300 hover:border-slate-600 hover:shadow-blue-900/30"
                            data-index="{{ $index % count($sliderImages) }}"
                        >
                            <!-- Image Wrapper -->
                            <div class="aspect-[16/11] w-full overflow-hidden relative cursor-pointer" onclick="openSliderModal('{{ $item['url'] }}', '{{ addslashes($item['title']) }}', '{{ addslashes($item['desc']) }}')">
                                <img 
                                    src="{{ $item['url'] }}" 
                                    alt="{{ $item['title'] }}" 
                                    loading="lazy" 
                                    class="w-full h-full object-cover transform group-hover/card:scale-105 transition-transform duration-700 ease-out"
                                >
                                <!-- Gradient Shadow Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent opacity-85 group-hover/card:opacity-90 transition-opacity"></div>
                                
                                <!-- Top Tag -->
                                <div class="absolute top-3.5 left-3.5">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-slate-900/85 backdrop-blur-md border border-slate-700/70 text-[11px] font-bold text-blue-300 tracking-wide uppercase">
                                        {{ $item['tag'] }}
                                    </span>
                                </div>

                                <!-- Expand button icon -->
                                <div class="absolute top-3.5 right-3.5 w-8 h-8 rounded-full bg-slate-900/85 backdrop-blur-md border border-slate-700/70 text-slate-300 flex items-center justify-center opacity-0 group-hover/card:opacity-100 transition-opacity duration-200">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                                    </svg>
                                </div>

                                <!-- Bottom Info -->
                                <div class="absolute bottom-0 inset-x-0 p-5">
                                    <h3 class="text-base sm:text-lg font-bold text-white font-heading tracking-tight drop-shadow-sm group-hover/card:text-blue-300 transition-colors">
                                        {{ $item['title'] }}
                                    </h3>
                                    <p class="text-xs text-slate-300 mt-1 line-clamp-2 leading-relaxed">
                                        {{ $item['desc'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Navigation Status Hint -->
                <div class="flex items-center justify-center gap-2 mt-4 text-[11px] text-slate-400 font-medium">
                    <span class="inline-block w-2 h-2 rounded-full bg-blue-500 animate-ping"></span>
                    <span>10 Institutional Galleries &bull; Continuous Scroll &bull; Click any photo to view full size</span>
                </div>
            </div>
        </div>

        <!-- Sleek Lightbox Modal for Full-Res View -->
        <div id="sliderLightboxModal" class="fixed inset-0 z-50 hidden bg-slate-950/95 backdrop-blur-xl flex items-center justify-center p-4 sm:p-6" onclick="closeSliderModal(event)">
            <div class="relative max-w-5xl w-full bg-slate-900 border border-slate-800 rounded-3xl overflow-hidden shadow-2xl" onclick="event.stopPropagation()">
                <!-- Close Button -->
                <button type="button" onclick="closeSliderModalDirect()" class="absolute top-4 right-4 z-20 w-10 h-10 rounded-full bg-slate-950/80 border border-slate-700 text-slate-300 hover:text-white hover:bg-slate-800 flex items-center justify-center transition cursor-pointer">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
                
                <div class="aspect-[16/10] sm:aspect-[16/9] w-full bg-slate-950 flex items-center justify-center overflow-hidden">
                    <img id="lightboxImg" src="" alt="" class="w-full h-full object-contain">
                </div>
                <div class="p-6 bg-slate-900 border-t border-slate-800 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div>
                        <h4 id="lightboxTitle" class="text-xl font-bold text-white font-heading"></h4>
                        <p id="lightboxDesc" class="text-xs sm:text-sm text-slate-300 mt-1"></p>
                    </div>
                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-500/15 border border-blue-400/30 text-blue-300 text-xs font-semibold shrink-0">
                        iCEEDS Institutional Archive
                    </span>
                </div>
            </div>
        </div>

        <script>
            (function() {
                var slider = document.getElementById('iceedsImageSlider');
                var prevBtn = document.getElementById('sliderPrevBtn');
                var nextBtn = document.getElementById('sliderNextBtn');
                var isPaused = false;
                var scrollSpeed = 0.85; // smooth continuous drift in pixels per frame
                var rafId = null;

                if (!slider) return;

                function getScrollStep() {
                    var firstCard = slider.querySelector('.slider-card');
                    return firstCard ? firstCard.offsetWidth + 24 : 320;
                }

                // Continuous loop via requestAnimationFrame
                function animate() {
                    if (!isPaused && slider) {
                        slider.scrollLeft += scrollSpeed;
                        var halfWidth = slider.scrollWidth / 2;
                        if (halfWidth > 0 && slider.scrollLeft >= halfWidth) {
                            slider.scrollLeft -= halfWidth;
                        }
                    }
                    rafId = requestAnimationFrame(animate);
                }
                rafId = requestAnimationFrame(animate);

                // Manual Next button
                if (nextBtn) {
                    nextBtn.addEventListener('click', function() {
                        var step = getScrollStep();
                        slider.scrollBy({ left: step, behavior: 'smooth' });
                    });
                }

                // Manual Prev button
                if (prevBtn) {
                    prevBtn.addEventListener('click', function() {
                        var step = getScrollStep();
                        var halfWidth = slider.scrollWidth / 2;
                        if (slider.scrollLeft <= 10 && halfWidth > 0) {
                            slider.scrollLeft += halfWidth;
                        }
                        slider.scrollBy({ left: -step, behavior: 'smooth' });
                    });
                }

                // Pause on hover or touch
                slider.addEventListener('mouseenter', function() { isPaused = true; });
                slider.addEventListener('mouseleave', function() { isPaused = false; });
                slider.addEventListener('touchstart', function() { isPaused = true; }, { passive: true });
                slider.addEventListener('touchend', function() {
                    setTimeout(function() { isPaused = false; }, 2000);
                }, { passive: true });

                // Also support drag to scroll
                var isDown = false;
                var startX, scrollLeftVal;
                slider.addEventListener('mousedown', function(e) {
                    isDown = true;
                    isPaused = true;
                    startX = e.pageX - slider.offsetLeft;
                    scrollLeftVal = slider.scrollLeft;
                });
                window.addEventListener('mouseup', function() {
                    if (isDown) {
                        isDown = false;
                        setTimeout(function() { isPaused = false; }, 1500);
                    }
                });
                slider.addEventListener('mousemove', function(e) {
                    if (!isDown) return;
                    e.preventDefault();
                    var x = e.pageX - slider.offsetLeft;
                    var walk = (x - startX) * 1.5;
                    slider.scrollLeft = scrollLeftVal - walk;
                });
            })();

            function openSliderModal(url, title, desc) {
                var modal = document.getElementById('sliderLightboxModal');
                var img = document.getElementById('lightboxImg');
                var titleEl = document.getElementById('lightboxTitle');
                var descEl = document.getElementById('lightboxDesc');
                if (modal && img) {
                    img.src = url;
                    img.alt = title;
                    if (titleEl) titleEl.textContent = title;
                    if (descEl) descEl.textContent = desc;
                    modal.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                }
            }

            function closeSliderModalDirect() {
                var modal = document.getElementById('sliderLightboxModal');
                if (modal) {
                    modal.classList.add('hidden');
                    document.body.style.overflow = '';
                }
            }

            function closeSliderModal(e) {
                if (e.target && e.target.id === 'sliderLightboxModal') {
                    closeSliderModalDirect();
                }
            }

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeSliderModalDirect();
                }
            });
        </script>
    </section>

    <!-- VISIONARY QUOTE & VIDEO SPOTLIGHT SECTION -->
    <section class="py-16 bg-white border-b border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <!-- Quote Card -->
                <div class="lg:col-span-5 bg-gradient-to-br from-slate-900 to-slate-950 text-white rounded-3xl p-8 sm:p-10 shadow-xl border border-slate-800 relative overflow-hidden">
                    <div class="absolute -bottom-8 -right-8 w-40 h-40 bg-blue-600/10 rounded-full blur-2xl"></div>
                    <svg class="w-12 h-12 text-blue-500/30 mb-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                    </svg>
                    <blockquote class="text-xl sm:text-2xl font-semibold leading-relaxed tracking-tight font-heading text-slate-100">
                        &ldquo;Dream is not that which you see while sleeping it is something that does not let you sleep.&rdquo;
                    </blockquote>
                    <div class="mt-6 pt-6 border-t border-slate-800 flex items-center justify-between gap-4">
                        <div class="flex items-center gap-3.5">
                            <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl overflow-hidden border border-white/20 shadow-md shrink-0 bg-slate-800">
                                <picture>
                                    <source srcset="{{ asset('images/apj-abdul-kalam.webp') }}" type="image/webp">
                                    <img src="{{ asset('images/apj-abdul-kalam.png') }}" alt="Dr. A.P.J. Abdul Kalam" class="w-full h-full object-cover object-top">
                                </picture>
                            </div>
                            <div>
                                <p class="font-bold text-white text-base font-heading">Dr. A.P.J. Abdul Kalam</p>
                                <p class="text-xs text-blue-400 font-medium">11th President of India &bull; Visionary</p>
                            </div>
                        </div>
                        <div class="hidden sm:flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-500/10 border border-blue-400/20 text-[11px] font-mono text-blue-300">
                            <span>Visionary Insight</span>
                        </div>
                    </div>
                </div>

                <!-- Video Showcase Spotlight -->
                <div class="lg:col-span-7">
                    <div id="homeVideoContainer" class="relative rounded-3xl overflow-hidden bg-slate-950 shadow-2xl border border-slate-800/80 aspect-video flex items-center justify-center group">
                        
                        <!-- Video Element -->
                        <video id="homeDocVideo" 
                               src="https://iceeds.com/storage/media/2026/10/video-project-26-1-euyqjz.mp4" 
                               playsinline 
                               preload="metadata"
                               class="w-full h-full object-cover bg-black"
                               onended="resetHomeDocVideo()"></video>

                        <!-- Poster Overlay View (Click to Play) -->
                        <div id="homeDocPoster" 
                             onclick="playHomeDocVideo()"
                             class="absolute inset-0 bg-gradient-to-tr from-slate-950 via-blue-950/90 to-slate-900 cursor-pointer flex flex-col items-center justify-center text-center p-6 text-white z-10 transition-opacity duration-300">
                            
                            <!-- Ambient Glow Behind Play Button -->
                            <div class="relative mb-4">
                                <div class="absolute inset-0 bg-blue-500/30 rounded-full blur-xl group-hover:bg-blue-500/50 transition-all duration-300"></div>
                                <div class="relative w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-blue-600 border border-blue-400/40 flex items-center justify-center group-hover:scale-110 group-hover:bg-blue-500 transition duration-300 shadow-2xl shadow-blue-600/50">
                                    <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white fill-current translate-x-0.5" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>

                            <span class="text-xs uppercase font-bold tracking-widest text-blue-300 mb-1.5 flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-blue-400 animate-pulse"></span>
                                Institutional Documentary
                            </span>

                            <h3 class="text-xl sm:text-2xl font-bold font-heading max-w-md text-white group-hover:text-blue-100 transition">
                                Empowering India Through Accredited Skills &amp; Education
                            </h3>

                            <p class="text-xs sm:text-sm text-slate-300 mt-2 max-w-sm leading-relaxed">
                                Discover how iCEEDS shapes careers and elevates employability standards across disciplines.
                            </p>

                            <!-- Badge in Top Corner -->
                            <div class="absolute top-4 left-4 flex items-center gap-2">
                                <span class="px-2.5 py-1 rounded-full bg-slate-900/80 border border-white/10 text-white text-[10px] font-bold uppercase tracking-wider backdrop-blur-md flex items-center gap-1.5">
                                    <svg class="w-3 h-3 text-red-500 fill-current" viewBox="0 0 24 24"><path d="M10 15l5-3-5-3v6z"/></svg>
                                    <span>Official Video</span>
                                </span>
                            </div>

                            <!-- Quality Badge in Bottom Corner -->
                            <div class="absolute bottom-4 right-4 flex items-center gap-2">
                                <span class="px-2 py-0.5 rounded bg-slate-900/80 border border-white/10 text-blue-300 text-[11px] font-mono font-bold backdrop-blur-md">
                                    HD 1080p
                                </span>
                            </div>
                        </div>

                        <!-- Mini Floating Re-open Overlay Button when Video is Playing -->
                        <button type="button" 
                                id="homeDocCloseBtn"
                                onclick="resetHomeDocVideo()" 
                                title="Exit Video"
                                class="hidden absolute top-3 right-3 z-20 px-3 py-1.5 rounded-full bg-slate-900/85 hover:bg-slate-900 text-white text-xs font-semibold backdrop-blur-md border border-white/20 transition cursor-pointer flex items-center gap-1.5 shadow-lg">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            <span>Exit Player</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function playHomeDocVideo() {
                const video = document.getElementById('homeDocVideo');
                const poster = document.getElementById('homeDocPoster');
                const closeBtn = document.getElementById('homeDocCloseBtn');

                if (video && poster) {
                    poster.classList.add('opacity-0', 'pointer-events-none');
                    video.setAttribute('controls', 'true');
                    if (closeBtn) closeBtn.classList.remove('hidden');
                    const playPromise = video.play();
                    if (playPromise !== undefined) {
                        playPromise.catch(function(error) {
                            console.log('Video playback error:', error);
                        });
                    }
                }
            }

            function resetHomeDocVideo() {
                const video = document.getElementById('homeDocVideo');
                const poster = document.getElementById('homeDocPoster');
                const closeBtn = document.getElementById('homeDocCloseBtn');

                if (video) {
                    video.pause();
                    video.removeAttribute('controls');
                    video.currentTime = 0;
                }
                if (poster) {
                    poster.classList.remove('opacity-0', 'pointer-events-none');
                }
                if (closeBtn) {
                    closeBtn.classList.add('hidden');
                }
            }
        </script>
    </section>

    <!-- OUR MISSION SECTION -->
    <section class="py-16 sm:py-24 bg-portal-gradient border-b border-slate-200/70">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block text-xs font-bold uppercase tracking-wider text-blue-700 bg-blue-50 border border-blue-200/80 px-3 py-1 rounded-full mb-3">Our Core Purpose</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-950 font-heading tracking-tight">Our Mission</h2>
            
            <p class="mt-6 text-base sm:text-lg text-slate-600 leading-relaxed max-w-3xl mx-auto">
                At <strong>iCEEDS</strong>, our mission is clear: to unlock your potential and enhance your employability. We believe that education and skill development are the keys to personal and professional success. Our goal is to bridge the gap between ambition and achievement by providing ISO-accredited and authorized certificates for short-term, mid-term, and long-term skill development and exquisite education programs in a wide range of disciplines.
            </p>

            <!-- 3 Highlight Pills -->
            <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6 text-left">
                <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-sm hover:shadow-md transition">
                    <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center font-bold text-sm mb-3">01</div>
                    <h3 class="text-base font-bold text-slate-900 font-heading">Short-Term Courses</h3>
                    <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                        Focused, intensive skill enhancement modules designed for quick acquisition of high-demand practical competencies.
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-sm hover:shadow-md transition">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center font-bold text-sm mb-3">02</div>
                    <h3 class="text-base font-bold text-slate-900 font-heading">Mid-Term Programs</h3>
                    <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                        In-depth specialized learning combining curriculum depth with rigorous real-world case study evaluations.
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-sm hover:shadow-md transition">
                    <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold text-sm mb-3">03</div>
                    <h3 class="text-base font-bold text-slate-900 font-heading">Long-Term Courses</h3>
                    <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                        Comprehensive diplomas and executive education designed for holistic career transformation and leadership.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- "WHY iCEEDS?" VALUE PROPOSITION GRID (6 Icon Cards in 3x2 Grid) -->
    <section class="py-16 sm:py-24 bg-white border-b border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="text-xs font-bold uppercase tracking-wider text-blue-700 bg-blue-50 border border-blue-200/80 px-3 py-1 rounded-full">Excellence by Design</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-950 font-heading tracking-tight mt-3">Why Choose iCEEDS?</h2>
                <p class="mt-3 text-sm text-slate-600">
                    We deliver an ecosystem of accredited education, institutional trust, and career advancement that stands out nationally.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($whyIceeds as $item)
                    <div class="bg-slate-50/70 hover:bg-white rounded-2xl p-7 border border-slate-200/90 shadow-xs hover:shadow-md transition-all duration-200">
                        <div class="w-12 h-12 rounded-xl bg-blue-100/70 text-blue-700 flex items-center justify-center mb-5">
                            @if($item['icon'] === 'shield-check')
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                            @elseif($item['icon'] === 'book-open')
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                            @elseif($item['icon'] === 'academic-cap')
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" /><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" /></svg>
                            @elseif($item['icon'] === 'trending-up')
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" /></svg>
                            @elseif($item['icon'] === 'sparkles')
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" /></svg>
                            @else
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" /></svg>
                            @endif
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading mb-2">{{ $item['title'] }}</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">{{ $item['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- INSTITUTIONAL ACCREDITATIONS & QUALITY CREDENTIALS SECTION -->
    <section class="py-16 sm:py-24 bg-white border-b border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-block text-xs font-bold uppercase tracking-wider text-emerald-800 bg-emerald-50 border border-emerald-200 px-3.5 py-1 rounded-full mb-3">
                    Verified Regulatory Standing &amp; Global Recognition
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-950 font-heading tracking-tight">
                    Institutional Accreditations &amp; Quality Credentials
                </h2>
                <p class="mt-4 text-sm sm:text-base text-slate-600 leading-relaxed">
                    <strong>iCEEDS (Innovation Council for Exquisite Education &amp; Development of Skills)</strong> is committed to upholding international standards in skill development, vocational training, and educational services. Our institutional operations, curriculum frameworks, and assessment systems align with globally recognized quality assurance bodies and statutory national registrations.
                </p>
            </div>

            <!-- Two High-Impact Showcase Cards -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
                
                <!-- Card 1: International Accreditations & Quality Frameworks -->
                <div class="bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 text-white rounded-3xl p-8 sm:p-10 border border-slate-800 shadow-xl flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute -right-12 -top-12 w-48 h-48 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>

                    <div>
                        <div class="flex items-center justify-between gap-4 mb-6">
                            <span class="px-3 py-1 rounded-full bg-blue-500/20 text-blue-300 text-xs font-bold uppercase tracking-wider border border-blue-500/30 font-mono">
                                Category 1 &bull; Global
                            </span>
                            <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center shrink-0 border border-white/10">
                                <svg class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                </svg>
                            </div>
                        </div>

                        <h3 class="text-2xl font-bold font-heading text-white mb-2">
                            International Accreditations &amp; Quality Frameworks
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-300 mb-6 leading-relaxed">
                            Certified under world-class quality benchmarks and endorsed across global accreditation councils.
                        </p>

                        <div class="space-y-4">
                            <!-- ISO Standard -->
                            <div class="p-4 rounded-2xl bg-white/5 border border-white/10">
                                <div class="flex items-start gap-3">
                                    <span class="w-2.5 h-2.5 rounded-full bg-blue-400 mt-1 shrink-0"></span>
                                    <div>
                                        <h4 class="text-sm font-bold text-white">ISO Quality Certification (9001:2015)</h4>
                                        <p class="text-xs text-slate-300 mt-0.5 leading-relaxed">
                                            Certified under ISO Standards (9001:2015) for Quality Management Systems in Educational and Vocational Training delivery and assessment.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Global Accreditation Councils -->
                            <div class="p-4 rounded-2xl bg-white/5 border border-white/10">
                                <div class="flex items-start gap-3">
                                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 mt-1 shrink-0"></span>
                                    <div>
                                        <h4 class="text-sm font-bold text-white">Global Accreditation Support &amp; Alignment</h4>
                                        <p class="text-xs text-slate-300 mt-0.5 mb-3 leading-relaxed">
                                            Institutional quality frameworks aligned and recognized under international accreditation councils and academic boards:
                                        </p>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs">
                                            <div class="p-2.5 rounded-xl bg-slate-950/60 border border-slate-800">
                                                <strong class="text-emerald-400 block font-mono">EGAC</strong>
                                                <span class="text-[11px] text-slate-300">Egyptian Accreditation Council</span>
                                            </div>
                                            <div class="p-2.5 rounded-xl bg-slate-950/60 border border-slate-800">
                                                <strong class="text-emerald-400 block font-mono">EIAC</strong>
                                                <span class="text-[11px] text-slate-300">Emirates International Accreditation Centre</span>
                                            </div>
                                            <div class="p-2.5 rounded-xl bg-slate-950/60 border border-slate-800">
                                                <strong class="text-blue-400 block font-mono">QEAA</strong>
                                                <span class="text-[11px] text-slate-300">Quality Education Assurance Accreditation</span>
                                            </div>
                                            <div class="p-2.5 rounded-xl bg-slate-950/60 border border-slate-800">
                                                <strong class="text-blue-400 block font-mono">FICS</strong>
                                                <span class="text-[11px] text-slate-300">Forum for Internationally Certified Scholars</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- US & UK Support -->
                            <div class="p-4 rounded-2xl bg-white/5 border border-white/10">
                                <div class="flex items-start gap-3">
                                    <span class="w-2.5 h-2.5 rounded-full bg-purple-400 mt-1 shrink-0"></span>
                                    <div>
                                        <h4 class="text-sm font-bold text-white">US &amp; UK International Accreditation Agencies</h4>
                                        <p class="text-xs text-slate-300 mt-0.5 leading-relaxed">
                                            International Credentials Recognition providing global mobility and evaluation alignment for iCEEDS course completers.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2: National Registrations & Government Recognitions (India) -->
                <div class="bg-gradient-to-br from-slate-900 via-emerald-950/80 to-slate-900 text-white rounded-3xl p-8 sm:p-10 border border-slate-800 shadow-xl flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute -right-12 -bottom-12 w-48 h-48 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>

                    <div>
                        <div class="flex items-center justify-between gap-4 mb-6">
                            <span class="px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-wider border border-emerald-500/30 font-mono">
                                Category 2 &bull; National (Govt. of India)
                            </span>
                            <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center shrink-0 border border-white/10">
                                <svg class="w-6 h-6 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                        </div>

                        <h3 class="text-2xl font-bold font-heading text-white mb-2">
                            National Registrations &amp; Government Recognitions
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-300 mb-6 leading-relaxed">
                            Established under statutory Indian Acts, verified on national government portals, and eligible across employment registries.
                        </p>

                        <div class="space-y-3.5">
                            <!-- 1. Indian Trusts Act -->
                            <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10">
                                <div class="flex items-start gap-3">
                                    <span class="w-2 h-2 rounded-full bg-emerald-400 mt-1.5 shrink-0"></span>
                                    <div>
                                        <h4 class="text-xs sm:text-sm font-bold text-white">Registered Educational Trust</h4>
                                        <p class="text-xs text-slate-300 mt-0.5 leading-relaxed">
                                            Established as a self-governing educational trust under the <strong>Indian Trusts Act, 1882</strong>.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- 2. NSDC Support -->
                            <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10">
                                <div class="flex items-start gap-3">
                                    <span class="w-2 h-2 rounded-full bg-amber-400 mt-1.5 shrink-0"></span>
                                    <div>
                                        <h4 class="text-xs sm:text-sm font-bold text-white">NSDC Certification Support</h4>
                                        <p class="text-xs text-slate-300 mt-0.5 leading-relaxed">
                                            Facilitating skill training and certification support aligned with the <strong>National Skill Development Corporation (NSDC)</strong> under the <strong>Ministry of Skill Development and Entrepreneurship (MSDE)</strong>, Govt. of India.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- 3. NITI Aayog -->
                            <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10">
                                <div class="flex items-start gap-3">
                                    <span class="w-2 h-2 rounded-full bg-blue-400 mt-1.5 shrink-0"></span>
                                    <div>
                                        <h4 class="text-xs sm:text-sm font-bold text-white">NITI Aayog Registered</h4>
                                        <p class="text-xs text-slate-300 mt-0.5 leading-relaxed">
                                            Enrolled under the prestigious <strong>NGO Darpan initiative, NITI Aayog</strong>, Government of India.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- 4. MSME -->
                            <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10">
                                <div class="flex items-start gap-3">
                                    <span class="w-2 h-2 rounded-full bg-indigo-400 mt-1.5 shrink-0"></span>
                                    <div>
                                        <h4 class="text-xs sm:text-sm font-bold text-white">MSME Recognized</h4>
                                        <p class="text-xs text-slate-300 mt-0.5 leading-relaxed">
                                            Registered under the <strong>Ministry of Micro, Small &amp; Medium Enterprises (MSME)</strong>, Government of India.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- 5. Employment Exchange & IP -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                                <div class="p-3 rounded-xl bg-slate-950/60 border border-slate-800 text-xs">
                                    <strong class="text-emerald-400 block font-semibold mb-0.5">Employment Exchanges</strong>
                                    <p class="text-[11px] text-slate-300 leading-tight">Eligible to be registered as an additional skill qualification in Employment Exchanges across India.</p>
                                </div>
                                <div class="p-3 rounded-xl bg-slate-950/60 border border-slate-800 text-xs">
                                    <strong class="text-blue-400 block font-semibold mb-0.5">Intellectual Property Protected</strong>
                                    <p class="text-[11px] text-slate-300 leading-tight">Institutional curricula, certifications, and brand credentials protected under Copyright and Trademark regulations (Govt. of India).</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Quick Summary Trust Bar -->
            <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200/90 flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-slate-900">Standardized Verification &amp; Tamper-Proof Credentials</h4>
                        <p class="text-xs text-slate-500">Every iCEEDS certificate carries a unique identifier verified through our public registry portal.</p>
                    </div>
                </div>
                <a href="{{ route('verify') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs font-bold text-white bg-slate-900 hover:bg-slate-800 shadow-md transition">
                    <span>Verify a Certificate</span>
                    <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                </a>
            </div>
        </div>
    </section>


    <!-- LEADERSHIP & ADMINISTRATION TEAM SECTION -->
    <section class="py-16 sm:py-24 bg-portal-gradient border-b border-slate-200/70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="text-xs font-bold uppercase tracking-wider text-blue-700 bg-blue-50 border border-blue-200/80 px-3 py-1 rounded-full">Executive Governance</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-950 font-heading tracking-tight mt-3">Leadership &amp; Administration Team</h2>
                <p class="mt-3 text-sm text-slate-600">
                    Distinguished academic authorities and executive leaders guiding the institutional standards, curricula, and credential governance of iCEEDS.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                @foreach($mentors as $mentor)
                    <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-lg shadow-slate-200/40 relative flex flex-col justify-between hover:shadow-xl hover:border-blue-300 transition-all duration-300">
                        <div>
                            <div class="flex items-start gap-5 mb-5">
                                <!-- Designated Profile Photo Frame with Luxury Double Ring & Status Badge -->
                                <div class="relative shrink-0">
                                    <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-2xl p-1 bg-gradient-to-tr from-blue-600 via-sky-400 to-emerald-400 shadow-md">
                                        <div class="w-full h-full rounded-[14px] overflow-hidden bg-slate-100 border border-white">
                                            @if(!empty($mentor['image']))
                                                <img src="{{ asset($mentor['image']) }}" alt="{{ $mentor['name'] }}" class="w-full h-full object-cover object-top">
                                            @else
                                                <div class="w-full h-full bg-gradient-to-tr from-slate-900 to-blue-900 text-white font-heading font-black text-2xl flex items-center justify-center">
                                                    {{ $mentor['initials'] }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Verified Badge on Frame -->
                                    <div class="absolute -bottom-1 -right-1 w-6 h-6 rounded-full bg-emerald-500 border-2 border-white text-white flex items-center justify-center shadow-xs" title="Official Executive">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </div>

                                <!-- Title, Designation & Affiliation -->
                                <div class="flex-1 min-w-0">
                                    <span class="inline-block text-[10px] font-bold uppercase tracking-wider text-blue-700 bg-blue-50 border border-blue-200/80 px-2 py-0.5 rounded mb-1">
                                        {{ $mentor['designation'] ?? $mentor['role'] }}
                                    </span>
                                    <h3 class="text-xl sm:text-2xl font-extrabold text-slate-900 font-heading tracking-tight">
                                        {{ $mentor['name'] }}
                                    </h3>
                                    <p class="text-xs font-bold font-mono text-blue-700 mt-0.5">
                                        {{ $mentor['credentials'] }}
                                    </p>
                                    <p class="text-xs font-bold text-slate-700 mt-0.5">
                                        {{ $mentor['role'] }}
                                    </p>
                                </div>
                            </div>

                            @if(!empty($mentor['honors']))
                                <div class="mb-4 p-3.5 rounded-2xl bg-slate-50 border border-slate-200/80">
                                    <ul class="space-y-1.5">
                                        @foreach($mentor['honors'] as $honor)
                                            <li class="flex items-start gap-2 text-xs text-slate-800 leading-snug">
                                                <span class="shrink-0 text-sm leading-none mt-0.5">🎖️</span>
                                                <span class="font-semibold">{{ $honor }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed italic border-l-2 border-blue-500 pl-4 py-1.5 bg-slate-50/50 rounded-r-xl">
                                &ldquo;{{ $mentor['message'] }}&rdquo;
                            </p>
                        </div>

                        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-400">
                            <span class="font-medium">Designation: <strong class="text-slate-800">{{ $mentor['designation'] ?? $mentor['role'] }}</strong></span>
                            <span class="font-mono text-[11px] text-blue-700 font-bold bg-blue-50 px-2 py-0.5 rounded">iCEEDS Directorate</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS & CANDIDATE EXPERIENCES SECTION -->
    <section class="py-16 sm:py-24 bg-white border-b border-slate-200/70 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-amber-600 bg-amber-50 border border-amber-200/80 px-3 py-1 rounded-full">
                        Verified Learner Feedback
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-950 font-heading tracking-tight mt-3">
                        Candidate &amp; Alumni Testimonials
                    </h2>
                    <p class="mt-2 text-sm text-slate-600 max-w-2xl">
                        Hear from graduates, affiliated training center directors, and vocational learners who have transformed their careers through iCEEDS programs.
                    </p>
                </div>
                <div class="flex items-center gap-3 shrink-0">
                    <a href="{{ route('testimonials.index') }}" class="px-5 py-2.5 rounded-xl font-bold text-xs text-slate-800 bg-slate-100 hover:bg-slate-200 transition">
                        View All ({{ \App\Models\Testimonial::approved()->count() }})
                    </a>
                    <a href="{{ route('testimonials.index') }}#share" class="px-5 py-2.5 rounded-xl font-bold text-xs text-white bg-blue-600 hover:bg-blue-500 shadow-md shadow-blue-600/20 transition flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                        <span>Share Feedback</span>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($testimonials as $t)
                    <div class="bg-slate-50/80 hover:bg-white rounded-3xl p-6 border border-slate-200/80 hover:border-amber-300 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                        <div>
                            <!-- Star Rating & Badge -->
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center gap-1 text-amber-400">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $t->rating)
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        @else
                                            <svg class="w-4 h-4 text-slate-300 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        @endif
                                    @endfor
                                    <span class="text-xs font-bold text-slate-700 ml-1.5 font-mono">{{ $t->rating }}.0</span>
                                </div>
                                <span class="inline-flex items-center gap-1 text-[10px] font-bold text-emerald-700 bg-emerald-50 border border-emerald-200 px-2 py-0.5 rounded-full">
                                    <svg class="w-3 h-3 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                    <span>Verified</span>
                                </span>
                            </div>

                            <!-- Feedback Text -->
                            <p class="text-xs sm:text-sm text-slate-700 leading-relaxed italic mb-5">
                                &ldquo;{{ Str::limit($t->content, 180) }}&rdquo;
                            </p>
                        </div>

                        <!-- Author Row -->
                        <div class="pt-4 border-t border-slate-200/70 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-blue-600 to-indigo-600 text-white font-black text-xs flex items-center justify-center shrink-0 shadow-xs">
                                {{ $t->initials }}
                            </div>
                            <div class="min-w-0 flex-1">
                                <h4 class="text-xs sm:text-sm font-bold text-slate-900 truncate group-hover:text-blue-700 transition">
                                    {{ $t->name }}
                                </h4>
                                <p class="text-[11px] text-slate-500 truncate">
                                    {{ $t->role_or_course ?? 'Verified Candidate' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-10 bg-slate-50 rounded-3xl border border-slate-200">
                        <p class="text-sm text-slate-600">Be the first to leave a testimonial about your iCEEDS experience!</p>
                        <a href="{{ route('testimonials.index') }}" class="mt-3 inline-block px-4 py-2 rounded-xl text-xs font-bold text-white bg-blue-600">
                            Add Testimonial
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- LATEST BLOG & INSTITUTIONAL INSIGHTS SECTION -->
    <section class="py-16 sm:py-24 bg-portal-gradient border-b border-slate-200/70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-blue-700 bg-blue-50 border border-blue-200/80 px-3 py-1 rounded-full">
                        Knowledge Hub
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-950 font-heading tracking-tight mt-3">
                        Latest Insights &amp; Publications
                    </h2>
                    <p class="mt-2 text-sm text-slate-600 max-w-2xl">
                        Thought leadership on vocational qualifications, the National Skills Qualifications Framework (NSQF), and institutional governance.
                    </p>
                </div>
                <div class="shrink-0">
                    <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-1.5 px-5 py-2.5 rounded-xl font-bold text-xs text-white bg-slate-900 hover:bg-slate-800 shadow-md transition">
                        <span>Read All Articles</span>
                        <svg class="w-3.5 h-3.5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($latestPosts as $post)
                    <article class="bg-white rounded-3xl overflow-hidden border border-slate-200/90 shadow-md hover:shadow-xl hover:border-blue-300 transition-all duration-300 flex flex-col justify-between group">
                        <div>
                            @if($post->featured_image)
                                <a href="{{ route('blog.show', $post->slug) }}" class="block aspect-video w-full overflow-hidden bg-slate-100 relative">
                                    <img 
                                        src="{{ asset($post->featured_image) }}" 
                                        alt="{{ $post->title }}" 
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        loading="lazy"
                                    >
                                    <div class="absolute top-3 left-3">
                                        <span class="px-2.5 py-1 rounded-full text-[10px] font-black uppercase tracking-wider bg-slate-950/80 text-white backdrop-blur-xs">
                                            {{ $post->category }}
                                        </span>
                                    </div>
                                </a>
                            @endif

                            <div class="p-6">
                                <div class="flex items-center gap-3 text-xs text-slate-400 mb-2.5">
                                    <span>{{ $post->published_at ? $post->published_at->format('M d, Y') : 'Recent' }}</span>
                                    <span>&bull;</span>
                                    <span>{{ $post->reading_time ?? 5 }} min read</span>
                                </div>

                                <h3 class="text-lg font-extrabold text-slate-900 font-heading leading-snug group-hover:text-blue-700 transition">
                                    <a href="{{ route('blog.show', $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h3>

                                <p class="text-xs sm:text-sm text-slate-600 mt-2.5 line-clamp-3 leading-relaxed">
                                    {{ $post->excerpt }}
                                </p>
                            </div>
                        </div>

                        <div class="px-6 pb-6 pt-2 border-t border-slate-100 flex items-center justify-between text-xs">
                            <span class="text-slate-500 font-medium truncate">{{ $post->author_name }}</span>
                            <a href="{{ route('blog.show', $post->slug) }}" class="font-bold text-blue-700 hover:text-blue-900 flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                                <span>Read Article</span>
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- BOTTOM CONVERSION BANNER ("Join iCEEDS Today") -->
    <section class="py-16 sm:py-20 bg-slate-950 text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-950/60 via-slate-950 to-slate-950 pointer-events-none"></div>
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center">
            <span class="inline-block text-xs font-bold uppercase tracking-widest text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-3.5 py-1 rounded-full mb-4">
                Enrollment & Institutional Affiliation Open
            </span>
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-black font-heading tracking-tight leading-tight">
                Join iCEEDS Today
            </h2>
            <p class="mt-4 text-base sm:text-lg text-slate-300 max-w-2xl mx-auto leading-relaxed">
                Whether you are an aspiring student, working professional, or academic training institute, take the next step toward verified credentials and career excellence.
            </p>
            <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
                <a href="{{ route('contact') }}" class="px-7 py-3.5 rounded-xl font-bold text-sm text-white bg-blue-600 hover:bg-blue-500 shadow-lg shadow-blue-600/30 transition cursor-pointer">
                    Contact Us Today
                </a>
                <a href="{{ route('services') }}" class="px-7 py-3.5 rounded-xl font-bold text-sm text-slate-200 bg-white/10 hover:bg-white/20 border border-white/20 transition cursor-pointer">
                    Explore Programs
                </a>
                <a href="{{ route('verify') }}" class="px-7 py-3.5 rounded-xl font-bold text-sm text-emerald-300 bg-emerald-950/60 hover:bg-emerald-900/60 border border-emerald-500/40 transition cursor-pointer">
                    Verify Certificate &rarr;
                </a>
            </div>
        </div>
    </section>

@endsection
