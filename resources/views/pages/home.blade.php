@extends('layouts.app')

@section('title', 'iCEEDS | Official Portal - Accredited Certifications & Skill Development')
@section('meta_description', 'Welcome to iCEEDS, an autonomous body registered under the Government of India providing ISO-accredited skill development programs and certificate verification.')

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
                class="w-full h-full object-cover opacity-85 transition-opacity duration-700"
            >
                <source src="https://iceeds.com/storage/media/2026/10/video-project-26-rrxhyz.mp4" type="video/mp4">
            </video>
            
            <!-- High-Contrast Balanced Gradient Overlay (Protects Text Readability while keeping video vibrant & visible) -->
            <!-- Left-biased gradient gives strong contrast behind the typography while letting the video action shine -->
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950/80 via-slate-950/45 to-slate-950/25"></div>
            <!-- Soft top/bottom edge feathering -->
            <div class="absolute inset-0 bg-gradient-to-b from-slate-950/50 via-transparent to-slate-950/70"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <!-- VERIFICATION RESULT BANNER (If searched via query param or search form) -->
            @if(isset($searched) && $searched)
                <div class="mb-12">
                    @if(isset($certificate) && $certificate)
                        <!-- Verified Certificate Card -->
                        <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-xl shadow-emerald-950/5 border-2 border-emerald-500/80 overflow-hidden">
                            <div class="bg-gradient-to-r from-slate-950 via-slate-900 to-slate-950 p-6 sm:p-8 text-white flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-14 h-14 rounded-2xl bg-emerald-500/20 border border-emerald-400/40 flex items-center justify-center shrink-0">
                                        <svg class="w-8 h-8 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-500/20 text-emerald-300 text-[11px] font-bold uppercase tracking-wider mb-1 border border-emerald-500/30">
                                            Official Digital Credential Verified
                                        </div>
                                        <h3 class="text-xl sm:text-2xl font-bold font-heading">Authentic Certificate Record</h3>
                                        <p class="text-xs text-slate-300">Registered with iCEEDS Central Academic Repository</p>
                                    </div>
                                </div>
                                <div class="text-left sm:text-right">
                                    <span class="text-[11px] uppercase tracking-wider text-slate-400 font-semibold block">Serial Identifier</span>
                                    <span class="font-mono text-emerald-400 font-bold text-lg tracking-wider">{{ $certificate->certificate_code }}</span>
                                </div>
                            </div>

                            <div class="p-6 sm:p-8 space-y-6">
                                <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100">
                                    <span class="text-xs uppercase tracking-wider font-semibold text-slate-400 block mb-1">Conferred Upon Candidate</span>
                                    <h4 class="text-2xl sm:text-3xl font-extrabold text-slate-900 font-heading">
                                        {{ $certificate->student_name }}
                                    </h4>
                                    @if($certificate->first_name && $certificate->last_name)
                                        <p class="text-xs text-slate-500 mt-1 font-medium">
                                            First Name: <span class="text-slate-800 font-semibold">{{ $certificate->first_name }}</span> &bull; 
                                            Last Name / Initials: <span class="text-slate-800 font-semibold">{{ $certificate->last_name }}</span>
                                        </p>
                                    @endif
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="bg-white rounded-xl p-4 border border-slate-200">
                                        <span class="text-xs uppercase tracking-wider font-semibold text-slate-400 block mb-1">Program of Study</span>
                                        <p class="text-base font-bold text-slate-900 leading-snug">{{ $certificate->course }}</p>
                                    </div>
                                    <div class="bg-white rounded-xl p-4 border border-slate-200">
                                        <span class="text-xs uppercase tracking-wider font-semibold text-slate-400 block mb-1">Date of Issuance</span>
                                        <p class="text-base font-bold text-slate-900 font-mono">{{ $certificate->issue_date ? $certificate->issue_date->format('F d, Y') : 'N/A' }}</p>
                                    </div>
                                    <div class="bg-white rounded-xl p-4 border border-slate-200">
                                        <span class="text-xs uppercase tracking-wider font-semibold text-slate-400 block mb-1">Issuing Authority</span>
                                        <p class="text-sm font-bold text-slate-900">iCEEDS (Innovation Council for Exquisite Education & Development of Skills)</p>
                                    </div>
                                    <div class="bg-white rounded-xl p-4 border border-slate-200">
                                        <span class="text-xs uppercase tracking-wider font-semibold text-slate-400 block mb-1">Registry Record ID</span>
                                        <p class="text-sm font-bold text-slate-900 font-mono">#ICEEDS-{{ str_pad($certificate->id, 6, '0', STR_PAD_LEFT) }}</p>
                                    </div>
                                </div>

                                <div class="flex flex-wrap items-center justify-between gap-4 pt-4 border-t border-slate-200">
                                    <a href="{{ route('verify', ['code' => $certificate->certificate_code]) }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs font-semibold text-white bg-slate-900 hover:bg-slate-800 transition">
                                        <span>View Full Verification Transcript & Print PDF</span>
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                                    </a>
                                    <a href="{{ route('home') }}" class="text-xs font-medium text-slate-500 hover:text-slate-800">Close Result</a>
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
                                        Please double-check the serial number formatting (e.g. <code class="font-mono font-bold text-slate-800">EDP/TVM24/DCP/065</code>) or visit our dedicated verification page.
                                    </p>
                                    <div class="mt-4 flex gap-3">
                                        <a href="{{ route('verify') }}" class="text-xs font-semibold text-blue-700 hover:underline">Go to Verification Portal &rarr;</a>
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
                    <!-- Institutional Badge -->
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-slate-900/90 backdrop-blur-md border border-slate-700/80 text-blue-300 text-xs font-bold uppercase tracking-wider shadow-lg flex-wrap justify-center lg:justify-start">
                        <svg class="w-4 h-4 text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-slate-200">Autonomous Body Registered Under the Govt. of India</span>
                        <span class="text-slate-500 hidden sm:inline">&bull;</span>
                        <span class="text-emerald-400">Indian Trusts Act, 1882</span>
                    </div>

                    <!-- Main Headline -->
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-[1.1] font-heading drop-shadow-md">
                        Elevate Your Skills with <span class="bg-gradient-to-r from-blue-400 via-sky-300 to-emerald-400 bg-clip-text text-transparent">Accredited Certifications</span>
                    </h1>

                    <!-- Verified Subtitle with Glassmorphic Underlay for 100% Readability -->
                    <div class="p-4 sm:p-5 rounded-2xl bg-slate-900/85 backdrop-blur-md border border-slate-800 shadow-xl max-w-2xl mx-auto lg:mx-0">
                        <p class="text-sm sm:text-base text-slate-200 leading-relaxed">
                            <strong class="text-white">iCEEDS</strong> (<em class="text-slate-300">Innovation Council for Exquisite Education &amp; Development of Skills</em>) is a self-governing educational organization established under the <strong class="text-emerald-300">Indian Trusts Act, 1882</strong>. As an independent skill development and certification entity, the Trust designs and conducts vocational and professional courses to empower students with industry-relevant skills. Guided and monitored by an expert <strong class="text-blue-300">Academic Board of Studies</strong>, iCEEDS ensures high standards in curriculum design and quality evaluation, while facilitating certification support aligned with the <strong class="text-amber-300">National Skill Development Corporation (NSDC)</strong> under the Ministry of Skill Development and Entrepreneurship, Govt. of India.
                        </p>
                    </div>

                    <!-- CTAs -->
                    <div class="pt-2 flex flex-wrap items-center justify-center lg:justify-start gap-3.5">
                        <a href="{{ route('services') }}" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl font-bold text-sm text-white bg-blue-600 hover:bg-blue-500 shadow-lg shadow-blue-600/30 transition-all duration-150 cursor-pointer">
                            <span>Explore Our Services</span>
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                        </a>
                        <a href="{{ route('verify') }}" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl font-bold text-sm text-slate-900 bg-white hover:bg-slate-100 shadow-md transition-all duration-150 cursor-pointer">
                            <svg class="w-4 h-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span>Verify Certificate</span>
                        </a>
                        <a href="{{ route('about') }}" class="inline-flex items-center gap-1.5 px-4 py-3.5 text-sm font-semibold text-slate-300 hover:text-white transition">
                            <span>Know More &rarr;</span>
                        </a>
                    </div>

                    <!-- Quick Verification Search Bar -->
                    <div class="pt-4 max-w-xl mx-auto lg:mx-0">
                        <form action="{{ route('verify.submit') }}" method="POST" class="flex flex-col sm:flex-row gap-2 bg-slate-900/90 backdrop-blur-md p-2 rounded-2xl border border-slate-700/80 shadow-2xl">
                            @csrf
                            <div class="relative flex-1">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                                </div>
                                <input 
                                    type="text" 
                                    name="code" 
                                    placeholder="Enter Serial Code (e.g. EDP/TVM24/DCP/065)" 
                                    class="w-full pl-10 pr-3 py-2.5 bg-transparent border-0 text-white font-mono text-xs sm:text-sm font-bold uppercase tracking-wider placeholder-slate-400 focus:outline-none"
                                    required
                                >
                            </div>
                            <button type="submit" class="inline-flex items-center justify-center gap-1.5 px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-bold text-xs tracking-wide transition cursor-pointer shadow-md shadow-blue-600/20">
                                <span>Verify</span>
                                <svg class="w-3.5 h-3.5 text-emerald-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                            </button>
                        </form>
                        <p class="text-[11px] text-slate-400 mt-2 text-center lg:text-left">
                            Instant online verification for over <strong class="text-slate-200">{{ number_format($totalCertificates) }}+</strong> issued credentials.
                        </p>
                    </div>
                </div>

                <!-- Right: Visual Bento Showcase Card -->
                <div class="lg:col-span-5">
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Stat Card 1 -->
                        <div class="bg-slate-900/85 backdrop-blur-md rounded-3xl p-6 border border-slate-800 shadow-2xl relative overflow-hidden group hover:border-blue-500/50 transition">
                            <div class="w-10 h-10 rounded-xl bg-blue-500/15 border border-blue-500/30 text-blue-400 flex items-center justify-center mb-3">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" /></svg>
                            </div>
                            <span class="text-3xl font-black text-white font-heading tracking-tight">{{ number_format($totalCertificates) }}+</span>
                            <p class="text-xs font-bold text-slate-200 mt-1">Credentials Issued</p>
                            <p class="text-[11px] text-slate-400 mt-0.5 leading-snug">Fully validated & tamper-proof historical registry</p>
                        </div>

                        <!-- Stat Card 2 -->
                        <div class="bg-slate-900/85 backdrop-blur-md rounded-3xl p-6 border border-slate-800 shadow-2xl relative overflow-hidden group hover:border-emerald-500/50 transition">
                            <div class="w-10 h-10 rounded-xl bg-emerald-500/15 border border-emerald-500/30 text-emerald-400 flex items-center justify-center mb-3">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                            </div>
                            <span class="text-3xl font-black text-white font-heading tracking-tight">ISO</span>
                            <p class="text-xs font-bold text-slate-200 mt-1">Accredited Body</p>
                            <p class="text-[11px] text-slate-400 mt-0.5 leading-snug">Global quality standards & compliance</p>
                        </div>

                        <!-- Stat Card 3 (Span 2) -->
                        <div class="col-span-2 bg-slate-900/90 backdrop-blur-md text-white rounded-3xl p-6 sm:p-7 shadow-2xl border border-slate-800 relative overflow-hidden">
                            <div class="flex items-center justify-between gap-4">
                                <div>
                                    <span class="inline-block text-[10px] font-bold tracking-wider uppercase px-2.5 py-0.5 rounded bg-blue-500/20 text-blue-300 border border-blue-500/30 mb-2">Indian Trusts Act, 1882 &bull; NSDC Aligned</span>
                                    <h3 class="text-lg font-bold font-heading">Academic Board of Studies</h3>
                                    <p class="text-xs text-slate-300 mt-1 leading-relaxed">
                                        Independent skill development trust delivering vocational & professional courses with national reach across Chennai, Malappuram, and Aluva.
                                    </p>
                                </div>
                                <div class="w-14 h-14 rounded-2xl bg-white/10 flex items-center justify-center shrink-0 border border-white/15">
                                    <svg class="w-7 h-7 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                                </div>
                            </div>
                            <div class="mt-4 pt-4 border-t border-white/10 flex items-center justify-between text-xs text-slate-300">
                                <span>Vocational & Professional Qualifications</span>
                                <a href="{{ route('about') }}" class="text-blue-300 hover:text-white font-semibold flex items-center gap-1">Read Story &rarr;</a>
                            </div>
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
                <div class="flex items-center gap-2.5 self-start md:self-end shrink-0">
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
                <!-- Carousel Scroll Viewport -->
                <div 
                    id="iceedsImageSlider" 
                    class="flex gap-4 sm:gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory py-2 pb-4 [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden"
                >
                    <!-- Slide Items -->
                    @php
                        $sliderImages = [
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
                                'tag' => 'Autonomous Body',
                                'desc' => 'Empowering youth under the Indian Trusts Act, 1882.'
                            ]
                        ];
                    @endphp

                    @foreach($sliderImages as $index => $item)
                        <div 
                            class="slider-card shrink-0 w-[84vw] sm:w-[48vw] md:w-[36vw] lg:w-[29vw] snap-start relative rounded-3xl overflow-hidden bg-slate-900 border border-slate-800 shadow-xl group/card transition-all duration-300 hover:border-slate-600 hover:shadow-blue-900/30"
                            data-index="{{ $index }}"
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

                <!-- Pagination Dots / Indicators -->
                <div class="flex items-center justify-center gap-2 mt-5" id="sliderDotsContainer">
                    @foreach($sliderImages as $index => $item)
                        <button 
                            type="button" 
                            class="slider-dot h-2 rounded-full transition-all duration-300 cursor-pointer {{ $index === 0 ? 'w-8 bg-blue-500' : 'w-2 bg-slate-700 hover:bg-slate-500' }}" 
                            data-dot="{{ $index }}"
                            aria-label="Go to slide {{ $index + 1 }}"
                        ></button>
                    @endforeach
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
                var dots = document.querySelectorAll('.slider-dot');
                var autoTimer = null;
                var isPaused = false;

                if (!slider) return;

                function getScrollStep() {
                    var firstCard = slider.querySelector('.slider-card');
                    return firstCard ? firstCard.offsetWidth + 24 : 320;
                }

                function scrollNext() {
                    var maxScroll = slider.scrollWidth - slider.clientWidth - 15;
                    if (slider.scrollLeft >= maxScroll) {
                        slider.scrollTo({ left: 0, behavior: 'smooth' });
                    } else {
                        slider.scrollBy({ left: getScrollStep(), behavior: 'smooth' });
                    }
                }

                function scrollPrev() {
                    if (slider.scrollLeft <= 15) {
                        slider.scrollTo({ left: slider.scrollWidth, behavior: 'smooth' });
                    } else {
                        slider.scrollBy({ left: -getScrollStep(), behavior: 'smooth' });
                    }
                }

                if (nextBtn) nextBtn.addEventListener('click', function() {
                    scrollNext();
                    resetAutoPlay();
                });

                if (prevBtn) prevBtn.addEventListener('click', function() {
                    scrollPrev();
                    resetAutoPlay();
                });

                dots.forEach(function(dot) {
                    dot.addEventListener('click', function() {
                        var idx = parseInt(dot.getAttribute('data-dot'));
                        var cards = slider.querySelectorAll('.slider-card');
                        if (cards[idx]) {
                            cards[idx].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'start' });
                        }
                        resetAutoPlay();
                    });
                });

                function updateDots() {
                    var scrollLeft = slider.scrollLeft;
                    var step = getScrollStep();
                    var activeIdx = Math.round(scrollLeft / step);
                    if (activeIdx >= dots.length) activeIdx = dots.length - 1;
                    if (activeIdx < 0) activeIdx = 0;

                    dots.forEach(function(d, i) {
                        if (i === activeIdx) {
                            d.className = 'slider-dot h-2 rounded-full transition-all duration-300 w-8 bg-blue-500 cursor-pointer';
                        } else {
                            d.className = 'slider-dot h-2 rounded-full transition-all duration-300 w-2 bg-slate-700 hover:bg-slate-500 cursor-pointer';
                        }
                    });
                }

                var debounceTimer;
                slider.addEventListener('scroll', function() {
                    clearTimeout(debounceTimer);
                    debounceTimer = setTimeout(updateDots, 60);
                }, { passive: true });

                function startAutoPlay() {
                    if (autoTimer) clearInterval(autoTimer);
                    autoTimer = setInterval(function() {
                        if (!isPaused) {
                            scrollNext();
                        }
                    }, 4000);
                }

                function resetAutoPlay() {
                    startAutoPlay();
                }

                slider.addEventListener('mouseenter', function() { isPaused = true; });
                slider.addEventListener('mouseleave', function() { isPaused = false; });
                slider.addEventListener('touchstart', function() { isPaused = true; }, { passive: true });
                slider.addEventListener('touchend', function() {
                    setTimeout(function() { isPaused = false; }, 2000);
                }, { passive: true });

                startAutoPlay();
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
                    <div class="relative rounded-3xl overflow-hidden bg-slate-900 shadow-xl border border-slate-200 aspect-video flex items-center justify-center group">
                        <!-- Poster Background / Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-tr from-slate-950 via-blue-950/80 to-slate-900 opacity-95"></div>
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-center p-6 text-white z-10">
                            <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-white/10 backdrop-blur-md border border-white/30 flex items-center justify-center mb-4 group-hover:scale-110 group-hover:bg-blue-600 transition duration-300 shadow-2xl">
                                <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white ml-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span class="text-xs uppercase font-bold tracking-widest text-blue-300 mb-1">Institutional Documentary</span>
                            <h3 class="text-xl sm:text-2xl font-bold font-heading max-w-md">Empowering India Through Accredited Skills & Education</h3>
                            <p class="text-xs text-slate-300 mt-2 max-w-sm">Discover how iCEEDS shapes careers and elevates employability standards across disciplines.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

    <!-- LEADERSHIP & MENTORS SECTION -->
    <section class="py-16 sm:py-24 bg-portal-gradient border-b border-slate-200/70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="text-xs font-bold uppercase tracking-wider text-blue-700 bg-blue-50 border border-blue-200/80 px-3 py-1 rounded-full">Academic Directorate</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-950 font-heading tracking-tight mt-3">Leadership & Mentors</h2>
                <p class="mt-3 text-sm text-slate-600">
                    Guided by distinguished academic luminaries dedicated to global benchmarks of excellence.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                @foreach($mentors as $mentor)
                    <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-md shadow-slate-200/40 relative flex flex-col justify-between">
                        <div>
                            <div class="flex items-center gap-4 mb-5">
                                <div class="relative w-16 h-16 rounded-2xl overflow-hidden border border-slate-200 shadow-md shrink-0 bg-slate-100">
                                    @if(!empty($mentor['image']))
                                        <img src="{{ asset($mentor['image']) }}" alt="{{ $mentor['name'] }}" class="w-full h-full object-cover object-top">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-tr from-slate-900 to-blue-900 text-white font-heading font-black text-xl flex items-center justify-center">
                                            {{ $mentor['initials'] }}
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <h3 class="text-xl font-extrabold text-slate-900 font-heading">{{ $mentor['name'] }}</h3>
                                    <p class="text-xs font-bold text-blue-700">{{ $mentor['role'] }}</p>
                                    <span class="inline-block text-[11px] font-mono text-slate-500 font-medium mt-0.5">{{ $mentor['credentials'] }}</span>
                                </div>
                            </div>
                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed italic border-l-2 border-blue-500 pl-4 py-1">
                                &ldquo;{{ $mentor['message'] }}&rdquo;
                            </p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-400">
                            <span class="font-medium">Attributed to: <strong class="text-slate-700">{{ $mentor['attribution'] }}</strong></span>
                            <span class="font-mono text-[11px]">iCEEDS Directorate</span>
                        </div>
                    </div>
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
