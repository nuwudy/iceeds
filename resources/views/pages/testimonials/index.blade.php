@extends('layouts.app')

@section('title', 'Student & Institutional Testimonials | Verified Reviews & Alumni Feedback | iCEEDS')
@section('meta_description', 'Read verified reviews, student testimonials, and Authorized Training Centre (ATC) feedback for iCEEDS courses and certifications.')

@section('content')

<div x-data="{ submitModalOpen: false }" class="min-h-screen bg-slate-50 text-slate-800 antialiased">

    <!-- HERO SECTION -->
    <section class="relative py-16 sm:py-24 bg-slate-950 text-white overflow-hidden border-b border-slate-900">
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-amber-600/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-blue-600/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <div class="max-w-3xl mx-auto space-y-6">
                
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-500/10 border border-amber-500/30 text-xs font-semibold tracking-wide text-amber-300">
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                    <span>Verified Feedback &amp; Institutional Reputation</span>
                </div>

                <h1 class="text-3xl sm:text-5xl font-black font-heading tracking-tight leading-tight text-white">
                    What Our Students &amp; Partners Say About <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-300 via-yellow-200 to-amber-400">iCEEDS</span>
                </h1>

                <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                    Genuine testimonials from candidates, alumni, and Authorized Training Centres across India sharing their learning experiences, career progressions, and credential verification outcomes.
                </p>

                <!-- Rating Stats Bar & CTA -->
                <div class="pt-2 flex flex-wrap items-center justify-center gap-4">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-2xl bg-slate-900/80 border border-slate-800 text-slate-200 text-xs font-mono">
                        <span class="text-amber-400 text-sm">★★★★★</span>
                        <span class="font-bold text-white text-sm">{{ $averageRating }} / 5.0</span>
                        <span class="text-slate-400">({{ $totalApproved }} Verified Reviews)</span>
                    </div>

                    <button type="button" 
                            @click="submitModalOpen = true"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-bold text-xs sm:text-sm text-slate-950 bg-amber-400 hover:bg-amber-300 shadow-lg shadow-amber-950/40 transition-all cursor-pointer">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                        <span>Share Your Testimonial</span>
                    </button>
                </div>

            </div>
        </div>
    </section>

    <!-- FLASH MESSAGES -->
    @if(session('success'))
        <div class="max-w-4xl mx-auto px-4 mt-8">
            <div class="p-4 rounded-2xl bg-emerald-500/10 border-2 border-emerald-500/40 text-emerald-900 text-sm font-semibold flex items-center gap-3 shadow-md">
                <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <!-- MAIN TESTIMONIALS GRID -->
    <main class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Filter Tabs -->
        <div class="flex items-center justify-between flex-wrap gap-4 mb-10 pb-4 border-b border-slate-200">
            <div class="flex items-center gap-2 text-xs font-bold">
                <a href="{{ route('testimonials') }}" 
                   class="px-4 py-2 rounded-xl transition {{ empty($ratingFilter) ? 'bg-slate-950 text-white' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-100' }}">
                    All Reviews
                </a>
                <a href="{{ route('testimonials', ['rating' => 5]) }}" 
                   class="px-4 py-2 rounded-xl transition flex items-center gap-1.5 {{ $ratingFilter == '5' ? 'bg-amber-500 text-slate-950 font-black' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-100' }}">
                    <span>5 Stars</span>
                    <span class="text-amber-500">★</span>
                </a>
                <a href="{{ route('testimonials', ['rating' => 4]) }}" 
                   class="px-4 py-2 rounded-xl transition flex items-center gap-1.5 {{ $ratingFilter == '4' ? 'bg-amber-500 text-slate-950 font-black' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-100' }}">
                    <span>4 Stars</span>
                    <span class="text-amber-500">★</span>
                </a>
            </div>

            <div class="text-xs text-slate-500 font-mono">
                Showing {{ $testimonials->count() }} of {{ $totalApproved }} Verified Reviews
            </div>
        </div>

        <!-- 3-Column Reviews Cards -->
        @if($testimonials->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($testimonials as $item)
                    <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200/90 shadow-xs hover:shadow-xl hover:border-amber-400/60 transition-all duration-300 flex flex-col justify-between group">
                        <div>
                            <!-- Star Rating -->
                            <div class="flex items-center justify-between mb-4">
                                <div class="text-amber-400 text-sm tracking-wider flex items-center gap-0.5">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $item->rating)
                                            <span>★</span>
                                        @else
                                            <span class="text-slate-200">★</span>
                                        @endif
                                    @endfor
                                </div>
                                <span class="text-[10px] font-mono text-slate-400">
                                    {{ $item->created_at->format('M d, Y') }}
                                </span>
                            </div>

                            <!-- Testimonial Content Quote -->
                            <p class="text-xs sm:text-sm text-slate-700 leading-relaxed italic">
                                &ldquo;{{ $item->content }}&rdquo;
                            </p>
                        </div>

                        <!-- Reviewer Info -->
                        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-amber-500 to-yellow-300 text-slate-950 font-black text-xs flex items-center justify-center shrink-0 shadow-xs uppercase">
                                {{ $item->initials }}
                            </div>
                            <div class="min-w-0 flex-1">
                                <h4 class="text-xs sm:text-sm font-extrabold text-slate-950 truncate font-heading">
                                    {{ $item->name }}
                                </h4>
                                <p class="text-[11px] text-slate-500 truncate mt-0.5">
                                    {{ $item->role_or_course ?: 'Verified Candidate' }}
                                </p>
                            </div>
                            <span class="text-emerald-500 text-xs shrink-0" title="Verified Submission">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $testimonials->links() }}
            </div>
        @else
            <div class="p-12 text-center bg-white rounded-3xl border border-slate-200 max-w-lg mx-auto">
                <span class="text-3xl block mb-2">⭐</span>
                <h3 class="font-bold text-slate-800 text-base">No reviews found</h3>
                <p class="text-xs text-slate-500 mt-1">Be the first to share your learning experience with iCEEDS.</p>
                <button type="button" @click="submitModalOpen = true" class="mt-4 px-5 py-2.5 rounded-xl bg-amber-400 text-slate-950 font-bold text-xs cursor-pointer">
                    Submit a Testimonial
                </button>
            </div>
        @endif

    </main>

    <!-- SUBMISSION MODAL: NAME & TEXT BOX (FAST & EASY) -->
    <div x-show="submitModalOpen" 
         style="display: none;"
         class="fixed inset-0 z-50 overflow-y-auto bg-slate-950/70 backdrop-blur-sm flex items-center justify-center p-4">
        
        <div @click.away="submitModalOpen = false" 
             class="bg-white rounded-3xl max-w-lg w-full p-6 sm:p-8 shadow-2xl border border-slate-200 relative text-left">
            
            <button type="button" 
                    @click="submitModalOpen = false"
                    class="absolute top-5 right-5 p-1 rounded-lg text-slate-400 hover:text-slate-700 bg-slate-100 hover:bg-slate-200 transition cursor-pointer">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            <div class="mb-5">
                <span class="text-[10px] font-mono font-bold uppercase tracking-wider text-amber-700 bg-amber-50 px-2.5 py-0.5 rounded-full border border-amber-200">
                    Alumni &amp; Student Voices
                </span>
                <h3 class="text-xl sm:text-2xl font-black font-heading text-slate-950 mt-1.5">
                    Share Your Feedback
                </h3>
                <p class="text-xs text-slate-500 mt-0.5">
                    Your name and your review are enough. Ratings of 4+ stars publish immediately; other reviews are reviewed promptly by administration.
                </p>
            </div>

            <form action="{{ route('testimonials.store') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Name Input -->
                <div>
                    <label for="name" class="block text-xs font-bold text-slate-700 mb-1">
                        Your Full Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           required 
                           placeholder="e.g. Rahul S. Nair"
                           class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>

                <!-- Star Rating Picker -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">
                        Rating <span class="text-red-500">*</span>
                    </label>
                    <select name="rating" 
                            id="rating"
                            required
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-amber-400 bg-white">
                        <option value="5" selected>★★★★★ - 5 Stars (Outstanding Experience)</option>
                        <option value="4">★★★★☆ - 4 Stars (Very Good Experience)</option>
                        <option value="3">★★★☆☆ - 3 Stars (Satisfactory)</option>
                        <option value="2">★★☆☆☆ - 2 Stars (Needs Improvement)</option>
                        <option value="1">★☆☆☆☆ - 1 Star (Unsatisfactory)</option>
                    </select>
                </div>

                <!-- Role / Course (Optional) -->
                <div>
                    <label for="role_or_course" class="block text-xs font-bold text-slate-700 mb-1">
                        Course / Program / Role <span class="text-slate-400 font-normal">(Optional)</span>
                    </label>
                    <input type="text" 
                           id="role_or_course" 
                           name="role_or_course" 
                           placeholder="e.g. Diploma in Counselling Psychology or ATC Partner"
                           class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>

                <!-- Text Box (Content) -->
                <div>
                    <label for="content" class="block text-xs font-bold text-slate-700 mb-1">
                        Your Feedback / Testimonial <span class="text-red-500">*</span>
                    </label>
                    <textarea id="content" 
                              name="content" 
                              rows="4" 
                              required 
                              placeholder="Write your honest feedback regarding course quality, academic board guidance, examination standards, or certificate verification..."
                              class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-amber-400 leading-relaxed"></textarea>
                </div>

                <div class="pt-2 flex items-center justify-end gap-3">
                    <button type="button" 
                            @click="submitModalOpen = false"
                            class="px-4 py-2.5 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-100 transition cursor-pointer">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="px-6 py-2.5 rounded-xl text-xs font-black text-slate-950 bg-amber-400 hover:bg-amber-300 shadow-md shadow-amber-950/20 transition cursor-pointer">
                        Submit Testimonial
                    </button>
                </div>
            </form>

        </div>
    </div>

</div>

@endsection
