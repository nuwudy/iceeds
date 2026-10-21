@extends('admin.layouts.app')

@section('title', 'ATC Registrations')

@section('content')
<div class="space-y-6">

    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2">
                <h1 class="text-2xl font-extrabold text-white font-heading tracking-tight">
                    ATC Registrations
                </h1>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-500/20 text-blue-300 border border-blue-500/30">
                    {{ $counts['total'] }} Total
                </span>
            </div>
            <p class="text-xs text-slate-400 mt-1">
                Institutional Authorized Training Centre applications submitted via the online registration portal.
            </p>
        </div>

        <div class="flex items-center gap-2.5 flex-wrap">
            <a 
                href="{{ route('atc.create') }}" 
                target="_blank" 
                class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-bold text-slate-300 hover:text-white bg-slate-800 hover:bg-slate-700 border border-slate-700 transition"
            >
                <svg class="w-4 h-4 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
                <span>View Public Form</span>
            </a>

            <a 
                href="{{ route('admin.atc.export', request()->query()) }}" 
                class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-bold text-emerald-300 bg-emerald-500/10 hover:bg-emerald-500/20 border border-emerald-500/30 transition shadow-sm"
            >
                <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span>Export CSV</span>
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="p-4 rounded-2xl bg-emerald-500/15 border border-emerald-500/30 text-emerald-300 text-xs font-medium flex items-center justify-between">
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <!-- Status Filters & Metric Pills -->
    <div class="grid grid-cols-2 sm:grid-cols-5 gap-3">
        <a 
            href="{{ route('admin.atc.index', ['q' => $search]) }}" 
            class="p-3.5 rounded-2xl border transition {{ empty($selectedStatus) || $selectedStatus === 'all' ? 'bg-blue-600/20 border-blue-500 text-white shadow-md' : 'bg-slate-900 border-slate-800 text-slate-400 hover:text-slate-200 hover:border-slate-700' }}"
        >
            <span class="text-[10px] font-bold uppercase tracking-wider block">All Submissions</span>
            <span class="text-xl font-extrabold text-white font-mono mt-0.5 block">{{ $counts['total'] }}</span>
        </a>

        <a 
            href="{{ route('admin.atc.index', ['status' => 'pending', 'q' => $search]) }}" 
            class="p-3.5 rounded-2xl border transition {{ $selectedStatus === 'pending' ? 'bg-amber-500/20 border-amber-500 text-white shadow-md' : 'bg-slate-900 border-slate-800 text-slate-400 hover:text-amber-300 hover:border-slate-700' }}"
        >
            <div class="flex items-center justify-between">
                <span class="text-[10px] font-bold uppercase tracking-wider block text-amber-400">Pending</span>
                @if($counts['pending'] > 0)
                    <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                @endif
            </div>
            <span class="text-xl font-extrabold text-white font-mono mt-0.5 block">{{ $counts['pending'] }}</span>
        </a>

        <a 
            href="{{ route('admin.atc.index', ['status' => 'under_review', 'q' => $search]) }}" 
            class="p-3.5 rounded-2xl border transition {{ $selectedStatus === 'under_review' ? 'bg-sky-500/20 border-sky-500 text-white shadow-md' : 'bg-slate-900 border-slate-800 text-slate-400 hover:text-sky-300 hover:border-slate-700' }}"
        >
            <span class="text-[10px] font-bold uppercase tracking-wider block text-sky-400">Under Review</span>
            <span class="text-xl font-extrabold text-white font-mono mt-0.5 block">{{ $counts['under_review'] }}</span>
        </a>

        <a 
            href="{{ route('admin.atc.index', ['status' => 'approved', 'q' => $search]) }}" 
            class="p-3.5 rounded-2xl border transition {{ $selectedStatus === 'approved' ? 'bg-emerald-500/20 border-emerald-500 text-white shadow-md' : 'bg-slate-900 border-slate-800 text-slate-400 hover:text-emerald-300 hover:border-slate-700' }}"
        >
            <span class="text-[10px] font-bold uppercase tracking-wider block text-emerald-400">Approved</span>
            <span class="text-xl font-extrabold text-white font-mono mt-0.5 block">{{ $counts['approved'] }}</span>
        </a>

        <a 
            href="{{ route('admin.atc.index', ['status' => 'rejected', 'q' => $search]) }}" 
            class="p-3.5 rounded-2xl border transition {{ $selectedStatus === 'rejected' ? 'bg-red-500/20 border-red-500 text-white shadow-md' : 'bg-slate-900 border-slate-800 text-slate-400 hover:text-red-300 hover:border-slate-700' }}"
        >
            <span class="text-[10px] font-bold uppercase tracking-wider block text-red-400">Rejected</span>
            <span class="text-xl font-extrabold text-white font-mono mt-0.5 block">{{ $counts['rejected'] }}</span>
        </a>
    </div>

    <!-- Search Form -->
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-4 shadow-sm">
        <form action="{{ route('admin.atc.index') }}" method="GET" class="flex flex-col sm:flex-row items-center gap-3">
            @if(!empty($selectedStatus))
                <input type="hidden" name="status" value="{{ $selectedStatus }}">
            @endif

            <div class="relative flex-1 w-full">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <input 
                    type="text" 
                    name="q" 
                    value="{{ $search }}" 
                    placeholder="Search by centre name, director name, reference no, email, phone..." 
                    class="w-full pl-10 pr-4 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-white text-xs placeholder:text-slate-500 focus:border-blue-500 focus:outline-none"
                >
            </div>

            <div class="flex items-center gap-2 w-full sm:w-auto">
                <button type="submit" class="w-full sm:w-auto px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold transition">
                    Filter
                </button>
                @if(!empty($search) || !empty($selectedStatus))
                    <a href="{{ route('admin.atc.index') }}" class="w-full sm:w-auto text-center px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-semibold transition">
                        Reset
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Submissions Table -->
    <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden shadow-sm">
        @if ($registrations->isEmpty())
            <div class="py-16 text-center px-4">
                <div class="w-14 h-14 rounded-2xl bg-slate-800 text-slate-500 mx-auto flex items-center justify-center mb-3">
                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h3 class="text-sm font-bold text-white">No ATC Applications Found</h3>
                <p class="text-xs text-slate-400 max-w-sm mx-auto mt-1">
                    {{ !empty($search) || !empty($selectedStatus) ? 'No registrations match the selected query. Try resetting your search filters.' : 'No centre registration forms have been submitted yet.' }}
                </p>
                <div class="mt-4">
                    <a href="{{ route('atc.create') }}" target="_blank" class="inline-flex items-center gap-1.5 text-xs text-blue-400 hover:underline">
                        <span>Open public application form</span>
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                </div>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-950/70 border-b border-slate-800 text-[11px] font-bold uppercase tracking-wider text-slate-400">
                        <tr>
                            <th class="py-3.5 px-4">Reference &amp; Date</th>
                            <th class="py-3.5 px-4">Study Centre</th>
                            <th class="py-3.5 px-4">Director / Manager</th>
                            <th class="py-3.5 px-4">Contact Info</th>
                            <th class="py-3.5 px-4">Status</th>
                            <th class="py-3.5 px-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/80">
                        @foreach ($registrations as $reg)
                            <tr class="hover:bg-slate-800/40 transition">
                                <!-- Reference & Date -->
                                <td class="py-3.5 px-4">
                                    <a href="{{ route('admin.atc.show', $reg) }}" class="font-mono font-bold text-blue-400 hover:underline block">
                                        {{ $reg->reference_no }}
                                    </a>
                                    <span class="text-[10px] text-slate-500 font-mono block mt-0.5">
                                        {{ $reg->created_at->format('d M Y, h:i A') }}
                                    </span>
                                </td>

                                <!-- Study Centre -->
                                <td class="py-3.5 px-4">
                                    <span class="font-bold text-white block uppercase tracking-tight">
                                        {{ $reg->centre_name }}
                                    </span>
                                    <span class="text-[11px] text-slate-400 block truncate max-w-xs mt-0.5">
                                        Est: {{ $reg->year_of_establishment }}
                                    </span>
                                </td>

                                <!-- Director -->
                                <td class="py-3.5 px-4">
                                    <span class="font-semibold text-slate-200 block">
                                        {{ $reg->director_name }}
                                    </span>
                                </td>

                                <!-- Contact Info -->
                                <td class="py-3.5 px-4">
                                    <span class="font-mono text-slate-300 block">
                                        {{ $reg->contact_number }}
                                    </span>
                                    <span class="text-[11px] text-slate-400 block truncate max-w-xs mt-0.5">
                                        {{ $reg->email }}
                                    </span>
                                </td>

                                <!-- Status Badge -->
                                <td class="py-3.5 px-4">
                                    @if ($reg->status === 'approved')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                            <span>Approved</span>
                                        </span>
                                    @elseif ($reg->status === 'under_review')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-sky-500/20 text-sky-300 border border-sky-500/30">
                                            <span class="w-1.5 h-1.5 rounded-full bg-sky-400"></span>
                                            <span>Under Review</span>
                                        </span>
                                    @elseif ($reg->status === 'rejected')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-red-500/20 text-red-300 border border-red-500/30">
                                            <span class="w-1.5 h-1.5 rounded-full bg-red-400"></span>
                                            <span>Rejected</span>
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-amber-500/20 text-amber-300 border border-amber-500/30">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-ping"></span>
                                            <span>Pending</span>
                                        </span>
                                    @endif
                                </td>

                                <!-- Actions -->
                                <td class="py-3.5 px-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a 
                                            href="{{ route('admin.atc.show', $reg) }}" 
                                            class="px-3 py-1.5 rounded-lg bg-blue-600/20 hover:bg-blue-600 text-blue-300 hover:text-white font-semibold transition text-[11px]"
                                        >
                                            Review
                                        </a>

                                        <form action="{{ route('admin.atc.destroy', $reg) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this ATC application?');">
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="submit" 
                                                title="Delete Application" 
                                                class="p-1.5 rounded-lg text-slate-500 hover:text-red-400 hover:bg-red-500/10 transition"
                                            >
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if ($registrations->hasPages())
                <div class="p-4 border-t border-slate-800 bg-slate-950/40">
                    {{ $registrations->links() }}
                </div>
            @endif
        @endif
    </div>

</div>
@endsection
