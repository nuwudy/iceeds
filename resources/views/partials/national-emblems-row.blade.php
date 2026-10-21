@php
    $nationalEmblems = [
        [
            'id' => 'nsdc',
            'name' => 'NSDC',
            'badge' => 'Curriculum Aligned',
            'badge_classes' => 'bg-amber-400/25 text-amber-200 border border-amber-400/40 shadow-xs',
            'pill_classes' => 'bg-amber-500/20 text-amber-300 border border-amber-400/30',
            'category' => 'Govt. of India PPP',
            'url' => asset('images/emblems/nsdc-logo.webp') . '?v=2',
            'fallback' => 'https://iceeds.com/storage/media/2026/10/nsdc-logo-ht0zxd.webp',
            'alt' => 'NSDC - National Skill Development Corporation',
            'title' => 'National Skill Development Corporation (NSDC)',
            'subtitle' => 'Under Ministry of Skill Development & Entrepreneurship (MSDE) • Govt. of India',
            'relevance_desc' => 'iCEEDS vocational syllabi, curriculum structures, and assessment standards are designed in strict alignment with the National Skills Qualifications Framework (NSQF) initiated under NSDC directives. This ensures standardized competency benchmarks, structured practical learning outcomes, and nationwide workforce readiness across 4,000+ course disciplines.',
            'status' => '✓ NSQF Aligned Syllabi • Industry Competence'
        ],
        [
            'id' => 'skill-india',
            'name' => 'Skill India',
            'badge' => 'Kaushal Bharat',
            'badge_classes' => 'bg-orange-400/25 text-orange-200 border border-orange-400/40 shadow-xs',
            'pill_classes' => 'bg-orange-500/20 text-orange-300 border border-orange-400/30',
            'category' => 'National Skilling Mission',
            'url' => asset('images/emblems/skill-india.webp') . '?v=2',
            'fallback' => 'https://iceeds.com/storage/media/2026/10/skill-india-gy62mi.webp',
            'alt' => 'Skill India - Kaushal Bharat Kushal Bharat',
            'title' => 'Skill India (Kaushal Bharat • Kushal Bharat)',
            'subtitle' => 'National Skill Development Mission • Government of India',
            'relevance_desc' => 'In active resonance with India\'s flagship skilling transformation, iCEEDS drives practical vocational training, women\'s skill enhancement, and grassroots youth enablement. Operating through authorized training centers (ATCs) and specialized faculty chambers, iCEEDS delivers market-demanded competencies that foster self-reliance and gainful employment.',
            'status' => '✓ Mission Participant • Grassroots Upskilling'
        ],
        [
            'id' => 'digilocker',
            'name' => 'DigiLocker',
            'badge' => 'Digital Registry',
            'badge_classes' => 'bg-sky-400/25 text-sky-200 border border-sky-400/40 shadow-xs',
            'pill_classes' => 'bg-blue-500/20 text-blue-300 border border-blue-400/30',
            'category' => 'MeitY • Digital India',
            'url' => asset('images/emblems/digilocker.webp') . '?v=2',
            'fallback' => 'https://iceeds.com/storage/media/2026/10/digilocker-9gyq7g.webp',
            'alt' => 'DigiLocker - National Academic Depository Ecosystem',
            'title' => 'DigiLocker & Digital Academic Records',
            'subtitle' => 'Ministry of Electronics & IT (MeitY) • Digital India',
            'relevance_desc' => 'iCEEDS maintains an enterprise cryptographic credential registry featuring instant alphanumeric and QR code verification. Institutional systems conform to open electronic verification standards, enabling tamper-evident verification, electronic credential portability, and progressive readiness for integration with DigiLocker and the National Academic Depository (NAD).',
            'status' => '✓ 24/7 Live Verification • NAD Compatible'
        ]
    ];
@endphp

