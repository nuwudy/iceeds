@extends('layouts.app')

@section('title', 'Department of Theology | Chambers of Hindutva, Islamic & Christian Studies | iCEEDS')
@section('meta_description', 'Official Department of Theology at iCEEDS: Autonomous academic research chambers for Hindutva Studies, Islamic Studies, and Christian Studies, governed by distinguished Boards of Studies.')

@section('content')

<div x-data="{
    activeChamber: '{{ $chamber === 'all' ? 'all' : $chamber }}',
    setChamber(c) { 
        this.activeChamber = c;
        if (c !== 'all') {
            const el = document.getElementById(c + '-studies');
            if (el) {
                setTimeout(() => el.scrollIntoView({ behavior: 'smooth', block: 'start' }), 50);
            }
        }
    }
}" class="min-h-screen bg-slate-50 text-slate-800 antialiased">

    <!-- PAGE HERO -->
    <section class="relative py-16 sm:py-24 bg-slate-950 text-white overflow-hidden border-b border-slate-900">
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-amber-600/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-emerald-600/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center space-y-6">
                
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-900/40 border border-amber-600/50 text-xs font-semibold tracking-wide text-amber-200 backdrop-blur-sm">
                    <a href="{{ route('departments.philosophy-theology') }}" class="hover:underline text-amber-300">Department of Philosophy &amp; Theology</a>
                    <span>&rsaquo;</span>
                    <span class="text-white font-bold">Faculty of Theology</span>
                </div>

                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black font-heading tracking-tight leading-tight text-white">
                    Department of <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-300 via-yellow-200 to-amber-400">
                        Theology
                    </span>
                </h1>

                <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                    A revered academic faculty dedicated to the scholarly study of world faith traditions, classical hermeneutics, spiritual philosophy, and comparative ethics. Organized into three autonomous research chambers.
                </p>

                <!-- 3 Chamber Filter Tabs (Requested Sequence: Hindutva, Islamic, Christian) -->
                <div class="pt-4 flex flex-wrap items-center justify-center gap-3 text-xs font-bold">
                    <button type="button" 
                            @click="setChamber('all')" 
                            :class="activeChamber === 'all' ? 'bg-amber-500 text-slate-950 shadow-lg shadow-amber-950/40 font-black ring-2 ring-amber-300/60' : 'bg-slate-900 text-slate-300 hover:bg-slate-800 border border-slate-700'"
                            class="px-5 py-3 rounded-xl transition cursor-pointer">
                        All Chambers (3)
                    </button>
                    <button type="button" 
                            @click="setChamber('hindutva')" 
                            :class="activeChamber === 'hindutva' ? 'bg-amber-600 text-white shadow-lg shadow-amber-950/40 ring-2 ring-amber-400/50' : 'bg-slate-900 text-slate-300 hover:bg-slate-800 border border-slate-700'"
                            class="px-5 py-3 rounded-xl transition flex items-center gap-2 cursor-pointer">
                        <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                        <span>Chamber of Hindutva Studies</span>
                    </button>
                    <button type="button" 
                            @click="setChamber('islamic')" 
                            :class="activeChamber === 'islamic' ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-950/40 ring-2 ring-emerald-400/50' : 'bg-slate-900 text-slate-300 hover:bg-slate-800 border border-slate-700'"
                            class="px-5 py-3 rounded-xl transition flex items-center gap-2 cursor-pointer">
                        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                        <span>Chamber of Islamic Studies</span>
                    </button>
                    <button type="button" 
                            @click="setChamber('christian')" 
                            :class="activeChamber === 'christian' ? 'bg-rose-600 text-white shadow-lg shadow-rose-950/40 ring-2 ring-rose-400/50' : 'bg-slate-900 text-slate-300 hover:bg-slate-800 border border-slate-700'"
                            class="px-5 py-3 rounded-xl transition flex items-center gap-2 cursor-pointer">
                        <span class="w-2 h-2 rounded-full bg-rose-400"></span>
                        <span>Chamber of Christian Studies</span>
                    </button>
                </div>

            </div>
        </div>
    </section>

    <!-- CONTENT DISPLAY AREA: 3 THEOLOGICAL CHAMBERS -->
    <main class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">

        <!-- ========================================================================= -->
        <!-- "ALL CHAMBERS" SECTION: 3-COLUMN RESPONSIVE HORIZONTAL ROW -->
        <!-- Sequence: 1. Hindutva Studies | 2. Islamic Studies | 3. Christian Studies -->
        <!-- ========================================================================= -->
        <section id="all-chambers" x-show="activeChamber === 'all'" class="space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-3 pb-4 border-b border-slate-200">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-amber-700 bg-amber-50 border border-amber-200 px-3 py-1 rounded-full inline-block">
                        All Chambers Directory
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-black font-heading text-slate-950 mt-2 tracking-tight">
                        Autonomous Academic Chambers
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-600 mt-1 max-w-2xl leading-relaxed">
                        Three specialized chambers dedicated to classical scriptures, hermeneutical rigor, spiritual epistemology, and interfaith ethics.
                    </p>
                </div>
                <div class="text-xs font-mono text-slate-500 bg-slate-100 px-3.5 py-1.5 rounded-xl border border-slate-200/80 shrink-0">
                    3 Academic Research Chambers
                </div>
            </div>

            <!-- Single Horizontal Responsive Row (3 Columns on Desktop, Stacking on Mobile) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                
                <!-- 1. CHAMBER OF HINDUTVA STUDIES CARD -->
                <div class="bg-white rounded-3xl border-2 border-amber-200/90 shadow-sm hover:shadow-xl hover:border-amber-400 transition-all duration-300 overflow-hidden flex flex-col justify-between group">
                    <div>
                        <!-- Chamber Image Frame -->
                        <div class="relative aspect-[16/10] overflow-hidden bg-slate-900">
                            <img src="{{ $hindutvaImage }}" 
                                 alt="Chamber of Hindutva Studies - iCEEDS" 
                                 loading="lazy" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/85 via-slate-950/20 to-transparent"></div>
                            <div class="absolute bottom-3 left-4 right-4">
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black uppercase bg-amber-500 text-slate-950 shadow-sm">
                                    Chamber 01
                                </span>
                                <h3 class="text-lg font-black font-heading text-white mt-1 leading-snug">
                                    Chamber of Hindutva Studies
                                </h3>
                            </div>
                        </div>

                        <!-- Card Content -->
                        <div class="p-5 sm:p-6 space-y-4">
                            <span class="inline-block text-[10.5px] font-mono font-bold uppercase tracking-wider text-amber-800 bg-amber-50 border border-amber-200/80 px-2.5 py-0.5 rounded-md">
                                Vedic &amp; Indic Philosophy
                            </span>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Systematic inquiry into the Six Astika Darshanas (Nyaya, Samkhya, Yoga, Vedanta), Upanishadic metaphysics, and Indic civilization traditions.
                            </p>

                            <!-- Key Pillars Mini-Pills -->
                            <div class="space-y-1.5 pt-1 text-[11px] text-slate-700 font-medium">
                                <div class="flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                    <span>Six Classical Darshanas &amp; Epistemology</span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                    <span>Upanishads &amp; Bhagavad Gita Hermeneutics</span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                    <span>Indic Civilization &amp; Ecological Dharma</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card Footer CTA -->
                    <div class="p-5 sm:p-6 pt-0 border-t border-slate-100 flex items-center justify-between mt-4">
                        <span class="text-[11px] font-mono text-slate-400">Board Monitored</span>
                        <button type="button" 
                                @click="setChamber('hindutva')"
                                class="inline-flex items-center gap-1.5 text-xs font-bold text-amber-700 hover:text-amber-900 group-hover:translate-x-1 transition-all cursor-pointer">
                            <span>View Chamber Details &rarr;</span>
                        </button>
                    </div>
                </div>

                <!-- 2. CHAMBER OF ISLAMIC STUDIES CARD -->
                <div class="bg-white rounded-3xl border-2 border-emerald-200/90 shadow-sm hover:shadow-xl hover:border-emerald-400 transition-all duration-300 overflow-hidden flex flex-col justify-between group">
                    <div>
                        <!-- Chamber Image Frame -->
                        <div class="relative aspect-[16/10] overflow-hidden bg-slate-900">
                            <img src="{{ $islamicImage }}" 
                                 alt="Chamber of Islamic Studies - iCEEDS" 
                                 loading="lazy" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/85 via-slate-950/20 to-transparent"></div>
                            <div class="absolute bottom-3 left-4 right-4">
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black uppercase bg-emerald-500 text-white shadow-sm">
                                    Chamber 02
                                </span>
                                <h3 class="text-lg font-black font-heading text-white mt-1 leading-snug">
                                    Chamber of Islamic Studies
                                </h3>
                            </div>
                        </div>

                        <!-- Card Content -->
                        <div class="p-5 sm:p-6 space-y-4">
                            <span class="inline-block text-[10.5px] font-mono font-bold uppercase tracking-wider text-emerald-800 bg-emerald-50 border border-emerald-200/80 px-2.5 py-0.5 rounded-md">
                                Islamic Epistemology &amp; Kalam
                            </span>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Research into Islamic jurisprudence (Fiqh), theology (Kalam), Quranic hermeneutics (Tafsir), and classical philosophical traditions (Falsafa).
                            </p>

                            <!-- Key Pillars Mini-Pills -->
                            <div class="space-y-1.5 pt-1 text-[11px] text-slate-700 font-medium">
                                <div class="flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    <span>Usul al-Fiqh &amp; Legal Theory</span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    <span>Quranic Hermeneutics &amp; Tafsir</span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    <span>Islamic Philosophy (Falsafa) &amp; Sufism</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card Footer CTA -->
                    <div class="p-5 sm:p-6 pt-0 border-t border-slate-100 flex items-center justify-between mt-4">
                        <span class="text-[11px] font-mono text-slate-400">Board Monitored</span>
                        <button type="button" 
                                @click="setChamber('islamic')"
                                class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-700 hover:text-emerald-900 group-hover:translate-x-1 transition-all cursor-pointer">
                            <span>View Chamber Details &rarr;</span>
                        </button>
                    </div>
                </div>

                <!-- 3. CHAMBER OF CHRISTIAN STUDIES CARD -->
                <div class="bg-white rounded-3xl border-2 border-rose-200/90 shadow-sm hover:shadow-xl hover:border-rose-400 transition-all duration-300 overflow-hidden flex flex-col justify-between group">
                    <div>
                        <!-- Chamber Image Frame -->
                        <div class="relative aspect-[16/10] overflow-hidden bg-slate-900">
                            <img src="{{ $christianImage }}" 
                                 alt="Chamber of Christian Studies - iCEEDS" 
                                 loading="lazy" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/85 via-slate-950/20 to-transparent"></div>
                            <div class="absolute bottom-3 left-4 right-4">
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black uppercase bg-rose-500 text-white shadow-sm">
                                    Chamber 03
                                </span>
                                <h3 class="text-lg font-black font-heading text-white mt-1 leading-snug">
                                    Chamber of Christian Studies
                                </h3>
                            </div>
                        </div>

                        <!-- Card Content -->
                        <div class="p-5 sm:p-6 space-y-4">
                            <span class="inline-block text-[10.5px] font-mono font-bold uppercase tracking-wider text-rose-800 bg-rose-50 border border-rose-200/80 px-2.5 py-0.5 rounded-md">
                                Christian Theology &amp; Ethics
                            </span>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Investigation into Biblical exegesis, Patristic literature, early Church history, Christian moral philosophy, and ecumenical interfaith engagement.
                            </p>

                            <!-- Key Pillars Mini-Pills -->
                            <div class="space-y-1.5 pt-1 text-[11px] text-slate-700 font-medium">
                                <div class="flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                    <span>Biblical Hermeneutics &amp; Exegesis</span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                    <span>Patristic &amp; Historical Theology</span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                    <span>Christian Moral Ethics &amp; Ecumenism</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card Footer CTA -->
                    <div class="p-5 sm:p-6 pt-0 border-t border-slate-100 flex items-center justify-between mt-4">
                        <span class="text-[11px] font-mono text-slate-400">Board Monitored</span>
                        <button type="button" 
                                @click="setChamber('christian')"
                                class="inline-flex items-center gap-1.5 text-xs font-bold text-rose-700 hover:text-rose-900 group-hover:translate-x-1 transition-all cursor-pointer">
                            <span>View Chamber Details &rarr;</span>
                        </button>
                    </div>
                </div>

            </div>
        </section>

        <!-- ========================================================================= -->
        <!-- CHAMBER 01: HINDUTVA STUDIES (Includes Dedicated Board of Studies Block) -->
        <!-- ========================================================================= -->
        <section id="hindutva-studies" x-show="activeChamber === 'all' || activeChamber === 'hindutva'" class="space-y-6 scroll-mt-28">
            
            <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-md transition">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-0">
                    
                    <!-- Left: Authentic Chamber Image -->
                    <div class="lg:col-span-5 relative bg-slate-900 overflow-hidden min-h-[320px]">
                        <img src="{{ $hindutvaImage }}" 
                             alt="Chamber of Hindutva Studies - iCEEDS" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <span class="px-3 py-1 rounded-full text-[11px] font-bold uppercase bg-amber-600 text-white shadow-sm">
                                Academic Chamber 01
                            </span>
                            <h3 class="text-xl font-bold font-heading text-white mt-1">
                                Chamber of Hindutva Studies
                            </h3>
                            <p class="text-xs text-amber-200 mt-0.5">Shad-Darshanas, Vedic Epistemology &amp; Indic Thought</p>
                        </div>
                    </div>

                    <!-- Right: Content & Modules -->
                    <div class="lg:col-span-7 p-6 sm:p-8 flex flex-col justify-between space-y-6">
                        <div>
                            <div class="flex items-center justify-between gap-4 mb-2">
                                <span class="text-xs font-black uppercase tracking-wider text-amber-800 bg-amber-50 border border-amber-200 px-3 py-1 rounded-full">
                                    Vedic &amp; Classical Indic Philosophy
                                </span>
                                <span class="text-xs text-slate-400 font-mono">Faculty of Theology</span>
                            </div>

                            <h2 class="text-2xl font-black font-heading text-slate-950">
                                Chamber of Hindutva Studies
                            </h2>
                            <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
                                Exploring the profound intellectual traditions of India: the Six Astika Darshanas (Nyaya, Vaisheshika, Samkhya, Yoga, Mimamsa, and Vedanta), Upanishadic metaphysics, Dharmic ethics, and the cultural history of Indic civilization.
                            </p>

                            <!-- Academic Focus Pillars -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-6">
                                <div class="p-3.5 rounded-xl bg-amber-50/50 border border-amber-100">
                                    <h4 class="text-xs font-bold text-amber-950">Six Classical Darshanas</h4>
                                    <p class="text-[11px] text-slate-600 mt-0.5">Nyaya logic, Samkhya cosmology, Yoga psychology, and Advaita/Dvaita Vedanta.</p>
                                </div>
                                <div class="p-3.5 rounded-xl bg-amber-50/50 border border-amber-100">
                                    <h4 class="text-xs font-bold text-amber-950">Upanishads &amp; Bhagavad Gita</h4>
                                    <p class="text-[11px] text-slate-600 mt-0.5">Brahman-Atman identity, karma, dharma, duty, and spiritual consciousness.</p>
                                </div>
                                <div class="p-3.5 rounded-xl bg-amber-50/50 border border-amber-100">
                                    <h4 class="text-xs font-bold text-amber-950">Indic Civilization &amp; Heritage</h4>
                                    <p class="text-[11px] text-slate-600 mt-0.5">Temple architecture, sacred iconography, Sanskrit linguistic traditions, and arts.</p>
                                </div>
                                <div class="p-3.5 rounded-xl bg-amber-50/50 border border-amber-100">
                                    <h4 class="text-xs font-bold text-amber-950">Ecological Dharma &amp; Ethics</h4>
                                    <p class="text-[11px] text-slate-600 mt-0.5">Vedic environmental philosophy, Ahimsa, sustainable living, and universal well-being.</p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                            <span class="text-xs text-slate-500 font-medium">Textual studies in English, Sanskrit, and regional languages.</span>
                            <a href="{{ route('contact') }}?chamber=Hindutva+Studies" 
                               class="w-full sm:w-auto px-5 py-2.5 rounded-xl text-xs font-bold text-white bg-amber-700 hover:bg-amber-800 shadow-sm transition text-center">
                                Inquire for Hindutva Studies
                            </a>
                        </div>
                    </div>

                </div>

                <!-- DEDICATED 4-COLUMN BOARD OF STUDIES BLOCK: HINDUTVA -->
                <div class="px-6 sm:px-8 pb-8 bg-slate-50/60 border-t border-slate-100">
                    @include('partials.chamber-board-of-studies', [
                        'chamberKey' => 'hindutva',
                        'chamberName' => 'Chamber of Hindutva Studies',
                        'members' => $boardOfStudies['hindutva'] ?? []
                    ])
                </div>
            </div>

        </section>

        <!-- ========================================================================= -->
        <!-- CHAMBER 02: ISLAMIC STUDIES (Includes Dedicated Board of Studies Block) -->
        <!-- ========================================================================= -->
        <section id="islamic-studies" x-show="activeChamber === 'all' || activeChamber === 'islamic'" class="space-y-6 scroll-mt-28">
            
            <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-md transition">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-0">
                    
                    <!-- Left: Authentic Chamber Image -->
                    <div class="lg:col-span-5 relative bg-slate-900 overflow-hidden min-h-[320px]">
                        <img src="{{ $islamicImage }}" 
                             alt="Chamber of Islamic Studies - iCEEDS" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <span class="px-3 py-1 rounded-full text-[11px] font-bold uppercase bg-emerald-600 text-white shadow-sm">
                                Academic Chamber 02
                            </span>
                            <h3 class="text-xl font-bold font-heading text-white mt-1">
                                Chamber of Islamic Studies
                            </h3>
                            <p class="text-xs text-emerald-200 mt-0.5">Classical Jurisprudence, Kalam &amp; Islamic Thought</p>
                        </div>
                    </div>

                    <!-- Right: Content & Modules -->
                    <div class="lg:col-span-7 p-6 sm:p-8 flex flex-col justify-between space-y-6">
                        <div>
                            <div class="flex items-center justify-between gap-4 mb-2">
                                <span class="text-xs font-black uppercase tracking-wider text-emerald-800 bg-emerald-50 border border-emerald-200 px-3 py-1 rounded-full">
                                    Islamic Epistemology &amp; Kalam
                                </span>
                                <span class="text-xs text-slate-400 font-mono">Faculty of Theology</span>
                            </div>

                            <h2 class="text-2xl font-black font-heading text-slate-950">
                                Chamber of Islamic Studies
                            </h2>
                            <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
                                Conducting systematic academic research into Islamic jurisprudence (Fiqh), theology (Kalam), Quranic hermeneutics (Tafsir), and the golden age philosophical traditions of Ibn Sina, Al-Farabi, and Al-Ghazali.
                            </p>

                            <!-- Academic Focus Pillars -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-6">
                                <div class="p-3.5 rounded-xl bg-emerald-50/50 border border-emerald-100">
                                    <h4 class="text-xs font-bold text-emerald-950">Usul al-Fiqh &amp; Jurisprudence</h4>
                                    <p class="text-[11px] text-slate-600 mt-0.5">Classical legal theory, comparative schools of law, and contemporary ethics.</p>
                                </div>
                                <div class="p-3.5 rounded-xl bg-emerald-50/50 border border-emerald-100">
                                    <h4 class="text-xs font-bold text-emerald-950">Quranic &amp; Hadith Hermeneutics</h4>
                                    <p class="text-[11px] text-slate-600 mt-0.5">Contextual linguistic analysis, textual criticism, and transmission sciences.</p>
                                </div>
                                <div class="p-3.5 rounded-xl bg-emerald-50/50 border border-emerald-100">
                                    <h4 class="text-xs font-bold text-emerald-950">Islamic Philosophy (Falsafa)</h4>
                                    <p class="text-[11px] text-slate-600 mt-0.5">Metaphysics, epistemology, logic, and scientific contributions of the Islamic world.</p>
                                </div>
                                <div class="p-3.5 rounded-xl bg-emerald-50/50 border border-emerald-100">
                                    <h4 class="text-xs font-bold text-emerald-950">Sufism &amp; Spiritual Ethics</h4>
                                    <p class="text-[11px] text-slate-600 mt-0.5">Tasawwuf, moral philosophy (Akhlaq), and inter-religious harmony.</p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                            <span class="text-xs text-slate-500 font-medium">Open to scholars, researchers, and students across India.</span>
                            <a href="{{ route('contact') }}?chamber=Islamic+Studies" 
                               class="w-full sm:w-auto px-5 py-2.5 rounded-xl text-xs font-bold text-white bg-emerald-700 hover:bg-emerald-800 shadow-sm transition text-center">
                                Inquire for Islamic Studies
                            </a>
                        </div>
                    </div>

                </div>

                <!-- DEDICATED 4-COLUMN BOARD OF STUDIES BLOCK: ISLAMIC -->
                <div class="px-6 sm:px-8 pb-8 bg-slate-50/60 border-t border-slate-100">
                    @include('partials.chamber-board-of-studies', [
                        'chamberKey' => 'islamic',
                        'chamberName' => 'Chamber of Islamic Studies',
                        'members' => $boardOfStudies['islamic'] ?? []
                    ])
                </div>
            </div>

        </section>

        <!-- ========================================================================= -->
        <!-- CHAMBER 03: CHRISTIAN STUDIES (Includes Dedicated Board of Studies Block) -->
        <!-- ========================================================================= -->
        <section id="christian-studies" x-show="activeChamber === 'all' || activeChamber === 'christian'" class="space-y-6 scroll-mt-28">
            
            <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-md transition">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-0">
                    
                    <!-- Left: Authentic Chamber Image -->
                    <div class="lg:col-span-5 relative bg-slate-900 overflow-hidden min-h-[320px]">
                        <img src="{{ $christianImage }}" 
                             alt="Chamber of Christian Studies - iCEEDS" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <span class="px-3 py-1 rounded-full text-[11px] font-bold uppercase bg-rose-600 text-white shadow-sm">
                                Academic Chamber 03
                            </span>
                            <h3 class="text-xl font-bold font-heading text-white mt-1">
                                Chamber of Christian Studies
                            </h3>
                            <p class="text-xs text-rose-200 mt-0.5">Biblical Hermeneutics, Patristics &amp; Christian Thought</p>
                        </div>
                    </div>

                    <!-- Right: Content & Modules -->
                    <div class="lg:col-span-7 p-6 sm:p-8 flex flex-col justify-between space-y-6">
                        <div>
                            <div class="flex items-center justify-between gap-4 mb-2">
                                <span class="text-xs font-black uppercase tracking-wider text-rose-800 bg-rose-50 border border-rose-200 px-3 py-1 rounded-full">
                                    Christian Theology &amp; Ethics
                                </span>
                                <span class="text-xs text-slate-400 font-mono">Faculty of Theology</span>
                            </div>

                            <h2 class="text-2xl font-black font-heading text-slate-950">
                                Chamber of Christian Studies
                            </h2>
                            <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
                                Dedicated to the academic investigation of Old and New Testament literature, Patristic theology, Church history, Christian moral philosophy, and ecumenical interfaith engagement in contemporary society.
                            </p>

                            <!-- Academic Focus Pillars -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-6">
                                <div class="p-3.5 rounded-xl bg-rose-50/50 border border-rose-100">
                                    <h4 class="text-xs font-bold text-rose-950">Biblical Hermeneutics &amp; Exegesis</h4>
                                    <p class="text-[11px] text-slate-600 mt-0.5">Historical-critical methods, original languages, and literary interpretations.</p>
                                </div>
                                <div class="p-3.5 rounded-xl bg-rose-50/50 border border-rose-100">
                                    <h4 class="text-xs font-bold text-rose-950">Patristic &amp; Historical Theology</h4>
                                    <p class="text-[11px] text-slate-600 mt-0.5">Early Church Fathers, ecumenical councils, and development of Christian doctrine.</p>
                                </div>
                                <div class="p-3.5 rounded-xl bg-rose-50/50 border border-rose-100">
                                    <h4 class="text-xs font-bold text-rose-950">Christian Ethics &amp; Social Justice</h4>
                                    <p class="text-[11px] text-slate-600 mt-0.5">Moral theology, liberation perspectives, bioethics, and human dignity.</p>
                                </div>
                                <div class="p-3.5 rounded-xl bg-rose-50/50 border border-rose-100">
                                    <h4 class="text-xs font-bold text-rose-950">Pastoral Care &amp; Ecumenism</h4>
                                    <p class="text-[11px] text-slate-600 mt-0.5">Spiritual counselling, ministerial ethics, and global interfaith dialogues.</p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                            <span class="text-xs text-slate-500 font-medium">Inter-denominational academic research and certification.</span>
                            <a href="{{ route('contact') }}?chamber=Christian+Studies" 
                               class="w-full sm:w-auto px-5 py-2.5 rounded-xl text-xs font-bold text-white bg-rose-700 hover:bg-rose-800 shadow-sm transition text-center">
                                Inquire for Christian Studies
                            </a>
                        </div>
                    </div>

                </div>

                <!-- DEDICATED 4-COLUMN BOARD OF STUDIES BLOCK: CHRISTIAN -->
                <div class="px-6 sm:px-8 pb-8 bg-slate-50/60 border-t border-slate-100">
                    @include('partials.chamber-board-of-studies', [
                        'chamberKey' => 'christian',
                        'chamberName' => 'Chamber of Christian Studies',
                        'members' => $boardOfStudies['christian'] ?? []
                    ])
                </div>
            </div>

        </section>

    </main>

</div>

@endsection
