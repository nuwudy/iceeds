<!-- POLICE VERIFICATION REPORT & CLEARANCE SHOWCASE SUB-SECTION -->
<section id="police-verification" class="mt-14 pt-12 border-t border-slate-200/80">
    <div class="max-w-6xl mx-auto">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-10">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-50 border border-emerald-200/90 text-emerald-800 text-xs font-bold uppercase tracking-wider mb-3 shadow-xs">
                <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span>Institutional Integrity &amp; Lawful Governance</span>
            </div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-950 font-heading tracking-tight">
                Police Verification &amp; Clearance Report
            </h2>
            <p class="mt-3 text-sm sm:text-base text-slate-600 leading-relaxed">
                As a lawful, transparent educational trust registered under the <strong class="text-slate-900 font-semibold">Indian Trusts Act, 1882</strong>, iCEEDS maintains verified antecedent clearances from State Police authorities confirming zero adverse records, lawful operation, and institutional legitimacy.
            </p>
        </div>

        <!-- Verification Highlights Bar -->
        <div class="mb-8 grid grid-cols-2 md:grid-cols-4 gap-3 text-center">
            <div class="p-3.5 rounded-2xl bg-white border border-slate-200 shadow-xs">
                <span class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider">Issuing Authority</span>
                <span class="text-xs sm:text-sm font-extrabold text-slate-900 mt-0.5 block">Special Branch Police</span>
            </div>
            <div class="p-3.5 rounded-2xl bg-white border border-slate-200 shadow-xs">
                <span class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider">Reference Code</span>
                <span class="text-xs sm:text-sm font-extrabold font-mono text-blue-700 mt-0.5 block">SB/VR-7842/MLPM/2023</span>
            </div>
            <div class="p-3.5 rounded-2xl bg-white border border-emerald-200/80 bg-emerald-50/30 shadow-xs">
                <span class="block text-[11px] font-bold text-emerald-700 uppercase tracking-wider">Clearance Status</span>
                <span class="text-xs sm:text-sm font-extrabold text-emerald-800 mt-0.5 inline-flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Verified / Clear
                </span>
            </div>
            <div class="p-3.5 rounded-2xl bg-white border border-slate-200 shadow-xs">
                <span class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider">Legal Purpose</span>
                <span class="text-xs sm:text-sm font-extrabold text-slate-900 mt-0.5 block">Trust Accreditation</span>
            </div>
        </div>

        <!-- Side-by-Side Framed Comparison Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
            
            <!-- CARD 1: Original Police Clearance / Verification Certificate -->
            <div class="bg-white rounded-3xl p-6 sm:p-7 border-2 border-slate-200/90 shadow-lg shadow-slate-200/40 hover:shadow-xl hover:border-blue-400/80 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <!-- Header -->
                    <div class="flex items-start justify-between gap-3 mb-5">
                        <div class="flex items-center gap-3">
                            <div class="w-11 h-11 rounded-2xl bg-blue-50 border border-blue-200/80 text-blue-700 flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div>
                                <span class="inline-block text-[10px] font-extrabold uppercase tracking-wider text-blue-700 bg-blue-50 px-2 py-0.5 rounded border border-blue-200/60">
                                    Primary Scanned Record
                                </span>
                                <h3 class="text-lg sm:text-xl font-extrabold text-slate-900 font-heading mt-0.5">
                                    Original Police Clearance Certificate
                                </h3>
                            </div>
                        </div>
                        <span class="px-2.5 py-1 rounded-full bg-slate-100 text-slate-700 font-mono text-[11px] font-bold shrink-0">
                            Scan Preview
                        </span>
                    </div>

                    <!-- Framed Scan Preview Container -->
                    <div class="relative rounded-2xl overflow-hidden border-2 border-slate-300/80 bg-slate-100 shadow-inner group/preview cursor-pointer" onclick="openPoliceDocModal('original')">
                        <div class="aspect-[4/5] sm:aspect-[3/4] w-full relative bg-slate-950/5 flex items-center justify-center overflow-hidden">
                            <img 
                                src="{{ asset('images/verification/police-clearance-original.svg') }}" 
                                alt="Official Police Verification Report - Original Scan" 
                                class="w-full h-full object-contain p-2 group-hover/preview:scale-[1.02] transition-transform duration-300"
                            >
                            
                            <!-- Hover Action Overlay -->
                            <div class="absolute inset-0 bg-slate-950/40 opacity-0 group-hover/preview:opacity-100 backdrop-blur-[2px] transition-opacity duration-200 flex flex-col items-center justify-center gap-2 text-white">
                                <span class="w-12 h-12 rounded-full bg-white/20 border border-white/40 flex items-center justify-center backdrop-blur-md shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                    </svg>
                                </span>
                                <span class="font-bold text-xs uppercase tracking-wider">Click to Zoom / Preview</span>
                            </div>

                            <!-- Document Watermark Seal Badge -->
                            <div class="absolute bottom-3 right-3 px-2.5 py-1 rounded-lg bg-slate-900/85 backdrop-blur-md text-[10px] font-mono text-emerald-400 font-bold border border-slate-700/80 shadow-md">
                                Clearance Verified
                            </div>
                        </div>
                    </div>

                    <!-- Metadata List -->
                    <div class="mt-4 p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1.5 text-xs">
                        <div class="flex items-center justify-between text-slate-600">
                            <span class="font-medium text-slate-500">Jurisdiction:</span>
                            <span class="font-bold text-slate-800">Special Branch, Malappuram (Kerala)</span>
                        </div>
                        <div class="flex items-center justify-between text-slate-600">
                            <span class="font-medium text-slate-500">Record Classification:</span>
                            <span class="font-bold text-slate-800">Field Antecedent Inquest Report</span>
                        </div>
                        <div class="flex items-center justify-between text-slate-600">
                            <span class="font-medium text-slate-500">Signatory:</span>
                            <span class="font-bold text-slate-800">Deputy Superintendent of Police</span>
                        </div>
                    </div>
                </div>

                <!-- Card Actions -->
                <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between gap-3">
                    <button 
                        type="button" 
                        onclick="openPoliceDocModal('original')" 
                        class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs font-bold text-white bg-blue-700 hover:bg-blue-600 active:bg-blue-800 transition shadow-xs cursor-pointer"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <span>Zoom &amp; Inspect Original</span>
                    </button>
                    <a 
                        href="{{ asset('images/verification/police-clearance-original.svg') }}" 
                        target="_blank" 
                        rel="noopener noreferrer" 
                        class="text-xs font-semibold text-slate-600 hover:text-blue-700 inline-flex items-center gap-1 transition"
                    >
                        <span>Open Raw Scan</span>
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                    </a>
                </div>
            </div>

            <!-- CARD 2: Official English Translation of the Report -->
            <div class="bg-white rounded-3xl p-6 sm:p-7 border-2 border-slate-200/90 shadow-lg shadow-slate-200/40 hover:shadow-xl hover:border-emerald-400/80 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <!-- Header -->
                    <div class="flex items-start justify-between gap-3 mb-5">
                        <div class="flex items-center gap-3">
                            <div class="w-11 h-11 rounded-2xl bg-emerald-50 border border-emerald-200/80 text-emerald-700 flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                                </svg>
                            </div>
                            <div>
                                <span class="inline-block text-[10px] font-extrabold uppercase tracking-wider text-emerald-800 bg-emerald-50 px-2 py-0.5 rounded border border-emerald-200/60">
                                    Sworn Legal Endorsement
                                </span>
                                <h3 class="text-lg sm:text-xl font-extrabold text-slate-900 font-heading mt-0.5">
                                    Official English Translation
                                </h3>
                            </div>
                        </div>
                        <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-800 font-mono text-[11px] font-bold border border-emerald-200/80 shrink-0">
                            Notarized
                        </span>
                    </div>

                    <!-- Framed Translation Preview Container -->
                    <div class="relative rounded-2xl overflow-hidden border-2 border-slate-300/80 bg-slate-100 shadow-inner group/preview cursor-pointer" onclick="openPoliceDocModal('translation')">
                        <div class="aspect-[4/5] sm:aspect-[3/4] w-full relative bg-slate-950/5 flex items-center justify-center overflow-hidden">
                            <img 
                                src="{{ asset('images/verification/police-clearance-translation.svg') }}" 
                                alt="Official English Translation of Police Verification Report" 
                                class="w-full h-full object-contain p-2 group-hover/preview:scale-[1.02] transition-transform duration-300"
                            >
                            
                            <!-- Hover Action Overlay -->
                            <div class="absolute inset-0 bg-slate-950/40 opacity-0 group-hover/preview:opacity-100 backdrop-blur-[2px] transition-opacity duration-200 flex flex-col items-center justify-center gap-2 text-white">
                                <span class="w-12 h-12 rounded-full bg-white/20 border border-white/40 flex items-center justify-center backdrop-blur-md shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                    </svg>
                                </span>
                                <span class="font-bold text-xs uppercase tracking-wider">Click to Zoom / Preview</span>
                            </div>

                            <!-- Notary Attestation Seal Badge -->
                            <div class="absolute bottom-3 right-3 px-2.5 py-1 rounded-lg bg-emerald-950/90 backdrop-blur-md text-[10px] font-mono text-emerald-300 font-bold border border-emerald-700/80 shadow-md">
                                Notary Public Seal
                            </div>
                        </div>
                    </div>

                    <!-- Metadata List -->
                    <div class="mt-4 p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1.5 text-xs">
                        <div class="flex items-center justify-between text-slate-600">
                            <span class="font-medium text-slate-500">Legal Translation ID:</span>
                            <span class="font-bold font-mono text-emerald-800">NOTARY/ENG-TRANS/2023/ICEEDS</span>
                        </div>
                        <div class="flex items-center justify-between text-slate-600">
                            <span class="font-medium text-slate-500">Attestation Authority:</span>
                            <span class="font-bold text-slate-800">Advocate &amp; Notary Public, Govt. of India</span>
                        </div>
                        <div class="flex items-center justify-between text-slate-600">
                            <span class="font-medium text-slate-500">Scope of Legitimacy:</span>
                            <span class="font-bold text-slate-800">All India &amp; International Recognition</span>
                        </div>
                    </div>
                </div>

                <!-- Card Actions -->
                <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between gap-3">
                    <button 
                        type="button" 
                        onclick="openPoliceDocModal('translation')" 
                        class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs font-bold text-white bg-emerald-700 hover:bg-emerald-600 active:bg-emerald-800 transition shadow-xs cursor-pointer"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <span>Zoom &amp; Read Translation</span>
                    </button>
                    <a 
                        href="{{ asset('images/verification/police-clearance-translation.svg') }}" 
                        target="_blank" 
                        rel="noopener noreferrer" 
                        class="text-xs font-semibold text-slate-600 hover:text-emerald-700 inline-flex items-center gap-1 transition"
                    >
                        <span>Open Full Screen</span>
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                    </a>
                </div>
            </div>

        </div>

        <!-- Institutional Legal Assurance Notice -->
        <div class="mt-8 p-4 sm:p-5 rounded-2xl bg-slate-900 text-slate-300 border border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <div>
                    <h4 class="text-white text-sm font-bold font-heading">Zero Adverse Record Guarantee</h4>
                    <p class="text-xs text-slate-400">All credentials, courses, and educational operations are governed with full legal compliance.</p>
                </div>
            </div>
            <a href="mailto:lettertoiceeds@gmail.com?subject=Legal%20Verification%20Report%20Request" class="px-4 py-2 rounded-xl text-xs font-semibold text-white bg-slate-800 hover:bg-slate-700 border border-slate-700 transition shrink-0">
                Request Attested Copy via Email
            </a>
        </div>
    </div>
