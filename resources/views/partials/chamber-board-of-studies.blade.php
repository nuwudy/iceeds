@php
    $themeMap = [
        'hindutva' => [
            'ring' => 'from-amber-500 via-yellow-400 to-amber-600',
            'badge' => 'bg-amber-50 text-amber-900 border border-amber-200',
            'dot' => 'bg-amber-500',
            'role_badge' => 'bg-amber-100/90 text-amber-800 border border-amber-200',
            'border_hover' => 'hover:border-amber-400 hover:ring-2 hover:ring-amber-400/20',
            'card_bg' => 'bg-amber-50/20',
            'initials_bg' => 'bg-amber-950 text-amber-300',
        ],
        'islamic' => [
            'ring' => 'from-emerald-500 via-teal-400 to-emerald-600',
            'badge' => 'bg-emerald-50 text-emerald-900 border border-emerald-200',
            'dot' => 'bg-emerald-500',
            'role_badge' => 'bg-emerald-100/90 text-emerald-800 border border-emerald-200',
            'border_hover' => 'hover:border-emerald-400 hover:ring-2 hover:ring-emerald-400/20',
            'card_bg' => 'bg-emerald-50/20',
            'initials_bg' => 'bg-emerald-950 text-emerald-300',
        ],
        'christian' => [
            'ring' => 'from-rose-500 via-pink-400 to-rose-600',
            'badge' => 'bg-rose-50 text-rose-900 border border-rose-200',
            'dot' => 'bg-rose-500',
            'role_badge' => 'bg-rose-100/90 text-rose-800 border border-rose-200',
            'border_hover' => 'hover:border-rose-400 hover:ring-2 hover:ring-rose-400/20',
            'card_bg' => 'bg-rose-50/20',
            'initials_bg' => 'bg-rose-950 text-rose-300',
        ],
    ];

    $cfg = $themeMap[$chamberKey ?? 'hindutva'] ?? $themeMap['hindutva'];
@endphp

<div class="mt-8 pt-8 border-t border-slate-200/90">
    <!-- Block Header -->
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-3 mb-6">
        <div>
            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10.5px] font-black uppercase tracking-wider {{ $cfg['badge'] }}">
                <span class="w-1.5 h-1.5 rounded-full {{ $cfg['dot'] }} animate-pulse"></span>
                <span>Academic Governance</span>
            </div>
            <h3 class="text-xl sm:text-2xl font-black font-heading text-slate-950 mt-1.5 tracking-tight">
                Board of Studies &bull; {{ $chamberName }}
            </h3>
            <p class="text-xs sm:text-sm text-slate-600 mt-0.5 max-w-2xl leading-relaxed">
                Distinguished faculty scholars, theologians, and researchers overseeing curriculum authenticity, textual hermeneutics, and academic certification standards.
            </p>
        </div>
        <div class="text-[11px] font-mono text-slate-500 shrink-0 bg-slate-100 px-3 py-1 rounded-lg border border-slate-200">
            4-Member Academic Panel
        </div>
    </div>

    <!-- 4-Column Profile Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
        @foreach($members as $member)
            <div class="bg-white rounded-3xl p-5 border border-slate-200/90 shadow-xs hover:shadow-xl {{ $cfg['border_hover'] }} transition-all duration-300 flex flex-col justify-between text-center group">
                
                <div>
                    <!-- Member Photograph Frame (Clean rounded rectangular frame with verified badge) -->
                    <div class="relative w-20 h-20 sm:w-22 sm:h-22 mx-auto mb-3.5">
                        <div class="w-full h-full rounded-2xl p-1 bg-gradient-to-tr {{ $cfg['ring'] }} shadow-md group-hover:scale-105 transition-transform duration-300">
                            <div class="w-full h-full rounded-[13px] overflow-hidden bg-slate-900 border border-white flex items-center justify-center">
                                @if(!empty($member['photo']) && file_exists(public_path($member['photo'])))
                                    <img src="{{ asset($member['photo']) }}" 
                                         alt="{{ $member['name'] }}" 
                                         loading="lazy" 
                                         class="w-full h-full object-cover object-top">
                                @else
                                    <div class="w-full h-full {{ $cfg['initials_bg'] }} font-heading font-black text-lg sm:text-xl flex items-center justify-center tracking-tight">
                                        {{ $member['initials'] ?? 'BOS' }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Verified Academic Seal -->
                        <div class="absolute -bottom-1 -right-1 w-6 h-6 rounded-full bg-emerald-500 border-2 border-white text-white flex items-center justify-center shadow-xs" title="Verified Board Member">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>

                    <!-- Member Name -->
                    <h4 class="text-sm sm:text-[15px] font-black text-slate-950 font-heading tracking-tight leading-tight group-hover:text-blue-900 transition-colors">
                        {{ $member['name'] }}
                    </h4>

                    <!-- Role / Designation -->
                    <div class="mt-1.5">
                        <span class="inline-block px-2.5 py-0.5 rounded-full text-[9.5px] sm:text-[10px] font-bold uppercase tracking-wider {{ $cfg['role_badge'] }}">
                            {{ $member['role'] }}
                        </span>
                    </div>

                    <!-- Short Affiliation / Credential Placeholder -->
                    <div class="mt-2.5 pt-2 border-t border-slate-100 text-left">
                        <p class="text-xs font-semibold text-slate-700 leading-snug">
                            {{ $member['credentials'] }}
                        </p>
                        <p class="text-[10.5px] text-slate-500 mt-1 font-mono leading-tight">
                            {{ $member['affiliation'] }}
                        </p>
                    </div>
                </div>

                <!-- Footer Tag -->
                <div class="mt-3.5 pt-2 border-t border-slate-100 text-[9.5px] font-mono text-slate-400 flex items-center justify-between">
                    <span>Curriculum Board</span>
                    <span class="text-emerald-600 font-bold">Appointed</span>
                </div>

            </div>
        @endforeach
    </div>
</div>
