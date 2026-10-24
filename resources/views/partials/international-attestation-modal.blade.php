<!-- ========================================================================= -->
<!-- GLOBAL INTERACTIVE LIGHTBOX MODAL: UAE EMBASSY & MEA ATTESTATION PROOF -->
<!-- ========================================================================= -->
<div 
    id="attestationProofModal" 
    class="fixed inset-0 z-[99999] hidden bg-slate-950/85 backdrop-blur-md p-2 sm:p-4 lg:p-6 flex items-center justify-center transition-all duration-300"
    role="dialog" 
    aria-modal="true" 
    aria-labelledby="attestationModalDocTitle"
    onclick="handleAttestationModalBackdrop(event)"
>
    <!-- Modal Card Container -->
    <div class="relative w-full max-w-5xl bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden flex flex-col max-h-[94vh]" onclick="event.stopPropagation()">
        
        <!-- Modal Top Bar -->
        <div class="px-5 sm:px-7 py-4 bg-slate-900 text-white flex flex-wrap items-center justify-between gap-3 border-b border-slate-800 shrink-0">
            <div class="flex items-center gap-2.5">
                <span class="w-3 h-3 rounded-full bg-emerald-400 animate-pulse"></span>
                <div>
                    <h3 id="attestationModalDocTitle" class="text-sm sm:text-base font-extrabold font-heading text-white flex items-center gap-2 flex-wrap">
                        <span>UAE Embassy &amp; MEA Digital Attestation Proof</span>
                        <span class="text-[10px] bg-emerald-500/20 text-emerald-300 font-mono px-2 py-0.5 rounded-full border border-emerald-500/30 font-bold">Validated</span>
                    </h3>
                    <p class="text-[11px] text-slate-400 font-mono">
                        Ref: AEDA0906222411677014E50 &bull; MEA &amp; UAE MOFA Electronic Verification
                    </p>
                </div>
            </div>
            
            <!-- Tab Controls -->
            <div class="flex items-center gap-1 bg-slate-800 p-1 rounded-xl text-xs font-bold">
                <button 
                    type="button" 
                    id="attestTabMea" 
                    onclick="switchAttestationTab('mea')" 
                    class="px-3 py-1.5 rounded-lg text-white bg-teal-700 transition flex items-center gap-1.5 cursor-pointer"
                >
                    <svg class="w-3.5 h-3.5 text-teal-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                    <span>Doc A: MEA &amp; SDM</span>
                </button>
                <button 
                    type="button" 
                    id="attestTabUae" 
                    onclick="switchAttestationTab('uae')" 
                    class="px-3 py-1.5 rounded-lg text-slate-300 hover:text-white transition flex items-center gap-1.5 cursor-pointer"
                >
                    <svg class="w-3.5 h-3.5 text-amber-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                    <span>Doc B: UAE MOFA</span>
                </button>
                <button 
                    type="button" 
                    id="attestTabSplit" 
                    onclick="switchAttestationTab('split')" 
                    class="hidden md:flex px-3 py-1.5 rounded-lg text-slate-300 hover:text-white transition items-center gap-1.5 cursor-pointer"
                >
                    <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" /></svg>
                    <span>Side-by-Side</span>
                </button>
            </div>

            <!-- Modal Action Buttons -->
            <div class="flex items-center gap-2">
                <a 
                    href="{{ asset('documents/iceeds-uae-embassy-attestation-sample.pdf') }}" 
                    target="_blank" 
                    class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-bold text-slate-200 bg-slate-800 hover:bg-slate-700 hover:text-white transition border border-slate-700"
                    title="Download Official Sample PDF"
                >
                    <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
                    <span>PDF</span>
                </a>

                <button 
                    type="button" 
                    onclick="closeAttestationModal()" 
                    class="p-2 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800 transition focus:outline-none cursor-pointer"
                    aria-label="Close attestation preview"
                >
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Scrollable Modal Body -->
        <div id="attestModalScrollBody" class="flex-1 overflow-y-auto overflow-x-hidden p-4 sm:p-6 bg-slate-100 select-text">
            
            <!-- Quick Verified Notice Header inside modal -->
            <div class="mb-4 p-3.5 rounded-2xl bg-gradient-to-r from-teal-900/90 via-slate-900 to-teal-950 text-white text-xs flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 shadow-sm border border-teal-700/40">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-emerald-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <span>
                        <strong class="text-emerald-300">Genuine Attestation Sample:</strong> Back-page authentication completed via Notary &rarr; SDM (Govt. of NCT of Delhi) &rarr; MEA (Govt. of India) &rarr; UAE Embassy &amp; MOFA.
                    </span>
                </div>
                <a 
                    href="https://verify.mofa.gov.ae" 
                    target="_blank" 
                    rel="noopener noreferrer" 
                    class="shrink-0 inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-emerald-500/20 text-emerald-300 border border-emerald-400/40 font-bold hover:bg-emerald-500/30 transition text-[11px]"
                >
                    <span>verify.mofa.gov.ae</span>
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                </a>
            </div>

            <!-- VIEW 1: DOCUMENT A - MEA & SDM BACK PANEL -->
            <div id="attestViewMea" class="space-y-4 max-w-4xl mx-auto">
                <div class="bg-white rounded-2xl p-4 sm:p-6 shadow-sm border border-slate-200">
                    <div class="flex items-center justify-between gap-3 mb-4 pb-3 border-b border-slate-100 flex-wrap">
                        <div>
                            <span class="text-[10px] font-extrabold uppercase tracking-wider text-teal-800 bg-teal-50 px-2.5 py-1 rounded border border-teal-200">
                                Document A &bull; Indian MEA &amp; SDM Authentication
                            </span>
                            <h4 class="text-base sm:text-lg font-bold text-slate-900 mt-1 font-heading">
                                Certificate Reverse Page: Notary, SDM Delhi &amp; MEA Official Seals
                            </h4>
                        </div>
                        <span class="font-mono text-xs font-bold text-slate-500 bg-slate-100 px-3 py-1 rounded-full">
                            Ref: AEDA0906222411677014E50
                        </span>
                    </div>

                    <!-- Authenticated Stamps Breakdown Pill Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5 mb-4 text-xs">
                        <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200">
                            <span class="block text-[10px] font-bold text-slate-400 uppercase">1. Notary Public</span>
                            <span class="font-bold text-slate-800">Govt. of India Notary (Entry 46)</span>
                        </div>
                        <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200">
                            <span class="block text-[10px] font-bold text-slate-400 uppercase">2. SDM Authentication</span>
                            <span class="font-bold text-slate-800">Sub-Divisional Magistrate (HQ), South-West Delhi</span>
                        </div>
                        <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200">
                            <span class="block text-[10px] font-bold text-slate-400 uppercase">3. MEA Attestation Seal</span>
                            <span class="font-bold text-slate-800">Ministry of External Affairs, CPV Division, New Delhi</span>
                        </div>
                    </div>

                    <!-- High-Res Image Display Container -->
                    <div class="rounded-2xl overflow-hidden border-2 border-slate-200 bg-slate-50 flex items-center justify-center p-2 sm:p-4">
                        <picture>
                            <source srcset="{{ asset('images/attestation/indian-mea-sdm-attestation.webp') }}" type="image/webp">
                            <img 
                                src="{{ asset('images/attestation/indian-mea-sdm-attestation.jpg') }}" 
                                alt="Official Indian MEA and SDM Delhi Attestation Seal - Certificate Back Panel Preview" 
                                class="w-full max-w-2xl h-auto object-contain rounded-xl shadow-md border border-slate-200"
                                loading="lazy"
                            >
                        </picture>
                    </div>

                    <p class="text-xs text-slate-500 text-center mt-3">
                        Official cropped back panel of iCEEDS student certificate bearing Notary seal, SDM South-West Delhi signature, MEA CPV Division seal (Ref: AEDA0906222411677014E50).
                    </p>
                </div>
            </div>

            <!-- VIEW 2: DOCUMENT B - UAE MOFA DIGITAL ATTESTATION -->
            <div id="attestViewUae" class="hidden space-y-4 max-w-4xl mx-auto">
                <div class="bg-white rounded-2xl p-4 sm:p-6 shadow-sm border border-slate-200">
                    <div class="flex items-center justify-between gap-3 mb-4 pb-3 border-b border-slate-100 flex-wrap">
                        <div>
                            <span class="text-[10px] font-extrabold uppercase tracking-wider text-amber-800 bg-amber-50 px-2.5 py-1 rounded border border-amber-200">
                                Document B &bull; UAE Embassy &amp; MOFA Digital Certificate
                            </span>
                            <h4 class="text-base sm:text-lg font-bold text-slate-900 mt-1 font-heading">
                                United Arab Emirates Ministry of Foreign Affairs (MOFA) Electronic Attestation
                            </h4>
                        </div>
                        <span class="font-mono text-xs font-bold text-emerald-700 bg-emerald-50 border border-emerald-200 px-3 py-1 rounded-full">
                            Official MOFA e-Stamp
                        </span>
                    </div>

                    <!-- Verification Metadata Bar -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5 mb-4 text-xs">
                        <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200">
                            <span class="block text-[10px] font-bold text-slate-400 uppercase">Issuing State</span>
                            <span class="font-bold text-slate-800">United Arab Emirates</span>
                        </div>
                        <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200">
                            <span class="block text-[10px] font-bold text-slate-400 uppercase">Attestation Date</span>
                            <span class="font-bold text-slate-800">13-Sep-2025</span>
                        </div>
                        <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200">
                            <span class="block text-[10px] font-bold text-slate-400 uppercase">Mission &amp; MOFA Fee</span>
                            <span class="font-bold text-slate-800">150 + 150 AED Paid</span>
                        </div>
                        <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200">
                            <span class="block text-[10px] font-bold text-slate-400 uppercase">Digital Status</span>
                            <span class="font-bold text-emerald-700">Officially Recognized ✓</span>
                        </div>
                    </div>

                    <!-- High-Res Image Display Container -->
                    <div class="rounded-2xl overflow-hidden border-2 border-slate-200 bg-slate-50 flex items-center justify-center p-2 sm:p-4">
                        <picture>
                            <source srcset="{{ asset('images/attestation/uae-embassy-mofa-attestation.webp') }}" type="image/webp">
                            <img 
                                src="{{ asset('images/attestation/uae-embassy-mofa-attestation.jpg') }}" 
                                alt="Official UAE Ministry of Foreign Affairs Electronic Attestation Certificate and Verification Stamp" 
                                class="w-full max-w-2xl h-auto object-contain rounded-xl shadow-md border border-slate-200"
                                loading="lazy"
                            >
                        </picture>
                    </div>

                    <div class="mt-4 p-3 bg-amber-50/70 border border-amber-200 rounded-xl text-xs text-amber-900 flex items-start gap-2">
                        <svg class="w-4 h-4 text-amber-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>
                            <strong>Official MOFA Statement:</strong> "The Ministry of Foreign Affairs of the United Arab Emirates certifies that the attestation issued by Ministry of External Affairs, Government of India has been verified. The signature and stamp used are officially recognized." &bull; Public verification link: 
                            <a href="https://verify.mofa.gov.ae" target="_blank" rel="noopener noreferrer" class="font-bold text-blue-700 underline">verify.mofa.gov.ae</a>.
                        </span>
                    </div>
                </div>
            </div>

            <!-- VIEW 3: SPLIT SIDE-BY-SIDE VIEW (DESKTOP) -->
            <div id="attestViewSplit" class="hidden space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    
                    <!-- Side A -->
                    <div class="bg-white rounded-2xl p-4 shadow-sm border border-slate-200 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between gap-2 mb-3 pb-2 border-b border-slate-100">
                                <span class="text-[10px] font-extrabold uppercase tracking-wider text-teal-800 bg-teal-50 px-2 py-0.5 rounded border border-teal-200">
                                    Doc A: Indian MEA &amp; SDM
                                </span>
                                <span class="text-[11px] font-mono font-bold text-slate-500">Ref: AEDA0906222411677014E50</span>
                            </div>
                            <div class="rounded-xl overflow-hidden border border-slate-200 bg-slate-50 p-2">
                                <img 
                                    src="{{ asset('images/attestation/indian-mea-sdm-attestation.webp') }}" 
                                    alt="Doc A: Indian MEA and SDM Authentication" 
                                    class="w-full h-auto object-contain rounded-lg"
                                    loading="lazy"
                                >
                            </div>
                        </div>
                        <div class="mt-3 text-[11px] text-slate-500 text-center font-medium">
                            Notary &bull; SDM South-West Delhi &bull; MEA CPV Division
                        </div>
                    </div>

                    <!-- Side B -->
                    <div class="bg-white rounded-2xl p-4 shadow-sm border border-slate-200 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between gap-2 mb-3 pb-2 border-b border-slate-100">
                                <span class="text-[10px] font-extrabold uppercase tracking-wider text-amber-800 bg-amber-50 px-2 py-0.5 rounded border border-amber-200">
                                    Doc B: UAE Embassy &amp; MOFA
                                </span>
                                <span class="text-[11px] font-mono font-bold text-emerald-700">Digital Seal &bull; 13-Sep-2025</span>
                            </div>
                            <div class="rounded-xl overflow-hidden border border-slate-200 bg-slate-50 p-2">
                                <img 
                                    src="{{ asset('images/attestation/uae-embassy-mofa-attestation.webp') }}" 
                                    alt="Doc B: UAE Embassy and MOFA Digital Certificate" 
                                    class="w-full h-auto object-contain rounded-lg"
                                    loading="lazy"
                                >
                            </div>
                        </div>
                        <div class="mt-3 text-[11px] text-slate-500 text-center font-medium">
                            UAE Embassy New Delhi &bull; MOFA Electronic Verification (verify.mofa.gov.ae)
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Modal Footer Controls -->
        <div class="px-5 sm:px-7 py-3.5 bg-slate-900 border-t border-slate-800 text-slate-300 flex flex-wrap items-center justify-between gap-3 text-xs shrink-0">
            <div class="flex items-center gap-2 text-[11px] text-slate-400">
                <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                <span>Government Authenticated Document &bull; Indian Trusts Act, 1882 Registry</span>
            </div>

            <div class="flex items-center gap-2">
                <a 
                    href="{{ asset('documents/iceeds-uae-embassy-attestation-sample.pdf') }}" 
                    download="iCEEDS-UAE-Embassy-Attestation-Sample.pdf"
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-bold text-white bg-teal-700 hover:bg-teal-600 transition"
                >
                    <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
                    <span>Download Attestation PDF</span>
                </a>
                <button 
                    type="button" 
                    onclick="closeAttestationModal()" 
                    class="px-3 py-1.5 rounded-lg text-xs font-bold text-slate-300 hover:text-white bg-slate-800 hover:bg-slate-700 transition"
                >
                    Close Preview
                </button>
            </div>
        </div>

    </div>
