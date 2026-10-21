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
                Official Police Enquiry &amp; Verification Report
            </h2>
            <p class="mt-3 text-sm sm:text-base text-slate-600 leading-relaxed">
                Conducted by the <strong class="text-slate-900 font-semibold">Office of the Deputy Superintendent of Police (DySP), Malappuram</strong> pursuant to a petition forwarded from the <strong class="text-slate-900 font-semibold">Hon'ble Chief Minister's Office (CMO), Kerala</strong>. Following comprehensive field inspection and scrutiny of all legal records, the institutional legitimacy, valid governmental authorizations, and lawful operations of iCEEDS are officially confirmed.
            </p>

            <!-- Prominent Popup Trigger Button -->
            <div class="mt-6 flex flex-wrap items-center justify-center gap-3">
                <button 
                    type="button" 
                    onclick="openPoliceDocModal('original')"
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-sm font-extrabold text-white bg-gradient-to-r from-blue-700 via-blue-800 to-indigo-800 hover:from-blue-600 hover:to-indigo-700 shadow-md shadow-blue-900/20 hover:shadow-lg transition cursor-pointer"
                >
                    <svg class="w-5 h-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <span>View Official Police Report (Interactive Popup)</span>
                </button>

        </div>

        <!-- Cute National Emblems Alignment Row Above Police Documents -->
        <div class="max-w-2xl mx-auto mb-8">
            @include('partials.national-emblems-row')
        </div>

        <!-- Verification Highlights Bar -->
        <div class="mb-8 grid grid-cols-2 md:grid-cols-4 gap-3 text-center">
            <div class="p-3.5 rounded-2xl bg-white border border-slate-200 shadow-xs">
                <span class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider">Issuing Authority</span>
                <span class="text-xs sm:text-sm font-extrabold text-slate-900 mt-0.5 block">Dy. Superintendent of Police, Malappuram</span>
            </div>
            <div class="p-3.5 rounded-2xl bg-white border border-slate-200 shadow-xs">
                <span class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider">Official File Reference</span>
                <span class="text-xs sm:text-sm font-extrabold font-mono text-blue-700 mt-0.5 block">No. 43/CMO/SDOM/2026</span>
            </div>
            <div class="p-3.5 rounded-2xl bg-white border border-emerald-200/80 bg-emerald-50/30 shadow-xs">
                <span class="block text-[11px] font-bold text-emerald-700 uppercase tracking-wider">Enquiry Findings</span>
                <span class="text-xs sm:text-sm font-extrabold text-emerald-800 mt-0.5 inline-flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Verified &amp; Lawful Operation
                </span>
            </div>
            <div class="p-3.5 rounded-2xl bg-white border border-slate-200 shadow-xs">
                <span class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider">CMO Petition Ref</span>
                <span class="text-xs sm:text-sm font-extrabold font-mono text-slate-900 mt-0.5 block">G3(d) - 43998/2026/MM</span>
            </div>
        </div>

        <!-- Side-by-Side Framed Showcase Cards -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
            
            <!-- CARD 1: Original Kerala Police Document (Scanned Copy) -->
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
                                    Primary Scanned Document
                                </span>
                                <h3 class="text-lg sm:text-xl font-extrabold text-slate-900 font-heading mt-0.5">
                                    Original Police Report (Malayalam)
                                </h3>
                            </div>
                        </div>
                        <span class="px-2.5 py-1 rounded-full bg-slate-100 text-slate-700 font-mono text-[11px] font-bold shrink-0">
                            Signed Copy
                        </span>
                    </div>

                    <!-- Framed Scan Preview Container with Click to Open Popup -->
                    <div class="relative rounded-2xl overflow-hidden border-2 border-slate-300/80 bg-slate-100 shadow-inner group/preview cursor-pointer" onclick="openPoliceDocModal('original')">
                        <div class="aspect-[3/4] w-full relative bg-slate-950/5 flex items-center justify-center overflow-hidden">
                            <img 
                                src="{{ asset('images/verification/kerala-police-original.jpg') }}?v=20261021v2" 
                                alt="Official Police Verification Report - Original Scan (Kerala Police)" 
                                class="w-full h-full object-contain p-2 group-hover/preview:scale-[1.02] transition-transform duration-300"
                            >
                            
                            <!-- Hover Action Overlay -->
                            <div class="absolute inset-0 bg-slate-950/45 opacity-0 group-hover/preview:opacity-100 backdrop-blur-[2px] transition-opacity duration-200 flex flex-col items-center justify-center gap-2 text-white">
                                <span class="w-14 h-14 rounded-full bg-white/25 border border-white/40 flex items-center justify-center backdrop-blur-md shadow-xl">
                                    <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                    </svg>
                                </span>
                                <span class="font-extrabold text-xs uppercase tracking-wider bg-slate-900/80 px-3 py-1 rounded-full">Click to Open Scrollable Popup</span>
                            </div>

                            <!-- Document Watermark Seal Badge -->
                            <div class="absolute bottom-3 right-3 px-2.5 py-1 rounded-lg bg-slate-900/90 backdrop-blur-md text-[10px] font-mono text-emerald-400 font-bold border border-slate-700/80 shadow-md">
                                Seal of DySP Malappuram
                            </div>
                        </div>
                    </div>

                    <!-- Metadata List -->
                    <div class="mt-4 p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1.5 text-xs">
                        <div class="flex items-center justify-between text-slate-600">
                            <span class="font-medium text-slate-500">Signatory:</span>
                            <span class="font-bold text-slate-800">Subhash Babu K.C., Dy. Superintendent of Police</span>
                        </div>
                        <div class="flex items-center justify-between text-slate-600">
                            <span class="font-medium text-slate-500">Date of Report:</span>
                            <span class="font-bold text-slate-800">29.04.2026</span>
                        </div>
                        <div class="flex items-center justify-between text-slate-600">
                            <span class="font-medium text-slate-500">Official Contact:</span>
                            <span class="font-mono text-slate-800">0483 2734992 &bull; dyspmpm.pol@kerala.gov.in</span>
                        </div>
                    </div>
                </div>

                <!-- Card Actions -->
                <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between gap-3">
                    <button 
                        type="button" 
                        onclick="openPoliceDocModal('original')" 
                        class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl text-xs font-bold text-white bg-blue-700 hover:bg-blue-600 active:bg-blue-800 transition shadow-xs cursor-pointer"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <span>Open in Scrollable Popup</span>
                    <span class="text-xs text-slate-500 font-medium">Official Signed Record</span>
                </div>
            </div>

            <!-- CARD 2: Certified English Translation of the Report -->
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
                                    Official English Translation
                                </span>
                                <h3 class="text-lg sm:text-xl font-extrabold text-slate-900 font-heading mt-0.5">
                                    Certified English Translation
                                </h3>
                            </div>
                        </div>
                        <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-800 font-mono text-[11px] font-bold border border-emerald-200/80 shrink-0">
                            Sworn Legal Copy
                        </span>
                    </div>

                    <!-- Framed Translation Preview Container with Click to Open Popup -->
                    <div class="relative rounded-2xl overflow-hidden border-2 border-slate-300/80 bg-slate-100 shadow-inner group/preview cursor-pointer" onclick="openPoliceDocModal('translation')">
                        <div class="aspect-[3/4] w-full relative bg-slate-950/5 flex items-center justify-center overflow-hidden">
                            <img 
                                src="{{ asset('images/verification/police-clearance-translation.svg') }}?v=20261021v2" 
                                alt="Official English Translation of Police Verification Report" 
                                class="w-full h-full object-contain p-2 group-hover/preview:scale-[1.02] transition-transform duration-300"
                            >
                            
                            <!-- Hover Action Overlay -->
                            <div class="absolute inset-0 bg-slate-950/45 opacity-0 group-hover/preview:opacity-100 backdrop-blur-[2px] transition-opacity duration-200 flex flex-col items-center justify-center gap-2 text-white">
                                <span class="w-14 h-14 rounded-full bg-white/25 border border-white/40 flex items-center justify-center backdrop-blur-md shadow-xl">
                                    <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                    </svg>
                                </span>
                                <span class="font-extrabold text-xs uppercase tracking-wider bg-slate-900/80 px-3 py-1 rounded-full">Click to Read Full Translation</span>
                            </div>

                            <!-- Notary Attestation Seal Badge -->
                            <div class="absolute bottom-3 right-3 px-2.5 py-1 rounded-lg bg-emerald-950/90 backdrop-blur-md text-[10px] font-mono text-emerald-300 font-bold border border-emerald-700/80 shadow-md">
                                Legal Translation
                            </div>
                        </div>
                    </div>

                    <!-- Metadata List -->
                    <div class="mt-4 p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1.5 text-xs">
                        <div class="flex items-center justify-between text-slate-600">
                            <span class="font-medium text-slate-500">Statutory Clearances:</span>
                            <span class="font-bold text-slate-800">Trusts Act, NSDC, NITI Aayog, ISO</span>
                        </div>
                        <div class="flex items-center justify-between text-slate-600">
                            <span class="font-medium text-slate-500">Embassy Attestations:</span>
                            <span class="font-bold text-emerald-700">Formally Verified by Police</span>
                        </div>
                        <div class="flex items-center justify-between text-slate-600">
                            <span class="font-medium text-slate-500">Scope of Report:</span>
                            <span class="font-bold text-slate-800">State &amp; National Validity</span>
                        </div>
                    </div>
                </div>

                <!-- Card Actions -->
                <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between gap-3">
                    <button 
                        type="button" 
                        onclick="openPoliceDocModal('translation')" 
                        class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl text-xs font-bold text-white bg-emerald-700 hover:bg-emerald-600 active:bg-emerald-800 transition shadow-xs cursor-pointer"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <span>Read English Translation (Popup)</span>
                    </button>
                    <button 
                        type="button" 
                        onclick="openPoliceDocModal('split')" 
                        class="text-xs font-semibold text-slate-600 hover:text-emerald-700 inline-flex items-center gap-1 transition"
                    >
                        <span>Side-by-Side View</span>
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" /></svg>
                    </button>
                </div>
            </div>

        </div>

        <!-- 7 Verified Legal Determinations Callout Strip -->
        <div class="mt-8 p-6 rounded-3xl bg-slate-900 text-slate-200 border border-slate-800 shadow-md">
            <div class="flex items-center gap-2 mb-3">
                <span class="inline-block w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                <h4 class="text-sm font-extrabold text-white font-heading uppercase tracking-wider">
                    Official Findings Certified in Police Enquiry Report (DySP Malappuram)
                </h4>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 text-xs mt-4">
                <div class="p-3 rounded-xl bg-slate-800/80 border border-slate-700">
                    <strong class="text-emerald-400 block mb-0.5">1. Indian Trusts Act, 1882</strong>
                    <span>Reg. No. 60/IV/2023 Dtd 17.04.2023 at Sub-Registrar Office, Perumbavoor.</span>
                </div>
                <div class="p-3 rounded-xl bg-slate-800/80 border border-slate-700">
                    <strong class="text-blue-400 block mb-0.5">2. NSDC &amp; Ministry of Skill Dev.</strong>
                    <span>Accreditation Serial No. 2006 valid 2025-2027 to award Skill Sector certificates.</span>
                </div>
                <div class="p-3 rounded-xl bg-slate-800/80 border border-slate-700">
                    <strong class="text-purple-400 block mb-0.5">3. Embassy Attestation Verified</strong>
                    <span>Candidates completing training have obtained official Embassy Attestation.</span>
                </div>
                <div class="p-3 rounded-xl bg-slate-800/80 border border-slate-700">
                    <strong class="text-amber-400 block mb-0.5">4. Local Authority Enterprise License</strong>
                    <span>Pookkottur Grama Panchayat License No. BFIF01-G100604-00040-2026.</span>
                </div>
                <div class="p-3 rounded-xl bg-slate-800/80 border border-slate-700">
                    <strong class="text-emerald-400 block mb-0.5">5. International ISO Accreditations</strong>
                    <span>Accredited under EGAC, EIAC, Euro UK Accreditation, and US ISO Certification.</span>
                </div>
                <div class="p-3 rounded-xl bg-slate-800/80 border border-slate-700">
                    <strong class="text-sky-400 block mb-0.5">6. UK Study Centre &amp; NITI Aayog</strong>
                    <span>FICS UK Study Centre &bull; NITI Aayog Darpan ID: KL/2023/0348375 Dtd 27.11.2023.</span>
                </div>
            </div>
        </div>
    </div>
</section>
