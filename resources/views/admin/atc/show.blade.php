@extends('admin.layouts.app')

@section('title', 'Application ' . $registration->reference_no)

@section('content')
<div class="space-y-6">

    <!-- Top Breadcrumb & Status Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-800 pb-5">
        <div>
            <div class="flex items-center gap-2 text-xs text-slate-400 mb-1">
                <a href="{{ route('admin.atc.index') }}" class="hover:text-blue-400 transition flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                    <span>Back to ATC Registrations</span>
                </a>
                <span>/</span>
                <span class="text-slate-200 font-mono">{{ $registration->reference_no }}</span>
            </div>
            
            <div class="flex items-center gap-3">
                <h1 class="text-xl sm:text-2xl font-extrabold text-white font-heading tracking-tight">
                    {{ $registration->centre_name }}
                </h1>

                @if ($registration->status === 'approved')
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">
                        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                        <span>Approved ATC</span>
                    </span>
                @elseif ($registration->status === 'under_review')
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-sky-500/20 text-sky-300 border border-sky-500/30">
                        <span class="w-2 h-2 rounded-full bg-sky-400"></span>
                        <span>Under Review</span>
                    </span>
                @elseif ($registration->status === 'rejected')
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-red-500/20 text-red-300 border border-red-500/30">
                        <span class="w-2 h-2 rounded-full bg-red-400"></span>
                        <span>Rejected</span>
                    </span>
                @else
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-500/20 text-amber-300 border border-amber-500/30">
                        <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                        <span>Pending Review</span>
                    </span>
                @endif
            </div>

            <div class="flex items-center gap-4 text-xs text-slate-400 mt-2 font-mono">
                <span>Submitted: {{ $registration->created_at->format('d M Y, h:i A') }}</span>
                <span>•</span>
                <span>IP: {{ $registration->ip_address ?? 'Not recorded' }}</span>
            </div>
        </div>

        <div class="flex items-center gap-2">
            <form action="{{ route('admin.atc.destroy', $registration) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this application and its uploaded documents?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-3.5 py-2 rounded-xl text-xs font-bold text-red-400 hover:text-white bg-red-500/10 hover:bg-red-600 border border-red-500/20 transition flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                    <span>Delete</span>
                </button>
            </form>
        </div>
    </div>

    @if (session('success'))
        <div class="p-4 rounded-2xl bg-emerald-500/15 border border-emerald-500/30 text-emerald-300 text-xs font-medium flex items-center gap-2">
            <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Left 2 Cols: Centre Details & Director Details -->
        <div class="lg:col-span-2 space-y-6">

            <!-- Study Centre Card -->
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-sm">
                <div class="flex items-center justify-between border-b border-slate-800 pb-3 mb-4">
                    <h2 class="text-sm font-bold text-white font-heading uppercase tracking-wider flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        <span>Study Centre Details</span>
                    </h2>
                    <span class="text-[11px] font-mono text-slate-400">Ref: {{ $registration->reference_no }}</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    <div class="sm:col-span-2">
                        <span class="text-slate-400 block font-semibold text-[11px]">Name of Study Centre (CAPITAL LETTERS)</span>
                        <span class="text-white font-extrabold text-base block mt-0.5 tracking-wide">
                            {{ $registration->centre_name }}
                        </span>
                    </div>

                    <div>
                        <span class="text-slate-400 block font-semibold text-[11px]">Year of Establishment</span>
                        <span class="text-slate-200 font-bold block mt-0.5">
                            {{ $registration->year_of_establishment }}
                        </span>
                    </div>

                    <div class="sm:col-span-2">
                        <span class="text-slate-400 block font-semibold text-[11px]">Address of Study Centre (including PIN Code)</span>
                        <div class="mt-1 p-3 rounded-xl bg-slate-950/70 border border-slate-800 text-slate-200 whitespace-pre-line leading-relaxed">
                            {{ $registration->centre_address }}
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <span class="text-slate-400 block font-semibold text-[11px]">Your Course Name &amp; Duration</span>
                        <div class="mt-1 p-3 rounded-xl bg-slate-950/70 border border-slate-800 text-sky-300 whitespace-pre-line font-medium leading-relaxed">
                            {{ $registration->course_details }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Director / Manager Credentials Card -->
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-sm">
                <div class="flex items-center justify-between border-b border-slate-800 pb-3 mb-4">
                    <h2 class="text-sm font-bold text-white font-heading uppercase tracking-wider flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        <span>Director / Manager Information</span>
                    </h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    <div>
                        <span class="text-slate-400 block font-semibold text-[11px]">Name of Director/Manager</span>
                        <span class="text-white font-bold text-sm block mt-0.5">
                            {{ $registration->director_name }}
                        </span>
                    </div>

                    <div>
                        <span class="text-slate-400 block font-semibold text-[11px]">Official E-MAIL ID</span>
                        <a href="mailto:{{ $registration->email }}" class="text-blue-400 hover:underline font-mono text-xs block mt-0.5">
                            {{ $registration->email }}
                        </a>
                    </div>

                    <div>
                        <span class="text-slate-400 block font-semibold text-[11px]">Contact Number</span>
                        <div class="flex items-center gap-2 mt-0.5">
                            <span class="text-emerald-400 font-mono font-bold">{{ $registration->contact_number }}</span>
                            <a 
                                href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $registration->contact_number) }}" 
                                target="_blank" 
                                class="px-2 py-0.5 rounded text-[10px] bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 hover:bg-emerald-500/30 transition"
                            >
                                WhatsApp
                            </a>
                        </div>
                    </div>

                    <div>
                        <span class="text-slate-400 block font-semibold text-[11px]">Office Number</span>
                        <span class="text-slate-300 font-mono block mt-0.5">
                            {{ $registration->office_number ?: 'Not provided' }}
                        </span>
                    </div>

                    <div class="sm:col-span-2">
                        <span class="text-slate-400 block font-semibold text-[11px]">Address of Director/Manager (including PIN Code)</span>
                        <div class="mt-1 p-3 rounded-xl bg-slate-950/70 border border-slate-800 text-slate-200 whitespace-pre-line leading-relaxed">
                            {{ $registration->director_address }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Declaration Card -->
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5 shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-white uppercase tracking-wider">Institutional Declaration Accepted</h4>
                        <p class="text-[11px] text-slate-400 italic mt-0.5">
                            "I acknowledge visiting the website of ICEEDS and understanding the details of the NGO. By submitting this form, I hereby declare my commitment to abide by the rules & regulations outlined."
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Right 1 Col: Photo / Document Preview & Status Management -->
        <div class="space-y-6">

            <!-- Photograph / Uploaded Document -->
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-sm space-y-4">
                <div class="flex items-center justify-between border-b border-slate-800 pb-3">
                    <h3 class="text-xs font-bold text-white uppercase tracking-wider font-heading">
                        Photograph of Director/Manager
                    </h3>
                </div>

                @if($registration->director_photo_path)
                    <div class="space-y-3">
                        @if($registration->is_image)
                            <div class="rounded-xl overflow-hidden border border-slate-800 bg-slate-950 max-h-72 flex items-center justify-center group relative">
                                <img 
                                    src="{{ $registration->photo_url }}" 
                                    alt="Director Photo" 
                                    class="w-full h-auto max-h-72 object-contain"
                                >
                            </div>
                        @else
                            <div class="p-6 rounded-xl bg-slate-950 border border-slate-800 text-center space-y-2">
                                <svg class="w-12 h-12 text-blue-400 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <span class="text-xs font-bold text-slate-200 block truncate">
                                    {{ $registration->director_photo_original_name ?: 'Uploaded Document' }}
                                </span>
                            </div>
                        @endif

                        <div class="flex items-center gap-2">
                            <a 
                                href="{{ $registration->photo_url }}" 
                                target="_blank" 
                                class="w-full text-center px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold transition flex items-center justify-center gap-1.5 shadow-sm"
                            >
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                <span>Open Full Document</span>
                            </a>
                        </div>
                    </div>
                @else
                    <div class="p-6 text-center text-xs text-slate-500">
                        No photograph uploaded.
                    </div>
                @endif
            </div>

            <!-- Review & Approval Workflow -->
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-sm space-y-4">
                <h3 class="text-xs font-bold text-white uppercase tracking-wider font-heading border-b border-slate-800 pb-3">
                    Administrative Action &amp; Status
                </h3>

                <form action="{{ route('admin.atc.update', $registration) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="status" class="block text-xs font-semibold text-slate-300 mb-1.5">
                            Application Status
                        </label>
                        <select 
                            name="status" 
                            id="status" 
                            class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-white text-xs focus:border-blue-500 focus:outline-none font-semibold"
                        >
                            <option value="pending" {{ $registration->status === 'pending' ? 'selected' : '' }}>Pending Review</option>
                            <option value="under_review" {{ $registration->status === 'under_review' ? 'selected' : '' }}>Under Review / Verification</option>
                            <option value="approved" {{ $registration->status === 'approved' ? 'selected' : '' }}>Approved (Authorized Training Centre)</option>
                            <option value="rejected" {{ $registration->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </div>

                    <div>
                        <label for="admin_notes" class="block text-xs font-semibold text-slate-300 mb-1.5">
                            Internal Admin Notes
                        </label>
                        <textarea 
                            name="admin_notes" 
                            id="admin_notes" 
                            rows="4" 
                            placeholder="Add internal notes, inspection status, affiliation fee tracking, MoU reference, etc."
                            class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-slate-200 text-xs focus:border-blue-500 focus:outline-none placeholder:text-slate-600"
                        >{{ old('admin_notes', $registration->admin_notes) }}</textarea>
                    </div>

                    <button 
                        type="submit" 
                        class="w-full px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold transition shadow-sm"
                    >
                        Save Status &amp; Notes
                    </button>
                </form>
            </div>

        </div>

    </div>

</div>
@endsection
