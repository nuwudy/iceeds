@extends('layouts.app')

@section('title', 'Services & Academic Programs | iCEEDS')
@section('meta_description', 'Explore iCEEDS ISO-accredited skill development programs, corporate training, certifications, and academic qualifications.')

@section('content')

    <!-- PAGE HEADER / HERO -->
    <section class="relative py-16 sm:py-20 bg-slate-950 text-white overflow-hidden border-b border-slate-900">
        <div class="absolute inset-0 bg-gradient-to-tr from-blue-950/70 via-slate-950 to-slate-900 opacity-90 pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center">
            <span class="inline-block text-xs font-bold uppercase tracking-widest text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-3.5 py-1 rounded-full mb-3">
                Comprehensive Educational Solutions
            </span>
            <h1 class="text-4xl sm:text-5xl font-black font-heading tracking-tight leading-tight">
                Our Services & Programs
            </h1>
            <p class="mt-4 text-base sm:text-lg text-slate-300 max-w-2xl mx-auto leading-relaxed">
                Comprehensive skill development, globally recognized certifications, and lifelong career support for individuals and organizations.
            </p>
        </div>
    </section>

    <!-- 10-SERVICE MODERN GRID -->
    <section class="py-16 sm:py-24 bg-portal-gradient border-b border-slate-200/70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="text-xs font-bold uppercase tracking-wider text-blue-700 bg-blue-50 border border-blue-200/80 px-3 py-1 rounded-full">Core Catalog</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-950 font-heading tracking-tight mt-3">Ten Pillars of Educational Excellence</h2>
                <p class="mt-3 text-sm text-slate-600">
                    Tailored for individuals seeking career advancement and institutions pursuing accredited program delivery.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                    <div class="bg-white rounded-3xl p-7 border border-slate-200/90 shadow-sm hover:shadow-md transition-all duration-200 flex flex-col justify-between group hover:border-blue-300">
                        <div>
                            <div class="flex items-center justify-between gap-4 mb-5">
                                <span class="font-mono text-2xl font-black text-slate-300 group-hover:text-blue-600 transition">
                                    {{ $service['number'] }}
                                </span>
                                <span class="text-[11px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-md bg-blue-50 text-blue-700 border border-blue-100">
                                    {{ $service['badge'] }}
                                </span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 font-heading mb-3 group-hover:text-blue-700 transition">
                                {{ $service['title'] }}
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                                {{ $service['description'] }}
                            </p>
                        </div>

                        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between text-xs">
                            <span class="text-slate-400 font-medium">Accredited Delivery</span>
                            <a href="{{ route('contact') }}" class="font-bold text-blue-700 hover:text-blue-800 flex items-center gap-1">
                                Inquire &rarr;
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- PROGRAM STRUCTURE BREAKDOWN -->
    <section class="py-16 sm:py-20 bg-white border-b border-slate-200/80">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="text-xs font-bold uppercase tracking-wider text-blue-700 bg-blue-50 border border-blue-200/80 px-3 py-1 rounded-full">Flexible Formats</span>
            <h2 class="text-3xl font-extrabold text-slate-950 font-heading tracking-tight mt-3">Three Academic Tracks</h2>
            <p class="mt-3 text-sm text-slate-600 max-w-xl mx-auto">
                Designed to accommodate full-time students, working executives, and institutional batches.
            </p>

            <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6 text-left">
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200">
                    <span class="text-xs font-bold text-amber-700 uppercase tracking-wider block mb-1">Track 1</span>
                    <h3 class="text-lg font-bold text-slate-900 font-heading">Short-Term Certifications</h3>
                    <p class="text-xs text-slate-600 mt-2 leading-relaxed">
                        Intensive 1 to 3-month skill enhancement modules in specialized areas such as crisis intervention, soft skills, and vocational tools.
                    </p>
                </div>
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200">
                    <span class="text-xs font-bold text-blue-700 uppercase tracking-wider block mb-1">Track 2</span>
                    <h3 class="text-lg font-bold text-slate-900 font-heading">Mid-Term Specializations</h3>
                    <p class="text-xs text-slate-600 mt-2 leading-relaxed">
                        3 to 6-month in-depth professional programs combining theoretical study, practical assignments, and supervised case reviews.
                    </p>
                </div>
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200">
                    <span class="text-xs font-bold text-emerald-700 uppercase tracking-wider block mb-1">Track 3</span>
                    <h3 class="text-lg font-bold text-slate-900 font-heading">Long-Term Post Diplomas</h3>
                    <p class="text-xs text-slate-600 mt-2 leading-relaxed">
                        1-year comprehensive diploma courses such as Counselling Psychology and Learning Difficulty Management with national recognition.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- INSTITUTIONAL AFFILIATION & INQUIRY CTA -->
    <section class="py-16 bg-slate-950 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="text-xs font-bold uppercase tracking-widest text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-3.5 py-1 rounded-full mb-3 inline-block">
                For Institutes & Training Academies
            </span>
            <h2 class="text-3xl sm:text-4xl font-black font-heading tracking-tight">Become an Affiliated Training Partner</h2>
            <p class="mt-4 text-sm sm:text-base text-slate-300 max-w-2xl mx-auto leading-relaxed">
                Partner with iCEEDS to conduct authorized skill development courses and grant ISO-accredited, tamper-proof credentials to your students.
            </p>
            <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
                <a href="{{ route('contact') }}" class="px-7 py-3.5 rounded-xl font-bold text-sm text-white bg-blue-600 hover:bg-blue-500 shadow-lg shadow-blue-600/30 transition">
                    Inquire for Affiliation
                </a>
                <a href="{{ route('verify') }}" class="px-7 py-3.5 rounded-xl font-bold text-sm text-slate-300 bg-white/10 hover:bg-white/20 border border-white/20 transition">
                    Check Credential Verification System
                </a>
            </div>
        </div>
    </section>

@endsection
