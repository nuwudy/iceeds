@extends('layouts.app')

@section('title', 'Department of Philosophy & Theology | Faculties of Human Thought, Ethics & Divinity | iCEEDS')
@section('meta_description', 'Official Department of Philosophy & Theology at iCEEDS: Comprising the Department of Philosophy (Psychology & Sociology) and Department of Theology (Chambers of Islamic, Christian, and Hindutva Studies).')

@section('content')

<div class="min-h-screen bg-slate-50 text-slate-800 antialiased">

    <!-- PAGE HERO SECTION WITH GENERATED SCHOLARLY BANNER -->
    <section class="relative py-20 sm:py-28 bg-slate-950 text-white overflow-hidden border-b border-slate-900">
        <!-- Ambient Decorative Glows -->
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-amber-600/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-blue-600/15 rounded-full blur-3xl pointer-events-none"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-900/40 border border-amber-600/50 text-xs font-semibold tracking-wide text-amber-200 backdrop-blur-sm">
                        <span class="inline-block w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                        <span>Academic Faculty of Human Sciences, Ethics &amp; Sacred Traditions</span>
                    </div>

                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black font-heading tracking-tight leading-tight text-white">
                        Department of <br class="hidden sm:inline">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-300 via-yellow-200 to-amber-400">
                            Philosophy &amp; Theology
                        </span>
                    </h1>

                    <p class="text-base sm:text-lg text-slate-300 leading-relaxed max-w-2xl">
                        A distinguished center for intellectual inquiry, cognitive sciences, societal dynamics, and comparative theology. Guided by the Academic Board of Studies, bridging classical wisdom, empirical human sciences, and reverent interfaith scholarship.
                    </p>

                    <!-- Quick Navigation Cards to the Two Core Departments -->
                    <div class="pt-4 flex flex-col sm:flex-row items-center gap-4 justify-center lg:justify-start">
                        <a href="{{ route('departments.philosophy') }}" 
                           class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-6 py-3.5 rounded-xl font-bold text-sm text-slate-950 bg-amber-400 hover:bg-amber-300 shadow-lg shadow-amber-950/30 transition-all duration-200">
                            <span>Explore Department of Philosophy</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a href="{{ route('departments.theology') }}" 
                           class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-6 py-3.5 rounded-xl font-bold text-sm text-white bg-slate-900 hover:bg-slate-800 border border-slate-700 transition-all duration-200">
                            <span>Explore Department of Theology</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Hero Image with Stately Frame -->
                <div class="lg:col-span-5">
                    <div class="relative group rounded-3xl overflow-hidden shadow-2xl border border-amber-500/30 bg-slate-900">
                        <div class="aspect-[16/10] sm:aspect-[16/11] overflow-hidden">
                            <img src="{{ $heroImage }}" 
                                 alt="Department of Philosophy & Theology Library" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4 p-4 rounded-2xl bg-slate-950/80 backdrop-blur-md border border-slate-800/80 text-left">
                            <span class="text-[10px] uppercase font-bold tracking-widest text-amber-400">Institutional Faculty Archive</span>
                            <h4 class="text-sm font-extrabold text-white mt-0.5">Philosophy, Human Behaviour &amp; Interfaith Chambers</h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- FACULTY OVERVIEW: 2 CORES (PHILOSOPHY & THEOLOGY) -->
    <section class="py-16 sm:py-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-xs font-black uppercase tracking-widest text-amber-700 bg-amber-50 border border-amber-200 px-3.5 py-1.5 rounded-full">
                Dual Intellectual Pillars
            </span>
            <h2 class="text-3xl sm:text-4xl font-black font-heading text-slate-950 mt-4 tracking-tight">
                Two Integral Departments, One Scholarly Mission
            </h2>
            <p class="text-sm sm:text-base text-slate-600 mt-3 leading-relaxed">
                The Department of Philosophy explores human consciousness, psychology, and societal dynamics. The Department of Theology houses dedicated research chambers dedicated to the major faith traditions of humanity.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- PILLAR 1: DEPARTMENT OF PHILOSOPHY -->
            <div class="bg-white rounded-3xl border border-slate-200/90 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col justify-between group">
                <div>
                    <div class="relative aspect-[16/9] overflow-hidden bg-slate-900">
                        <img src="{{ $philosophyImage }}" 
                             alt="Department of Philosophy" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/30 to-transparent"></div>
                        <div class="absolute bottom-4 left-6">
                            <span class="px-3 py-1 rounded-full text-xs font-bold uppercase bg-blue-600 text-white shadow-sm">
                                Academic Wing 01
                            </span>
                            <h3 class="text-2xl font-black font-heading text-white mt-1">
                                Department of Philosophy
                            </h3>
                        </div>
                    </div>

                    <div class="p-6 sm:p-8 space-y-5">
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Dedicated to systematic inquiry into knowledge, reality, ethics, and human nature. Combining the empirical sciences of human behaviour with critical social reflection.
                        </p>

                        <!-- Two Sub-Divisions: Psychology & Sociology -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                            <div class="p-4 rounded-2xl bg-blue-50/60 border border-blue-100/80">
                                <div class="w-8 h-8 rounded-lg bg-blue-600 text-white flex items-center justify-center font-bold text-xs mb-2">
                                    Ψ
                                </div>
                                <h4 class="font-extrabold text-slate-900 text-sm font-heading">Psychology</h4>
                                <p class="text-xs text-slate-600 mt-1">
                                    Cognitive science, counselling psychology, mental health dynamics, and human behavioural development.
                                </p>
                            </div>

                            <div class="p-4 rounded-2xl bg-indigo-50/60 border border-indigo-100/80">
                                <div class="w-8 h-8 rounded-lg bg-indigo-600 text-white flex items-center justify-center font-bold text-xs mb-2">
                                    Σ
                                </div>
                                <h4 class="font-extrabold text-slate-900 text-sm font-heading">Sociology</h4>
                                <p class="text-xs text-slate-600 mt-1">
                                    Social structures, cultural transformation, community networks, and applied social epistemology.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="px-6 sm:px-8 pb-8 pt-4 border-t border-slate-100 flex items-center justify-between">
                    <span class="text-xs font-semibold text-slate-500">Faculty of Human Sciences</span>
                    <a href="{{ route('departments.philosophy') }}" 
                       class="inline-flex items-center gap-2 text-xs font-bold text-blue-700 hover:text-blue-900 group-hover:translate-x-1 transition-all">
                        <span>View Department Curriculum &rarr;</span>
                    </a>
                </div>
            </div>

            <!-- PILLAR 2: DEPARTMENT OF THEOLOGY -->
            <div class="bg-white rounded-3xl border border-slate-200/90 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col justify-between group">
                <div>
                    <div class="relative aspect-[16/9] overflow-hidden bg-slate-900">
                        <img src="{{ $islamicImage }}" 
                             alt="Department of Theology" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/30 to-transparent"></div>
                        <div class="absolute bottom-4 left-6">
                            <span class="px-3 py-1 rounded-full text-xs font-bold uppercase bg-amber-600 text-white shadow-sm">
                                Academic Wing 02
                            </span>
                            <h3 class="text-2xl font-black font-heading text-white mt-1">
                                Department of Theology
                            </h3>
                        </div>
                    </div>

                    <div class="p-6 sm:p-8 space-y-5">
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Organized into dedicated academic research chambers to study sacred scriptures, jurisprudence, hermeneutics, spiritual philosophy, and interfaith ethics with scholarly rigor.
                        </p>

                        <!-- Three Chambers -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-2">
                            <div class="p-3.5 rounded-2xl bg-emerald-50/70 border border-emerald-100/80">
                                <span class="text-[10px] font-black uppercase tracking-wider text-emerald-800 block">Chamber 01</span>
                                <h4 class="font-extrabold text-slate-900 text-xs font-heading mt-1">Islamic Studies</h4>
                                <p class="text-[11px] text-slate-600 mt-1 leading-snug">
                                    Fiqh, Kalam, Quranic hermeneutics, and classical Islamic philosophy.
                                </p>
                            </div>

                            <div class="p-3.5 rounded-2xl bg-rose-50/70 border border-rose-100/80">
                                <span class="text-[10px] font-black uppercase tracking-wider text-rose-800 block">Chamber 02</span>
                                <h4 class="font-extrabold text-slate-900 text-xs font-heading mt-1">Christian Studies</h4>
                                <p class="text-[11px] text-slate-600 mt-1 leading-snug">
                                    Biblical exegesis, Patristic theology, and Christian pastoral ethics.
                                </p>
                            </div>

                            <div class="p-3.5 rounded-2xl bg-amber-50/70 border border-amber-100/80">
                                <span class="text-[10px] font-black uppercase tracking-wider text-amber-800 block">Chamber 03</span>
                                <h4 class="font-extrabold text-slate-900 text-xs font-heading mt-1">Hindutva Studies</h4>
                                <p class="text-[11px] text-slate-600 mt-1 leading-snug">
                                    Shad-Darshanas, Upanishadic philosophy, and Indic civilization studies.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="px-6 sm:px-8 pb-8 pt-4 border-t border-slate-100 flex items-center justify-between">
                    <span class="text-xs font-semibold text-slate-500">Sacred Traditions &amp; Interfaith Dialogue</span>
                    <a href="{{ route('departments.theology') }}" 
                       class="inline-flex items-center gap-2 text-xs font-bold text-amber-700 hover:text-amber-900 group-hover:translate-x-1 transition-all">
                        <span>Explore 3 Research Chambers &rarr;</span>
                    </a>
                </div>
            </div>

        </div>

    </section>

    <!-- INTERFAITH HARMONY & ACADEMIC INTEGRITY BANNER -->
    <section class="py-16 bg-gradient-to-r from-slate-900 via-slate-950 to-blue-950 text-white border-t border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
                
                <div class="p-6 rounded-2xl bg-slate-900/60 border border-slate-800">
                    <div class="w-10 h-10 rounded-xl bg-amber-500/10 border border-amber-500/20 text-amber-400 flex items-center justify-center font-bold text-lg mb-4">
                        ⚖
                    </div>
                    <h3 class="text-base font-extrabold text-white font-heading">Constitutional &amp; Academic Freedom</h3>
                    <p class="text-xs text-slate-300 mt-2 leading-relaxed">
                        Operating under the Indian Trusts Act, 1882, all studies are structured for objective scholarly exploration, textual hermeneutics, and critical intellectual development.
                    </p>
                </div>

                <div class="p-6 rounded-2xl bg-slate-900/60 border border-slate-800">
                    <div class="w-10 h-10 rounded-xl bg-blue-500/10 border border-blue-500/20 text-blue-400 flex items-center justify-center font-bold text-lg mb-4">
                        🤝
                    </div>
                    <h3 class="text-base font-extrabold text-white font-heading">Interfaith Dialogue &amp; Harmony</h3>
                    <p class="text-xs text-slate-300 mt-2 leading-relaxed">
                        Bridging communities by fostering mutual understanding, ethical solidarity, and comparative scholarship across Islamic, Christian, and Hindu philosophical traditions.
                    </p>
                </div>

                <div class="p-6 rounded-2xl bg-slate-900/60 border border-slate-800">
                    <div class="w-10 h-10 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex items-center justify-center font-bold text-lg mb-4">
                        📜
                    </div>
                    <h3 class="text-base font-extrabold text-white font-heading">Academic Board Oversight</h3>
                    <p class="text-xs text-slate-300 mt-2 leading-relaxed">
                        Curricula are monitored by distinguished scholars, emeritus professors, and subject experts ensuring academic authenticity and professional standard compliance.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- INQUIRY / ADMISSIONS CTA -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
            <span class="text-xs font-bold uppercase tracking-wider text-blue-700 bg-blue-50 border border-blue-200 px-3.5 py-1.5 rounded-full">
                Academic Inquiries &amp; Enrollment
            </span>
            <h2 class="text-3xl font-black font-heading text-slate-950 tracking-tight">
                Interested in Philosophy, Psychology, Sociology, or Theological Research?
            </h2>
            <p class="text-sm text-slate-600 max-w-2xl mx-auto leading-relaxed">
                Connect with our academic admissions committee for course syllabi, research fellowships, and distance learning certifications in philosophical and theological studies.
            </p>
            <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('contact') }}?department=Philosophy+and+Theology" 
                   class="w-full sm:w-auto px-8 py-3.5 rounded-xl font-bold text-sm text-white bg-blue-700 hover:bg-blue-800 shadow-lg shadow-blue-700/20 transition-all">
                    Inquire with Academic Board
                </a>
                <a href="{{ route('courses') }}" 
                   class="w-full sm:w-auto px-6 py-3.5 rounded-xl font-bold text-sm text-slate-700 bg-slate-100 hover:bg-slate-200 transition">
                    View Complete Courses Directory
                </a>
            </div>
        </div>
    </section>

</div>

@endsection
