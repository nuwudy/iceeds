@extends('layouts.app')

@section('title', 'Department of Philosophy | Psychology & Sociology Divisions | iCEEDS')
@section('meta_description', 'Official Department of Philosophy at iCEEDS: Advanced studies in Psychology, Cognitive Sciences, Counselling, Social Theory, and Applied Sociology.')

@section('content')

<div x-data="{
    activeTab: '{{ $activeSection === 'all' ? 'all' : $activeSection }}',
    setTab(t) { this.activeTab = t; }
}" class="min-h-screen bg-slate-50 text-slate-800 antialiased">

    <!-- HERO SECTION -->
    <section class="relative py-16 sm:py-24 bg-slate-950 text-white overflow-hidden border-b border-slate-900">
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-blue-600/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-indigo-600/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                
                <div class="lg:col-span-7 space-y-5 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-900/40 border border-blue-600/50 text-xs font-semibold tracking-wide text-blue-200 backdrop-blur-sm">
                        <a href="{{ route('departments.philosophy-theology') }}" class="hover:underline text-blue-300">Department of Philosophy &amp; Theology</a>
                        <span>&rsaquo;</span>
                        <span class="text-white font-bold">Faculty of Philosophy</span>
                    </div>

                    <h1 class="text-3xl sm:text-5xl font-black font-heading tracking-tight leading-tight text-white">
                        Department of <br class="hidden sm:inline">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-sky-300 to-indigo-300">
                            Philosophy
                        </span>
                    </h1>

                    <p class="text-base text-slate-300 leading-relaxed max-w-2xl">
                        Advancing critical inquiry into human cognition, moral agency, social dynamics, and the foundations of knowledge. Structured across two flagship academic divisions: <strong>Psychology</strong> and <strong>Sociology</strong>.
                    </p>

                    <!-- Filter Pill Toggles -->
                    <div class="pt-2 flex flex-wrap items-center gap-2.5 justify-center lg:justify-start text-xs font-bold">
                        <button type="button" 
                                @click="setTab('all')" 
                                :class="activeTab === 'all' ? 'bg-blue-600 text-white shadow-md shadow-blue-900/40' : 'bg-slate-900 text-slate-300 hover:bg-slate-800 border border-slate-700'"
                                class="px-4 py-2.5 rounded-xl transition cursor-pointer">
                            All Disciplines
                        </button>
                        <button type="button" 
                                @click="setTab('psychology')" 
                                :class="activeTab === 'psychology' ? 'bg-blue-600 text-white shadow-md shadow-blue-900/40' : 'bg-slate-900 text-slate-300 hover:bg-slate-800 border border-slate-700'"
                                class="px-4 py-2.5 rounded-xl transition flex items-center gap-1.5 cursor-pointer">
                            <span>Division of Psychology</span>
                            <span class="w-1.5 h-1.5 rounded-full bg-sky-400"></span>
                        </button>
                        <button type="button" 
                                @click="setTab('sociology')" 
                                :class="activeTab === 'sociology' ? 'bg-blue-600 text-white shadow-md shadow-blue-900/40' : 'bg-slate-900 text-slate-300 hover:bg-slate-800 border border-slate-700'"
                                class="px-4 py-2.5 rounded-xl transition flex items-center gap-1.5 cursor-pointer">
                            <span>Division of Sociology</span>
                            <span class="w-1.5 h-1.5 rounded-full bg-indigo-400"></span>
                        </button>
                    </div>
                </div>

                <!-- Department Image -->
                <div class="lg:col-span-5">
                    <div class="rounded-3xl overflow-hidden shadow-2xl border border-blue-500/20 bg-slate-900 group">
                        <div class="aspect-[16/10] overflow-hidden">
                            <img src="{{ $heroImage }}" 
                                 alt="Department of Philosophy - Psychology and Sociology" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- MAIN BODY -->
    <main class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">

        <!-- ========================================================================= -->
        <!-- DIVISION 1: PSYCHOLOGY -->
        <!-- ========================================================================= -->
        <section id="psychology" x-show="activeTab === 'all' || activeTab === 'psychology'" class="space-y-8 scroll-mt-28">
            
            <div class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200 shadow-sm">
                <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6 pb-6 border-b border-slate-100">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-blue-50 border border-blue-200 text-blue-800 text-xs font-bold uppercase tracking-wider mb-2">
                            <span>Academic Division 01</span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-black font-heading text-slate-950 tracking-tight">
                            Psychology: Cognitive Sciences, Human Behaviour &amp; Counselling
                        </h2>
                        <p class="text-xs sm:text-sm text-slate-600 mt-1 max-w-3xl">
                            Examining the architecture of the human mind, emotional regulation, developmental psychology, cognitive processing, and applied therapeutic modalities.
                        </p>
                    </div>

                    <a href="{{ route('contact') }}?course=Psychology+Studies" 
                       class="shrink-0 px-5 py-2.5 bg-blue-700 hover:bg-blue-800 text-white rounded-xl text-xs font-bold shadow-sm transition">
                        Inquire for Enrollment
                    </a>
                </div>

                <!-- 4 Core Pillars of the Psychology Curriculum -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-8">
                    
                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100 space-y-2">
                        <span class="text-xs font-mono font-bold text-blue-600">MOD-01</span>
                        <h3 class="text-sm font-extrabold text-slate-900 font-heading">Cognitive Science &amp; Perception</h3>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Sensory processing, memory formation, linguistic cognition, reasoning heuristics, and the mind-brain relationship in analytical philosophy.
                        </p>
                    </div>

                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100 space-y-2">
                        <span class="text-xs font-mono font-bold text-blue-600">MOD-02</span>
                        <h3 class="text-sm font-extrabold text-slate-900 font-heading">Counselling Psychology</h3>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Evidence-based therapeutic frameworks, Rogerian client-centered communication, crisis intervention, and family counselling ethics.
                        </p>
                    </div>

                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100 space-y-2">
                        <span class="text-xs font-mono font-bold text-blue-600">MOD-03</span>
                        <h3 class="text-sm font-extrabold text-slate-900 font-heading">Child &amp; Adolescent Psychology</h3>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Developmental stages, educational psychology, learning difficulty management (LDM), and special education needs (SEN).
                        </p>
                    </div>

                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100 space-y-2">
                        <span class="text-xs font-mono font-bold text-blue-600">MOD-04</span>
                        <h3 class="text-sm font-extrabold text-slate-900 font-heading">Philosophical Psychology</h3>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Consciousness studies, free will vs determinism, phenomenological epistemology, and psycho-philosophical ethics.
                        </p>
                    </div>

                </div>

                <!-- Offered Certifications & Diplomas in this field -->
                <div class="mt-8 pt-6 border-t border-slate-100">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">
                        Featured Diplomas Monitored by the Academic Board:
                    </h4>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <div class="p-3.5 rounded-xl bg-blue-50/50 border border-blue-100 flex items-center justify-between">
                            <span class="text-xs font-bold text-slate-800">Diploma in Counselling Psychology</span>
                            <span class="text-[10px] font-mono bg-blue-200 text-blue-900 px-2 py-0.5 rounded font-bold">1 Year</span>
                        </div>
                        <div class="p-3.5 rounded-xl bg-blue-50/50 border border-blue-100 flex items-center justify-between">
                            <span class="text-xs font-bold text-slate-800">Child &amp; Adolescent Psychology</span>
                            <span class="text-[10px] font-mono bg-blue-200 text-blue-900 px-2 py-0.5 rounded font-bold">Executive</span>
                        </div>
                        <div class="p-3.5 rounded-xl bg-blue-50/50 border border-blue-100 flex items-center justify-between">
                            <span class="text-xs font-bold text-slate-800">Special Education Needs (SEN)</span>
                            <span class="text-[10px] font-mono bg-blue-200 text-blue-900 px-2 py-0.5 rounded font-bold">Advanced</span>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <!-- ========================================================================= -->
        <!-- DIVISION 2: SOCIOLOGY -->
        <!-- ========================================================================= -->
        <section id="sociology" x-show="activeTab === 'all' || activeTab === 'sociology'" class="space-y-8 scroll-mt-28">
            
            <div class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200 shadow-sm">
                <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6 pb-6 border-b border-slate-100">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-indigo-50 border border-indigo-200 text-indigo-800 text-xs font-bold uppercase tracking-wider mb-2">
                            <span>Academic Division 02</span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-black font-heading text-slate-950 tracking-tight">
                            Sociology: Social Dynamics, Culture &amp; Institutional Epistemology
                        </h2>
                        <p class="text-xs sm:text-sm text-slate-600 mt-1 max-w-3xl">
                            Investigating social institutions, community cohesion, social stratification, cultural evolution, and the collective ethical frameworks of modern civilization.
                        </p>
                    </div>

                    <a href="{{ route('contact') }}?course=Sociology+Studies" 
                       class="shrink-0 px-5 py-2.5 bg-indigo-700 hover:bg-indigo-800 text-white rounded-xl text-xs font-bold shadow-sm transition">
                        Inquire for Enrollment
                    </a>
                </div>

                <!-- 4 Core Pillars of Sociology -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-8">
                    
                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100 space-y-2">
                        <span class="text-xs font-mono font-bold text-indigo-600">SOC-01</span>
                        <h3 class="text-sm font-extrabold text-slate-900 font-heading">Classical &amp; Contemporary Social Theory</h3>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Structural functionalism, conflict theories, symbolic interactionism, and post-modern sociology of knowledge.
                        </p>
                    </div>

                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100 space-y-2">
                        <span class="text-xs font-mono font-bold text-indigo-600">SOC-02</span>
                        <h3 class="text-sm font-extrabold text-slate-900 font-heading">Applied Community Sociology</h3>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Rural-urban community models, tribal anthropology, grassroots social development, and institutional governance.
                        </p>
                    </div>

                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100 space-y-2">
                        <span class="text-xs font-mono font-bold text-indigo-600">SOC-03</span>
                        <h3 class="text-sm font-extrabold text-slate-900 font-heading">Sociology of Religion &amp; Culture</h3>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            How sacred symbols, rituals, and collective consciousness interact with law, governance, and communal harmony.
                        </p>
                    </div>

                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100 space-y-2">
                        <span class="text-xs font-mono font-bold text-indigo-600">SOC-04</span>
                        <h3 class="text-sm font-extrabold text-slate-900 font-heading">Social Policy &amp; Public Welfare</h3>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Social inclusion, gender studies, poverty alleviation mechanisms, and community welfare administration.
                        </p>
                    </div>

                </div>

                <!-- Research & Interdisciplinary Highlights -->
                <div class="mt-8 p-5 rounded-2xl bg-indigo-50/50 border border-indigo-100 text-xs text-slate-700 leading-relaxed">
                    <strong class="text-indigo-950 font-bold">Interdisciplinary Synergy:</strong>
                    Students in the Department of Philosophy benefit from cross-enrollment in cognitive neuroscience, empirical research methodologies, and ethical seminars conducted in collaboration with the Department of Theology.
                </div>
            </div>

        </section>

    </main>

</div>

@endsection
