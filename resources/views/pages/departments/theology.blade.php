@extends('layouts.app')

@section('title', 'Department of Theology | Chambers of Islamic, Christian & Hindutva Studies | iCEEDS')
@section('meta_description', 'Official Department of Theology at iCEEDS: Specialized academic research chambers for Islamic Studies, Christian Studies, and Hindutva Studies.')

@section('content')

<div x-data="{
    activeChamber: '{{ $chamber === 'all' ? 'all' : $chamber }}',
    setChamber(c) { this.activeChamber = c; }
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
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-300 via-amber-200 to-amber-400">
                        Theology
                    </span>
                </h1>

                <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                    A revered academic faculty dedicated to the scholarly study of world faith traditions, classical hermeneutics, spiritual philosophy, and comparative ethics. Organized into three autonomous research chambers.
                </p>

                <!-- 3 Chamber Filter Tabs -->
                <div class="pt-4 flex flex-wrap items-center justify-center gap-3 text-xs font-bold">
                    <button type="button" 
                            @click="setChamber('all')" 
                            :class="activeChamber === 'all' ? 'bg-amber-500 text-slate-950 shadow-lg shadow-amber-950/40 font-black' : 'bg-slate-900 text-slate-300 hover:bg-slate-800 border border-slate-700'"
                            class="px-5 py-3 rounded-xl transition cursor-pointer">
                        All Chambers (3)
                    </button>
                    <button type="button" 
                            @click="setChamber('islamic')" 
                            :class="activeChamber === 'islamic' ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-950/40' : 'bg-slate-900 text-slate-300 hover:bg-slate-800 border border-slate-700'"
                            class="px-5 py-3 rounded-xl transition flex items-center gap-2 cursor-pointer">
                        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                        <span>Chamber of Islamic Studies</span>
                    </button>
                    <button type="button" 
                            @click="setChamber('christian')" 
                            :class="activeChamber === 'christian' ? 'bg-rose-600 text-white shadow-lg shadow-rose-950/40' : 'bg-slate-900 text-slate-300 hover:bg-slate-800 border border-slate-700'"
                            class="px-5 py-3 rounded-xl transition flex items-center gap-2 cursor-pointer">
                        <span class="w-2 h-2 rounded-full bg-rose-400"></span>
                        <span>Chamber of Christian Studies</span>
                    </button>
                    <button type="button" 
                            @click="setChamber('hindutva')" 
                            :class="activeChamber === 'hindutva' ? 'bg-amber-600 text-white shadow-lg shadow-amber-950/40' : 'bg-slate-900 text-slate-300 hover:bg-slate-800 border border-slate-700'"
                            class="px-5 py-3 rounded-xl transition flex items-center gap-2 cursor-pointer">
                        <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                        <span>Chamber of Hindutva Studies</span>
                    </button>
                </div>

            </div>
        </div>
    </section>

    <!-- CONTENT DISPLAY AREA: 3 THEOLOGICAL CHAMBERS -->
    <main class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">

        <!-- ========================================================================= -->
        <!-- CHAMBER 01: ISLAMIC STUDIES -->
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
                                Academic Chamber 01
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
            </div>

        </section>

        <!-- ========================================================================= -->
        <!-- CHAMBER 02: CHRISTIAN STUDIES -->
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
                                Academic Chamber 02
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
            </div>

        </section>

        <!-- ========================================================================= -->
        <!-- CHAMBER 03: HINDUTVA STUDIES -->
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
                                Academic Chamber 03
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
            </div>

        </section>

    </main>

</div>

@endsection
