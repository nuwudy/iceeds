@php
    $nationalEmblems = [
        [
            'id' => 'nsdc',
            'name' => 'NSDC',
            'badge' => 'Curriculum Aligned',
            'badge_classes' => 'bg-amber-100 text-amber-800 border border-amber-300',
            'pill_classes' => 'bg-amber-500/20 text-amber-300 border border-amber-400/30',
            'category' => 'Govt. of India PPP',
            'url' => asset('storage/media/2026/10/nsdc-logo-ht0zxd.webp'),
            'fallback' => 'https://iceeds.com/storage/media/2026/10/nsdc-logo-ht0zxd.webp',
            'alt' => 'NSDC - National Skill Development Corporation',
            'title' => 'National Skill Development Corporation (NSDC)',
            'subtitle' => 'Under Ministry of Skill Development & Entrepreneurship (MSDE) &bull; Govt. of India',
            'relevance_desc' => 'iCEEDS vocational syllabi, curriculum structures, and assessment standards are designed in strict alignment with the National Skills Qualifications Framework (NSQF) initiated under NSDC directives. This ensures standardized competency benchmarks, structured practical learning outcomes, and nationwide workforce readiness across 4,000+ course disciplines.',
            'status' => '✓ NSQF Aligned Syllabi &bull; Industry Competence'
        ],
        [
            'id' => 'skill-india',
            'name' => 'Skill India',
            'badge' => 'Kaushal Bharat',
            'badge_classes' => 'bg-orange-100 text-orange-800 border border-orange-300',
            'pill_classes' => 'bg-orange-500/20 text-orange-300 border border-orange-400/30',
            'category' => 'National Skilling Mission',
            'url' => asset('storage/media/2026/10/skill-india-gy62mi.webp'),
            'fallback' => 'https://iceeds.com/storage/media/2026/10/skill-india-gy62mi.webp',
            'alt' => 'Skill India - Kaushal Bharat Kushal Bharat',
            'title' => 'Skill India (Kaushal Bharat &bull; Kushal Bharat)',
            'subtitle' => 'National Skill Development Mission &bull; Government of India',
            'relevance_desc' => 'In active resonance with India\'s flagship skilling transformation, iCEEDS drives practical vocational training, women\'s skill enhancement, and grassroots youth enablement. Operating through authorized training centers (ATCs) and specialized faculty chambers, iCEEDS delivers market-demanded competencies that foster self-reliance and gainful employment.',
            'status' => '✓ Mission Participant &bull; Grassroots Upskilling'
        ],
        [
            'id' => 'digilocker',
            'name' => 'DigiLocker',
            'badge' => 'Digital Registry',
            'badge_classes' => 'bg-blue-100 text-blue-800 border border-blue-300',
            'pill_classes' => 'bg-blue-500/20 text-blue-300 border border-blue-400/30',
            'category' => 'MeitY &bull; Digital India',
            'url' => asset('storage/media/2026/10/digilocker-9gyq7g.webp'),
            'fallback' => 'https://iceeds.com/storage/media/2026/10/digilocker-9gyq7g.webp',
            'alt' => 'DigiLocker - National Academic Depository Ecosystem',
            'title' => 'DigiLocker & Digital Academic Records',
            'subtitle' => 'Ministry of Electronics & IT (MeitY) &bull; Digital India',
            'relevance_desc' => 'iCEEDS maintains an enterprise cryptographic credential registry featuring instant alphanumeric and QR code verification. Institutional systems conform to open electronic verification standards, enabling tamper-evident verification, electronic credential portability, and progressive readiness for integration with DigiLocker and the National Academic Depository (NAD).',
            'status' => '✓ 24/7 Live Verification &bull; NAD Compatible'
        ]
    ];
@endphp

<div class="cute-emblems-wrapper relative z-30 select-none">
    <!-- Header Caption -->
    <div class="flex items-center justify-between px-1 mb-1.5">
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

    <!-- 3 Cute Boxes in a Single Row -->
    <div class="grid grid-cols-3 gap-2 sm:gap-3">
        @foreach($nationalEmblems as $emblem)
            <div class="relative group emblem-popover-trigger" tabindex="0" role="button" aria-haspopup="true" aria-label="{{ $emblem['title'] }}">
                <!-- Cute Card -->
                <div class="relative rounded-2xl bg-white/95 backdrop-blur-md p-2 sm:p-2.5 border-2 border-white/80 shadow-md shadow-black/15 group-hover:shadow-xl group-hover:scale-[1.04] group-hover:-translate-y-1 active:scale-95 group-hover:border-cyan-400 group-hover:ring-2 group-hover:ring-cyan-400/30 transition-all duration-200 flex flex-col items-center justify-between text-center cursor-pointer min-h-[92px] sm:min-h-[102px]">
                    
                    <!-- Cute info indicator badge -->
                    <span class="absolute top-1.5 right-1.5 w-4 h-4 rounded-full bg-slate-100 group-hover:bg-cyan-100 text-slate-500 group-hover:text-cyan-800 text-[9px] font-bold flex items-center justify-center transition-colors shadow-2xs" title="Click or hover to view relevance with iCEEDS">
                        i
                    </span>

                    <!-- Emblem Graphic -->
                    <div class="w-full h-10 sm:h-12 flex items-center justify-center pt-1 px-1">
                        <img 
                            src="{{ $emblem['url'] }}" 
                            alt="{{ $emblem['alt'] }}"
                            loading="lazy"
                            onerror="this.onerror=null; this.src='{{ $emblem['fallback'] }}';"
                            class="max-h-8 sm:max-h-10 w-auto max-w-[85%] object-contain pointer-events-none group-hover:scale-105 transition-transform duration-200"
                        >
                    </div>

                    <!-- Title & Tag Badge -->
                    <div class="w-full mt-1">
                        <span class="block text-[11px] sm:text-xs font-black text-slate-900 tracking-tight font-heading leading-tight truncate">
                            {{ $emblem['name'] }}
                        </span>
                        <span class="inline-block mt-0.5 text-[8.5px] sm:text-[9.5px] font-bold px-1.5 py-0.5 rounded-md {{ $emblem['badge_classes'] }} truncate max-w-full leading-none">
                            {{ $emblem['badge'] }}
                        </span>
                    </div>
                </div>

                <!-- Rich Explainer Popover (Hover & Touch) -->
                <div class="emblem-popover pointer-events-none group-hover:pointer-events-auto opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 ease-out absolute z-[100] top-full mt-2.5 left-1/2 -translate-x-1/2 w-72 sm:w-80 p-3.5 bg-slate-950/98 backdrop-blur-md text-white rounded-2xl shadow-2xl border border-slate-700/80 text-left">
                    <!-- Dynamic Arrow (Clamped by Layout Script) -->
                    <div class="popover-arrow absolute -top-1.5 w-3 h-3 bg-slate-950 border-t border-l border-slate-700/80 rotate-45 pointer-events-none transition-all duration-150" style="left: 50%; transform: translateX(-50%) rotate(45deg);"></div>

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
                            {{ $emblem['status'] }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