<div class="cute-emblems-wrapper relative z-30 select-none">
    <!-- Header Caption -->
    <div class="flex items-center justify-between px-1 mb-2">
        <span class="text-[10px] sm:text-[10.5px] font-mono font-bold uppercase tracking-wider text-slate-200 flex items-center gap-1.5 hero-text-outlined">
            <span class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse"></span>
            <span>National Skill &amp; Digital Alliances</span>
        </span>
        <span class="text-[9.5px] text-cyan-200 font-mono italic hero-text-outlined flex items-center gap-1">
            <svg class="w-3 h-3 text-cyan-300" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
            </svg>
            <span>Hover / tap for details</span>
        </span>
    </div>

    <!-- 3 Refined Frosted Glass Cards in a Single Row -->
    <div class="grid grid-cols-3 gap-2 sm:gap-3 relative">
        @foreach($nationalEmblems as $index => $emblem)
            <div class="static sm:relative group emblem-popover-trigger" tabindex="0" role="button" aria-haspopup="true" aria-label="{{ $emblem['title'] }}">
                <!-- Glassmorphic Card Container -->
                <div class="relative rounded-2xl p-2 sm:p-2.5 shadow-lg shadow-black/25 group-hover:shadow-2xl group-hover:scale-[1.03] group-hover:-translate-y-1 active:scale-95 group-hover:border-cyan-300 group-hover:ring-2 group-hover:ring-cyan-400/30 transition-all duration-200 flex flex-col items-center justify-between text-center cursor-pointer min-h-[144px] sm:min-h-[160px]"
                     style="background: rgba(255, 255, 255, 0.15); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); border: 1px solid rgba(255, 255, 255, 0.25);">
                    
                    <!-- Luminous Jewel Info Indicator Badge -->
                    <span class="absolute top-1.5 right-1.5 sm:top-2 sm:right-2 w-4 h-4 rounded-full bg-white/20 group-hover:bg-cyan-400 text-white group-hover:text-slate-950 text-[9px] font-bold border border-white/30 flex items-center justify-center transition-colors shadow-xs" title="Click or hover to view relevance with iCEEDS">
                        i
                    </span>

                    <!-- Emblem Graphic Badge (Enlarged for Maximum Clarity & Recognition) -->
                    <div class="w-full flex items-center justify-center pt-1">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 bg-white rounded-xl sm:rounded-2xl p-1.5 sm:p-2 shadow-md shadow-black/20 border border-white/60 flex items-center justify-center group-hover:scale-105 group-hover:shadow-lg transition-transform duration-200">
                            <img 
                                src="{{ $emblem['url'] }}" 
                                alt="{{ $emblem['alt'] }}"
                                loading="lazy"
                                onerror="this.onerror=null; this.src='{{ $emblem['fallback'] }}';"
                                class="w-full h-full object-contain pointer-events-none"
                                style="image-rendering: -webkit-optimize-contrast;"
                            >
                        </div>
                    </div>

                    <!-- Title & High-Contrast Luminous Badge -->
                    <div class="w-full mt-1.5">
                        <span class="block text-[11.5px] sm:text-xs font-black text-white tracking-tight font-heading leading-tight truncate drop-shadow-xs">
                            {{ $emblem['name'] }}
                        </span>
                        <span class="inline-block mt-1 text-[8.5px] sm:text-[9.5px] font-bold px-2 py-0.5 rounded-full {{ $emblem['badge_classes'] }} truncate max-w-full leading-none tracking-wide">
                            {{ $emblem['badge'] }}
                        </span>
                    </div>
                </div>

                <!-- Rich Explainer Popover (Hover & Touch) - Centered in Middle of Screen on Mobile, Sleek & Arrow-Free -->
                <div class="emblem-popover pointer-events-none group-hover:pointer-events-auto opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 ease-out fixed sm:absolute z-[99999] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 sm:top-full sm:mt-2.5 sm:translate-y-0 w-[calc(100vw-32px)] max-w-[360px] sm:w-80 {{ $index === 0 ? 'sm:left-0 sm:translate-x-0' : ($index === 2 ? 'sm:left-auto sm:right-0 sm:translate-x-0' : 'sm:left-1/2 sm:-translate-x-1/2') }} p-4 sm:p-3.5 bg-slate-950/98 backdrop-blur-xl text-white rounded-2xl shadow-2xl border border-slate-700/80 text-left">

                    <div class="relative z-10 space-y-2">
                        <!-- Header -->
                        <div class="border-b border-slate-800 pb-2">
                            <div class="flex items-center justify-between gap-2 mb-1">
                                <span class="text-[9px] font-mono uppercase font-bold tracking-wider px-2 py-0.5 rounded-full {{ $emblem['pill_classes'] }}">
                                    {{ $emblem['category'] }}
                                </span>
                                <span class="text-[9px] font-mono text-emerald-400 font-bold flex items-center gap-1">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                    Institutional Alignment
                                </span>
                            </div>
                            <h5 class="font-extrabold text-white text-xs sm:text-[13px] font-heading leading-tight tracking-tight">
                                {{ $emblem['title'] }}
                            </h5>
                            <p class="text-slate-400 text-[10px] mt-0.5 leading-snug">
                                {!! $emblem['subtitle'] !!}
                            </p>
                        </div>

                        <!-- Relevance with iCEEDS -->
                        <div>
                            <div class="text-[10px] font-mono font-bold uppercase tracking-wider text-amber-300 flex items-center gap-1 mb-1">
                                <svg class="w-3.5 h-3.5 text-amber-400 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                </svg>
                                <span>Relevance with iCEEDS</span>
                            </div>
                            <p class="text-slate-200 text-[11px] leading-relaxed">
                                {{ $emblem['relevance_desc'] }}
                            </p>
                        </div>

                        <!-- Status Pill -->
                        <div class="pt-1.5 border-t border-slate-800/80 text-[9.5px] font-mono text-emerald-400 font-bold">
                            {!! $emblem['status'] !!}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