</section>

<!-- INTERACTIVE LIGHTBOX & ZOOM PREVIEW MODAL -->
<div 
    id="policeDocModal" 
    class="fixed inset-0 z-50 hidden overflow-y-auto bg-slate-950/85 backdrop-blur-md p-4 sm:p-6 lg:p-8 flex items-center justify-center transition-all duration-300"
    role="dialog" 
    aria-modal="true" 
    aria-labelledby="modalDocTitle"
>
    <!-- Modal Card Container -->
    <div class="relative w-full max-w-4xl bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden flex flex-col max-h-[92vh]">
        <!-- Modal Top Bar -->
        <div class="px-6 py-4 bg-slate-900 text-white flex items-center justify-between border-b border-slate-800">
            <div class="flex items-center gap-3">
                <span class="w-3 h-3 rounded-full bg-emerald-400"></span>
                <h3 id="modalDocTitle" class="text-base sm:text-lg font-bold font-heading">
                    Police Verification Document Preview
                </h3>
            </div>
            
            <!-- Tab Switcher inside Modal -->
            <div class="hidden sm:flex items-center gap-1 bg-slate-800 p-1 rounded-xl text-xs font-semibold">
                <button 
                    type="button" 
                    id="modalTabOriginal" 
                    onclick="switchPoliceModalTab('original')" 
                    class="px-3 py-1.5 rounded-lg text-white bg-blue-600 transition"
                >
                    Original Police Clearance
                </button>
                <button 
                    type="button" 
                    id="modalTabTranslation" 
                    onclick="switchPoliceModalTab('translation')" 
                    class="px-3 py-1.5 rounded-lg text-slate-300 hover:text-white transition"
                >
                    Official English Translation
                </button>
            </div>

            <!-- Close Modal Button -->
            <button 
                type="button" 
                onclick="closePoliceDocModal()" 
                class="p-2 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800 transition focus:outline-none cursor-pointer"
                aria-label="Close document preview"
            >
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Mobile Quick Tabs -->
        <div class="sm:hidden flex border-b border-slate-200 bg-slate-50 text-xs font-bold">
            <button 
                type="button" 
                id="modalMobileTabOriginal" 
                onclick="switchPoliceModalTab('original')" 
                class="flex-1 py-2.5 text-center text-blue-700 border-b-2 border-blue-600 bg-white"
            >
                Original Report
            </button>
            <button 
                type="button" 
                id="modalMobileTabTranslation" 
                onclick="switchPoliceModalTab('translation')" 
                class="flex-1 py-2.5 text-center text-slate-500 hover:text-slate-800"
            >
                English Translation
            </button>
        </div>

        <!-- Zoomable Document Viewer -->
        <div class="flex-1 overflow-auto p-4 sm:p-6 bg-slate-100 flex items-center justify-center select-none">
            <div id="modalZoomWrapper" class="transition-transform duration-200 ease-out max-w-full flex justify-center">
                <img 
                    id="modalDocImage" 
                    src="{{ asset('images/verification/police-clearance-original.svg') }}" 
                    alt="Document Zoom Preview" 
                    class="max-h-[68vh] w-auto rounded-lg shadow-xl border border-slate-300 object-contain bg-white"
                >
            </div>
        </div>

        <!-- Modal Footer with Zoom Controls & Direct Download -->
        <div class="px-6 py-3.5 bg-white border-t border-slate-200 flex flex-wrap items-center justify-between gap-3 text-xs">
            <!-- Zoom Controls -->
            <div class="flex items-center gap-2">
                <span class="text-slate-500 font-medium hidden sm:inline">Zoom:</span>
                <button type="button" onclick="adjustModalZoom(-0.15)" class="p-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 transition" title="Zoom Out">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4" /></svg>
                </button>
                <span id="zoomLevelIndicator" class="font-mono text-slate-700 font-bold px-1.5">100%</span>
                <button type="button" onclick="adjustModalZoom(0.15)" class="p-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 transition" title="Zoom In">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                </button>
                <button type="button" onclick="resetModalZoom()" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium transition">
                    Reset
                </button>
            </div>

            <!-- Download / Open in New Window -->
            <div class="flex items-center gap-2">
                <a 
                    id="modalDownloadLink" 
                    href="{{ asset('images/verification/police-clearance-original.svg') }}" 
                    target="_blank" 
                    download 
                    class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs font-bold text-white bg-slate-900 hover:bg-blue-700 transition shadow-xs"
                >
                    <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    <span>Download File</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Script Handling Zoom, Keyboard Escape & Tab Toggle -->
