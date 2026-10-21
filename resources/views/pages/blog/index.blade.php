@extends('layouts.app')

@section('title', 'Knowledge Hub & Institutional Blog | Academic Insights & Research | iCEEDS')
@section('meta_description', 'Articles, academic research, and policy insights on vocational education, the Indian Trusts Act 1882, philosophy, theology, and digital credential integrity.')

@section('content')

<div class="min-h-screen bg-slate-50 text-slate-800 antialiased">

    <!-- HERO SECTION -->
    <section class="relative py-16 sm:py-24 bg-slate-950 text-white overflow-hidden border-b border-slate-900">
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-blue-600/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-amber-600/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <div class="max-w-3xl mx-auto space-y-5">
                
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-500/10 border border-blue-500/30 text-xs font-semibold tracking-wide text-blue-300">
                    <span class="w-1.5 h-1.5 rounded-full bg-blue-400 animate-pulse"></span>
                    <span>iCEEDS Academic &amp; Policy Publications</span>
                </div>

                <h1 class="text-3xl sm:text-5xl font-black font-heading tracking-tight leading-tight text-white">
                    Knowledge Hub &amp; <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-sky-300 to-amber-300">Insights</span>
                </h1>

                <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                    Scholarly perspectives on vocational education governance, cognitive sciences, theological research, and digital credential integrity from the iCEEDS Academic Directorate.
                </p>

                <!-- Search Bar -->
                <div class="pt-2 max-w-xl mx-auto">
                    <form action="{{ route('blog.index') }}" method="GET" class="flex items-center bg-slate-900/90 border border-slate-800 rounded-2xl p-1.5 shadow-xl">
                        <input type="text" 
                               name="search" 
                               value="{{ $search ?? '' }}"
                               placeholder="Search articles on governance, theology, psychology..."
                               class="w-full px-4 py-2 bg-transparent text-white text-xs sm:text-sm placeholder-slate-500 focus:outline-none font-mono">
                        <button type="submit" class="px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-bold text-xs transition cursor-pointer">
                            Search
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <!-- MAIN ARTICLES CONTAINER -->
    <main class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Category Pill Filters -->
        <div class="flex items-center justify-between flex-wrap gap-4 pb-4 border-b border-slate-200">
            <div class="flex items-center gap-2 overflow-x-auto text-xs font-bold py-1">
                <a href="{{ route('blog.index') }}" 
                   class="px-4 py-2 rounded-xl transition shrink-0 {{ empty($currentCategory) || $currentCategory === 'all' ? 'bg-slate-950 text-white' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-100' }}">
                    All Topics
                </a>
                @foreach($categories as $cat)
                    <a href="{{ route('blog.index', ['category' => $cat]) }}" 
                       class="px-4 py-2 rounded-xl transition shrink-0 {{ $currentCategory === $cat ? 'bg-blue-600 text-white font-black shadow-md shadow-blue-600/30' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-100' }}">
                        {{ $cat }}
                    </a>
                @endforeach
            </div>

            <div class="text-xs text-slate-500 font-mono">
                {{ $posts->total() }} Articles Published
            </div>
        </div>

        <!-- FEATURED HERO ARTICLE (IF ON FIRST PAGE AND NO SEARCH) -->
        @if(empty($search) && empty($currentCategory) && $posts->currentPage() === 1 && $featuredPost)
            <div class="bg-slate-900 rounded-3xl overflow-hidden shadow-xl border border-slate-800 text-white group">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-0 items-center">
                    <div class="lg:col-span-7 p-6 sm:p-10 space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="px-3 py-1 rounded-full text-[10.5px] font-mono font-bold uppercase tracking-wider bg-amber-500 text-slate-950">
                                Featured Publication
                            </span>
                            <span class="text-xs text-slate-400 font-mono">{{ $featuredPost->reading_time }}</span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-black font-heading leading-tight text-white group-hover:text-amber-300 transition-colors">
                            <a href="{{ route('blog.show', $featuredPost->slug) }}">
                                {{ $featuredPost->title }}
                            </a>
                        </h2>
                        <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                            {{ $featuredPost->excerpt }}
                        </p>
                        <div class="pt-2 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="w-7 h-7 rounded-full bg-blue-600 text-white text-[10px] font-black flex items-center justify-center font-heading">IC</span>
                                <span class="text-xs font-semibold text-slate-300">{{ $featuredPost->author_name }}</span>
                            </div>
                            <a href="{{ route('blog.show', $featuredPost->slug) }}" class="inline-flex items-center gap-1 text-xs font-bold text-amber-400 hover:text-amber-300">
                                <span>Read Full Article &rarr;</span>
                            </a>
                        </div>
                    </div>

                    <div class="lg:col-span-5 h-full min-h-[280px] bg-slate-950 relative overflow-hidden">
                        <img src="{{ asset($featuredPost->featured_image) }}" 
                             alt="{{ $featuredPost->title }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent"></div>
                    </div>
                </div>
            </div>
        @endif

        <!-- ARTICLE GRID (3 COLUMNS) -->
        @if($posts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $post)
                    <article class="bg-white rounded-3xl overflow-hidden border border-slate-200/90 shadow-xs hover:shadow-xl hover:border-blue-300 transition-all duration-300 flex flex-col justify-between group">
                        <div>
                            <!-- Featured Image Frame -->
                            <div class="relative aspect-[16/10] overflow-hidden bg-slate-900">
                                <img src="{{ asset($post->featured_image) }}" 
                                     alt="{{ $post->title }}" 
                                     loading="lazy" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute top-3 left-3">
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-mono font-bold uppercase tracking-wider bg-slate-950/85 backdrop-blur-md text-cyan-300 border border-slate-800">
                                        {{ $post->category }}
                                    </span>
                                </div>
                            </div>

                            <!-- Body -->
                            <div class="p-6 space-y-3">
                                <div class="flex items-center justify-between text-[11px] text-slate-400 font-mono">
                                    <span>{{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}</span>
                                    <span>{{ $post->reading_time }}</span>
                                </div>

                                <h3 class="text-base sm:text-lg font-black font-heading text-slate-950 leading-snug group-hover:text-blue-700 transition-colors">
                                    <a href="{{ route('blog.show', $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h3>

                                <p class="text-xs text-slate-600 line-clamp-3 leading-relaxed">
                                    {{ $post->excerpt }}
                                </p>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="px-6 pb-6 pt-3 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs font-semibold text-slate-500 truncate max-w-[60%]">
                                {{ $post->author_name }}
                            </span>
                            <a href="{{ route('blog.show', $post->slug) }}" 
                               class="text-xs font-bold text-blue-700 hover:text-blue-900 group-hover:translate-x-1 transition-transform flex items-center gap-1">
                                <span>Read</span>
                                <span>&rarr;</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $posts->links() }}
            </div>
        @else
            <div class="p-12 text-center bg-white rounded-3xl border border-slate-200 max-w-lg mx-auto">
                <span class="text-3xl block mb-2">📚</span>
                <h3 class="font-bold text-slate-800 text-base">No articles found</h3>
                <p class="text-xs text-slate-500 mt-1">Try another search term or reset your category filter.</p>
                <a href="{{ route('blog.index') }}" class="mt-4 inline-block px-5 py-2.5 rounded-xl bg-blue-700 text-white font-bold text-xs">
                    View All Articles
                </a>
            </div>
        @endif

    </main>

</div>

@endsection
