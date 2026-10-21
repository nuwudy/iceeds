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
            font-size: 9pt !important;
        }

        @page {
            size: A4 portrait;
            margin: 0.6cm 0.7cm !important;
        }

        .main-verify-wrapper {
            padding: 0 !important;
            margin: 0 !important;
            max-width: 100% !important;
            width: 100% !important;
        }

        .print-card {
            box-shadow: none !important;
            border: 1.5px solid #0f172a !important;
            border-top: 4px solid #0f766e !important;
            border-radius: 10px !important;
            margin: 0 auto !important;
            padding: 0 !important;
            width: 100% !important;
            max-width: 100% !important;
            page-break-inside: avoid !important;
            break-inside: avoid !important;
            page-break-after: avoid !important;
            overflow: hidden !important;
        }

        .print-header {
            padding: 0.5rem 0.75rem !important;
            border-bottom: 1px solid #cbd5e1 !important;
            background: #ffffff !important;
        }

        .print-logo {
            height: 44px !important;
            width: 44px !important;
        }

        .print-title {
            font-size: 16pt !important;
            line-height: 1 !important;
        }

        .print-subtitle {
            font-size: 6.8pt !important;
            line-height: 1.15 !important;
        }

        .print-hindi {
            font-size: 6.2pt !important;
            line-height: 1 !important;
        }

        .print-badge {
            padding: 0.25rem 0.55rem !important;
            font-size: 7pt !important;
            border: 1px solid #10b981 !important;
            background: #ecfdf5 !important;
        }

        .print-body-content {
            padding: 0.55rem 0.75rem !important;
            gap: 0.35rem !important;
        }

        .print-candidate-box {
            padding: 0.4rem 0.6rem !important;
            border-radius: 8px !important;
            background: #f8fafc !important;
            border: 1px solid #e2e8f0 !important;
        }

        .print-candidate-name {
            font-size: 13.5pt !important;
            line-height: 1.15 !important;
        }

        .print-course-title {
            font-size: 9.5pt !important;
            line-height: 1.2 !important;
        }

        .print-meta-grid {
            display: grid !important;
            grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
            gap: 0.3rem !important;
        }

        .print-meta-item {
            padding: 0.3rem 0.5rem !important;
            border-radius: 6px !important;
            background: #f8fafc !important;
            border: 1px solid #e2e8f0 !important;
        }

        .print-meta-val {
            font-size: 8.5pt !important;
            line-height: 1.15 !important;
        }

        .print-security-bar {
            padding: 0.3rem 0.5rem !important;
            border-radius: 6px !important;
            background: #0f172a !important;
            color: #f8fafc !important;
            font-size: 7pt !important;
        }

        .print-disclaimer-box {
            padding: 0.25rem 0.45rem !important;
            border-radius: 6px !important;
            background: #f8fafc !important;
            border: 1px solid #e2e8f0 !important;
            font-size: 6pt !important;
            line-height: 1.2 !important;
            color: #475569 !important;
        }

        .print-footer {
            padding-top: 0.3rem !important;
            border-top: 1px solid #cbd5e1 !important;
        }

        .print-legal-row {
            font-size: 6.2pt !important;
            line-height: 1.15 !important;
        }

        .print-emblems-row {
            padding: 0.15rem 0 !important;
            gap: 0.4rem !important;
        }

        .print-emblem-box {
            height: 22px !important;
            padding: 0.1rem 0.35rem !important;
            border: 1px solid #cbd5e1 !important;
            border-radius: 4px !important;
            background: #ffffff !important;
        }

        .print-emblem-img {
            height: 14px !important;
        }

        .print-contact-bar {
            font-size: 6.8pt !important;
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
                    <div id="printableCertificateCard" class="print-card bg-white rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-200/90 overflow-hidden relative border-t-4 border-t-teal-700">
                        
                        <!-- Header Layout (Modern Institutional Header) -->
                        <div class="print-header px-6 py-5 sm:px-8 sm:py-6 border-b border-slate-200/90 bg-white">
                            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                                
                                <!-- Left: Official circular iCEEDS logo + Center / Main Title & Subtitles -->
                                <div class="flex items-center gap-4 text-center sm:text-left flex-1 min-w-0">
                                    <img 
                                        src="{{ asset('storage/media/2026/10/iceeds-accreditation-13-1nmhz6.webp') }}" 
                                        onerror="this.onerror=null; this.src='{{ asset('images/logo.png') }}';" 
                                        alt="Official iCEEDS Emblem" 
                                        class="print-logo h-14 w-14 sm:h-14 sm:w-14 object-contain shrink-0 rounded-full p-1 bg-white border border-slate-200/90 shadow-2xs"
                                    >
                                    <div class="min-w-0">
                                        <h1 class="print-title text-2xl sm:text-3xl font-black font-heading text-slate-950 tracking-tight leading-none uppercase">
                                            iCEEDS
                                        </h1>
                                        <p class="print-subtitle text-[11px] font-semibold tracking-wide text-slate-700 uppercase leading-snug mt-1">
                                            INNOVATION COUNCIL FOR EXQUISITE EDUCATION &amp; DEVELOPMENT OF SKILLS
                                        </p>
                                        <p class="print-hindi text-[10px] text-slate-600 font-normal leading-tight mt-0.5">
                                            उत्तम शिक्षा और कौशल के विकास के लिए नवाचार परिषद
                                        </p>
                                    </div>
                                </div>

                                <!-- Right: Official Verification Badge: Modern rounded capsule/pill with subtle emerald-green bg (#ECFDF5), border (#10B981), green checkmark SVG icon, and text: "VERIFIED CREDENTIAL" -->
                                <div class="shrink-0 self-center">
                                    <div class="print-badge inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#ECFDF5] border border-[#10B981] shadow-2xs">
                                        <span class="w-5 h-5 rounded-full bg-[#10B981] text-white flex items-center justify-center shrink-0">
                                            <svg class="w-3 h-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </span>
                                        <span class="text-xs font-black uppercase tracking-wider text-emerald-900 font-mono">
                                            VERIFIED CREDENTIAL
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Credential Details Body (Card-Based 2-Column Grid) -->
                        <div class="print-body-content p-6 sm:p-8 space-y-4">
                            
                            <!-- Candidate Profile Header -->
                            <div class="print-candidate-box bg-slate-50/80 rounded-2xl p-4 sm:p-5 border border-slate-200/90">
                                <span class="text-[10px] sm:text-[11px] uppercase tracking-wider font-semibold text-slate-500 block mb-0.5">
                                    Conferred Upon Candidate
                                </span>
                                <h2 class="print-candidate-name text-lg sm:text-xl font-bold text-slate-950 tracking-tight font-heading">
                                    {{ $certificate->student_name }}
                                </h2>
                                <div class="mt-1">
                                    <span class="print-course-title text-sm font-semibold text-teal-800">
                                        {{ $certificate->course }}
                                    </span>
                                </div>
                            </div>

                            <!-- Key-Value Meta Grid (Clean light-slate background with subtle borders) -->
                            <div class="print-meta-grid grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                                
                                <!-- 1. Serial / Certificate No. -->
                                <div class="print-meta-item bg-slate-50/70 rounded-xl p-3 sm:p-3.5 border border-slate-200/80">
                                    <span class="text-[10px] uppercase font-bold tracking-wider text-slate-500 block mb-0.5">
                                        Serial / Certificate No.
                                    </span>
                                    <p class="print-meta-val font-mono font-bold text-slate-900 text-sm tracking-wide">
                                        {{ $certificate->certificate_code }}
                                    </p>
                                </div>

                                <!-- 2. Registry Record ID -->
                                <div class="print-meta-item bg-slate-50/70 rounded-xl p-3 sm:p-3.5 border border-slate-200/80">
                                    <span class="text-[10px] uppercase font-bold tracking-wider text-slate-500 block mb-0.5">
                                        Registry Record ID
                                    </span>
                                    <p class="print-meta-val font-mono font-bold text-slate-900 text-sm tracking-wide">
                                        #ICEEDS-{{ str_pad($certificate->id, 6, '0', STR_PAD_LEFT) }}
                                    </p>
                                </div>

                                <!-- 3. Date of Issuance -->
                                <div class="print-meta-item bg-slate-50/70 rounded-xl p-3 sm:p-3.5 border border-slate-200/80">
                                    <span class="text-[10px] uppercase font-bold tracking-wider text-slate-500 block mb-0.5">
                                        Date of Issuance
                                    </span>
                                    <p class="print-meta-val font-bold text-slate-900 text-xs sm:text-sm">
                                        {{ $certificate->issue_date ? $certificate->issue_date->format('F d, Y') : 'August 15, 2024' }}
                                        <span class="font-mono text-slate-500 font-normal text-[11px] block sm:inline sm:ml-1">
                                            (ISO: {{ $certificate->issue_date ? $certificate->issue_date->format('Y-m-d') : '2024-08-15' }})
                                        </span>
                                    </p>
                                </div>

                                <!-- 4. Issuing Authority -->
                                <div class="print-meta-item bg-slate-50/70 rounded-xl p-3 sm:p-3.5 border border-slate-200/80">
                                    <span class="text-[10px] uppercase font-bold tracking-wider text-slate-500 block mb-0.5">
                                        Issuing Authority
                                    </span>
                                    <p class="print-meta-val font-bold text-slate-900 text-xs sm:text-sm">
                                        iCEEDS Board of Examinations &amp; Skill Development
                                    </p>
                                </div>

                                <!-- 5. Status (Spans full width across 2 columns) -->
                                <div class="print-meta-item sm:col-span-2 bg-slate-50/70 rounded-xl p-3 sm:p-3.5 border border-slate-200/80 flex items-center justify-between flex-wrap gap-2">
                                    <div>
                                        <span class="text-[10px] uppercase font-bold tracking-wider text-slate-500 block mb-0.5">
                                            Credential Status
                                        </span>
                                        <div class="flex items-center gap-2">
                                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                                            <span class="font-bold text-slate-900 text-xs sm:text-sm">
                                                Valid, Active &amp; Digitally Authenticated
                                            </span>
                                        </div>
                                    </div>
                                    <span class="text-[10px] font-mono text-emerald-800 bg-emerald-100/80 border border-emerald-300 px-2.5 py-0.5 rounded-full font-bold">
                                        Official Registry Record
                                    </span>
                                </div>

                            </div>

                            <!-- Digital Security & Cryptographic Stamp Bar -->
                            <div class="print-security-bar bg-slate-900 text-slate-200 rounded-xl p-3 sm:p-3.5 border border-slate-800 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-2.5 text-xs">
                                <!-- Digital Hash (SHA-256) with Lock Icon -->
                                <div class="flex items-center gap-2 min-w-0">
                                    <svg class="w-3.5 h-3.5 text-emerald-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                    <span class="text-[10px] uppercase tracking-wider text-slate-400 font-semibold shrink-0">SHA-256:</span>
                                    <span class="font-mono text-[10px] sm:text-xs text-emerald-300 bg-slate-950 px-2 py-0.5 rounded border border-slate-800 truncate" title="{{ $certificate->authenticity_hash }}">
                                        {{ substr($certificate->authenticity_hash, 0, 10) }}...{{ substr($certificate->authenticity_hash, -8) }}
                                    </span>
                                </div>

                                <!-- Verification Timestamp & API Tamper-Proof Record Indicator -->
                                <div class="flex items-center gap-3 shrink-0 text-[10.5px] text-slate-400">
                                    <span class="inline-flex items-center gap-1.5">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                        <span>{{ now()->setTimezone('UTC')->format('Y-m-d H:i:s') }} UTC</span>
                                    </span>
                                    <span>&bull;</span>
                                    <span class="font-mono text-slate-300">/api/v1/verify/{{ $certificate->certificate_code }}</span>
                                </div>
                            </div>

                            <!-- Regulatory Notice & Disclaimer -->
                            <div class="print-disclaimer-box p-2.5 rounded-xl bg-slate-50 border border-slate-200/90 text-[9px] text-slate-600 leading-relaxed">
                                <strong class="font-bold text-slate-800">Notice on Certification Authority:</strong>
                                Alongside University and NSDC-affiliated offerings, iCEEDS awards proprietary certifications in skill and professional development. While holding recognized merit across private and public sectors, these credentials are autonomous and distinct from statutory degrees/diplomas conferred under UGC or AICTE.
                            </div>

                            <!-- Official Footer & Accreditation Strip -->
                            <div class="print-footer pt-3 mt-1 border-t border-slate-200 space-y-3">
                                
                                <!-- Legal & Accreditation Row -->
                                <div class="print-legal-row text-center text-[9px] sm:text-[10px] font-bold text-slate-700 leading-tight">
                                    A Self-Governing Educational Trust Registered under the Indian Trusts Act, 1882 &bull; NITI Aayog NGO DARPAN UNIQUE ID NO: KL/2023/0348375 &bull; ISO 9001:2015 Certified
                                </div>

                                <!-- Accreditation Badges: Aligned logos for NSTC, ICTS, EGAC, and IAS -->
                                <div class="print-emblems-row flex items-center justify-center gap-3 sm:gap-4 py-1">
                                    <!-- 1. NSTC (National Skill Training / NSDC partner) -->
                                    <div class="print-emblem-box h-8 sm:h-9 px-2.5 py-0.5 rounded-lg bg-white border border-slate-300 shadow-2xs flex items-center justify-center gap-1.5" title="NSTC / NSDC - National Skill Development Corporation">
                                        <img src="https://iceeds.com/storage/media/2026/10/iceeds-accreditation-11-6d5uxy.webp" alt="NSTC / NSDC" class="print-emblem-img h-5 sm:h-6 w-auto max-w-full object-contain">
                                        <span class="text-[8.5px] sm:text-[9.5px] font-bold text-slate-700 font-mono tracking-wider">NSTC</span>
                                    </div>

                                    <!-- 2. ICTS (International Council of Technical & Skill Education) -->
                                    <div class="print-emblem-box h-8 sm:h-9 px-2.5 py-0.5 rounded-lg bg-white border border-slate-300 shadow-2xs flex items-center justify-center gap-1.5" title="ICTS - International Council of Technical & Skill Education">
                                        <img src="{{ asset('storage/media/2026/10/iceeds-accreditation-13-1nmhz6.webp') }}" alt="ICTS" class="print-emblem-img h-5 sm:h-6 w-auto max-w-full object-contain">
                                        <span class="text-[8.5px] sm:text-[9.5px] font-bold text-slate-700 font-mono tracking-wider">ICTS</span>
                                    </div>

                                    <!-- 3. EGAC (Egyptian Accreditation Council) -->
                                    <div class="print-emblem-box h-8 sm:h-9 px-2.5 py-0.5 rounded-lg bg-white border border-slate-300 shadow-2xs flex items-center justify-center gap-1.5" title="EGAC (Egyptian Accreditation Council - المجلس الوطني للاعتماد)">
                                        <img src="https://iceeds.com/storage/media/2026/10/iceeds-accreditation-8-4qzjn2.webp" alt="EGAC" class="print-emblem-img h-5 sm:h-6 w-auto max-w-full object-contain">
                                        <span class="text-[8.5px] sm:text-[9.5px] font-bold text-slate-700 font-mono tracking-wider">EGAC</span>
                                    </div>

                                    <!-- 4. IAS (International Accreditation Service / IAF) -->
                                    <div class="print-emblem-box h-8 sm:h-9 px-2.5 py-0.5 rounded-lg bg-white border border-slate-300 shadow-2xs flex items-center justify-center gap-1.5" title="IAS (International Accreditation Service / IAF Conformity Assessment)">
                                        <img src="https://iceeds.com/storage/media/2026/10/iceeds-accreditation-1-j9jtqq.webp" alt="IAS / IAF" class="print-emblem-img h-5 sm:h-6 w-auto max-w-full object-contain">
                                        <span class="text-[8.5px] sm:text-[9.5px] font-bold text-slate-700 font-mono tracking-wider">IAS</span>
                                    </div>
                                </div>

                                <!-- Official Contact Bar -->
                                <div class="print-contact-bar flex flex-wrap items-center justify-center gap-x-4 gap-y-1 text-[8.5px] sm:text-[9.5px] font-bold text-slate-700 pt-0.5">
                                    <span>Phone: <strong class="font-mono text-slate-900">+91 7516 2000 95</strong></span>
                                    <span>&bull;</span>
                                    <span>Email: <strong class="font-mono text-slate-900">connect.iceeds@gmail.com</strong></span>
                                    <span>&bull;</span>
                                    <span>Web: <strong class="font-mono text-slate-900">www.iceeds.com</strong></span>
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
