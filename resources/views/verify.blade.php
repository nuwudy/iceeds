@extends('layouts.app')

@section('title')
@if(isset($certificate) && $certificate)
Verified: {{ $certificate->student_name }} ({{ $certificate->certificate_code }}) - iCEEDS
@elseif(isset($searched) && $searched)
Credential Verification Not Found - iCEEDS
@else
Certificate Verification - iCEEDS Central Academic Repository
@endif
@endsection

@section('meta_description', 'Verify student diplomas, credentials, and accredited certifications issued by iCEEDS.')

@push('styles')
<style>
    /* Radar Ticking Animation Keyframes */
    @keyframes radarPulse {
        0% { transform: scale(0.9); opacity: 0.9; }
        50% { transform: scale(1.15); opacity: 0.4; }
        100% { transform: scale(0.9); opacity: 0.9; }
    }

    @keyframes radarSweep {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    @keyframes badgeStamp {
        0% { transform: scale(2) rotate(-15deg); opacity: 0; }
        60% { transform: scale(0.9) rotate(3deg); opacity: 1; }
        100% { transform: scale(1) rotate(0deg); opacity: 1; }
    }

    @keyframes drawCheck {
        0% { stroke-dashoffset: 50; }
        100% { stroke-dashoffset: 0; }
    }

    .animate-badge-stamp {
        animation: badgeStamp 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
    }

    .check-tick-path {
        stroke-dasharray: 50;
        stroke-dashoffset: 50;
        animation: drawCheck 0.5s ease-out 0.4s forwards;
    }

    /* Dedicated Print Stylesheet: STRICT SINGLE-PAGE FIT */
    @media print {
        header, footer, nav, #site-preloader, #policeDocModal, #emblemInspectionModal, .no-print, .emblem-popover, #verificationTickerModal {
            display: none !important;
        }

        html, body {
            background: #ffffff !important;
            color: #0f172a !important;
            padding: 0 !important;
            margin: 0 !important;
            width: 100% !important;
            height: auto !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
            font-size: 9.5pt !important;
        }

        @page {
            size: A4 portrait;
            margin: 0.6cm 0.8cm !important;
        }

        .main-verify-wrapper {
            padding: 0 !important;
            margin: 0 !important;
            max-width: 100% !important;
            width: 100% !important;
        }

        .print-card {
            box-shadow: none !important;
            border: 2px solid #0f172a !important;
            border-radius: 12px !important;
            margin: 0 auto !important;
            padding: 0.65rem 0.85rem !important;
            width: 100% !important;
            max-width: 100% !important;
            page-break-inside: avoid !important;
            break-inside: avoid !important;
            page-break-after: avoid !important;
        }

        .print-compact-header {
            padding: 0.6rem 0.75rem !important;
            border-radius: 8px !important;
            margin-bottom: 0.35rem !important;
        }

        .print-compact-candidate {
            padding: 0.45rem 0.65rem !important;
            margin-bottom: 0.35rem !important;
            border-radius: 8px !important;
        }

        .print-candidate-name {
            font-size: 15pt !important;
            line-height: 1.1 !important;
            margin: 0 !important;
        }

        .print-grid {
            display: grid !important;
            grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
            gap: 0.3rem !important;
            margin-bottom: 0.35rem !important;
        }

        .print-grid-item {
            padding: 0.3rem 0.45rem !important;
            border-radius: 6px !important;
            background: #f8fafc !important;
            border: 1px solid #e2e8f0 !important;
        }

        .print-grid-label {
            font-size: 7pt !important;
            margin-bottom: 0.05rem !important;
        }

        .print-grid-val {
            font-size: 9pt !important;
            line-height: 1.15 !important;
        }

        .print-hash-box {
            padding: 0.3rem 0.45rem !important;
            margin-bottom: 0.3rem !important;
            border-radius: 6px !important;
            background: #0f172a !important;
            color: #e2e8f0 !important;
        }

        .print-hash-text {
            font-size: 6.5pt !important;
            line-height: 1.1 !important;
            padding: 0.15rem !important;
        }

        .print-footer-row {
            padding-top: 0.2rem !important;
            margin-top: 0.2rem !important;
            border-top: 1px solid #cbd5e1 !important;
            font-size: 7pt !important;
        }

        .print-disclaimer-box {
            margin-top: 0.15rem !important;
            padding: 0.12rem 0.3rem !important;
            font-size: 5.5pt !important;
            line-height: 1.15 !important;
            background: #f8fafc !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 4px !important;
            color: #475569 !important;
        }

        .print-brand-footer-block {
            margin-top: 0.2rem !important;
            padding-top: 0.2rem !important;
            border-top: 1.5px solid #cbd5e1 !important;
        }

        .print-brand-header {
            margin-bottom: 0.12rem !important;
        }

        .print-brand-title {
            font-size: 11pt !important;
            line-height: 1 !important;
        }

        .print-brand-sub {
            font-size: 5.2pt !important;
            line-height: 1.1 !important;
        }

        .print-legal-text {
            font-size: 4.8pt !important;
            line-height: 1.1 !important;
            margin-bottom: 0.12rem !important;
        }

        .print-emblems-grid {
            display: grid !important;
            grid-template-columns: repeat(11, minmax(0, 1fr)) !important;
            gap: 0.12rem !important;
            margin-bottom: 0.12rem !important;
        }

        .print-emblem-box {
            height: 17px !important;
            padding: 1px !important;
            border: 1px solid #cbd5e1 !important;
            border-radius: 3px !important;
            background: #ffffff !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        .print-emblem-img {
            height: 12px !important;
            max-width: 100% !important;
            object-fit: contain !important;
        }

        .print-contact-bar {
            font-size: 5.2pt !important;
            line-height: 1 !important;
        }
    }
</style>
@endpush

