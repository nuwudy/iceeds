@extends('layouts.app')

@section('title')
@if(isset($certificate) && $certificate)
Verified: {{ $certificate->student_name }} ({{ $certificate->certificate_code }}) - iCEEDS
@elseif(isset($searched) && $searched)
Credential Verification Not Found - iCEEDS
@else
Official Certificate Verification Portal - iCEEDS
@endif
@endsection

@section('meta_description', 'Verify student diplomas, credentials, and accredited certifications issued by iCEEDS.')

@push('styles')
<style>
    /* Dedicated Print Stylesheet */
    @media print {
        body {
            background: #ffffff !important;
            color: #0f172a !important;
            font-size: 12pt;
        }
        .no-print {
            display: none !important;
        }
        .print-only {
            display: block !important;
        }
        .print-card {
            box-shadow: none !important;
            border: 2px solid #0f172a !important;
            margin: 0 !important;
            padding: 1.5rem !important;
            width: 100% !important;
            max-width: 100% !important;
            page-break-inside: avoid;
        }
        @page {
            size: A4 portrait;
            margin: 1.5cm;
        }
    }
</style>
@endpush

@section('content')
    <div class="max-w-5xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">

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
                    Verify Student Credentials
                </h1>
                <p class="mt-3 text-base text-slate-600 leading-relaxed">
                    Verify diplomas, certificates, and accredited training credentials issued by <strong class="font-semibold text-slate-800">iCEEDS</strong> in real time.
                </p>
            </div>

            <!-- Search Form Card -->
            <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-200/80 p-3 sm:p-4 transition-all duration-200 hover:shadow-2xl">
                <form action="{{ route('verify.submit') }}" method="POST" id="verifyForm" class="flex flex-col sm:flex-row gap-2.5">
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
                            placeholder="Enter Certificate Serial (e.g., EDP/TVM24/DCP/065)" 
                            class="w-full pl-11 pr-4 py-3.5 bg-slate-50/70 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 font-mono text-sm sm:text-base font-semibold focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition uppercase tracking-wider"
                            required
                            autocomplete="off"
                            spellcheck="false"
                            autofocus
                        >
                    </div>
                    <button 
                        type="submit" 
                        class="inline-flex items-center justify-center gap-2 px-7 py-3.5 bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white font-semibold text-sm sm:text-base rounded-xl shadow-lg shadow-emerald-600/25 hover:shadow-emerald-600/35 transition-all duration-150 cursor-pointer"
                    >
                        <span>Verify Record</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </form>

                <!-- Quick Test Badges for instant testing -->
                <div class="mt-3.5 pt-3 border-t border-slate-100 flex flex-wrap items-center gap-2 text-xs text-slate-500 px-1">
                    <span class="font-medium text-slate-400">Try sample codes:</span>
                    <button type="button" onclick="fillAndSearch('EDP/TVM24/DCP/065')" class="font-mono text-slate-700 bg-slate-100 hover:bg-emerald-50 hover:text-emerald-700 hover:border-emerald-200 px-2.5 py-1 rounded-md border border-slate-200 transition font-medium cursor-pointer">
                        EDP/TVM24/DCP/065
                    </button>
                    <button type="button" onclick="fillAndSearch('IZZA/MLP24/PDLDM/501')" class="font-mono text-slate-700 bg-slate-100 hover:bg-emerald-50 hover:text-emerald-700 hover:border-emerald-200 px-2.5 py-1 rounded-md border border-slate-200 transition font-medium cursor-pointer">
                        IZZA/MLP24/PDLDM/501
                    </button>
                    <button type="button" onclick="fillAndSearch('IZZA/034/MLP23')" class="font-mono text-slate-700 bg-slate-100 hover:bg-emerald-50 hover:text-emerald-700 hover:border-emerald-200 px-2.5 py-1 rounded-md border border-slate-200 transition font-medium cursor-pointer">
                        IZZA/034/MLP23
                    </button>
                </div>
            </div>
        </section>

        <!-- VERIFICATION RESULTS -->
        @if(isset($searched) && $searched)
            @if(isset($certificate) && $certificate)
                <!-- VERIFIED SUCCESS CARD -->
                <div class="max-w-3xl mx-auto">
                    <!-- Action Bar (Hidden in Print) -->
                    <div class="no-print mb-4 flex flex-wrap items-center justify-between gap-3 bg-white p-3.5 rounded-xl border border-slate-200 shadow-xs">
                        <div class="flex items-center gap-2 text-xs text-slate-600 font-medium">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                            <span>Official Database Record Validated</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <button 
                                type="button" 
                                onclick="copyShareLink()" 
                                id="copyLinkBtn"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-lg transition cursor-pointer"
                            >
                                <svg class="w-3.5 h-3.5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                                <span>Copy Link</span>
                            </button>
                            <button 
                                type="button" 
                                onclick="window.print()" 
                                class="inline-flex items-center gap-1.5 px-3.5 py-1.5 text-xs font-semibold text-white bg-slate-900 hover:bg-slate-800 rounded-lg shadow-xs transition cursor-pointer"
                            >
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                </svg>
                                <span>Print Official Verification Summary</span>
                            </button>
                        </div>
                    </div>

                    <!-- Credential Certificate Card (Printable & Display) -->
                    <div class="print-card bg-white rounded-3xl shadow-xl shadow-slate-200/70 border border-slate-200 overflow-hidden relative">
                        <!-- Watermark / Decorative Pattern -->
                        <div class="absolute -top-12 -right-12 w-64 h-64 bg-emerald-50 rounded-full blur-3xl opacity-60 pointer-events-none"></div>
                        <div class="absolute -bottom-12 -left-12 w-64 h-64 bg-teal-50 rounded-full blur-3xl opacity-60 pointer-events-none"></div>

                        <!-- Certificate Header -->
                        <div class="bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 p-6 sm:p-8 text-white relative">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-14 h-14 rounded-2xl bg-emerald-500/20 border border-emerald-400/30 flex items-center justify-center shrink-0 shadow-inner">
                                        <svg class="w-8 h-8 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-500/20 border border-emerald-400/30 text-emerald-300 text-[11px] font-bold tracking-wider uppercase mb-1">
                                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            Official Digital Credential Verified
                                        </div>
                                        <h2 class="text-xl sm:text-2xl font-bold tracking-tight font-heading">Authentic Certificate Record</h2>
                                        <p class="text-xs text-slate-300">Registered with iCEEDS Central Academic Repository</p>
                                    </div>
                                </div>

                                <div class="text-left sm:text-right">
                                    <span class="text-[11px] uppercase tracking-wider text-slate-400 font-semibold block">Serial Identifier</span>
                                    <span class="font-mono text-emerald-400 font-bold text-base sm:text-lg tracking-wider">{{ $certificate->certificate_code }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Certificate Body Details -->
                        <div class="p-6 sm:p-8 space-y-6">
                            <!-- Student Name Prominent Display -->
                            <div class="bg-slate-50/80 rounded-2xl p-5 border border-slate-100">
                                <span class="text-xs uppercase tracking-wider font-semibold text-slate-400 block mb-1">Conferred Upon Candidate</span>
                                <h3 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-heading">
                                    {{ $certificate->student_name }}
                                </h3>
                                @if($certificate->first_name && $certificate->last_name)
                                    <p class="text-xs text-slate-500 mt-1 font-medium">
                                        First Name: <span class="text-slate-700 font-semibold">{{ $certificate->first_name }}</span> &bull; 
                                        Last Name / Initials: <span class="text-slate-700 font-semibold">{{ $certificate->last_name }}</span>
                                    </p>
                                @endif
                            </div>

                            <!-- Course and Program Details Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="bg-white rounded-xl p-4 border border-slate-200/80 shadow-xs">
                                    <span class="text-xs uppercase tracking-wider font-semibold text-slate-400 block mb-1">Program of Study</span>
                                    <p class="text-base font-bold text-slate-900 leading-snug">
                                        {{ $certificate->course }}
                                    </p>
                                </div>

                                <div class="bg-white rounded-xl p-4 border border-slate-200/80 shadow-xs">
                                    <span class="text-xs uppercase tracking-wider font-semibold text-slate-400 block mb-1">Date of Issuance</span>
                                    <p class="text-base font-bold text-slate-900 font-mono">
                                        {{ $certificate->issue_date ? $certificate->issue_date->format('F d, Y') : 'N/A' }}
                                    </p>
                                    <p class="text-xs text-slate-400 mt-0.5">
                                        Standard ISO: {{ $certificate->issue_date ? $certificate->issue_date->format('Y-m-d') : 'N/A' }}
                                    </p>
                                </div>

                                <div class="bg-white rounded-xl p-4 border border-slate-200/80 shadow-xs">
                                    <span class="text-xs uppercase tracking-wider font-semibold text-slate-400 block mb-1">Issuing Authority</span>
                                    <p class="text-sm font-bold text-slate-900">
                                        iCEEDS
                                    </p>
                                    <p class="text-xs text-slate-500">
                                        Institute for Career Enhancement, Employability & Development Studies
                                    </p>
                                </div>

                                <div class="bg-white rounded-xl p-4 border border-slate-200/80 shadow-xs">
                                    <span class="text-xs uppercase tracking-wider font-semibold text-slate-400 block mb-1">Registry Record ID</span>
                                    <p class="text-sm font-bold text-slate-900 font-mono">
                                        #ICEEDS-{{ str_pad($certificate->id, 6, '0', STR_PAD_LEFT) }}
                                    </p>
                                    <p class="text-xs text-emerald-600 font-medium">
                                        Status: Fully Validated & Active
                                    </p>
                                </div>
                            </div>

                            <!-- Digital Authenticity Fingerprint -->
                            <div class="bg-slate-900 text-slate-200 rounded-2xl p-4 sm:p-5 border border-slate-800">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                        <span class="text-xs font-semibold uppercase tracking-wider text-slate-300">Digital Authenticity Hash (SHA-256)</span>
                                    </div>
                                    <span class="text-[10px] bg-emerald-500/20 text-emerald-300 px-2 py-0.5 rounded font-mono">Tamper-Proof</span>
                                </div>
                                <p class="font-mono text-xs text-emerald-300 break-all bg-slate-950/70 p-2.5 rounded-lg border border-slate-800 select-all">
                                    {{ $certificate->authenticity_hash }}
                                </p>
                                <div class="mt-2.5 flex items-center justify-between text-[11px] text-slate-400">
                                    <span>Verification Timestamp: {{ now()->format('Y-m-d H:i:s T') }}</span>
                                    <span class="font-mono">API: /api/v1/verify/{{ $certificate->certificate_code }}</span>
                                </div>
                            </div>

                            <!-- Official Institution Stamp and Disclaimer -->
                            <div class="pt-4 border-t border-slate-200 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 text-xs text-slate-500">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-full border-2 border-dashed border-emerald-600/40 flex items-center justify-center shrink-0 text-emerald-700 font-bold text-[10px] text-center leading-none uppercase p-1">
                                        iCEEDS<br>SEAL
                                    </div>
                                    <p class="leading-relaxed">
                                        This document serves as direct electronic verification of academic credentials registered on the official server of iCEEDS.
                                    </p>
                                </div>
                                <div class="shrink-0 text-right font-mono text-[11px] text-slate-400">
                                    Registry Portal
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Print Button Container -->
                    <div class="no-print mt-6 text-center">
                        <button 
                            type="button" 
                            onclick="window.print()" 
                            class="inline-flex items-center gap-2 px-6 py-3 bg-slate-900 hover:bg-slate-800 text-white font-medium text-sm rounded-xl shadow-md transition cursor-pointer"
                        >
                            <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                            </svg>
                            <span>Save as Official PDF / Print Summary</span>
                        </button>
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
                                            <li>Serial numbers are case-insensitive, but ensure slashes are included (e.g., <code class="font-mono font-bold text-slate-800">EDP/TVM24/DCP/065</code>).</li>
                                            <li>If this credential was issued recently or under an affiliate center, contact the academic administration.</li>
                                        </ul>
                                    </div>

                                    <div class="mt-6 flex flex-wrap items-center gap-3">
                                        <a href="{{ route('verify') }}" class="inline-flex items-center justify-center px-4 py-2.5 text-xs font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-xl transition">
                                            Clear & Try Another Code
                                        </a>
                                        <button type="button" onclick="fillAndSearch('EDP/TVM24/DCP/065')" class="inline-flex items-center justify-center px-4 py-2.5 text-xs font-semibold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 rounded-xl transition cursor-pointer">
                                            Test with Known Sample (EDP/TVM24/DCP/065)
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
            document.getElementById('verifyForm').submit();
        }
    }

    function copyShareLink() {
        const btn = document.getElementById('copyLinkBtn');
        const currentUrl = window.location.href;
        
        navigator.clipboard.writeText(currentUrl).then(() => {
            if (btn) {
                const originalHtml = btn.innerHTML;
                btn.innerHTML = `<span class="text-emerald-600 font-bold">✓ Copied!</span>`;
                setTimeout(() => {
                    btn.innerHTML = originalHtml;
                }, 2000);
            }
        }).catch(err => {
            console.error('Could not copy link: ', err);
        });
    }
</script>
@endpush
