@extends('admin.layouts.app')

@section('title', 'Public Contact Inquiries')

@section('content')
    <div class="space-y-6">

        <!-- Page Header & Metrics Bar -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-black text-white font-heading tracking-tight">Public Inquiries & Messages</h1>
                <p class="text-xs text-slate-400 mt-1">Official messages submitted via the website contact form</p>
            </div>
            <div class="flex items-center gap-3">
                <span class="px-3.5 py-1.5 rounded-xl bg-amber-500/10 border border-amber-500/30 text-amber-300 text-xs font-bold">
                    {{ number_format($totalCount) }} Total Inquiries
                </span>
            </div>
        </div>

        <!-- Filter & Search Bar -->
        <div class="bg-slate-900/90 rounded-2xl p-4 sm:p-5 border border-slate-800 shadow-xl">
            <form method="GET" action="{{ route('admin.inquiries.index') }}" class="grid grid-cols-1 md:grid-cols-12 gap-3 items-center">
                <!-- Search Input -->
                <div class="md:col-span-6 relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        name="q" 
                        value="{{ $search }}" 
                        placeholder="Search by name, email, phone, or keyword..." 
                        class="w-full pl-10 pr-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition"
                    >
                </div>

                <!-- Subject Dropdown Filter -->
                <div class="md:col-span-4">
                    <select 
                        name="subject" 
                        class="w-full px-3 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600 transition"
                    >
                        <option value="">All Inquiry Topics</option>
                        @foreach($subjects as $subj)
                            <option value="{{ $subj }}" {{ $selectedSubject === $subj ? 'selected' : '' }}>
                                {{ $subj }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Action Buttons -->
                <div class="md:col-span-2 flex items-center gap-2">
                    <button 
                        type="submit" 
                        class="w-full px-4 py-2.5 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white font-bold text-xs rounded-xl shadow-md transition cursor-pointer flex items-center justify-center gap-1.5"
                    >
                        <span>Filter</span>
                    </button>
                    @if(!empty($search) || !empty($selectedSubject))
                        <a 
                            href="{{ route('admin.inquiries.index') }}" 
                            title="Reset filters" 
                            class="px-3 py-2.5 bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-xl text-xs font-semibold transition"
                        >
                            &times;
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Inquiries Table Card -->
        <div class="bg-slate-900/90 rounded-3xl border border-slate-800 shadow-xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="bg-slate-950/60 border-b border-slate-800 text-[11px] uppercase tracking-wider text-slate-400 font-mono">
                            <th class="py-3.5 px-4 font-semibold">Sender Details</th>
                            <th class="py-3.5 px-4 font-semibold">Classification</th>
                            <th class="py-3.5 px-4 font-semibold">Message Preview</th>
                            <th class="py-3.5 px-4 font-semibold">Date Received</th>
                            <th class="py-3.5 px-4 font-semibold text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60">
                        @forelse($inquiries as $inquiry)
                            <tr class="hover:bg-slate-800/40 transition">
                                <td class="py-4 px-4">
                                    <div class="font-bold text-white text-sm">{{ $inquiry->name }}</div>
                                    <div class="flex items-center gap-2 mt-1">
                                        <a href="mailto:{{ $inquiry->email }}" class="text-blue-400 hover:underline font-mono text-[11px]">
                                            {{ $inquiry->email }}
                                        </a>
                                        @if($inquiry->phone)
                                            <span class="text-slate-600">&bull;</span>
                                            <a href="tel:{{ $inquiry->phone }}" class="text-emerald-400 hover:underline font-mono text-[11px]">
                                                {{ $inquiry->phone }}
                                            </a>
                                        @endif
                                    </div>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-block px-2.5 py-1 rounded-lg text-[10px] font-bold tracking-wide uppercase bg-blue-500/10 text-blue-300 border border-blue-500/20">
                                        {{ $inquiry->subject }}
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-slate-300 max-w-sm">
                                    <p class="line-clamp-2 leading-relaxed">
                                        {{ $inquiry->message }}
                                    </p>
                                </td>
                                <td class="py-4 px-4 text-slate-400 font-mono text-[11px] whitespace-nowrap">
                                    <div>{{ $inquiry->created_at->format('M d, Y') }}</div>
                                    <div class="text-slate-500 text-[10px]">{{ $inquiry->created_at->format('h:i A') }} ({{ $inquiry->created_at->diffForHumans() }})</div>
                                </td>
                                <td class="py-4 px-4 text-right whitespace-nowrap">
                                    <div class="inline-flex items-center gap-1.5">
                                        <a 
                                            href="{{ route('admin.inquiries.show', $inquiry) }}" 
                                            class="px-3 py-1.5 rounded-lg bg-blue-600/20 text-blue-300 hover:bg-blue-600 hover:text-white font-semibold text-[11px] transition"
                                        >
                                            View Full
                                        </a>

                                        @if($inquiry->phone)
                                            @php
                                                $cleanPhone = preg_replace('/[^0-9]/', '', $inquiry->phone);
                                            @endphp
                                            <a 
                                                href="https://wa.me/{{ $cleanPhone }}" 
                                                target="_blank" 
                                                rel="noopener noreferrer" 
                                                title="Chat via WhatsApp" 
                                                class="p-1.5 rounded-lg bg-emerald-500/10 text-emerald-400 hover:bg-emerald-600 hover:text-white transition"
                                            >
                                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                                                </svg>
                                            </a>
                                        @endif

                                        <form 
                                            action="{{ route('admin.inquiries.destroy', $inquiry) }}" 
                                            method="POST" 
                                            class="inline" 
                                            onsubmit="return confirm('Are you sure you want to delete this inquiry from {{ addslashes($inquiry->name) }}?');"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="submit" 
                                                title="Delete Inquiry" 
                                                class="p-1.5 rounded-lg bg-red-500/10 text-red-400 hover:bg-red-600 hover:text-white transition cursor-pointer"
                                            >
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-12 text-center text-slate-500">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <svg class="w-8 h-8 text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                        </svg>
                                        <p class="text-sm font-medium">No contact inquiries found.</p>
                                        @if(!empty($search) || !empty($selectedSubject))
                                            <a href="{{ route('admin.inquiries.index') }}" class="text-blue-400 hover:underline text-xs">Clear search &amp; filters</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($inquiries->hasPages())
                <div class="px-6 py-4 border-t border-slate-800 bg-slate-950/40">
                    {{ $inquiries->links() }}
                </div>
            @endif
        </div>

    </div>
@endsection
