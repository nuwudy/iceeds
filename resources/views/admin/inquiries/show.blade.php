@extends('admin.layouts.app')

@section('title', 'Inquiry Details: ' . $inquiry->name)

@section('content')
    <div class="max-w-4xl mx-auto space-y-6">

        <!-- Top Breadcrumb / Navigation -->
        <div class="flex items-center justify-between gap-4">
            <a 
                href="{{ route('admin.inquiries.index') }}" 
                class="inline-flex items-center gap-2 text-xs font-semibold text-slate-400 hover:text-white transition"
            >
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Back to Inquiries List</span>
            </a>

            <div class="flex items-center gap-2">
                <form 
                    action="{{ route('admin.inquiries.destroy', $inquiry) }}" 
                    method="POST" 
                    onsubmit="return confirm('Are you sure you want to delete this inquiry?');"
                >
                    @csrf
                    @method('DELETE')
                    <button 
                        type="submit" 
                        class="px-3.5 py-2 rounded-xl bg-red-500/10 text-red-400 hover:bg-red-600 hover:text-white border border-red-500/20 text-xs font-semibold transition cursor-pointer flex items-center gap-1.5"
                    >
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        <span>Delete Inquiry</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Inquiry Card -->
        <div class="bg-slate-900/90 rounded-3xl p-6 sm:p-8 border border-slate-800 shadow-2xl space-y-6">

            <!-- Header Header -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-6 border-b border-slate-800 gap-4">
                <div>
                    <span class="inline-block px-3 py-1 rounded-lg text-xs font-bold tracking-wide uppercase bg-blue-500/10 text-blue-300 border border-blue-500/20 mb-2">
                        {{ $inquiry->subject }}
                    </span>
                    <h1 class="text-2xl font-black text-white font-heading">{{ $inquiry->name }}</h1>
                    <p class="text-xs text-slate-400 mt-1">
                        Received on {{ $inquiry->created_at->format('F d, Y \a\t h:i A') }} ({{ $inquiry->created_at->diffForHumans() }})
                    </p>
                </div>

                <!-- Fast Contact Actions -->
                <div class="flex items-center gap-2">
                    <a 
                        href="mailto:{{ $inquiry->email }}?subject={{ rawurlencode('Re: ' . $inquiry->subject . ' - iCEEDS Academic Registry') }}" 
                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs shadow-md transition"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>Reply by Email</span>
                    </a>

                    @if($inquiry->phone)
                        @php
                            $cleanPhone = preg_replace('/[^0-9]/', '', $inquiry->phone);
                        @endphp
                        <a 
                            href="https://wa.me/{{ $cleanPhone }}" 
                            target="_blank" 
                            rel="noopener noreferrer" 
                            class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs shadow-md transition"
                        >
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                            </svg>
                            <span>WhatsApp</span>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Sender Metadata Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-4 rounded-2xl bg-slate-950/60 border border-slate-800 text-xs">
                <div>
                    <span class="text-slate-400 font-mono text-[10px] uppercase block mb-1">Email Address</span>
                    <a href="mailto:{{ $inquiry->email }}" class="text-white font-mono hover:text-blue-400 transition break-all">
                        {{ $inquiry->email }}
                    </a>
                </div>
                <div>
                    <span class="text-slate-400 font-mono text-[10px] uppercase block mb-1">Phone Number</span>
                    @if($inquiry->phone)
                        <a href="tel:{{ $inquiry->phone }}" class="text-emerald-400 font-mono hover:underline">
                            {{ $inquiry->phone }}
                        </a>
                    @else
                        <span class="text-slate-500 italic">Not provided</span>
                    @endif
                </div>
                <div>
                    <span class="text-slate-400 font-mono text-[10px] uppercase block mb-1">IP Address</span>
                    <span class="text-slate-300 font-mono">{{ $inquiry->ip_address ?? 'Not recorded' }}</span>
                </div>
            </div>

            <!-- Message Body -->
            <div class="space-y-2">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-400 font-mono block">Message Body</span>
                <div class="p-6 rounded-2xl bg-slate-950 border border-slate-800 text-slate-200 text-sm leading-relaxed whitespace-pre-wrap font-sans">
{{ $inquiry->message }}
                </div>
            </div>

        </div>

    </div>
@endsection