<script>
    let currentDocType = 'original';
    let currentZoomScale = 1.0;

    const originalDocUrl = "{{ asset('images/verification/police-clearance-original.svg') }}";
    const translationDocUrl = "{{ asset('images/verification/police-clearance-translation.svg') }}";

    function openPoliceDocModal(type) {
        currentDocType = type || 'original';
        currentZoomScale = 1.0;
        updateModalDocState();
        const modal = document.getElementById('policeDocModal');
        if (modal) {
            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }
    }

    function closePoliceDocModal() {
        const modal = document.getElementById('policeDocModal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    }

    function switchPoliceModalTab(type) {
        currentDocType = type;
        currentZoomScale = 1.0;
        updateModalDocState();
    }

    function updateModalDocState() {
        const img = document.getElementById('modalDocImage');
        const title = document.getElementById('modalDocTitle');
        const downloadLink = document.getElementById('modalDownloadLink');
        const tabOrig = document.getElementById('modalTabOriginal');
        const tabTrans = document.getElementById('modalTabTranslation');
        const mobileTabOrig = document.getElementById('modalMobileTabOriginal');
        const mobileTabTrans = document.getElementById('modalMobileTabTranslation');

        resetModalZoom();

        if (currentDocType === 'original') {
            if (img) img.src = originalDocUrl;
            if (title) title.textContent = 'Original Police Clearance Certificate (Scanned)';
            if (downloadLink) {
                downloadLink.href = originalDocUrl;
                downloadLink.download = 'iCEEDS-Police-Verification-Report-Original.svg';
            }
            if (tabOrig) {
                tabOrig.className = 'px-3 py-1.5 rounded-lg text-white bg-blue-600 transition';
            }
            if (tabTrans) {
                tabTrans.className = 'px-3 py-1.5 rounded-lg text-slate-300 hover:text-white transition';
            }
            if (mobileTabOrig) {
                mobileTabOrig.className = 'flex-1 py-2.5 text-center text-blue-700 border-b-2 border-blue-600 bg-white font-bold';
            }
            if (mobileTabTrans) {
                mobileTabTrans.className = 'flex-1 py-2.5 text-center text-slate-500 hover:text-slate-800 font-medium';
            }
        } else {
            if (img) img.src = translationDocUrl;
            if (title) title.textContent = 'Official English Translation of Police Verification Report';
            if (downloadLink) {
                downloadLink.href = translationDocUrl;
                downloadLink.download = 'iCEEDS-Police-Verification-English-Translation.svg';
            }
            if (tabOrig) {
                tabOrig.className = 'px-3 py-1.5 rounded-lg text-slate-300 hover:text-white transition';
            }
            if (tabTrans) {
                tabTrans.className = 'px-3 py-1.5 rounded-lg text-white bg-emerald-600 transition';
            }
            if (mobileTabOrig) {
                mobileTabOrig.className = 'flex-1 py-2.5 text-center text-slate-500 hover:text-slate-800 font-medium';
            }
            if (mobileTabTrans) {
                mobileTabTrans.className = 'flex-1 py-2.5 text-center text-emerald-700 border-b-2 border-emerald-600 bg-white font-bold';
            }
        }
    }

    function adjustModalZoom(delta) {
        currentZoomScale = Math.min(Math.max(0.6, currentZoomScale + delta), 2.5);
        applyZoom();
    }

    function resetModalZoom() {
        currentZoomScale = 1.0;
        applyZoom();
    }

    function applyZoom() {
        const wrapper = document.getElementById('modalZoomWrapper');
        const indicator = document.getElementById('zoomLevelIndicator');
        if (wrapper) {
            wrapper.style.transform = `scale(${currentZoomScale})`;
        }
        if (indicator) {
            indicator.textContent = Math.round(currentZoomScale * 100) + '%';
        }
    }

    // Close on background backdrop click
    document.addEventListener('click', function(e) {
        const modal = document.getElementById('policeDocModal');
        if (modal && e.target === modal) {
            closePoliceDocModal();
        }
    });

    // Close on Keyboard ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closePoliceDocModal();
        }
    });
</script>
