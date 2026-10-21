@extends('layouts.app')

@section('title', $post->title . ' | iCEEDS Academic Insights')
@section('meta_description', Str::limit(strip_tags($post->excerpt ?: $post->content), 160))

@section('content')

<div class="min-h-screen bg-slate-50 text-slate-800 antialiased">

    <!-- ARTICLE HEADER / HERO -->
    <header class="relative py-16 sm:py-24 bg-slate-950 text-white overflow-hidden border-b border-slate-900">
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-blue-600/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-amber-600/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-2 text-xs text-slate-400 font-mono mb-6">
                <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
                <span>&rsaquo;</span>
                <a href="{{ route('blog.index') }}" class="hover:text-white transition">Knowledge Hub</a>
                <span>&rsaquo;</span>
                <span class="text-amber-400 truncate">{{ $post->category }}</span>
            </nav>

            <div class="space-y-4">
                <div class="flex items-center gap-2.5 flex-wrap">
                    <span class="px-3 py-1 rounded-full text-[10.5px] font-mono font-bold uppercase tracking-wider bg-blue-600/30 text-blue-300 border border-blue-500/40">
                        {{ $post->category }}
                    </span>
                    <span class="text-xs text-slate-400 font-mono">&bull;</span>
                    <span class="text-xs text-slate-300 font-mono">{{ $post->reading_time }}</span>
                    <span class="text-xs text-slate-400 font-mono">&bull;</span>
                    <span class="text-xs text-slate-300 font-mono">
                        {{ $post->published_at ? $post->published_at->format('F d, Y') : $post->created_at->format('F d, Y') }}
                    </span>
                </div>

                <h1 class="text-2xl sm:text-4xl lg:text-5xl font-black font-heading tracking-tight leading-tight text-white">
                    {{ $post->title }}
                </h1>

                @if($post->excerpt)
                    <p class="text-sm sm:text-base text-slate-300 leading-relaxed font-medium pt-2">
                        {{ $post->excerpt }}
                    </p>
                @endif

                <!-- Author Signature Bar -->
                <div class="pt-4 flex items-center justify-between border-t border-slate-800/80">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-blue-600 to-amber-400 text-white font-black text-xs flex items-center justify-center font-heading shadow-xs">
                            IC
                        </div>
                        <div>
                            <span class="text-xs sm:text-sm font-bold text-white block">{{ $post->author_name }}</span>
                            <span class="text-[11px] text-slate-400 font-mono block">{{ $post->author_role }}</span>
                        </div>
                    </div>

                    <a href="{{ route('blog.index') }}" class="text-xs font-mono text-slate-400 hover:text-white transition flex items-center gap-1">
                        &larr; Back to Publications
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- ARTICLE BODY & SIDEBAR -->
    <main class="py-12 sm:py-16 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Featured Image Banner -->
        @if($post->featured_image)
            <div class="rounded-3xl overflow-hidden shadow-2xl border border-slate-200 mb-10 bg-slate-900 aspect-[16/9]">
                <img src="{{ asset($post->featured_image) }}" 
                     alt="{{ $post->title }}" 
                     class="w-full h-full object-cover">
            </div>
        @endif

        <!-- Article Rich Content Body -->
        <article class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200/90 shadow-sm space-y-6 text-slate-800 leading-relaxed text-sm sm:text-base">
            <div class="prose prose-slate max-w-none prose-headings:font-heading prose-headings:text-slate-950 prose-headings:font-black prose-a:text-blue-700 hover:prose-a:underline prose-blockquote:border-l-4 prose-blockquote:border-amber-400 prose-blockquote:bg-amber-50/50 prose-blockquote:p-4 prose-blockquote:rounded-r-xl prose-blockquote:italic prose-blockquote:text-slate-700">
                {!! \Illuminate\Support\Str::markdown($post->content) !!}
            </div>
        </article>

        <!-- Institutional Disclaimer & Legal Attribution -->
        <div class="mt-8 p-5 rounded-2xl bg-slate-100 border border-slate-200 text-xs text-slate-600 space-y-2">
            <div class="font-bold text-slate-900 flex items-center gap-1.5 uppercase font-mono tracking-wider">
                <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                <span>Institutional Disclaimer &bull; iCEEDS Publications</span>
            </div>
            <p class="leading-relaxed">
                Published by the Innovation Council for Exquisite Education &amp; Development of Skills (iCEEDS), an autonomous educational trust established under the Indian Trusts Act, 1882. All academic research, curricula, and certifications are monitored by the Academic Board of Studies. Standalone proprietary certifications hold independent professional validity and are not equivalent to statutory degrees conferred by regulatory bodies such as UGC or AICTE.
            </p>
        </div>

        <!-- Related Articles -->
        @if($relatedPosts->count() > 0)
            <div class="mt-14 pt-10 border-t border-slate-200">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-black font-heading text-slate-950">
                        Related Publications &amp; Research
                    </h3>
                    <a href="{{ route('blog.index') }}" class="text-xs font-bold text-blue-700 hover:underline">
                        View All Articles &rarr;
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                    @foreach($relatedPosts as $rel)
                        <a href="{{ route('blog.show', $rel->slug) }}" class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-xs hover:shadow-md hover:border-blue-400 transition flex flex-col justify-between group">
                            <div>
                                <span class="text-[9.5px] font-mono uppercase font-bold text-blue-700 block mb-1">
                                    {{ $rel->category }}
                                </span>
                                <h4 class="text-xs sm:text-sm font-bold text-slate-900 font-heading leading-snug group-hover:text-blue-700 transition line-clamp-2">
                                    {{ $rel->title }}
                                </h4>
                            </div>
                            <span class="text-[10px] text-slate-400 font-mono mt-3 block">
                                {{ $rel->reading_time }}
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

    </main>

</div>

@endsection
