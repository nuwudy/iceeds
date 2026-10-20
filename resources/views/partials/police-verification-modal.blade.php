<!-- ========================================================================= -->
<!-- GLOBAL INTERACTIVE SCROLLABLE POPUP MODAL FOR KERALA POLICE REPORT -->
<!-- (OFFICIAL ENQUIRY REPORT & CERTIFIED ENGLISH TRANSLATION) -->
<!-- ========================================================================= -->
<div 
    id="policeDocModal" 
    class="fixed inset-0 z-50 hidden bg-slate-950/85 backdrop-blur-md p-3 sm:p-5 lg:p-6 flex items-center justify-center transition-all duration-300"
    role="dialog" 
    aria-modal="true" 
    aria-labelledby="modalDocTitle"
    onclick="handlePoliceModalBackdrop(event)"
>
    <!-- Modal Card Container -->
    <div class="relative w-full max-w-5xl bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden flex flex-col max-h-[94vh]" onclick="event.stopPropagation()">
        
        <!-- Modal Top Bar -->
        <div class="px-5 sm:px-7 py-4 bg-slate-900 text-white flex flex-wrap items-center justify-between gap-3 border-b border-slate-800 shrink-0">
            <div class="flex items-center gap-2.5">
                <span class="w-3 h-3 rounded-full bg-emerald-400 animate-pulse"></span>
                <div>
                    <h3 id="modalDocTitle" class="text-sm sm:text-base font-extrabold font-heading text-white">
                        Police Verification Report &bull; DySP Malappuram
                    </h3>
                    <p class="text-[11px] text-slate-400 font-mono">
                        No. 43/CMO/SDOM/2026 &bull; Dtd: 29.04.2026
                    </p>
                </div>
            </div>
            
            <!-- Language / Mode Toggle Buttons in Header -->
            <div class="flex items-center gap-1.5 bg-slate-800 p-1 rounded-xl text-xs font-bold">
                <button 
                    type="button" 
                    id="modalTabOriginal" 
                    onclick="switchPoliceModalTab('original')" 
                    class="px-3 py-1.5 rounded-lg text-white bg-blue-600 transition flex items-center gap-1.5 cursor-pointer"
                >
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                    <span>Original (Malayalam)</span>
                </button>
                <button 
                    type="button" 
                    id="modalTabTranslation" 
                    onclick="switchPoliceModalTab('translation')" 
                    class="px-3 py-1.5 rounded-lg text-slate-300 hover:text-white transition flex items-center gap-1.5 cursor-pointer"
                >
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" /></svg>
                    <span>English Translation</span>
                </button>
                <button 
                    type="button" 
                    id="modalTabSplit" 
                    onclick="switchPoliceModalTab('split')" 
                    class="hidden lg:flex px-3 py-1.5 rounded-lg text-slate-300 hover:text-white transition items-center gap-1.5 cursor-pointer"
                >
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" /></svg>
                    <span>Side-by-Side</span>
                </button>
            </div>

            <!-- Action Controls (Download PDF & Close) -->
            <div class="flex items-center gap-2">
                <a 
                    href="{{ asset('storage/media/2026/10/kerala-police-document-yhgf2l.pdf') }}" 
                    target="_blank" 
                    download="kerala-police-document-yhgf2l.pdf" 
                    class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold transition shadow-xs"
                    title="Download Official PDF"
                >
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
                    <span>Download PDF</span>
                </a>

                <button 
                    type="button" 
                    onclick="closePoliceDocModal()" 
                    class="p-2 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800 transition focus:outline-none cursor-pointer"
                    aria-label="Close document popup"
                >
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- ================================================================= -->
        <!-- SCROLLABLE DOCUMENT BODY CONTAINER -->
        <!-- ================================================================= -->
        <div id="modalScrollBody" class="flex-1 overflow-y-auto overflow-x-hidden p-4 sm:p-6 bg-slate-100 select-text">
            
            <!-- VIEW 1: ORIGINAL MALAYALAM SCANNED DOCUMENT -->
            <div id="viewOriginal" class="space-y-4 max-w-3xl mx-auto">
                <!-- Translation Quick Toggle Pill -->
                <div class="flex items-center justify-between bg-blue-50 border border-blue-200 p-3 rounded-2xl">
                    <span class="text-xs text-blue-900 font-medium">Viewing official signed police enquiry report in Malayalam.</span>
                    <button 
                        type="button" 
                        onclick="switchPoliceModalTab('translation')"
                        class="text-xs font-bold text-blue-700 hover:text-blue-900 underline flex items-center gap-1 cursor-pointer"
                    >
                        <span>Switch to English Translation &rarr;</span>
                    </button>
                </div>

                <!-- Document Image Preview Container (Zoomable) -->
                <div class="flex justify-center bg-white p-2 sm:p-4 rounded-2xl shadow-md border border-slate-300">
                    <div id="modalZoomWrapperOriginal" class="transition-transform duration-200 ease-out origin-top flex justify-center max-w-full">
                        <img 
                            src="{{ asset('images/verification/kerala-police-original.jpg') }}" 
                            alt="Official Kerala Police Verification Report - Original Scanned Copy" 
                            class="max-w-full h-auto rounded-lg shadow-sm border border-slate-200"
                        >
                    </div>
                </div>
            </div>

            <!-- VIEW 2: CERTIFIED ENGLISH TRANSLATION (INTERACTIVE & FULLY SCROLLABLE) -->
            <div id="viewTranslation" class="hidden space-y-6 max-w-3xl mx-auto">
                <!-- Original Quick Toggle Pill -->
                <div class="flex items-center justify-between bg-emerald-50 border border-emerald-200 p-3 rounded-2xl">
                    <span class="text-xs text-emerald-900 font-medium">Viewing Certified English Translation.</span>
                    <button 
                        type="button" 
                        onclick="switchPoliceModalTab('original')"
                        class="text-xs font-bold text-emerald-700 hover:text-emerald-900 underline flex items-center gap-1 cursor-pointer"
                    >
                        <span>&larr; View Original Scanned Copy</span>
                    </button>
                </div>

                <!-- Styled Legal Sworn Translation Document -->
                <div class="bg-white p-6 sm:p-10 rounded-3xl shadow-md border border-slate-200 text-slate-800 text-sm leading-relaxed space-y-6">
                    
                    <!-- Translation Header -->
                    <div class="text-center pb-6 border-b border-slate-200 space-y-1">
                        <span class="inline-block px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-extrabold tracking-wider uppercase">
                            Official English Translation
                        </span>
                        <h4 class="text-xl sm:text-2xl font-black font-heading text-slate-900 mt-2">
                            KERALA POLICE &bull; DISTRICT POLICE OFFICE
                        </h4>
                        <p class="text-xs sm:text-sm font-bold text-slate-700">
                            Office of the Deputy Superintendent of Police, Malappuram, Kerala State. PIN: 676505
                        </p>
                        <p class="text-xs text-slate-500 font-mono">
                            Phone: 0483 2734992 &bull; Email: dyspmpm.pol@kerala.gov.in &bull; Date: 29.04.2026
                        </p>
                        <p class="text-xs font-mono font-bold text-blue-700 mt-1">
                            File No: No. 43/CMO/SDOM/2026
                        </p>
                    </div>

                    <!-- Recipient & Petition Info -->
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200 space-y-2 text-xs">
                        <div>
                            <span class="font-bold text-slate-500 uppercase">To:</span>
                            <span class="font-bold text-slate-900 ml-1">Navas K.M., 52/26, S/o Ali, Kuzhikkadavil House, Uliyannoor PO, Aluva, Ernakulam. (Ph: 8590093535)</span>
                        </div>
                        <div>
                            <span class="font-bold text-slate-500 uppercase">Subject:</span>
                            <span class="font-semibold text-slate-800 ml-1">Regarding the petition submitted by you before the Hon'ble Chief Minister of Kerala State.</span>
                        </div>
                        <div>
                            <span class="font-bold text-slate-500 uppercase">Reference:</span>
                            <span class="font-mono font-bold text-emerald-700 ml-1">No. G3(d) - 43998/2026/MM Dated 27.04.2026</span>
                        </div>
                    </div>

                    <!-- Translated Paragraphs -->
                    <div class="space-y-3 text-slate-700 text-xs sm:text-sm">
                        <p>
                            <strong>Sir,</strong>
                        </p>
                        <p class="text-justify">
                            Attention is invited to the subject and reference cited above. The petition submitted by you before the Hon'ble Chief Minister of Kerala State regarding the operational permissions and legal accreditations of <strong>I-CEEDS (Innovation Council for Exquisite Education and Development of Skills)</strong> situated at Athanikkal, Valluvambram in Malappuram District was received at this office for detailed official enquiry as per the reference cited.
                        </p>
                        <p class="text-justify">
                            In the matter of the petition, the statements of both you (the petitioner) and the opposite party (iCEEDS) were duly recorded, and a thorough official enquiry was conducted by examining all documents and certifications produced by the opposite party.
                        </p>
                    </div>

                    <!-- 7 Numbered Findings -->
                    <div class="bg-emerald-50/60 p-5 rounded-2xl border border-emerald-200 space-y-3 text-xs sm:text-sm text-slate-800">
                        <h5 class="font-black text-emerald-900 text-xs uppercase tracking-wider flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-emerald-700" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            <span>Verified Findings Established During Police Enquiry:</span>
                        </h5>

                        <ol class="space-y-2.5 list-decimal list-inside text-slate-700 leading-relaxed">
                            <li>
                                <strong>Indian Trusts Act, 1882 Registration:</strong> The institution is lawfully registered under the Indian Trusts Act, 1882 bearing <strong>Registration Number 60/IV/2023 dated 17.04.2023</strong> at the Sub-Registrar Office, Perumbavoor.
                            </li>
                            <li>
                                <strong>Government of India / NSDC Authorization:</strong> For imparting training and awarding certificates across various Skill Sectors under the <strong>NSDC (National Skill Development Corporation)</strong> under the <strong>Ministry of Skill Development and Entrepreneurship, Govt. of India</strong>, a valid Accreditation Certificate bearing <strong>Serial No. 2006 Dated 24.03.2025</strong> valid from <strong>24.03.2025 to 24.03.2027</strong> has been officially granted to I-CEEDS by NSDC-approved training partner <em>Vemosa Skills Private Limited</em>.
                            </li>
                            <li>
                                <strong>Embassy Attestations:</strong> It is verified that students who completed training at this institution have duly and successfully obtained <strong>Embassy Attestation</strong> for their qualifications.
                            </li>
                            <li>
                                <strong>Enterprise License:</strong> For operating an Education Consultancy, Private Training Centre, and Tutorial Centre, a valid <strong>Certificate of Enterprises License</strong> has been granted by <em>Pookkottur Grama Panchayat</em> under <strong>License No. BFIF01-G100604-00040-2026</strong> valid from <strong>18.03.2026 to 17.03.2028</strong>.
                            </li>
                            <li>
                                <strong>International ISO Accreditations:</strong> The institution holds authentic international ISO accreditations from <strong>EGAC, EIAC, Euro UK Accreditation, and US ISO Certification</strong>.
                            </li>
                            <li>
                                <strong>UK Study Centre:</strong> I-CEEDS is an authorized, recognized Study Centre of <strong>FICS UK</strong>.
                            </li>
                            <li>
                                <strong>NITI Aayog Registered NGO:</strong> The institution is officially registered on the <strong>NITI Aayog portal, Government of India</strong> under <strong>Darpan ID: KL/2023/0348375 dated 27.11.2023</strong> as a certified Non-Governmental Organization (NGO).
                            </li>
                        </ol>
                    </div>

                    <!-- Final Police Conclusion -->
                    <div class="p-4 rounded-2xl bg-slate-900 text-white space-y-1.5 text-xs sm:text-sm">
                        <strong class="text-emerald-400 block font-heading uppercase tracking-wider text-xs">
                            Official Police Determination &amp; Conclusion:
                        </strong>
                        <p class="text-slate-200 text-justify">
                            Upon thorough examination and verification of all statutory documents, governmental affiliations, and licenses produced by the opposite party, it is prima facie convincingly established and verified that the institution is lawfully established and operates with valid approvals. You are hereby informed accordingly.
                        </p>
                    </div>

                    <!-- Signatory & Seal Simulation -->
                    <div class="pt-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
                        <div class="space-y-1 text-xs">
                            <span class="text-slate-400">Official Signatory:</span>
                            <div class="font-extrabold text-slate-900 text-sm">(Sd/-) SUBHASH BABU K.C.</div>
                            <div class="font-bold text-blue-700">Deputy Superintendent of Police (DySP)</div>
                            <div class="text-slate-600">Malappuram District, Kerala &bull; Dated: 29.04.2026</div>
                        </div>

                        <div class="px-4 py-3 rounded-2xl border-2 border-blue-600/60 bg-blue-50/50 text-blue-900 text-center font-mono text-[11px] font-bold">
                            <div>DY. SUPDT. OF POLICE</div>
                            <div>MALAPPURAM - 676 505</div>
                            <div class="text-[9px] text-blue-600 uppercase font-sans mt-0.5">Government Seal Verified</div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- VIEW 3: SIDE-BY-SIDE SPLIT VIEW (DESKTOP) -->
            <div id="viewSplit" class="hidden grid grid-cols-1 lg:grid-cols-2 gap-6 items-start">
                <!-- Left: Original Scan -->
                <div class="bg-white p-3 rounded-2xl border border-slate-300 shadow-sm space-y-2">
                    <span class="block text-xs font-bold text-blue-700 uppercase tracking-wider bg-blue-50 px-2 py-1 rounded-md text-center">
                        Original Document (Scanned Copy)
                    </span>
                    <img 
                        src="{{ asset('images/verification/kerala-police-original.jpg') }}" 
                        alt="Original Scanned Copy" 
                        class="w-full h-auto rounded-lg"
                    >
                </div>

                <!-- Right: English Translation Summary -->
                <div class="bg-white p-5 rounded-2xl border border-slate-300 shadow-sm space-y-4 text-xs leading-relaxed text-slate-700">
                    <span class="block text-xs font-bold text-emerald-800 uppercase tracking-wider bg-emerald-50 px-2 py-1 rounded-md text-center">
                        Certified English Translation
                    </span>

                    <div class="border-b pb-2">
                        <strong class="text-slate-900 block">Office of the Deputy Superintendent of Police, Malappuram</strong>
                        <span class="text-[11px] text-slate-500 font-mono">No. 43/CMO/SDOM/2026 &bull; Dated: 29.04.2026</span>
                    </div>

                    <p>
                        <strong>Subject:</strong> In the matter of the petition submitted before the Hon'ble Chief Minister of Kerala State regarding iCEEDS.
                    </p>

                    <p>
                        <strong>Police Findings:</strong> Statements recorded and documents verified. Legitimacy established under:
                    </p>

                    <ul class="space-y-1.5 list-disc list-inside text-[11px]">
                        <li><strong>Indian Trusts Act, 1882:</strong> Reg No. 60/IV/2023 Dtd 17.04.2023.</li>
                        <li><strong>NSDC / Ministry of Skill Dev:</strong> Accreditation No. 2006 (2025-2027).</li>
                        <li><strong>Embassy Attestations:</strong> Successfully granted to candidates.</li>
                        <li><strong>Panchayat Enterprise License:</strong> BFIF01-G100604-00040-2026.</li>
                        <li><strong>ISO Accreditations:</strong> EGAC, EIAC, Euro UK, US ISO.</li>
                        <li><strong>UK Study Centre:</strong> Authorized Study Centre of FICS UK.</li>
                        <li><strong>NITI Aayog Darpan:</strong> KL/2023/0348375 Dtd 27.11.2023.</li>
                    </ul>

                    <div class="p-2.5 rounded-lg bg-emerald-50 text-emerald-900 font-medium text-[11px]">
                        <strong>Conclusion:</strong> Legality, valid approvals, and legitimate operation confirmed.
                    </div>

                    <div class="text-[11px] font-mono text-slate-600 pt-1">
                        (Sd/-) Subhash Babu K.C., Dy. Superintendent of Police, Malappuram
                    </div>
                </div>
            </div>

        </div>

        <!-- ================================================================= -->
        <!-- MODAL FOOTER BAR WITH CONTROLS & DOWNLOADS -->
        <!-- ================================================================= -->
        <div class="px-5 sm:px-7 py-3.5 bg-white border-t border-slate-200 flex flex-wrap items-center justify-between gap-3 text-xs shrink-0">
            <!-- Zoom Controls for Original View -->
            <div id="modalZoomControls" class="flex items-center gap-1.5">
                <span class="text-slate-500 font-medium hidden sm:inline">Zoom Original:</span>
                <button type="button" onclick="adjustPoliceModalZoom(-0.15)" class="p-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 transition cursor-pointer" title="Zoom Out">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4" /></svg>
                </button>
                <span id="policeZoomIndicator" class="font-mono text-slate-700 font-bold px-1.5">100%</span>
                <button type="button" onclick="adjustPoliceModalZoom(0.15)" class="p-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 transition cursor-pointer" title="Zoom In">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                </button>
                <button type="button" onclick="resetPoliceModalZoom()" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium transition cursor-pointer">
                    Reset
                </button>
            </div>

            <!-- Direct Actions -->
            <div class="flex items-center gap-2">
                <a 
                    href="{{ asset('storage/media/2026/10/kerala-police-document-yhgf2l.pdf') }}" 
                    target="_blank" 
                    download="kerala-police-document-yhgf2l.pdf" 
                    class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs font-bold text-white bg-slate-900 hover:bg-blue-700 transition shadow-xs cursor-pointer"
                >
                    <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    <span>Download Official PDF (212 KB)</span>
                </a>

                <button 
                    type="button" 
                    onclick="closePoliceDocModal()"
                    class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 transition cursor-pointer"
                >
                    Close Preview
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ========================================================================= -->
<!-- JAVASCRIPT CONTROLLING SCROLLABLE POPUP, ZOOM & LANGUAGE TOGGLES -->
<!-- ========================================================================= -->
<script>
    let currentPoliceTab = 'original';
    let currentPoliceZoom = 1.0;

    function openPoliceDocModal(type) {
        currentPoliceTab = type || 'original';
        currentPoliceZoom = 1.0;
        applyPoliceModalTab();
        const modal = document.getElementById('policeDocModal');
        if (modal) {
            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
            const scrollBody = document.getElementById('modalScrollBody');
            if (scrollBody) scrollBody.scrollTop = 0;
        }
    }

    function closePoliceDocModal() {
        const modal = document.getElementById('policeDocModal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    }

    function handlePoliceModalBackdrop(event) {
        if (event.target.id === 'policeDocModal') {
            closePoliceDocModal();
        }
    }

    function switchPoliceModalTab(type) {
        currentPoliceTab = type;
        applyPoliceModalTab();
        const scrollBody = document.getElementById('modalScrollBody');
        if (scrollBody) scrollBody.scrollTop = 0;
    }

    function applyPoliceModalTab() {
        const viewOrig = document.getElementById('viewOriginal');
        const viewTrans = document.getElementById('viewTranslation');
        const viewSplit = document.getElementById('viewSplit');
        const tabOrig = document.getElementById('modalTabOriginal');
        const tabTrans = document.getElementById('modalTabTranslation');
        const tabSplit = document.getElementById('modalTabSplit');
        const zoomControls = document.getElementById('modalZoomControls');
        const title = document.getElementById('modalDocTitle');

        resetPoliceModalZoom();

        // Hide all views first
        if (viewOrig) viewOrig.classList.add('hidden');
        if (viewTrans) viewTrans.classList.add('hidden');
        if (viewSplit) viewSplit.classList.add('hidden');

        // Reset tab styling
        const inactiveClass = 'px-3 py-1.5 rounded-lg text-slate-300 hover:text-white transition flex items-center gap-1.5 cursor-pointer';
        const activeBlue = 'px-3 py-1.5 rounded-lg text-white bg-blue-600 transition flex items-center gap-1.5 cursor-pointer';
        const activeEmerald = 'px-3 py-1.5 rounded-lg text-white bg-emerald-600 transition flex items-center gap-1.5 cursor-pointer';
        const activePurple = 'px-3 py-1.5 rounded-lg text-white bg-purple-600 transition flex items-center gap-1.5 cursor-pointer';

        if (tabOrig) tabOrig.className = inactiveClass;
        if (tabTrans) tabTrans.className = inactiveClass;
        if (tabSplit) tabSplit.className = inactiveClass;

        if (currentPoliceTab === 'original') {
            if (viewOrig) viewOrig.classList.remove('hidden');
            if (tabOrig) tabOrig.className = activeBlue;
            if (zoomControls) zoomControls.classList.remove('hidden');
            if (title) title.textContent = 'Original Police Enquiry Report (Malayalam Scan)';
        } else if (currentPoliceTab === 'translation') {
            if (viewTrans) viewTrans.classList.remove('hidden');
            if (tabTrans) tabTrans.className = activeEmerald;
            if (zoomControls) zoomControls.classList.add('hidden');
            if (title) title.textContent = 'Certified English Translation & Statutory Findings';
        } else if (currentPoliceTab === 'split') {
            if (viewSplit) viewSplit.classList.remove('hidden');
            if (tabSplit) tabSplit.className = activePurple;
            if (zoomControls) zoomControls.classList.add('hidden');
            if (title) title.textContent = 'Side-by-Side: Original Scan & English Translation';
        }
    }

    function adjustPoliceModalZoom(delta) {
        currentPoliceZoom = Math.max(0.7, Math.min(2.5, currentPoliceZoom + delta));
        const wrapper = document.getElementById('modalZoomWrapperOriginal');
        const indicator = document.getElementById('policeZoomIndicator');
        if (wrapper) {
            wrapper.style.transform = `scale(${currentPoliceZoom})`;
        }
        if (indicator) {
            indicator.textContent = Math.round(currentPoliceZoom * 100) + '%';
        }
    }

    function resetPoliceModalZoom() {
        currentPoliceZoom = 1.0;
        const wrapper = document.getElementById('modalZoomWrapperOriginal');
        const indicator = document.getElementById('policeZoomIndicator');
        if (wrapper) {
            wrapper.style.transform = 'scale(1.0)';
        }
        if (indicator) {
            indicator.textContent = '100%';
        }
    }

    // Keyboard support: Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closePoliceDocModal();
        }
    });

    // Auto-open if URL hash is #police-report or query param ?police_report=1
    document.addEventListener('DOMContentLoaded', function() {
        if (window.location.hash === '#police-report' || window.location.search.includes('police_report=1')) {
            openPoliceDocModal('original');
        }
    });
</script>
