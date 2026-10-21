@extends('admin.layouts.app')

@section('title', 'Testimonials Moderation | iCEEDS Administration')

@section('content')

<div class="space-y-6">

    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-800">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-500/10 border border-amber-500/20 text-xs font-semibold text-amber-400 font-mono mb-2">
                <span>Alumni Feedback &amp; Verification Desk</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-white font-heading tracking-tight">
                Testimonials Moderation
            </h1>
            <p class="text-xs sm:text-sm text-slate-400 mt-1">
                Reviews with 4 or 5 stars publish automatically. Reviews under 4 stars remain pending here until verified and approved by the administration.
            </p>
        </div>

        <a href="{{ route('testimonials') }}" target="_blank" class="px-4 py-2 rounded-xl text-xs font-bold text-slate-200 bg-slate-800 hover:bg-slate-700 border border-slate-700 transition flex items-center gap-1.5 self-start sm:self-auto">
            <span>View Public Testimonials</span>
            <svg class="w-3.5 h-3.5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
        </a>
    </div>

    <!-- Stats Overview Cards -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        <div class="p-4 rounded-2xl bg-slate-900 border border-slate-800 shadow-sm">
            <span class="text-[11px] font-mono uppercase text-slate-400 font-bold block">Total Reviews</span>
            <span class="text-2xl font-black text-white font-heading mt-1 block">{{ $stats['total'] }}</span>
        </div>
        <div class="p-4 rounded-2xl bg-slate-900 border border-slate-800 shadow-sm">
            <span class="text-[11px] font-mono uppercase text-emerald-400 font-bold block">Approved / Live</span>
            <span class="text-2xl font-black text-emerald-400 font-heading mt-1 block">{{ $stats['approved'] }}</span>
        </div>
        <div class="p-4 rounded-2xl bg-slate-900 border border-amber-500/30 bg-amber-500/5 shadow-sm">
            <span class="text-[11px] font-mono uppercase text-amber-400 font-bold block">Pending Moderation</span>
            <span class="text-2xl font-black text-amber-400 font-heading mt-1 block">{{ $stats['pending'] }}</span>
        </div>
        <div class="p-4 rounded-2xl bg-slate-900 border border-slate-800 shadow-sm">
            <span class="text-[11px] font-mono uppercase text-blue-400 font-bold block">Featured on Home</span>
            <span class="text-2xl font-black text-blue-400 font-heading mt-1 block">{{ $stats['featured'] }}</span>
        </div>
    </div>

    <!-- Filters & Search Toolbar -->
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 bg-slate-900 p-3 rounded-2xl border border-slate-800">
        <div class="flex items-center gap-2 overflow-x-auto w-full sm:w-auto text-xs font-semibold">
            <a href="{{ route('admin.testimonials.index') }}" 
               class="px-3.5 py-1.5 rounded-xl transition {{ $currentStatus === 'all' ? 'bg-blue-600 text-white font-bold' : 'text-slate-400 hover:text-white' }}">
                All ({{ $stats['total'] }})
            </a>
            <a href="{{ route('admin.testimonials.index', ['status' => 'pending']) }}" 
               class="px-3.5 py-1.5 rounded-xl transition flex items-center gap-1.5 {{ $currentStatus === 'pending' ? 'bg-amber-500 text-slate-950 font-black' : 'text-slate-400 hover:text-white' }}">
                <span>Pending Approvals</span>
                @if($stats['pending'] > 0)
                    <span class="px-1.5 py-0.2 rounded-full text-[9px] bg-red-600 text-white font-mono font-bold animate-pulse">
                        {{ $stats['pending'] }}
                    </span>
                @endif
            </a>
            <a href="{{ route('admin.testimonials.index', ['status' => 'approved']) }}" 
               class="px-3.5 py-1.5 rounded-xl transition {{ $currentStatus === 'approved' ? 'bg-blue-600 text-white font-bold' : 'text-slate-400 hover:text-white' }}">
                Approved ({{ $stats['approved'] }})
            </a>
        </div>

        <form action="{{ route('admin.testimonials.index') }}" method="GET" class="w-full sm:w-72">
            <input type="hidden" name="status" value="{{ $currentStatus }}">
            <input type="text" 
                   name="search" 
                   value="{{ $search ?? '' }}"
                   placeholder="Search reviewer or text..."
                   class="w-full px-3.5 py-1.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-blue-500 font-mono">
        </form>
    </div>

    <!-- Testimonials List Table -->
    <div class="bg-slate-900 rounded-3xl border border-slate-800 overflow-hidden shadow-xl">
        @if($testimonials->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-300">
                    <thead class="bg-slate-950 text-slate-400 font-mono uppercase text-[10px] tracking-wider border-b border-slate-800">
                        <tr>
                            <th class="py-3.5 px-4">Reviewer</th>
                            <th class="py-3.5 px-4">Rating</th>
                            <th class="py-3.5 px-6">Testimonial Content</th>
                            <th class="py-3.5 px-4">Status</th>
                            <th class="py-3.5 px-4">Submitted</th>
                            <th class="py-3.5 px-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60">
                        @foreach($testimonials as $t)
                            <tr class="hover:bg-slate-800/40 transition">
                                <td class="py-4 px-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-full bg-slate-800 text-amber-400 font-black text-xs flex items-center justify-center font-heading border border-slate-700 shrink-0">
                                            {{ $t->initials }}
                                        </div>
                                        <div>
                                            <span class="font-bold text-white block">{{ $t->name }}</span>
                                            <span class="text-[11px] text-slate-400 block truncate max-w-[180px]">{{ $t->role_or_course ?: 'Candidate' }}</span>
                                        </div>
                                    </div>
                                </td>

                                <td class="py-4 px-4 whitespace-nowrap">
                                    <div class="flex items-center gap-1 text-amber-400 font-mono font-bold text-sm">
                                        <span>{{ str_repeat('★', $t->rating) }}</span>
                                        <span class="text-xs text-slate-400">({{ $t->rating }}/5)</span>
                                    </div>
                                    @if($t->rating < 4)
                                        <span class="text-[9.5px] font-mono text-amber-400/90 block mt-0.5">Under 4★ Rule</span>
                                    @endif
                                </td>

                                <td class="py-4 px-6 min-w-[260px] max-w-[420px]">
                                    <p class="text-xs text-slate-300 leading-relaxed line-clamp-3 italic">
                                        &ldquo;{{ $t->content }}&rdquo;
                                    </p>
                                </td>

                                <td class="py-4 px-4 whitespace-nowrap">
                                    @if($t->is_approved)
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-mono font-bold bg-emerald-500/15 text-emerald-400 border border-emerald-500/30">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                            <span>Approved &bull; Live</span>
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-mono font-bold bg-amber-500/15 text-amber-400 border border-amber-500/30 animate-pulse">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                                            <span>Pending Review</span>
                                        </span>
                                    @endif

                                    @if($t->is_featured)
                                        <span class="block mt-1 text-[9.5px] font-mono text-blue-400 font-bold">
                                            ★ Featured on Home
                                        </span>
                                    @endif
                                </td>

                                <td class="py-4 px-4 whitespace-nowrap font-mono text-[11px] text-slate-400">
                                    {{ $t->created_at->format('M d, Y') }}
                                </td>

                                <td class="py-4 px-4 whitespace-nowrap text-right">
                                    <div class="inline-flex items-center gap-1.5">
                                        <!-- Toggle Approval -->
                                        <form action="{{ route('admin.testimonials.toggle-approval', $t) }}" method="POST">
                                            @csrf
                                            <button type="submit" 
                                                    class="px-2.5 py-1.5 rounded-lg text-[11px] font-bold transition {{ $t->is_approved ? 'bg-amber-500/15 hover:bg-amber-500/30 text-amber-300 border border-amber-500/30' : 'bg-emerald-600 hover:bg-emerald-500 text-white shadow-sm' }}" 
                                                    title="{{ $t->is_approved ? 'Mark Unapproved' : 'Approve Testimonial' }}">
                                                {{ $t->is_approved ? 'Unapprove' : 'Approve' }}
                                            </button>
                                        </form>

                                        <!-- Toggle Featured -->
                                        <form action="{{ route('admin.testimonials.toggle-featured', $t) }}" method="POST">
                                            @csrf
                                            <button type="submit" 
                                                    class="px-2 py-1.5 rounded-lg text-[11px] font-semibold bg-slate-800 hover:bg-slate-700 text-slate-300 transition" 
                                                    title="{{ $t->is_featured ? 'Remove from Home' : 'Feature on Home' }}">
                                                {{ $t->is_featured ? 'Unfeature' : 'Feature' }}
                                            </button>
                                        </form>

                                        <!-- Delete -->
                                        <form action="{{ route('admin.testimonials.destroy', $t) }}" method="POST" onsubmit="return confirm('Delete this testimonial permanently?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1.5 rounded-lg text-red-400 hover:text-white bg-red-500/10 hover:bg-red-600 transition" title="Delete">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="p-4 border-t border-slate-800">
                {{ $testimonials->links() }}
            </div>
        @else
            <div class="p-12 text-center text-slate-400">
                <p class="font-bold text-sm">No testimonials found for the selected filter.</p>
            </div>
        @endif
    </div>

</div>

@endsection