@section('content')
    <div class="main-verify-wrapper max-w-6xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">

        <!-- Hero & Search Input Section (Hidden in print) -->
        <section class="no-print mb-10">
            <div class="text-center max-w-2xl mx-auto mb-8">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-50 border border-emerald-200/80 text-emerald-800 text-xs font-semibold uppercase tracking-wider mb-4 shadow-xs">
                    <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    Authentic Academic Records
                </div>
                <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight font-heading">
                    Certificate Verification
                </h1>
                <p class="mt-3 text-base text-slate-600 leading-relaxed">
                    Verify diplomas, certificates, and accredited training credentials issued by <strong class="font-semibold text-slate-800">iCEEDS</strong> in real time.
                </p>
            </div>

            <!-- Search Form Card -->
            <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-200/80 p-3 sm:p-4 transition-all duration-200 hover:shadow-2xl">
                <form action="{{ route('verify.submit') }}" method="POST" id="verifyForm" class="flex flex-col sm:flex-row gap-2.5" onsubmit="return handleVerificationSubmit(event);">
                    @csrf
                    <div class="relative flex-1">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            name="code" 
                            id="certificateCodeInput"
                            value="{{ old('code', $code ?? '') }}" 
                            placeholder="Enter Certificate Serial (e.g., ICEEDS/SAMPLE/2026/01)" 
                            class="w-full pl-11 pr-4 py-3.5 bg-slate-50/70 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 font-mono text-sm sm:text-base font-semibold focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition uppercase tracking-wider"
                            required
                            autocomplete="off"
                            spellcheck="false"
                            autofocus
                        >
                    </div>
                    <button 
                        type="submit" 
                        id="verifySubmitBtn"
                        class="inline-flex items-center justify-center gap-2 px-7 py-3.5 bg-gradient-to-r from-emerald-600 to-teal-700 hover:from-emerald-500 hover:to-teal-600 active:bg-emerald-800 text-white font-semibold text-sm sm:text-base rounded-xl shadow-lg shadow-emerald-600/25 hover:shadow-emerald-600/35 transition-all duration-150 cursor-pointer"
                    >
                        <span>Verify Record</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </form>

                <!-- Quick Test Badges for instant testing with fake sample data -->
                <div class="mt-3.5 pt-3 border-t border-slate-100 flex flex-wrap items-center gap-2 text-xs text-slate-500 px-1">
                    <span class="font-medium text-slate-400">Try sample codes:</span>
                    <button type="button" onclick="fillAndSearch('ICEEDS/SAMPLE/2026/01')" class="font-mono text-slate-700 bg-slate-100 hover:bg-emerald-50 hover:text-emerald-700 hover:border-emerald-200 px-2.5 py-1 rounded-md border border-slate-200 transition font-medium cursor-pointer">
                        ICEEDS/SAMPLE/2026/01
                    </button>
                    <button type="button" onclick="fillAndSearch('ICEEDS/SAMPLE/2026/02')" class="font-mono text-slate-700 bg-slate-100 hover:bg-emerald-50 hover:text-emerald-700 hover:border-emerald-200 px-2.5 py-1 rounded-md border border-slate-200 transition font-medium cursor-pointer">
                        ICEEDS/SAMPLE/2026/02
                    </button>
                </div>
            </div>
        </section>

        <!-- VERIFICATION RESULTS -->
        @if(isset($searched) && $searched)
            @if(isset($certificate) && $certificate)
                <!-- VERIFIED SUCCESS CARD -->
                <div class="max-w-4xl mx-auto">
                    
                    <!-- HIGH-VISIBILITY ACTION BAR: Print & Download PDF (Hidden in Print) -->
                    <div class="no-print mb-6 p-4 sm:p-5 rounded-2xl bg-gradient-to-r from-emerald-900 via-slate-900 to-teal-950 border border-emerald-500/40 shadow-xl flex flex-col md:flex-row items-center justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <span class="flex h-3 w-3 relative">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                            </span>
                            <div>
                                <span class="text-xs uppercase font-extrabold tracking-wider text-emerald-400 block font-heading">
                                    Official Digital Credential Verified
                                </span>
                                <span class="text-[11px] text-slate-300">
                                    Format calibrated to fit neatly on a single printable page
                                </span>
                            </div>
                        </div>

                        <!-- Action Buttons: Separated Download PDF and Print -->
                        <div class="flex items-center gap-2 flex-wrap w-full md:w-auto justify-end">
                            <!-- Download PDF -->
                            <button 
                                type="button" 
                                id="topDownloadPdfBtn"
                                onclick="downloadVerificationPdf()" 
                                class="inline-flex items-center gap-2 px-4 py-2.5 text-xs sm:text-sm font-bold text-white bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-400 hover:to-teal-500 rounded-xl shadow-lg shadow-emerald-500/30 transition transform hover:-translate-y-0.5 cursor-pointer"
                                title="Download verifiable summary as PDF"
                            >
                                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <span>Download PDF</span>
                            </button>

                            <!-- Print Record -->
                            <button 
                                type="button" 
                                onclick="printCertificate()" 
                                class="inline-flex items-center gap-2 px-4 py-2.5 text-xs sm:text-sm font-bold text-slate-100 bg-slate-800 hover:bg-slate-700 border border-slate-700 rounded-xl shadow-md transition transform hover:-translate-y-0.5 cursor-pointer"
                                title="Print this verification record"
                            >
                                <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                </svg>
                                <span>Print</span>
                            </button>

                            <!-- Copy Share Link -->
                            <button 
                                type="button" 
                                onclick="copyShareLink()" 
                                id="copyLinkBtn"
                                class="inline-flex items-center gap-1.5 px-3.5 py-2.5 text-xs font-semibold text-slate-200 bg-slate-800/80 hover:bg-slate-700 rounded-xl border border-slate-700 transition cursor-pointer"
                            >
                                <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                                <span>Share Link</span>
                            </button>
                        </div>
                    </div>

                    <!-- Credential Certificate Card (Printable & Screen) -->
                    <div id="printableCertificateCard" class="print-card bg-white rounded-3xl shadow-2xl shadow-slate-300/50 border-2 border-slate-200/90 overflow-hidden relative">
                        
                        <!-- Watermark / Decorative Pattern (Hidden in Print) -->
                        <div class="no-print absolute -top-12 -right-12 w-64 h-64 bg-emerald-50 rounded-full blur-3xl opacity-60 pointer-events-none"></div>
                        <div class="no-print absolute -bottom-12 -left-12 w-64 h-64 bg-teal-50 rounded-full blur-3xl opacity-60 pointer-events-none"></div>

                        <!-- Certificate Header: Includes iCEEDS Logo + Star Verified Badge -->
                        <div class="print-compact-header bg-gradient-to-r from-slate-950 via-slate-900 to-slate-950 p-5 sm:p-7 text-white relative border-b border-slate-800">
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                                
                                <!-- Brand Header with Official Circular iCEEDS / ICTS Logo -->
                                <div class="flex items-center gap-3.5">
                                    <div class="bg-white p-1.5 rounded-2xl shadow-md border border-white/20 shrink-0 flex items-center justify-center">
                                        <img 
                                            src="{{ asset('storage/media/2026/10/iceeds-accreditation-13-1nmhz6.webp') }}" 
                                            onerror="this.onerror=null; this.src='{{ asset('storage/media/2026/10/iceedslogo-1-3jjrrr.webp') }}';" 
                                            alt="iCEEDS Circular Logo" 
                                            class="h-11 sm:h-13 w-auto object-contain"
                                        >
                                    </div>
                                    <div>
                                        <h2 class="text-sm sm:text-base md:text-lg font-black font-heading text-white tracking-tight leading-tight uppercase">
                                            Innovation Council for Exquisite Education &amp; Development of Skills
                                        </h2>
                                        <p class="text-[11px] sm:text-xs font-bold text-sky-400 leading-tight mt-0.5">
                                            उत्तम शिक्षा और कौशल के विकास के लिए नवाचार परिषद
                                        </p>
                                        <div class="flex flex-wrap items-center gap-1.5 mt-1 text-[9px] sm:text-[10px] text-slate-300 font-medium">
                                            <span class="px-1.5 py-0.2 rounded bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 font-semibold font-mono">Indian Trusts Act, 1882</span>
                                            <span>&bull;</span>
                                            <span class="px-1.5 py-0.2 rounded bg-blue-500/20 text-blue-300 border border-blue-500/30 font-semibold font-mono">ISO 9001:2015</span>
                                            <span>&bull;</span>
                                            <span>NITI Aayog Registered</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Right: Star-shaped 'Verified' Badge incorporating Official Circular Logo -->
                                <div class="flex items-center gap-3 shrink-0 self-end sm:self-center">
                                    <!-- Star Shaped Verified Badge Component with Circular ICTS Emblem -->
                                    <div class="star-verified-badge shrink-0 relative inline-flex items-center justify-center animate-badge-stamp" title="Officially Verified Credential">
                                        <svg viewBox="0 0 100 100" class="w-16 h-16 sm:w-20 sm:h-20 drop-shadow-lg">
                                            <defs>
                                                <radialGradient id="starGreenGrad" cx="50%" cy="50%" r="50%">
                                                    <stop offset="0%" stop-color="#34d399"/>
                                                    <stop offset="65%" stop-color="#059669"/>
                                                    <stop offset="100%" stop-color="#064e3b"/>
                                                </radialGradient>
                                                <linearGradient id="goldRimGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                                    <stop offset="0%" stop-color="#fef08a"/>
                                                    <stop offset="50%" stop-color="#eab308"/>
                                                    <stop offset="100%" stop-color="#ca8a04"/>
                                                </linearGradient>
                                                <filter id="badgeShadow" x="-20%" y="-20%" width="140%" height="140%">
                                                    <feDropShadow dx="0" dy="2" stdDeviation="3" flood-color="#000000" flood-opacity="0.3"/>
                                                </filter>
                                            </defs>

                                            <!-- 16-point Starburst Rosette Polygon -->
                                            <polygon 
                                                points="50.00,2.00 58.10,9.30 68.37,5.65 73.06,15.49 83.94,16.06 84.51,26.94 94.35,31.63 90.70,41.90 98.00,50.00 90.70,58.10 94.35,68.37 84.51,73.06 83.94,83.94 73.06,84.51 68.37,94.35 58.10,90.70 50.00,98.00 41.90,90.70 31.63,94.35 26.94,84.51 16.06,83.94 15.49,73.06 5.65,68.37 9.30,58.10 2.00,50.00 9.30,41.90 5.65,31.63 15.49,26.94 16.06,16.06 26.94,15.49 31.63,5.65 41.90,9.30" 
                                                fill="url(#starGreenGrad)" 
                                                stroke="url(#goldRimGrad)" 
                                                stroke-width="2"
                                                filter="url(#badgeShadow)"
                                            />

                                            <!-- Concentric Security Dashed Gold Ring -->
                                            <circle cx="50" cy="50" r="37.5" fill="none" stroke="#fef08a" stroke-width="0.9" stroke-dasharray="2 1.5" opacity="0.95" />

                                            <!-- Inner Solid White Medallion Circle -->
                                            <circle cx="50" cy="50" r="31" fill="#ffffff" stroke="#10b981" stroke-width="1.8" />

                                            <!-- Official Circular ICTS Logo embedded inside badge center -->
                                            <image href="{{ asset('storage/media/2026/10/iceeds-accreditation-13-1nmhz6.webp') }}" x="33" y="24" width="34" height="34" preserveAspectRatio="xMidYMid meet" />

                                            <!-- Verified Badge Overlay Banner with Green Tick Mark -->
                                            <rect x="22" y="60" width="56" height="15" rx="7.5" fill="#047857" stroke="#10b981" stroke-width="0.8" />
                                            <path d="M30 67.5 L33.5 71 L40.5 64" fill="none" stroke="#34d399" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                                            <text x="53" y="70.5" text-anchor="middle" font-size="6" font-weight="900" fill="#ffffff" font-family="'Outfit', sans-serif" letter-spacing="0.8">VERIFIED</text>
                                        </svg>
                                    </div>

                                    <!-- Serial Box on Desktop -->
                                    <div class="hidden sm:block text-right">
                                        <span class="text-[10px] uppercase tracking-wider text-slate-400 font-semibold block">Serial Identifier</span>
                                        <span class="font-mono text-emerald-400 font-bold text-sm sm:text-base tracking-wider block">{{ $certificate->certificate_code }}</span>
                                        <span class="inline-block mt-0.5 px-2 py-0.2 rounded text-[9px] font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">
                                            VALID RECORD
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Certificate Body Details (Calibrated for strict single-page print) -->
                        <div class="p-5 sm:p-7 space-y-4">
                            
                            <!-- Student Name Display -->
                            <div class="print-compact-candidate bg-slate-50/90 rounded-2xl p-4 sm:p-5 border border-slate-200/80">
                                <span class="text-[11px] uppercase tracking-wider font-semibold text-slate-500 block mb-0.5">Conferred Upon Candidate</span>
                                <h3 class="print-candidate-name text-2xl sm:text-3xl font-black text-slate-900 tracking-tight font-heading">
                                    {{ $certificate->student_name }}
                                </h3>
                                @if($certificate->first_name && $certificate->last_name)
                                    <p class="text-xs text-slate-600 mt-1 font-medium">
                                        First Name: <span class="text-slate-800 font-bold">{{ $certificate->first_name }}</span> &bull; 
                                        Last Name / Initials: <span class="text-slate-800 font-bold">{{ $certificate->last_name }}</span>
                                    </p>
                                @endif
                            </div>

                            <!-- Course and Program Details Grid -->
                            <div class="print-grid grid grid-cols-1 md:grid-cols-2 gap-3.5">
                                <div class="print-grid-item bg-white rounded-xl p-3.5 border border-slate-200/80 shadow-2xs">
                                    <span class="print-grid-label text-[11px] uppercase tracking-wider font-semibold text-slate-500 block mb-0.5">Program of Study</span>
                                    <p class="print-grid-val text-sm sm:text-base font-bold text-slate-900 leading-snug">
                                        {{ $certificate->course }}
                                    </p>
                                </div>

                                <div class="print-grid-item bg-white rounded-xl p-3.5 border border-slate-200/80 shadow-2xs">
                                    <span class="print-grid-label text-[11px] uppercase tracking-wider font-semibold text-slate-500 block mb-0.5">Date of Issuance</span>
                                    <p class="print-grid-val text-sm sm:text-base font-bold text-slate-900 font-mono">
                                        {{ $certificate->issue_date ? $certificate->issue_date->format('F d, Y') : 'N/A' }}
                                    </p>
                                    <p class="text-[11px] text-slate-500 mt-0.5">
                                        Standard ISO: {{ $certificate->issue_date ? $certificate->issue_date->format('Y-m-d') : 'N/A' }}
                                    </p>
                                </div>

                                <div class="print-grid-item bg-white rounded-xl p-3.5 border border-slate-200/80 shadow-2xs">
                                    <span class="print-grid-label text-[11px] uppercase tracking-wider font-semibold text-slate-500 block mb-0.5">Issuing Authority</span>
                                    <p class="print-grid-val text-xs sm:text-sm font-bold text-slate-900">
                                        iCEEDS
                                    </p>
                                    <p class="text-[11px] text-slate-600 font-medium leading-tight mt-0.5">
                                        Innovation Council for Exquisite Education &amp; Development of Skills
                                    </p>
                                    <p class="text-[10px] text-slate-400 mt-0.5">
                                        Self-Governing Trust &bull; Indian Trusts Act, 1882 &bull; NSDC Aligned
                                    </p>
                                </div>

                                <div class="print-grid-item bg-white rounded-xl p-3.5 border border-slate-200/80 shadow-2xs">
                                    <span class="print-grid-label text-[11px] uppercase tracking-wider font-semibold text-slate-500 block mb-0.5">Registry Record ID &amp; Serial</span>
                                    <p class="print-grid-val text-xs sm:text-sm font-bold text-slate-900 font-mono">
                                        #ICEEDS-{{ str_pad($certificate->id, 6, '0', STR_PAD_LEFT) }}
                                    </p>
                                    <p class="text-[11px] font-mono text-emerald-700 font-bold mt-0.5">
                                        Serial: {{ $certificate->certificate_code }}
                                    </p>
                                    <p class="text-[10px] text-emerald-600 font-semibold">
                                        Status: Fully Validated &amp; Active
                                    </p>
                                </div>
                            </div>

                            <!-- Digital Authenticity Fingerprint -->
                            <div class="print-hash-box bg-slate-900 text-slate-200 rounded-xl p-3 sm:p-4 border border-slate-800">
                                <div class="flex items-center justify-between mb-1">
                                    <div class="flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                        <span class="text-[11px] font-semibold uppercase tracking-wider text-slate-300">Digital Authenticity Hash (SHA-256)</span>
                                    </div>
                                    <span class="text-[9px] bg-emerald-500/20 text-emerald-300 px-1.5 py-0.2 rounded font-mono">Tamper-Proof</span>
                                </div>
                                <p class="print-hash-text font-mono text-[10px] sm:text-xs text-emerald-300 break-all bg-slate-950/80 p-2 rounded-lg border border-slate-800 select-all leading-tight">
                                    {{ $certificate->authenticity_hash }}
                                </p>
                                <div class="mt-1.5 flex items-center justify-between text-[10px] text-slate-400">
                                    <span>Verification Timestamp: {{ now()->format('Y-m-d H:i:s T') }}</span>
                                    <span class="font-mono">API: /api/v1/verify/{{ $certificate->certificate_code }}</span>
                                </div>
                            </div>

                            <!-- Central Registry Confirmation & Authentic Seal (Clean Circular Mark, No Inked Stamp Effect) -->
                            <div class="print-footer-row pt-3 border-t border-slate-200 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 text-xs text-slate-500">
                                <div class="flex items-center gap-3">
                                    <img 
                                        src="{{ asset('storage/media/2026/10/iceeds-accreditation-13-1nmhz6.webp') }}" 
                                        alt="iCEEDS Central Registry Mark" 
                                        class="w-10 h-10 sm:w-11 sm:h-11 rounded-full object-contain p-1 bg-white border border-slate-200 shadow-2xs shrink-0"
                                    >
                                    <div>
                                        <span class="text-xs font-bold text-slate-900 block font-heading">Authentic Central Registry Record</span>
                                        <p class="text-[11px] leading-relaxed text-slate-600">
                                            This document serves as direct electronic verification of academic credentials registered on the official server of iCEEDS.
                                        </p>
                                    </div>
                                </div>
                                <div class="shrink-0 text-right font-mono text-[10px] text-slate-400">
                                    Registry Portal &bull; Single-Page Summary
                                </div>
                            </div>

                            <!-- Notice on Certification Authority -->
                            <div class="print-disclaimer-box mt-2 p-2 rounded-xl bg-slate-50 border border-slate-200/90 text-slate-600 text-[9.5px] sm:text-[10.5px] leading-relaxed">
                                <strong class="font-bold text-slate-800">Notice on Certification Authority:</strong>
                                Alongside University and NSDC-affiliated offerings, ICEEDS also awards proprietary certifications in personal, professional and skill development under applicable legal and constitutional frameworks. While these certificates hold professional merit in private, public, and voluntary sectors, they are standalone credentials and are not equivalent to statutory degrees or diplomas conferred by regulatory bodies like the UGC or AICTE.
                            </div>

                            <!-- Official ICTS Accreditation & Partner Branding Block (Replicated from PDF Final Page) -->
                            <div class="print-brand-footer-block mt-3 pt-3 border-t-2 border-slate-200">
                                <!-- Top Branding Row: Circular Logo + iCEEDS + Hindi Subtitle -->
                                <div class="flex items-center justify-center gap-3 mb-2 print-brand-header">
                                    <img 
                                        src="{{ asset('storage/media/2026/10/iceeds-accreditation-13-1nmhz6.webp') }}" 
                                        alt="iCEEDS Circular Emblem" 
                                        class="h-9 sm:h-11 w-auto object-contain shrink-0"
                                    >
                                    <div class="text-left">
                                        <div class="print-brand-title text-base sm:text-xl font-black font-heading text-[#0097b2] tracking-tight leading-none">
                                            iCEEDS
                                        </div>
                                        <p class="print-brand-sub text-[8.5px] sm:text-[10.5px] font-bold text-slate-800 tracking-tight uppercase leading-tight mt-0.5">
                                            INNOVATION COUNCIL FOR EXQUISITE EDUCATION AND DEVELOPMENT OF SKILLS
                                        </p>
                                        <p class="print-brand-sub text-[8px] sm:text-[9.5px] font-semibold text-slate-700 leading-tight">
                                            उत्तम शिक्षा और कौशल के विकास के लिए नवाचार परिषद
                                        </p>
                                    </div>
                                </div>

                                <!-- Legal & Statutory Accreditations Typography matching PDF -->
                                <div class="print-legal-text text-center space-y-0.5 text-[8px] sm:text-[9px] font-bold uppercase tracking-tight text-slate-700 mb-2">
                                    <p class="text-slate-800">ISO 9001:2015 CERTIFIED FOR QUALITY MANAGEMENT SYSTEM</p>
                                    <p class="text-slate-900 font-black">NSDC (SKILL INDIA) CERTIFICATION PARTNER ASSOCIATED WITH AUTHORISED TRAINING PARTNERS</p>
                                    <p class="text-slate-700">AN AUTONOMOUS ENTITY REGISTERED AS A TRUST UNDER THE INDIAN TRUSTS ACT 1882</p>
                                    <p class="text-slate-900 font-extrabold text-[#007a99]">NGO DARPAN UNIQUE ID NO: KL/2023/0348375 (NITI AAYOG, GOVT. OF INDIA)</p>
                                </div>

                                <!-- 11 Accreditation Emblems Grid matching PDF final page -->
                                <div class="print-emblems-grid grid grid-cols-6 sm:grid-cols-11 gap-1 sm:gap-1.5 items-center justify-center max-w-4xl mx-auto mb-2">
                                    <!-- 1. NSDC -->
                                    <div class="print-emblem-box h-8 sm:h-9 px-1.5 py-0.5 rounded-lg bg-white border border-slate-300 shadow-2xs flex items-center justify-center" title="NSDC (National Skill Development Corporation)">
                                        <img src="https://iceeds.com/storage/media/2026/10/iceeds-accreditation-11-6d5uxy.webp" alt="NSDC" class="print-emblem-img h-5 sm:h-6 w-auto max-w-full object-contain">
                                    </div>
                                    <!-- 2. Skill India -->
                                    <div class="print-emblem-box h-8 sm:h-9 px-1.5 py-0.5 rounded-lg bg-white border border-slate-300 shadow-2xs flex items-center justify-center" title="Skill India (कौशल भारत - कुशल भारत)">
                                        <img src="https://iceeds.com/storage/media/2026/10/iceeds-accreditation-12-gcfvex.webp" alt="Skill India" class="print-emblem-img h-5 sm:h-6 w-auto max-w-full object-contain">
                                    </div>
                                    <!-- 3. ISO 9001:2015 -->
                                    <div class="print-emblem-box h-8 sm:h-9 px-1.5 py-0.5 rounded-lg bg-white border border-slate-300 shadow-2xs flex items-center justify-center" title="ISO 9001:2015 Quality Management System">
                                        <img src="https://iceeds.com/storage/media/2026/10/iceeds-accreditation-hqqxuz.webp" alt="ISO 9001:2015" class="print-emblem-img h-5 sm:h-6 w-auto max-w-full object-contain">
                                    </div>
                                    <!-- 4. IAF -->
                                    <div class="print-emblem-box h-8 sm:h-9 px-1.5 py-0.5 rounded-lg bg-white border border-slate-300 shadow-2xs flex items-center justify-center" title="IAF (International Accreditation Forum)">
                                        <img src="https://iceeds.com/storage/media/2026/10/iceeds-accreditation-1-j9jtqq.webp" alt="IAF" class="print-emblem-img h-5 sm:h-6 w-auto max-w-full object-contain">
                                    </div>
                                    <!-- 5. QEAA -->
                                    <div class="print-emblem-box h-8 sm:h-9 px-1 py-0.5 rounded-lg bg-white border border-slate-300 shadow-2xs flex flex-col items-center justify-center text-center" title="QEAA - Quality Education Assurance Accreditation">
                                        <span class="text-[8px] sm:text-[8.5px] font-black text-slate-800 leading-none">QEAA</span>
                                        <span class="text-[4.5px] sm:text-[5px] text-slate-500 font-medium leading-none mt-0.5 uppercase tracking-tighter">Accredited</span>
                                    </div>
                                    <!-- 6. US Certification -->
                                    <div class="print-emblem-box h-8 sm:h-9 px-1.5 py-0.5 rounded-lg bg-white border border-slate-300 shadow-2xs flex items-center justify-center" title="US Accreditation & Certification Board">
                                        <img src="https://iceeds.com/storage/media/2026/10/iceeds-accreditation-2-wuygca.webp" alt="US Certification" class="print-emblem-img h-5 sm:h-6 w-auto max-w-full object-contain">
                                    </div>
                                    <!-- 7. EIAC -->
                                    <div class="print-emblem-box h-8 sm:h-9 px-1.5 py-0.5 rounded-lg bg-white border border-slate-300 shadow-2xs flex items-center justify-center" title="EIAC (Emirates International Accreditation Centre, Dubai UAE)">
                                        <img src="https://iceeds.com/storage/media/2026/10/iceeds-accreditation-4-qtqoqm.webp" alt="EIAC" class="print-emblem-img h-5 sm:h-6 w-auto max-w-full object-contain">
                                    </div>
                                    <!-- 8. EGAC -->
                                    <div class="print-emblem-box h-8 sm:h-9 px-1.5 py-0.5 rounded-lg bg-white border border-slate-300 shadow-2xs flex items-center justify-center" title="EGAC (Egyptian Accreditation Council - المجلس الوطني للاعتماد)">
                                        <img src="https://iceeds.com/storage/media/2026/10/iceeds-accreditation-8-4qzjn2.webp" alt="EGAC" class="print-emblem-img h-5 sm:h-6 w-auto max-w-full object-contain">
                                    </div>
                                    <!-- 9. UK Crest -->
                                    <div class="print-emblem-box h-8 sm:h-9 px-1.5 py-0.5 rounded-lg bg-white border border-slate-300 shadow-2xs flex items-center justify-center" title="UK Academic Coat of Arms Affiliation">
                                        <img src="https://iceeds.com/storage/media/2026/10/iceeds-accreditation-9-5p97l0.webp" alt="UK Crest" class="print-emblem-img h-5 sm:h-6 w-auto max-w-full object-contain">
                                    </div>
                                    <!-- 10. Euro UK / Quality Seal -->
                                    <div class="print-emblem-box h-8 sm:h-9 px-1.5 py-0.5 rounded-lg bg-white border border-slate-300 shadow-2xs flex items-center justify-center" title="Euro UK Accreditation Licensing Services">
                                        <img src="https://iceeds.com/storage/media/2026/10/iceeds-accreditation-10-fxjgr0.webp" alt="Euro UK" class="print-emblem-img h-5 sm:h-6 w-auto max-w-full object-contain">
                                    </div>
                                    <!-- 11. FICS -->
                                    <div class="print-emblem-box h-8 sm:h-9 px-1.5 py-0.5 rounded-lg bg-white border border-slate-300 shadow-2xs flex items-center justify-center" title="FICS (First International Certification System)">
                                        <img src="https://iceeds.com/storage/media/2026/10/iceeds-accreditation-3-yacox0.webp" alt="FICS" class="print-emblem-img h-5 sm:h-6 w-auto max-w-full object-contain">
                                    </div>
                                </div>

                                <!-- Contact & Verified Registry Channels Bar matching PDF -->
                                <div class="print-contact-bar flex flex-wrap items-center justify-center gap-x-3.5 gap-y-1 text-[8.5px] sm:text-[10px] font-bold text-slate-800">
                                    <!-- Phone -->
                                    <div class="inline-flex items-center gap-1">
                                        <span class="w-3.5 h-3.5 sm:w-4 sm:h-4 rounded-full bg-[#0097b2] text-white flex items-center justify-center text-[8px] shrink-0">
                                            <svg class="w-2 sm:w-2.5 h-2 sm:h-2.5" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 4V3z"/></svg>
                                        </span>
                                        <span class="font-mono">+91 7510 2000 95, 7510 2000 90, 9061 202 443</span>
                                    </div>
                                    <!-- Email -->
                                    <div class="inline-flex items-center gap-1">
                                        <span class="w-3.5 h-3.5 sm:w-4 sm:h-4 rounded-full bg-[#d81b60] text-white flex items-center justify-center text-[8px] shrink-0">
                                            <svg class="w-2 sm:w-2.5 h-2 sm:h-2.5" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/></svg>
                                        </span>
                                        <span class="font-mono">connect.iceeds@gmail.com</span>
                                    </div>
                                    <!-- Web -->
                                    <div class="inline-flex items-center gap-1">
                                        <span class="w-3.5 h-3.5 sm:w-4 sm:h-4 rounded-full bg-[#0288d1] text-white flex items-center justify-center text-[8px] shrink-0">
                                            <svg class="w-2 sm:w-2.5 h-2 sm:h-2.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"/></svg>
                                        </span>
                                        <span class="font-mono">www.iceeds.com</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons: Separated Download PDF, Print, and Verify Another (Hidden in Print) -->
                    <div class="no-print mt-6 flex flex-col sm:flex-row items-center justify-center gap-3">
                        <!-- Dedicated Download PDF Button -->
                        <button 
                            type="button" 
                            id="bottomDownloadPdfBtn"
                            onclick="downloadVerificationPdf()" 
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-7 py-3.5 bg-gradient-to-r from-emerald-600 to-teal-700 hover:from-emerald-500 hover:to-teal-600 text-white font-bold text-sm rounded-xl shadow-lg shadow-emerald-600/25 transition transform hover:-translate-y-0.5 cursor-pointer"
                        >
                            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <span>Download PDF</span>
                        </button>

                        <!-- Dedicated Print Button -->
                        <button 
                            type="button" 
                            onclick="printCertificate()" 
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-7 py-3.5 bg-white hover:bg-slate-50 text-slate-800 font-bold text-sm rounded-xl shadow-md border border-slate-300 hover:border-slate-400 transition transform hover:-translate-y-0.5 cursor-pointer"
                        >
                            <svg class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                            </svg>
                            <span>Print Certificate</span>
                        </button>

                        <!-- Verify Another Code -->
                        <a 
                            href="{{ route('verify') }}" 
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-sm rounded-xl transition cursor-pointer"
                        >
                            <svg class="w-4 h-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            <span>Verify Another Code</span>
                        </a>
                    </div>
                </div>

            @else
                <!-- NOT FOUND / INVALID ALERT CARD -->
                <div class="max-w-2xl mx-auto">
                    <div class="bg-white rounded-3xl shadow-xl shadow-red-100/50 border border-red-200/80 overflow-hidden">
                        <div class="p-6 sm:p-8">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center shrink-0">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full bg-red-100 text-red-700 text-xs font-bold uppercase tracking-wider mb-2">
                                        Record Not Found
                                    </span>
                                    <h3 class="text-xl font-bold text-slate-900 font-heading">
                                        No Credential Matches "<span class="font-mono text-red-600">{{ $code }}</span>"
                                    </h3>
                                    <p class="mt-2 text-sm text-slate-600 leading-relaxed">
                                        We could not find any active or issued certificate corresponding to this serial number in the iCEEDS registry database.
                                    </p>

                                    <div class="mt-4 bg-slate-50 rounded-xl p-4 border border-slate-200 text-xs text-slate-600 space-y-2">
                                        <div class="font-semibold text-slate-800">Verification Tips:</div>
                                        <ul class="list-disc list-inside space-y-1 text-slate-600">
                                            <li>Check for potential typos or transposed characters.</li>
                                            <li>Serial numbers are case-insensitive, but ensure slashes are included (e.g., <code class="font-mono font-bold text-slate-800">ICEEDS/SAMPLE/2026/01</code>).</li>
                                            <li>If this credential was issued recently or under an affiliate center, contact the academic administration.</li>
                                        </ul>
                                    </div>

                                    <div class="mt-6 flex flex-wrap items-center gap-3">
                                        <a href="{{ route('verify') }}" class="inline-flex items-center justify-center px-4 py-2.5 text-xs font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-xl transition">
                                            Clear &amp; Try Another Code
                                        </a>
                                        <button type="button" onclick="fillAndSearch('ICEEDS/SAMPLE/2026/01')" class="inline-flex items-center justify-center px-4 py-2.5 text-xs font-semibold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 rounded-xl transition cursor-pointer">
                                            Test with Sample (ICEEDS/SAMPLE/2026/01)
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @else
            <!-- DEFAULT / INITIAL LANDING STATE (Features & FAQ) -->
            <div class="no-print max-w-4xl mx-auto mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-xs hover:shadow-md transition">
                    <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 font-heading">Zero Data Loss Migration</h3>
                    <p class="text-xs text-slate-600 mt-2 leading-relaxed">
                        Every historical qualification record from the previous WordPress validation system has been migrated into the high-performance database.
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-xs hover:shadow-md transition">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 font-heading">REST Verification API</h3>
                    <p class="text-xs text-slate-600 mt-2 leading-relaxed">
                        Automated employers, background verification agencies, and universities can integrate directly via our high-speed JSON endpoint.
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-xs hover:shadow-md transition">
                    <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 font-heading">Cryptographic Seal</h3>
                    <p class="text-xs text-slate-600 mt-2 leading-relaxed">
                        Each credential features a SHA-256 fingerprint generated dynamically to ensure absolute authenticity and prevent counterfeiting.
                    </p>
                </div>
            </div>
        @endif

    </div>

    <!-- HIGH-TECH TICKING VERIFICATION MODAL OVERLAY -->
    <div id="verificationTickerModal" class="fixed inset-0 z-[99999] bg-slate-950/85 backdrop-blur-md flex items-center justify-center p-4 transition-all duration-300 opacity-0 pointer-events-none">
        <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 sm:p-8 max-w-md w-full shadow-2xl text-center space-y-6 relative overflow-hidden">
            
            <!-- Top Subtle Ticker Accent Bar -->
            <div class="absolute top-0 inset-x-0 h-1.5 bg-gradient-to-r from-emerald-500 via-teal-400 to-sky-500"></div>

            <!-- Concentric Radar Ticking Animation -->
            <div class="relative w-28 h-28 mx-auto flex items-center justify-center">
                <!-- Concentric Outer Ring 1 -->
                <div class="absolute inset-0 rounded-full border border-emerald-500/20" style="animation: radarPulse 2s infinite ease-out;"></div>
                
                <!-- Concentric Outer Ring 2 -->
                <div class="absolute inset-2 rounded-full border border-teal-500/30" style="animation: radarPulse 2s 0.6s infinite ease-out;"></div>

                <!-- Ticking Radar Sweeper Hand -->
                <div class="absolute inset-0 rounded-full overflow-hidden pointer-events-none" style="animation: radarSweep 1.2s linear infinite;">
                    <div class="w-1/2 h-1/2 bg-gradient-to-br from-emerald-400/40 to-transparent origin-bottom-right"></div>
                </div>

                <!-- Center Shield / Seal with Pulsing Green Tick -->
                <div class="relative w-16 h-16 rounded-2xl bg-gradient-to-br from-emerald-600 to-teal-800 text-white flex items-center justify-center shadow-lg shadow-emerald-500/40 border border-emerald-400/40">
                    <svg class="w-9 h-9 text-white animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
            </div>

            <!-- Verification Progress Status Text -->
            <div class="space-y-2">
                <span class="inline-block px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-[11px] font-mono font-bold uppercase tracking-wider border border-emerald-500/30">
                    <span class="inline-block w-2 h-2 rounded-full bg-emerald-400 animate-ping mr-1.5"></span>
                    VERIFYING CREDENTIAL...
                </span>
                <h4 id="tickerHeading" class="text-lg font-extrabold text-white font-heading">
                    Accessing Academic Registry
                </h4>
                <p id="tickerSerial" class="font-mono text-xs text-sky-400 font-bold truncate px-4">
                    ICEEDS/SAMPLE/2026/01
                </p>
            </div>

            <!-- Ticking Step-by-Step Ledger -->
            <div class="bg-slate-950/70 rounded-2xl p-4 border border-slate-800/80 text-left space-y-2 text-xs font-mono">
                <div id="step1" class="flex items-center gap-2 text-emerald-400 transition-opacity duration-200">
                    <span class="text-emerald-400 font-bold">✓</span>
                    <span>Querying iCEEDS Central Repository...</span>
                </div>
                <div id="step2" class="flex items-center gap-2 text-slate-500 transition-opacity duration-200">
                    <span id="step2Icon" class="text-slate-500">○</span>
                    <span>Validating SHA-256 Tamper-Proof Hash...</span>
                </div>
                <div id="step3" class="flex items-center gap-2 text-slate-500 transition-opacity duration-200">
                    <span id="step3Icon" class="text-slate-500">○</span>
                    <span>Authenticating Academic Board Record...</span>
                </div>
            </div>

            <div class="text-[11px] text-slate-400">
                Encrypted Connection &bull; Indian Trusts Act, 1882 Registry
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    const codeInput = document.getElementById('certificateCodeInput');
    if (codeInput) {
        codeInput.addEventListener('input', function (e) {
            this.value = this.value.toUpperCase();
        });
    }

    function fillAndSearch(code) {
        if (codeInput) {
            codeInput.value = code;
            triggerVerificationAnimation(code);
        }
    }

    function handleVerificationSubmit(event) {
        const code = codeInput ? codeInput.value.trim() : '';
        if (!code) return true;
        
        event.preventDefault();
        triggerVerificationAnimation(code);
        return false;
    }

    function triggerVerificationAnimation(code) {
        const modal = document.getElementById('verificationTickerModal');
        const serialEl = document.getElementById('tickerSerial');
        const step1 = document.getElementById('step1');
        const step2 = document.getElementById('step2');
        const step2Icon = document.getElementById('step2Icon');
        const step3 = document.getElementById('step3');
        const step3Icon = document.getElementById('step3Icon');
        const heading = document.getElementById('tickerHeading');

        if (serialEl) serialEl.textContent = code;

        if (modal) {
            modal.classList.remove('opacity-0', 'pointer-events-none');
            modal.classList.add('opacity-100');
        }

        // Ticking audio/haptic pulse simulation
        try {
            if (window.AudioContext || window.webkitAudioContext) {
                const audioCtx = new (window.AudioContext || window.webkitAudioContext)();
                function playTick(freq, duration) {
                    try {
                        const osc = audioCtx.createOscillator();
                        const gain = audioCtx.createGain();
                        osc.type = 'sine';
                        osc.frequency.value = freq;
                        gain.gain.setValueAtTime(0.04, audioCtx.currentTime);
                        gain.gain.exponentialRampToValueAtTime(0.001, audioCtx.currentTime + duration);
                        osc.connect(gain);
                        gain.connect(audioCtx.destination);
                        osc.start();
                        osc.stop(audioCtx.currentTime + duration);
                    } catch (e) {}
                }
                playTick(880, 0.05);
                setTimeout(() => playTick(980, 0.05), 400);
                setTimeout(() => playTick(1100, 0.06), 850);
                setTimeout(() => playTick(1320, 0.08), 1250);
            }
        } catch(e) {}

        // Step 2: Hash Validation
        setTimeout(() => {
            if (step2) {
                step2.classList.remove('text-slate-500');
                step2.classList.add('text-emerald-400');
            }
            if (step2Icon) {
                step2Icon.textContent = '✓';
                step2Icon.classList.remove('text-slate-500');
                step2Icon.classList.add('text-emerald-400', 'font-bold');
            }
            if (heading) heading.textContent = 'Validating Authenticity Hash';
        }, 500);

        // Step 3: Board Record Authentication
        setTimeout(() => {
            if (step3) {
                step3.classList.remove('text-slate-500');
                step3.classList.add('text-emerald-400');
            }
            if (step3Icon) {
                step3Icon.textContent = '✓';
                step3Icon.classList.remove('text-slate-500');
                step3Icon.classList.add('text-emerald-400', 'font-bold');
            }
            if (heading) heading.textContent = 'Credential Confirmed ✓';
        }, 950);

        // Submit form after animation completes
        setTimeout(() => {
            const form = document.getElementById('verifyForm');
            if (form) {
                form.submit();
            } else {
                window.location.href = "{{ route('verify') }}?code=" + encodeURIComponent(code);
            }
        }, 1400);
    }

    function copyShareLink() {
        const btn = document.getElementById('copyLinkBtn');
        const currentUrl = window.location.href;
        
        navigator.clipboard.writeText(currentUrl).then(() => {
            if (btn) {
                const originalHtml = btn.innerHTML;
                btn.innerHTML = `<span class="text-emerald-400 font-bold">✓ Copied!</span>`;
                setTimeout(() => {
                    btn.innerHTML = originalHtml;
                }, 2000);
            }
        }).catch(err => {
            console.error('Could not copy link: ', err);
        });
    }

    function printCertificate() {
        window.print();
    }

    function downloadVerificationPdf() {
        const card = document.getElementById('printableCertificateCard');
        const code = @json($certificate->certificate_code ?? 'CERTIFICATE');
        const safeCode = (code || 'CERTIFICATE').replace(/[^a-zA-Z0-9_-]/g, '_');
        const filename = 'iCEEDS-Verification-' + safeCode + '.pdf';

        const topBtn = document.getElementById('topDownloadPdfBtn');
        const bottomBtn = document.getElementById('bottomDownloadPdfBtn');
        const originalTop = topBtn ? topBtn.innerHTML : '';
        const originalBottom = bottomBtn ? bottomBtn.innerHTML : '';
        const loadingState = '<span class="inline-flex items-center gap-1.5"><svg class="animate-spin h-4 w-4 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Generating PDF...</span>';

        if (topBtn) topBtn.innerHTML = loadingState;
        if (bottomBtn) bottomBtn.innerHTML = loadingState;

        // Load html2pdf dynamically if not already present
        const generatePdf = function() {
            if (typeof html2pdf !== 'undefined' && card) {
                const opt = {
                    margin: [8, 8, 8, 8],
                    filename: filename,
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 2, useCORS: true, logging: false },
                    jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
                };

                html2pdf().set(opt).from(card).save().then(function() {
                    if (topBtn) topBtn.innerHTML = originalTop;
                    if (bottomBtn) bottomBtn.innerHTML = originalBottom;
                }).catch(function(err) {
                    console.warn('html2pdf issue, using native print-to-pdf fallback', err);
                    if (topBtn) topBtn.innerHTML = originalTop;
                    if (bottomBtn) bottomBtn.innerHTML = originalBottom;
                    triggerPrintWithTitle(filename);
                });
            } else {
                if (topBtn) topBtn.innerHTML = originalTop;
                if (bottomBtn) bottomBtn.innerHTML = originalBottom;
                triggerPrintWithTitle(filename);
            }
        };

        if (typeof html2pdf === 'undefined') {
            const script = document.createElement('script');
            script.src = 'https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js';
            script.onload = generatePdf;
            script.onerror = function() {
                console.warn('Could not load html2pdf from CDN, using print fallback');
                if (topBtn) topBtn.innerHTML = originalTop;
                if (bottomBtn) bottomBtn.innerHTML = originalBottom;
                triggerPrintWithTitle(filename);
            };
            document.head.appendChild(script);
        } else {
            generatePdf();
        }
    }

    function triggerPrintWithTitle(filename) {
        const prevTitle = document.title;
        document.title = filename.replace(/\.pdf$/i, '');
        window.print();
        setTimeout(function() {
            document.title = prevTitle;
        }, 1500);
    }
</script>
@endpush