</div>

<script>
    function openAttestationModal(tab) {
        const modal = document.getElementById('attestationProofModal');
        if (modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            if (tab) {
                switchAttestationTab(tab);
            }
        }
    }

    function closeAttestationModal() {
        const modal = document.getElementById('attestationProofModal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    }

    function handleAttestationModalBackdrop(event) {
        if (event.target && event.target.id === 'attestationProofModal') {
            closeAttestationModal();
        }
    }

    function switchAttestationTab(tab) {
        const viewMea = document.getElementById('attestViewMea');
        const viewUae = document.getElementById('attestViewUae');
        const viewSplit = document.getElementById('attestViewSplit');
        const btnMea = document.getElementById('attestTabMea');
        const btnUae = document.getElementById('attestTabUae');
        const btnSplit = document.getElementById('attestTabSplit');

        if (!viewMea || !viewUae) return;

        // Reset visibility
        viewMea.classList.add('hidden');
        viewUae.classList.add('hidden');
        if (viewSplit) viewSplit.classList.add('hidden');

        // Reset button states
        [btnMea, btnUae, btnSplit].forEach(btn => {
            if (btn) {
                btn.classList.remove('bg-teal-700', 'text-white');
                btn.classList.add('text-slate-300', 'hover:text-white');
            }
        });

        if (tab === 'mea') {
            viewMea.classList.remove('hidden');
            if (btnMea) {
                btnMea.classList.add('bg-teal-700', 'text-white');
                btnMea.classList.remove('text-slate-300', 'hover:text-white');
            }
        } else if (tab === 'uae') {
            viewUae.classList.remove('hidden');
            if (btnUae) {
                btnUae.classList.add('bg-teal-700', 'text-white');
                btnUae.classList.remove('text-slate-300', 'hover:text-white');
            }
        } else if (tab === 'split' && viewSplit) {
            viewSplit.classList.remove('hidden');
            if (btnSplit) {
                btnSplit.classList.add('bg-teal-700', 'text-white');
                btnSplit.classList.remove('text-slate-300', 'hover:text-white');
            }
        }
    }

    // Keyboard listener for Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const modal = document.getElementById('attestationProofModal');
            if (modal && !modal.classList.contains('hidden')) {
                closeAttestationModal();
            }
        }
    });
</script>
