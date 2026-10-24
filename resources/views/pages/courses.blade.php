@extends('layouts.app')

@section('title', 'Knowledge Partner Program & Course Catalog | Unified Fee Schedule & 43+ Accredited Programs | iCEEDS')
@section('meta_description', 'Official iCEEDS Knowledge Partner Program Unified Fee Schedule & Academic Directory: NSDC Aligned Healthcare & Therapy, Teacher Training, Psychology Diplomas, Micro-Certifications, and Degree Support.')

@section('content')

@php
    $catalogPdfUrl = $catalogPdfUrl ?? asset('documents/iceeds-knowledge-partner-unified-fee-schedule.pdf');
@endphp

<div x-data="{
    activeTab: 'all',
    searchQuery: '',
    selectedCategory: 'all',
    matchesSearch(text) {
        if (!this.searchQuery) return true;
        return (text || '').toLowerCase().includes(this.searchQuery.toLowerCase().trim());
    },
    filterCourses(cat, text) {
        const matchesCat = (this.activeTab === 'all' || this.activeTab === cat);
        const matchesQuery = this.matchesSearch(text);
        return matchesCat && matchesQuery;
    }
}" class="min-h-screen bg-slate-50 text-slate-800 antialiased">

    <!-- ========================================================================= -->
    <!-- PAGE HERO & MASTER KNOWLEDGE PARTNER PROGRAM HEADER -->
    <!-- ========================================================================= -->
    <section class="relative py-16 sm:py-24 bg-slate-950 text-white overflow-hidden border-b border-slate-900">
        <!-- Ambient Decorative Glows -->
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-teal-600/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-blue-600/15 rounded-full blur-3xl pointer-events-none"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center max-w-4xl mx-auto">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-teal-900/40 border border-teal-700/50 text-xs font-semibold tracking-wide text-teal-200 mb-6 backdrop-blur-sm">
                    <span class="inline-block w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>Knowledge Partner Program &bull; Reg. under Indian Trusts Act, 1882</span>
                </div>

                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black font-heading tracking-tight leading-tight sm:leading-none text-white">
                    ICEEDS Skill &amp; Vocational Course Catalog
                </h1>
                
                <p class="mt-4 text-base sm:text-xl font-bold tracking-widest uppercase text-emerald-400 font-heading">
                    Official Knowledge Partner Program &bull; Unified Fee Schedule
                </p>

                <p class="mt-4 text-sm sm:text-base text-slate-300 max-w-3xl mx-auto leading-relaxed">
                    Nationally aligned vocational and professional programs monitored by the Academic Board of Studies. Features 43+ fully accredited courses across 5 core categories, NSDC / Skill India alignment, DigiLocker verification, and transparent installment fee structures.
                </p>

                <!-- TOP PRIMARY ACTION CTA BUTTONS -->
                <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ $catalogPdfUrl }}" 
                       target="_blank"
                       id="top-download-pdf-btn"
                       class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-8 py-4 rounded-xl text-base font-extrabold text-white bg-gradient-to-r from-teal-700 via-teal-800 to-slate-900 hover:from-teal-600 hover:to-slate-800 shadow-xl shadow-teal-950/40 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 border border-teal-500/30">
                        <svg class="w-5 h-5 text-teal-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        <span>Download Complete Unified Fee Schedule &amp; Syllabus (PDF)</span>
                        <span class="text-xs bg-white/20 text-white font-mono px-2 py-0.5 rounded-full ml-1 font-bold">5 Pages</span>
                    </a>

                    <button 
                        type="button" 
                        onclick="openAttestationModal('split')" 
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-4 rounded-xl text-sm font-bold text-slate-200 bg-slate-900/80 hover:bg-slate-800 border border-slate-700 hover:text-white transition-all cursor-pointer">
                        <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        <span>View UAE Embassy Attestation Proof</span>
                    </button>
                </div>

                <!-- 4 KPI BANNERS -->
                <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4 text-left">
                    <div class="p-4 rounded-2xl bg-slate-900/90 border border-slate-800/80 backdrop-blur-md">
                        <div class="text-xs font-bold uppercase tracking-wider text-teal-400">Fee Schedule</div>
                        <div class="text-2xl sm:text-3xl font-black font-heading text-white mt-1">43+ Programs</div>
                        <div class="text-xs text-slate-400 mt-1">Populated Unified Catalog</div>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-900/90 border border-slate-800/80 backdrop-blur-md">
                        <div class="text-xs font-bold uppercase tracking-wider text-emerald-400">Govt. Alignment</div>
                        <div class="text-2xl sm:text-3xl font-black font-heading text-white mt-1">NSDC / Skill India</div>
                        <div class="text-xs text-slate-400 mt-1">DigiLocker Conferred</div>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-900/90 border border-slate-800/80 backdrop-blur-md">
                        <div class="text-xs font-bold uppercase tracking-wider text-amber-400">Transparent Fees</div>
                        <div class="text-2xl sm:text-3xl font-black font-heading text-white mt-1">₹1.2k - ₹40k</div>
                        <div class="text-xs text-slate-400 mt-1">Equal Installment Plans</div>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-900/90 border border-slate-800/80 backdrop-blur-md">
                        <div class="text-xs font-bold uppercase tracking-wider text-sky-400">Global Recognition</div>
                        <div class="text-2xl sm:text-3xl font-black font-heading text-white mt-1">MEA &amp; UAE Attested</div>
                        <div class="text-xs text-slate-400 mt-1">Sample Proof Available</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================================= -->
    <!-- INTERACTIVE DIRECTORY & SEARCH BAR SECTION (STICKY) -->
    <!-- ========================================================================= -->
    <section id="directory" class="py-6 bg-white border-b border-slate-200 sticky top-16 z-30 shadow-sm backdrop-blur-md bg-white/95">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4">
                
                <!-- Instant Live Search Bar -->
                <div class="relative flex-1 max-w-xl">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" 
                           x-model="searchQuery" 
                           placeholder="Search courses, eligibility, fee, or keyword (e.g. 'NSDC', 'Montessori', 'SSLC', '₹12,500', 'IGNOU')..."
                           class="w-full pl-10 pr-10 py-3 bg-slate-50 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-teal-600 focus:border-transparent transition">
                    <button x-show="searchQuery.length > 0" 
                            @click="searchQuery = ''" 
                            class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Fast PDF Download Shortcut in Sticky Bar -->
                <div class="flex items-center gap-3 shrink-0">
                    <a href="{{ $catalogPdfUrl }}" 
                       target="_blank"
                       class="inline-flex items-center gap-2 px-4 py-2.5 bg-teal-800 hover:bg-teal-900 text-white rounded-lg text-xs font-bold transition shadow-sm">
                        <svg class="w-4 h-4 fill-none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        <span>Download Unified Fee Schedule (PDF)</span>
                    </a>
                </div>
            </div>

            <!-- CATEGORY FILTER PILLS -->
            <div class="mt-4 flex items-center gap-2 overflow-x-auto pb-2 scrollbar-none text-xs">
                @foreach($kpCategories as $key => $cat)
                    <button type="button"
                            @click="activeTab = '{{ $key }}'"
                            :class="activeTab === '{{ $key }}' ? 'bg-teal-800 text-white font-bold shadow-sm' : 'bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium'"
                            class="px-3.5 py-1.5 rounded-full whitespace-nowrap transition-all duration-150 flex items-center gap-1.5 cursor-pointer">
                        <span>{{ $cat['short_name'] }}</span>
                        <span class="text-[10px] px-1.5 py-0.2 rounded-full"
                              :class="activeTab === '{{ $key }}' ? 'bg-teal-900 text-teal-200' : 'bg-slate-200 text-slate-600'">
                            {{ $cat['count'] }}
                        </span>
                    </button>
                @endforeach

                <!-- Optional Tab for NSQF Sector Packs (230+ Roles) -->
                <button type="button"
                        @click="activeTab = 'nsqf-sectors'"
                        :class="activeTab === 'nsqf-sectors' ? 'bg-teal-800 text-white font-bold shadow-sm' : 'bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium'"
                        class="px-3.5 py-1.5 rounded-full whitespace-nowrap transition-all duration-150 flex items-center gap-1.5 cursor-pointer border border-slate-300">
                    <span>NSQF Sector Packs (230+ Roles &amp; Degrees)</span>
                </button>
            </div>
        </div>
    </section>

    <!-- ========================================================================= -->
    <!-- MAIN COURSES CONTENT DISPLAY AREA -->
    <!-- ========================================================================= -->
    <main class="py-12 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">

            <!-- ================================================================= -->
            <!-- PART 1: KNOWLEDGE PARTNER PROGRAM COURSES (5 CATEGORIES) -->
            <!-- ================================================================= -->
            @foreach(['category-a', 'category-b', 'category-c', 'category-d', 'category-e'] as $catKey)
                @php
                    $catMeta = $kpCategories[$catKey] ?? null;
                    $catCourses = collect($knowledgePartnerCourses)->where('category', $catKey);
                @endphp

                <section x-show="activeTab === 'all' || activeTab === '{{ $catKey }}'" class="space-y-6">
                    
                    <!-- Category Header Banner -->
                    <div class="bg-white rounded-2xl p-5 sm:p-6 shadow-sm border border-slate-200 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                        <div class="flex items-start gap-3">
                            <span class="w-1.5 h-8 bg-teal-700 rounded-full inline-block mt-0.5 shrink-0"></span>
                            <div>
                                <div class="flex items-center gap-2 flex-wrap">
                                    <span class="text-xs font-bold uppercase tracking-wider text-teal-800 bg-teal-50 border border-teal-200 px-2.5 py-0.5 rounded-md">
                                        {{ $catMeta['code'] ?? 'Category' }}
                                    </span>
                                    <h2 class="text-xl sm:text-2xl font-black font-heading text-slate-900 tracking-tight">
                                        {{ $catMeta['name'] ?? '' }}
                                    </h2>
                                </div>
                                <p class="text-xs sm:text-sm text-slate-500 mt-1">
                                    Official fee schedule conforming to the Knowledge Partner Program directory.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2 shrink-0 self-end md:self-center">
                            <span class="text-xs font-bold text-teal-800 bg-teal-50 border border-teal-200 px-3 py-1 rounded-full">
                                {{ $catMeta['badge'] ?? '' }}
                            </span>
                            <span class="text-xs font-mono font-semibold text-slate-500 bg-slate-100 px-2.5 py-1 rounded-full">
                                {{ count($catCourses) }} Courses
                            </span>
                        </div>
                    </div>

                    <!-- Courses Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($catCourses as $course)
                            <div x-show="matchesSearch('{{ $course['title'] }} {{ $course['eligibility'] }} {{ $course['duration'] }} {{ $course['fee'] }} {{ $course['description'] }} {{ implode(' ', $course['features']) }}')"
                                 class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm hover:shadow-xl hover:border-teal-400 transition-all duration-300 flex flex-col justify-between group">
                                
                                <div>
                                    <!-- Card Header Meta -->
                                    <div class="flex items-center justify-between gap-2 mb-3">
                                        <span class="text-[10px] font-extrabold uppercase tracking-wider px-2.5 py-1 rounded-md bg-teal-50 text-teal-800 border border-teal-100">
                                            {{ $course['badge'] }}
                                        </span>
                                        <span class="text-xs font-mono font-bold text-slate-500 bg-slate-100 px-2.5 py-0.5 rounded-full flex items-center gap-1">
                                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                            <span>{{ $course['duration'] }}</span>
                                        </span>
                                    </div>

                                    <!-- Course Title -->
                                    <h3 class="text-lg font-bold text-slate-900 font-heading group-hover:text-teal-800 transition leading-snug mb-3">
                                        {{ $course['title'] }}
                                    </h3>

                                    <!-- Eligibility Tag -->
                                    <div class="mb-4 inline-flex items-center gap-1.5 text-xs text-slate-600 bg-slate-50 px-3 py-1.5 rounded-xl border border-slate-200/80 w-full">
                                        <svg class="w-4 h-4 text-teal-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        <span class="font-semibold text-slate-700">Eligibility:</span>
                                        <span class="font-bold text-slate-900">{{ $course['eligibility'] }}</span>
                                    </div>

                                    <!-- Prominent Course Fee & Installment Box -->
                                    <div class="mb-4 p-4 rounded-2xl bg-gradient-to-br from-slate-50 to-teal-50/40 border border-slate-200">
                                        <div class="flex items-baseline justify-between gap-2">
                                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Official Course Fee:</span>
                                            <span class="text-2xl font-black font-heading text-teal-900">{{ $course['fee'] }}</span>
                                        </div>
                                        
                                        <!-- Installment Breakdown Strip -->
                                        <div class="mt-2 pt-2 border-t border-slate-200/80 flex items-center justify-between text-xs text-slate-600">
                                            <span class="font-medium text-[11px] text-teal-800 flex items-center gap-1">
                                                <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                                <span>{{ $course['installment_detail'] }}</span>
                                            </span>
                                        </div>

                                        @if(!empty($course['upgrade_fee']))
                                            <div class="mt-2 pt-1.5 border-t border-dashed border-teal-200 text-[11px] font-semibold text-amber-700">
                                                ★ {{ $course['upgrade_note'] }}
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Description -->
                                    <p class="text-xs text-slate-600 leading-relaxed mb-4 line-clamp-3">
                                        {{ $course['description'] }}
                                    </p>

                                    <!-- Course Highlights Checklist -->
                                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-100 mb-4 space-y-1.5">
                                        @foreach(array_slice($course['features'], 0, 3) as $feat)
                                            <div class="flex items-start gap-1.5 text-xs text-slate-700">
                                                <svg class="w-3.5 h-3.5 text-emerald-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                <span class="line-clamp-1 font-medium">{{ $feat }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Card Footer Actions -->
                                <div class="pt-4 border-t border-slate-100 flex items-center justify-between gap-2">
                                    <a href="{{ route('contact') }}?course={{ urlencode($course['title']) }}" 
                                       class="inline-flex items-center gap-1.5 text-xs font-extrabold text-white bg-teal-800 hover:bg-teal-900 px-4 py-2.5 rounded-xl transition shadow-sm">
                                        <span>Apply / Enroll &rarr;</span>
                                    </a>

                                    <button 
                                        type="button" 
                                        onclick="openAttestationModal('split')"
                                        class="inline-flex items-center gap-1 text-xs font-bold text-slate-600 hover:text-teal-800 transition cursor-pointer"
                                        title="View sample embassy attestation seal"
                                    >
                                        <svg class="w-3.5 h-3.5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                                        <span>Attestation</span>
                                    </button>
                                </div>

                            </div>
                        @endforeach
                    </div>

                </section>
            @endforeach

            <!-- ========================================================================= -->
            <!-- PART 2: DEDICATED INTERNATIONAL ATTESTATION & EMBASSY DISCLAIMER SECTION -->
            <!-- ========================================================================= -->
            <div x-show="activeTab === 'all' || activeTab === 'category-a' || activeTab === 'category-b' || activeTab === 'category-c'">
                @include('partials.international-attestation')
            </div>

            <!-- ========================================================================= -->
            <!-- PART 3: NSQF SECTORS (230+ CERTIFIED ROLES) & B.VOC / M.VOC TRADES -->
            <!-- ========================================================================= -->
            <div x-show="activeTab === 'all' || activeTab === 'nsqf-sectors'" class="space-y-16 pt-8 border-t border-slate-200">
                
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm">
                    <span class="text-xs font-bold uppercase tracking-wider text-teal-800 bg-teal-50 border border-teal-200 px-3 py-1 rounded-full">
                        National Qualification Packs
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-black font-heading text-slate-900 mt-3">
                        NSQF Levels 2 to 6 Sector Qualification Packs (230+ Certified Roles)
                    </h2>
                    <p class="text-sm text-slate-600 mt-2 max-w-3xl leading-relaxed">
                        Industry-certified roles developed under Sector Skill Councils (SSC) and National Skill Development Corporation (NSDC) frameworks.
                    </p>
                </div>

                {{-- LOOP THROUGH SECTORS 1 TO 7 --}}
                @foreach($sectors as $sec)
                    @if($sec['id'] !== 'vocational-degree')
                        <section class="space-y-4">
                            <!-- Sector Header Bar -->
                            <div class="bg-white rounded-2xl p-5 sm:p-6 shadow-sm border border-slate-200 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                                <div class="flex items-start gap-3">
                                    <span class="w-1.5 h-8 bg-teal-700 rounded-full inline-block mt-0.5 shrink-0"></span>
                                    <div>
                                        <div class="flex items-center gap-2 flex-wrap">
                                            <h3 class="text-xl sm:text-2xl font-black font-heading text-slate-900 tracking-tight">
                                                {{ $sec['section_num'] }}. {{ $sec['title'] }}
                                            </h3>
                                        </div>
                                        <p class="text-xs sm:text-sm text-slate-500 mt-0.5">
                                            {{ $sec['description'] }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-2 shrink-0 self-end md:self-center">
                                    <span class="text-xs font-bold text-teal-800 bg-teal-50 border border-teal-200 px-3 py-1 rounded-full">
                                        {{ $sec['council'] }}
                                    </span>
                                    <span class="text-xs font-mono font-semibold text-slate-500 bg-slate-100 px-2.5 py-1 rounded-full">
                                        {{ count($sec['roles']) }} Roles
                                    </span>
                                </div>
                            </div>

                            {{-- SECTOR 4 SPECIAL PRESENTATION: PART 1 & PART 2 (ESSCI STANDARDS) --}}
                            @if($sec['id'] === 'electronics')
                                @php
                                    $part1Roles = array_slice($sec['roles'], 0, 32);
                                    $part2Roles = array_slice($sec['roles'], 32);
                                @endphp

                                <!-- Part 1: R&D, Design & Core S&C -->
                                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                                    <div class="px-5 py-3.5 bg-slate-100 border-b border-slate-200 flex items-center justify-between">
                                        <h4 class="text-sm font-bold text-slate-800 font-heading flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-teal-600"></span>
                                            <span>Part 1: R&D, Design & Core S&C (Research, Semiconductor & Hardware)</span>
                                        </h4>
                                        <span class="text-xs font-mono font-semibold text-slate-500">32 Roles</span>
                                    </div>
                                    <div class="overflow-x-auto">
                                        <table class="w-full text-left text-sm text-slate-600">
                                            <thead class="bg-[#084c54] text-xs font-bold uppercase text-white tracking-wider">
                                                <tr>
                                                    <th class="px-5 py-3.5 font-heading">Sub-Sector / Occupation</th>
                                                    <th class="px-5 py-3.5 font-heading">Job Role / Qualification Pack Name</th>
                                                    <th class="px-5 py-3.5 font-heading">QP Code</th>
                                                    <th class="px-5 py-3.5 font-heading">Ver.</th>
                                                    <th class="px-5 py-3.5 text-right font-heading">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-slate-100">
                                                @foreach($part1Roles as $role)
                                                    <tr x-show="matchesSearch('{{ $role['role_name'] }} {{ $role['code'] ?? '' }} {{ $role['subsector'] ?? '' }}')"
                                                        class="hover:bg-teal-50/40 odd:bg-white even:bg-slate-50/50 transition">
                                                        <td class="px-5 py-3 text-xs font-medium text-slate-500">{{ $role['subsector'] ?? '' }}</td>
                                                        <td class="px-5 py-3 font-bold text-slate-900">{{ $role['role_name'] }}</td>
                                                        <td class="px-5 py-3 font-mono text-xs font-bold text-teal-800">
                                                            <span class="bg-teal-50 text-teal-800 px-2 py-0.5 rounded border border-teal-200/80">{{ $role['code'] }}</span>
                                                        </td>
                                                        <td class="px-5 py-3 text-xs font-mono">{{ $role['version'] ?? '' }}</td>
                                                        <td class="px-5 py-3 text-right whitespace-nowrap">
                                                            <a href="{{ route('contact') }}?role={{ urlencode($role['role_name']) }}" 
                                                               class="inline-flex items-center gap-1 text-xs font-bold text-teal-800 hover:text-teal-950">
                                                                <span>Inquire</span>
                                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Part 2: Automation, EMS & E-Mobility -->
                                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden mt-6">
                                    <div class="px-5 py-3.5 bg-slate-100 border-b border-slate-200 flex items-center justify-between">
                                        <h4 class="text-sm font-bold text-slate-800 font-heading flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-teal-600"></span>
                                            <span>Part 2: Automation, EMS & E-Mobility (Assembly, Drones, IoT & Solar)</span>
                                        </h4>
                                        <span class="text-xs font-mono font-semibold text-slate-500">32 Roles</span>
                                    </div>
                                    <div class="overflow-x-auto">
                                        <table class="w-full text-left text-sm text-slate-600">
                                            <thead class="bg-[#084c54] text-xs font-bold uppercase text-white tracking-wider">
                                                <tr>
                                                    <th class="px-5 py-3.5 font-heading">Sub-Sector / Occupation</th>
                                                    <th class="px-5 py-3.5 font-heading">Job Role / Qualification Pack Name</th>
                                                    <th class="px-5 py-3.5 font-heading">QP Code</th>
                                                    <th class="px-5 py-3.5 font-heading">Ver.</th>
                                                    <th class="px-5 py-3.5 text-right font-heading">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-slate-100">
                                                @foreach($part2Roles as $role)
                                                    <tr x-show="matchesSearch('{{ $role['role_name'] }} {{ $role['code'] ?? '' }} {{ $role['subsector'] ?? '' }}')"
                                                        class="hover:bg-teal-50/40 odd:bg-white even:bg-slate-50/50 transition">
                                                        <td class="px-5 py-3 text-xs font-medium text-slate-500">{{ $role['subsector'] ?? '' }}</td>
                                                        <td class="px-5 py-3 font-bold text-slate-900">{{ $role['role_name'] }}</td>
                                                        <td class="px-5 py-3 font-mono text-xs font-bold text-teal-800">
                                                            <span class="bg-teal-50 text-teal-800 px-2 py-0.5 rounded border border-teal-200/80">{{ $role['code'] }}</span>
                                                        </td>
                                                        <td class="px-5 py-3 text-xs font-mono">{{ $role['version'] ?? '' }}</td>
                                                        <td class="px-5 py-3 text-right whitespace-nowrap">
                                                            <a href="{{ route('contact') }}?role={{ urlencode($role['role_name']) }}" 
                                                               class="inline-flex items-center gap-1 text-xs font-bold text-teal-800 hover:text-teal-950">
                                                                <span>Inquire</span>
                                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            {{-- SECTOR 1, 2, 3, 5, 6, 7 TABLES --}}
                            @else
                                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                                    <div class="overflow-x-auto">
                                        <table class="w-full text-left text-sm text-slate-600">
                                            <thead class="bg-[#084c54] text-xs font-bold uppercase text-white tracking-wider">
                                                <tr>
                                                    @foreach($sec['columns'] as $col)
                                                        <th class="px-5 py-3.5 font-heading">{{ $col }}</th>
                                                    @endforeach
                                                    <th class="px-5 py-3.5 text-right font-heading">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-slate-100">
                                                @foreach($sec['roles'] as $role)
                                                    <tr x-show="matchesSearch('{{ $role['role_name'] }} {{ $role['code'] ?? '' }} {{ $role['occupation'] ?? '' }} {{ $role['subsector'] ?? '' }} {{ $role['domain'] ?? '' }} {{ $role['stream'] ?? '' }}')"
                                                        class="hover:bg-teal-50/40 odd:bg-white even:bg-slate-50/50 transition">

                                                        {{-- Section 1: Apparel --}}
                                                        @if($sec['id'] === 'apparel')
                                                            <td class="px-5 py-3 font-medium text-slate-500 text-xs">{{ $role['occupation'] ?? '' }}</td>
                                                            <td class="px-5 py-3 font-bold text-slate-900">{{ $role['role_name'] }}</td>
                                                            <td class="px-5 py-3 font-mono text-xs font-bold text-teal-800">
                                                                <span class="bg-teal-50 text-teal-800 px-2 py-0.5 rounded border border-teal-200/80">{{ $role['code'] }}</span>
                                                            </td>
                                                            <td class="px-5 py-3 text-xs">
                                                                <span class="px-2.5 py-0.5 rounded bg-emerald-50 text-emerald-700 font-semibold border border-emerald-200">{{ $role['discipline'] ?? '' }}</span>
                                                            </td>

                                                        {{-- Section 2: Beauty & Wellness --}}
                                                        @elseif($sec['id'] === 'beauty')
                                                            <td class="px-5 py-3 font-bold text-slate-900">{{ $role['role_name'] }}</td>
                                                            <td class="px-5 py-3 font-mono text-xs font-bold text-teal-800">
                                                                <span class="bg-teal-50 text-teal-800 px-2 py-0.5 rounded border border-teal-200/80">{{ $role['code'] }}</span>
                                                            </td>
                                                            <td class="px-5 py-3 text-xs font-mono">{{ $role['version'] ?? '' }}</td>
                                                            <td class="px-5 py-3 text-xs text-slate-500 font-mono">{{ $role['review_date'] ?? '' }}</td>

                                                        {{-- Section 3: Food Processing --}}
                                                        @elseif($sec['id'] === 'food-processing')
                                                            <td class="px-5 py-3 font-medium text-slate-500 text-xs">{{ $role['domain'] ?? '' }}</td>
                                                            <td class="px-5 py-3 font-bold text-slate-900">{{ $role['role_name'] }}</td>
                                                            <td class="px-5 py-3 font-mono text-xs font-bold text-emerald-700">
                                                                <span class="bg-emerald-50 text-emerald-800 px-2.5 py-0.5 rounded border border-emerald-200">{{ $role['duration'] ?? '' }}</span>
                                                            </td>

                                                        {{-- Section 5: IT-ITES --}}
                                                        @elseif($sec['id'] === 'it-ites')
                                                            <td class="px-5 py-3 text-xs font-semibold text-slate-500">{{ $role['domain'] ?? '' }}</td>
                                                            <td class="px-5 py-3 font-bold text-slate-900">{{ $role['role_name'] }}</td>
                                                            <td class="px-5 py-3 text-xs">
                                                                <span class="px-2.5 py-0.5 rounded bg-blue-50 text-blue-800 font-semibold border border-blue-200">{{ $role['stream'] ?? '' }}</span>
                                                            </td>

                                                        {{-- Section 6: Healthcare --}}
                                                        @elseif($sec['id'] === 'healthcare')
                                                            <td class="px-5 py-3 font-bold text-slate-900">{{ $role['role_name'] }}</td>
                                                            <td class="px-5 py-3 font-mono text-xs font-bold text-teal-800">
                                                                <span class="bg-teal-50 text-teal-800 px-2 py-0.5 rounded border border-teal-200/80">{{ $role['code'] }}</span>
                                                            </td>
                                                            <td class="px-5 py-3 text-xs font-mono font-bold text-emerald-700">L-{{ $role['level'] ?? '' }}</td>
                                                            <td class="px-5 py-3 text-xs text-slate-600 max-w-xs">{{ $role['eligibility'] ?? '' }}</td>
                                                            <td class="px-5 py-3 text-xs text-center font-bold text-slate-700">{{ $role['min_age'] ?? '' }}+ yrs</td>

                                                        {{-- Section 7: Management & Security --}}
                                                        @elseif($sec['id'] === 'management-security')
                                                            <td class="px-5 py-3 font-bold text-slate-900">{{ $role['role_name'] }}</td>
                                                            <td class="px-5 py-3 font-mono text-xs font-bold text-teal-800">
                                                                <span class="bg-teal-50 text-teal-800 px-2 py-0.5 rounded border border-teal-200/80">{{ $role['code'] }}</span>
                                                            </td>
                                                            <td class="px-5 py-3 text-xs font-mono font-bold text-purple-700">L-{{ $role['level'] ?? '' }}</td>
                                                            <td class="px-5 py-3 text-xs text-slate-600 max-w-sm">{{ $role['eligibility'] ?? '' }}</td>
                                                        @endif

                                                        <td class="px-5 py-3 text-right whitespace-nowrap">
                                                            <a href="{{ route('contact') }}?role={{ urlencode($role['role_name']) }}" 
                                                               class="inline-flex items-center gap-1 text-xs font-bold text-teal-800 hover:text-teal-950">
                                                                <span>Inquire</span>
                                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endif

                            {{-- Section 5 Special Callout Box Matching PDF Page 5 --}}
                            @if($sec['id'] === 'it-ites')
                                <div class="p-4 rounded-xl bg-teal-50/70 border-l-4 border-teal-600 text-xs text-slate-700 leading-relaxed">
                                    <strong class="text-teal-900 font-bold">Curriculum Note:</strong> IT-ITES courses integrate hands-on project labs, soft skills for client-facing operations, and continuous assessments aligned with industry certifications. Practical exposure to modern dev-stacks and testing harnesses is mandatory.
                                </div>
                            @endif

                            <!-- Section Footer Ribbon -->
                            <div class="px-2 pt-2 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-400 gap-2 border-t border-slate-200/60">
                                <div class="flex items-center gap-2 text-teal-800 font-semibold italic text-[11px]">
                                    <span>Skill for Growth...</span>
                                    <span>&bull;</span>
                                    <span>Skill for Future...</span>
                                    <span>&bull;</span>
                                    <span>Skill for Life...</span>
                                </div>
                                <div class="flex items-center gap-3 text-slate-500 text-[11px]">
                                    <span>connect.iceeds@gmail.com</span>
                                    <span>&bull;</span>
                                    <span>www.iceeds.com</span>
                                    <span>&bull;</span>
                                    <span>+91 7510 2000 95</span>
                                </div>
                            </div>

                        </section>
                    @endif
                @endforeach

                <!-- SECTION 8: VOCATIONAL DEGREE PROGRAMS (B.VOC & M.VOC TRADES) -->
                <section class="space-y-6">
                    <div class="bg-white rounded-2xl p-5 sm:p-6 shadow-sm border border-slate-200 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                        <div class="flex items-start gap-3">
                            <span class="w-1.5 h-8 bg-teal-700 rounded-full inline-block mt-0.5 shrink-0"></span>
                            <div>
                                <h3 class="text-xl sm:text-2xl font-black font-heading text-slate-900 tracking-tight">
                                    8. Vocational Degree Programs (B.Voc &amp; M.Voc Trades)
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-500 mt-0.5">
                                    Multi-entry &amp; exit degree paths with industry apprenticeship, lab training, and university equivalence.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2 shrink-0 self-end md:self-center">
                            <span class="text-xs font-bold text-teal-800 bg-teal-50 border border-teal-200 px-3 py-1 rounded-full">
                                UGC &amp; NEP 2020 Framework
                            </span>
                            <span class="text-xs font-mono font-semibold text-slate-500 bg-slate-100 px-2.5 py-1 rounded-full">
                                24 Trades
                            </span>
                        </div>
                    </div>

                    <!-- 24 B.Voc & M.Voc Table -->
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm text-slate-600">
                                <thead class="bg-[#084c54] text-xs font-bold uppercase text-white tracking-wider">
                                    <tr>
                                        <th class="px-5 py-3.5 w-16 text-center font-heading">Sr.</th>
                                        <th class="px-6 py-3.5 font-heading">Vocational Trade / Discipline</th>
                                        <th class="px-6 py-3.5 font-heading">Approved Specialization</th>
                                        <th class="px-5 py-3.5 text-right font-heading">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    @foreach($degreeTrades as $trade)
                                        <tr x-show="matchesSearch('{{ $trade['trade'] }} {{ $trade['specialization'] }}')" 
                                            class="hover:bg-teal-50/40 odd:bg-white even:bg-slate-50/50 transition">
                                            <td class="px-5 py-3.5 text-center font-mono text-xs font-bold text-slate-400">
                                                {{ str_pad($trade['sr'], 2, '0', STR_PAD_LEFT) }}
                                            </td>
                                            <td class="px-6 py-3.5 font-bold text-slate-900">
                                                {{ $trade['trade'] }}
                                            </td>
                                            <td class="px-6 py-3.5 text-slate-700 font-medium">
                                                <span class="inline-block bg-slate-100 text-slate-800 text-xs font-medium px-2.5 py-1 rounded-md border border-slate-200">
                                                    {{ $trade['specialization'] }}
                                                </span>
                                            </td>
                                            <td class="px-5 py-3.5 text-right whitespace-nowrap">
                                                <a href="{{ route('contact') }}?trade={{ urlencode($trade['trade']) }}" 
                                                   class="inline-flex items-center gap-1 text-xs font-bold text-teal-800 hover:text-teal-950">
                                                    <span>Apply / Inquire</span>
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

            </div>

        </div>
    </main>

    <!-- ========================================================================= -->
    <!-- BOTTOM PROMINENT CONVERSION STRIP -->
    <!-- ========================================================================= -->
    <section class="py-16 bg-gradient-to-r from-teal-900 via-slate-950 to-teal-950 text-white border-t border-slate-800">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block text-xs font-bold uppercase tracking-widest text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-3.5 py-1 rounded-full mb-4">
                Official Knowledge Partner Program Directory
            </span>
            <h2 class="text-3xl sm:text-4xl font-black font-heading tracking-tight">
                Need the Complete Unified Fee Schedule &amp; Syllabus (PDF)?
            </h2>
            <p class="mt-3 text-sm sm:text-base text-slate-300 max-w-2xl mx-auto leading-relaxed">
                Download the official 5-page Knowledge Partner Program Unified Fee Schedule featuring all 43+ programs, eligibility requirements, installment options, and course fees.
            </p>

            <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ $catalogPdfUrl }}" 
                   target="_blank"
                   id="bottom-download-pdf-btn"
                   class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-8 py-4 rounded-xl text-base font-extrabold text-white bg-gradient-to-r from-teal-700 via-teal-800 to-slate-900 hover:from-teal-600 hover:to-slate-800 shadow-xl shadow-teal-950/40 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 border border-teal-500/40">
                    <svg class="w-5 h-5 text-teal-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    <span>Download Complete Unified Fee Schedule &amp; Syllabus (PDF)</span>
                    <span class="text-xs bg-white/20 text-white font-mono px-2 py-0.5 rounded-full ml-1 font-bold">5 Pages &bull; PDF</span>
                </a>

                <a href="{{ route('contact') }}" 
                   class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-4 rounded-xl text-sm font-bold text-slate-200 bg-slate-900/80 hover:bg-slate-800 border border-slate-700 hover:text-white transition-all">
                    <span>Inquire with Academic Admissions</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

</div>

@endsection
