@extends('layouts.app')

@section('title', 'Media & Social Gallery | Official Videos & Event Photos | iCEEDS')
@section('meta_description', 'Watch official iCEEDS video documentaries, convocation ceremonies, leadership delegation photographs, and student graduation highlights across India.')

@section('content')

<div class="min-h-screen bg-slate-50 antialiased">

    <!-- PAGE HERO -->
    <section class="relative py-16 sm:py-20 bg-slate-950 text-white overflow-hidden border-b border-slate-900">
        <div class="absolute inset-0 bg-gradient-to-tr from-blue-950/70 via-slate-950 to-slate-900 opacity-90 pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center">
            <span class="inline-block text-xs font-bold uppercase tracking-widest text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-3.5 py-1 rounded-full mb-3">
                Digital Chronicle &bull; Convocation Events &bull; Academic Board
            </span>
            <h1 class="text-3xl sm:text-5xl font-black font-heading tracking-tight leading-tight">
                Media & Social Gallery
            </h1>
            <p class="mt-4 text-sm sm:text-base text-slate-300 max-w-2xl mx-auto leading-relaxed">
                Watch official video releases directly on this page or on YouTube, and explore convocation ceremonies, leadership delegations, and national certification specimens.
            </p>

            <!-- OFFICIAL CHANNELS QUICK CONNECT BAR -->
            <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
                <a href="https://www.youtube.com/@iceeds.official" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold text-white bg-red-600 hover:bg-red-700 transition shadow-sm border border-red-500/30">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                    <span>Watch on YouTube</span>
                </a>

                <a href="https://www.instagram.com" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold text-white bg-gradient-to-r from-purple-600 to-pink-600 hover:opacity-95 transition shadow-sm border border-pink-400/30">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                    <span>Follow on Instagram</span>
                </a>

                <a href="https://www.facebook.com" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold text-white bg-blue-600 hover:bg-blue-700 transition shadow-sm border border-blue-400/30">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                    <span>View on Facebook</span>
                </a>
            </div>
        </div>
    </section>

    <!-- FEATURED VIDEO SPOTLIGHT: INSTITUTIONAL DOCUMENTARY -->
    <section class="py-10 sm:py-14 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-900 text-white border-b border-slate-800 relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,rgba(37,99,235,0.15),transparent_60%)] pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            
            <div class="bg-gradient-to-br from-slate-900/90 to-slate-950/90 rounded-3xl border border-slate-800 shadow-2xl p-6 sm:p-8 lg:p-10 backdrop-blur-md">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                    
                    <!-- Left Column: Video Context & Value Proposition -->
                    <div class="lg:col-span-5 flex flex-col justify-center">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-500/10 border border-blue-400/30 text-blue-300 text-xs font-bold uppercase tracking-wider w-fit mb-3">
                            <span class="w-2 h-2 rounded-full bg-blue-400 animate-pulse"></span>
                            <span>Institutional Documentary &bull; 0:40 Video</span>
                        </div>

                        <h2 class="text-2xl sm:text-3xl font-extrabold font-heading text-white tracking-tight leading-snug">
                            Empowering India Through Accredited Skills &amp; Education
                        </h2>
                        <p class="text-blue-400 font-semibold text-sm sm:text-base mt-1">
                            Discover how iCEEDS shapes careers and elevates employability standards across disciplines.
                        </p>

                        <p class="text-slate-300 text-xs sm:text-sm mt-3 leading-relaxed">
                            Watch the official institutional documentary of <strong>iCEEDS</strong> (Council for Innovation in Education &amp; Employment Development Skills)—driving nationwide skill enhancement, ISO 9001:2015 certified quality management, and career-transforming vocational pathways.
                        </p>

                        <!-- Key Pillars List -->
                        <div class="mt-5 space-y-2 text-xs text-slate-300">
                            <div class="flex items-center gap-2">
                                <span class="w-5 h-5 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center font-bold text-[10px] shrink-0">&check;</span>
                                <span><strong>National Reach:</strong> 150+ Affiliated Training Centres across Indian states</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-5 h-5 rounded-full bg-blue-500/20 text-blue-400 flex items-center justify-center font-bold text-[10px] shrink-0">&check;</span>
                                <span><strong>Accredited Standards:</strong> ISO 9001:2015 QMS &amp; NSDC associated curricula</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-5 h-5 rounded-full bg-purple-500/20 text-purple-400 flex items-center justify-center font-bold text-[10px] shrink-0">&check;</span>
                                <span><strong>Global Pathway:</strong> MEA Apostille &amp; Embassy attestation ready</span>
                            </div>
                        </div>

                        <div class="mt-6 flex flex-wrap items-center gap-3">
                            <button type="button" 
                                    onclick="playSpotlightVideo()"
                                    class="px-5 py-2.5 rounded-xl font-bold text-xs text-white bg-blue-600 hover:bg-blue-500 shadow-lg shadow-blue-600/30 transition cursor-pointer flex items-center gap-2">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                <span>Play Documentary (0:40)</span>
                            </button>

                            <button type="button" 
                                    onclick="openVideoModal('https://iceeds.com/storage/media/2026/10/video-project-28-zjyipp.mp4', 'Institutional Documentary: Empowering India Through Accredited Skills &amp; Education', 'video')"
                                    class="px-4 py-2.5 rounded-xl font-semibold text-xs text-slate-300 hover:text-white bg-slate-800 hover:bg-slate-700 border border-slate-700 transition cursor-pointer flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path></svg>
                                <span>Theater Mode</span>
                            </button>
                        </div>
                    </div>

                    <!-- Right Column: Interactive 16:9 Video Player Box -->
                    <div class="lg:col-span-7">
                        <div id="spotlightVideoBox" class="relative aspect-video rounded-2xl overflow-hidden bg-black shadow-2xl border border-slate-700/80 group/spot">
                            
                            <!-- Video Element -->
                            <video id="spotlightVideoPlayer" 
                                   src="https://iceeds.com/storage/media/2026/10/video-project-28-zjyipp.mp4" 
                                   playsinline 
                                   preload="metadata"
                                   class="w-full h-full object-contain bg-black"
                                   onended="resetSpotlightVideo()"></video>

                            <!-- Poster Overlay -->
                            <div id="spotlightPoster" 
                                 onclick="playSpotlightVideo()"
                                 class="absolute inset-0 cursor-pointer group/poster flex items-center justify-center transition-opacity duration-300">
                                <picture class="w-full h-full">
                                    <source srcset="/images/gallery/institutional-documentary-poster.webp" type="image/webp">
                                    <img src="/images/gallery/institutional-documentary-poster.jpg" 
                                         alt="Institutional Documentary - Empowering India Through Accredited Skills &amp; Education" 
                                         class="w-full h-full object-cover group-hover/poster:scale-105 transition-transform duration-500 opacity-90">
                                </picture>

                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/85 via-slate-950/20 to-transparent"></div>

                                <!-- Big Vibrant Play Button -->
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="relative">
                                        <div class="absolute inset-0 bg-blue-600/40 rounded-full blur-xl group-hover/poster:bg-blue-600/60 transition-all"></div>
                                        <div class="relative w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-blue-600 border border-blue-400/40 text-white flex items-center justify-center shadow-2xl group-hover/poster:scale-110 group-hover/poster:bg-blue-500 transition-all duration-300 cursor-pointer">
                                            <svg class="w-8 h-8 sm:w-9 sm:h-9 fill-current translate-x-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                        </div>
                                    </div>
                                </div>

                                <!-- Corner Badges -->
                                <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md bg-blue-600 text-white text-[10px] font-bold uppercase tracking-wider flex items-center gap-1 shadow-sm">
                                    <svg class="w-3 h-3 fill-current" viewBox="0 0 24 24"><path d="M10 15l5-3-5-3v6z"/></svg>
                                    <span>Official Documentary &bull; 0:40</span>
                                </span>

                                <span class="absolute bottom-3 right-3 px-2.5 py-1 rounded bg-slate-950/80 text-blue-300 text-[11px] font-mono font-bold border border-white/10 backdrop-blur-sm">
                                    Full HD 1080p
                                </span>
                            </div>

                            <!-- Exit Player Button -->
                            <button type="button" 
                                    id="spotlightCloseBtn" 
                                    onclick="resetSpotlightVideo()" 
                                    title="Exit Video"
                                    class="hidden absolute top-3 right-3 z-20 px-3 py-1.5 rounded-full bg-slate-900/85 hover:bg-slate-900 text-white text-xs font-semibold backdrop-blur-md border border-white/20 transition cursor-pointer flex items-center gap-1.5 shadow-lg">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                <span>Exit Player</span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <!-- FILTER NAVIGATION BAR -->
    <section class="py-5 bg-white border-b border-slate-200 sticky top-16 z-20 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-start sm:justify-center gap-2 overflow-x-auto pb-1 scrollbar-none text-xs sm:text-sm font-bold">
                <button type="button" 
                        data-filter="all"
                        onclick="filterGallery('all')" 
                        class="filter-btn px-5 py-2 rounded-full transition-all duration-150 whitespace-nowrap bg-blue-700 text-white shadow-sm">
                    All Media ({{ count($mediaItems) }})
                </button>
                <button type="button" 
                        data-filter="videos"
                        onclick="filterGallery('videos')" 
                        class="filter-btn px-5 py-2 rounded-full transition-all duration-150 flex items-center gap-1.5 whitespace-nowrap bg-slate-100 hover:bg-slate-200 text-slate-700">
                    <span class="w-2 h-2 rounded-full bg-red-500"></span>
                    <span>Official Videos (6)</span>
                </button>
                <button type="button" 
                        data-filter="photo"
                        onclick="filterGallery('photo')" 
                        class="filter-btn px-5 py-2 rounded-full transition-all duration-150 flex items-center gap-1.5 whitespace-nowrap bg-slate-100 hover:bg-slate-200 text-slate-700">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    <span>Photographs &amp; Events (4)</span>
                </button>
                <button type="button" 
                        data-filter="convocation"
                        onclick="filterGallery('convocation')" 
                        class="filter-btn px-5 py-2 rounded-full transition-all duration-150 flex items-center gap-1.5 whitespace-nowrap bg-slate-100 hover:bg-slate-200 text-slate-700">
                    <span class="w-2 h-2 rounded-full bg-indigo-500"></span>
                    <span>Convocations</span>
                </button>
                <button type="button" 
                        data-filter="leadership"
                        onclick="filterGallery('leadership')" 
                        class="filter-btn px-5 py-2 rounded-full transition-all duration-150 flex items-center gap-1.5 whitespace-nowrap bg-slate-100 hover:bg-slate-200 text-slate-700">
                    <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                    <span>Academic Board</span>
                </button>
            </div>
        </div>
    </section>

    <!-- MEDIA GRID -->
    <main class="py-12 sm:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-start">
                @foreach($mediaItems as $item)
                    <!-- CARD CONTAINER -->
                    <div data-type="{{ $item['type'] }}" 
                         data-category="{{ $item['category_slug'] ?? '' }}"
                         class="gallery-item bg-white rounded-3xl border border-slate-200/90 shadow-sm hover:shadow-md transition-all duration-200 overflow-hidden flex flex-col justify-between group hover:border-blue-400">

                        <!-- MEDIA PREVIEW CONTAINER -->
                        <div>
                            @if($item['type'] === 'youtube' || $item['type'] === 'video')
                                <!-- 16:9 Aspect Frame for Video with Interactive In-Page Player -->
                                <div class="relative aspect-video bg-slate-900 overflow-hidden" id="video-box-{{ $item['id'] }}">
                                    <!-- Poster View -->
                                    <div class="video-poster relative w-full h-full cursor-pointer group/thumb"
                                         onclick="playInlineVideo('{{ $item['id'] }}', '{{ $item['embed_url'] ?? $item['video_url'] }}', '{{ $item['type'] }}')">
                                        <picture>
                                            @if(!empty($item['thumbnail']))
                                                <source srcset="{{ $item['thumbnail'] }}" type="image/webp">
                                            @endif
                                            <img src="{{ $item['fallback_url'] ?? $item['thumbnail'] }}" 
                                                 alt="{{ $item['title'] }}" 
                                                 loading="lazy"
                                                 class="w-full h-full object-cover group-hover/thumb:scale-105 transition-transform duration-500 opacity-95">
                                        </picture>
                                        
                                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>

                                        <!-- Duration Pill -->
                                        @if(!empty($item['duration']))
                                        <span class="absolute bottom-3 right-3 px-2 py-0.5 rounded bg-slate-950/80 text-white text-[11px] font-mono font-bold">
                                            {{ $item['duration'] }}
                                        </span>
                                        @endif

                                        <!-- Video Type Badge -->
                                        @if($item['type'] === 'youtube')
                                            <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md bg-red-600 text-white text-[10px] font-bold uppercase tracking-wider flex items-center gap-1 shadow-sm">
                                                <svg class="w-3 h-3 fill-current" viewBox="0 0 24 24"><path d="M10 15l5-3-5-3v6z"/></svg>
                                                <span>YouTube 16:9</span>
                                            </span>
                                        @else
                                            <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md bg-blue-600 text-white text-[10px] font-bold uppercase tracking-wider flex items-center gap-1 shadow-sm">
                                                <svg class="w-3 h-3 fill-current" viewBox="0 0 24 24"><path d="M10 15l5-3-5-3v6z"/></svg>
                                                <span>Official Video</span>
                                            </span>
                                        @endif

                                        <!-- Clickable Big Play Button -->
                                        <div class="absolute inset-0 flex items-center justify-center">
                                            <div class="w-16 h-16 rounded-full {{ $item['type'] === 'youtube' ? 'bg-red-600/95 group-hover/thumb:bg-red-600' : 'bg-blue-600/95 group-hover/thumb:bg-blue-600' }} text-white flex items-center justify-center shadow-2xl group-hover/thumb:scale-110 transition-all cursor-pointer">
                                                <svg class="w-7 h-7 fill-current translate-x-0.5" viewBox="0 0 24 24">
                                                    <path d="M8 5v14l11-7z"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Inline Embedded Player Container -->
                                    <div class="video-player-container hidden w-full h-full"></div>
                                </div>

                            @elseif($item['type'] === 'photo')
                                <!-- Photograph Frame with Lightbox Trigger -->
                                <div class="relative {{ isset($item['aspect']) && $item['aspect'] === '3:4' ? 'aspect-[3/4] max-h-[460px]' : 'aspect-[4/3] sm:aspect-video' }} bg-slate-900 overflow-hidden cursor-pointer"
                                     onclick="openLightboxModal('{{ $item['fallback_url'] }}', '{{ addslashes($item['title']) }}', '{{ addslashes($item['category']) }}', '{{ addslashes($item['description']) }}')">
                                    <picture>
                                        <source srcset="{{ $item['image_url'] }}" type="image/webp">
                                        <img src="{{ $item['fallback_url'] }}" 
                                             alt="{{ $item['title'] }}" 
                                             loading="lazy"
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </picture>
                                    
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent opacity-60 group-hover:opacity-80 transition-opacity"></div>

                                    <!-- Photo Badge -->
                                    <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md bg-emerald-600 text-white text-[10px] font-bold uppercase tracking-wider flex items-center gap-1 shadow-sm">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        <span>Official Photo</span>
                                    </span>

                                    <!-- Expand Icon Overlay -->
                                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                        <div class="w-12 h-12 rounded-full bg-slate-900/80 backdrop-blur-sm text-white flex items-center justify-center shadow-lg border border-white/20 transform scale-90 group-hover:scale-100 transition-transform">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                                        </div>
                                    </div>
                                </div>

                            @elseif($item['type'] === 'instagram')
                                <!-- Instagram Highlights -->
                                <div class="relative aspect-video bg-slate-900 overflow-hidden">
                                    <img src="{{ $item['thumbnail'] }}" 
                                         alt="{{ $item['title'] }}" 
                                         loading="lazy"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>

                                    <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md bg-gradient-to-r from-purple-600 to-pink-600 text-white text-[10px] font-bold uppercase tracking-wider flex items-center gap-1 shadow-sm">
                                        <svg class="w-3 h-3 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069z"/></svg>
                                        <span>Reel Highlights</span>
                                    </span>

                                    <a href="{{ $item['direct_url'] }}" 
                                       target="_blank" 
                                       rel="noopener noreferrer"
                                       class="absolute inset-0 flex items-center justify-center focus:outline-none">
                                        <div class="w-14 h-14 rounded-full bg-white/20 backdrop-blur-md text-white border border-white/40 flex items-center justify-center shadow-lg hover:scale-110 hover:bg-white/30 transition-all">
                                            <svg class="w-6 h-6 fill-current translate-x-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                        </div>
                                    </a>
                                </div>

                            @elseif($item['type'] === 'facebook')
                                <!-- Facebook Highlights -->
                                <div class="relative aspect-video bg-slate-900 overflow-hidden">
                                    <img src="{{ $item['thumbnail'] }}" 
                                         alt="{{ $item['title'] }}" 
                                         loading="lazy"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>

                                    <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md bg-blue-600 text-white text-[10px] font-bold uppercase tracking-wider flex items-center gap-1 shadow-sm">
                                        <svg class="w-3 h-3 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                        <span>Facebook Live</span>
                                    </span>

                                    <a href="{{ $item['direct_url'] }}" 
                                       target="_blank" 
                                       rel="noopener noreferrer"
                                       class="absolute inset-0 flex items-center justify-center focus:outline-none">
                                        <div class="w-14 h-14 rounded-full bg-blue-600/90 text-white flex items-center justify-center shadow-lg hover:scale-110 hover:bg-blue-600 transition-all">
                                            <svg class="w-6 h-6 fill-current translate-x-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                        </div>
                                    </a>
                                </div>
                            @endif

                            <!-- TEXT DETAILS -->
                            <div class="p-6">
                                <div class="flex items-center justify-between gap-2 mb-2">
                                    <span class="text-[11px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded bg-slate-100 text-slate-700">
                                        {{ $item['category'] }}
                                    </span>
                                    <span class="text-xs text-slate-400 font-medium">
                                        {!! $item['subtitle'] !!}
                                    </span>
                                </div>

                                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading group-hover:text-blue-700 transition line-clamp-2">
                                    {{ $item['title'] }}
                                </h3>

                                <p class="text-xs sm:text-sm text-slate-600 mt-2 line-clamp-2 leading-relaxed">
                                    {{ $item['description'] }}
                                </p>

                                <!-- Tag Badges -->
                                <div class="mt-4 flex flex-wrap gap-1.5">
                                    @foreach($item['tags'] as $tag)
                                        <span class="text-[10px] text-slate-500 bg-slate-50 border border-slate-200/80 px-2 py-0.5 rounded-md font-mono">
                                            #{{ $tag }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- CARD ACTION FOOTER -->
                        <div class="px-6 pb-6 pt-2 border-t border-slate-100">
                            @if($item['type'] === 'youtube' || $item['type'] === 'video')
                                <div class="flex items-center justify-between gap-3">
                                    <button type="button" 
                                            onclick="playInlineVideo('{{ $item['id'] }}', '{{ $item['embed_url'] ?? $item['video_url'] }}', '{{ $item['type'] }}')"
                                            class="text-xs font-bold {{ $item['type'] === 'youtube' ? 'text-red-600 hover:text-red-700' : 'text-blue-600 hover:text-blue-700' }} flex items-center gap-1 cursor-pointer">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                        <span>Play on Page</span>
                                    </button>

                                    <button type="button" 
                                            onclick="openVideoModal('{{ $item['embed_url'] ?? $item['video_url'] }}', '{{ addslashes($item['title']) }}', '{{ $item['type'] }}')"
                                            class="text-xs font-semibold text-slate-500 hover:text-slate-800 flex items-center gap-1 cursor-pointer">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path></svg>
                                        <span>Theater Mode</span>
                                    </button>

                                    <a href="{{ $item['direct_url'] }}" 
                                       target="_blank" 
                                       rel="noopener noreferrer"
                                       class="text-xs font-bold text-slate-800 {{ $item['type'] === 'youtube' ? 'hover:text-red-600' : 'hover:text-blue-600' }} flex items-center gap-1">
                                        <span>{{ $item['type'] === 'youtube' ? 'Watch on YouTube →' : 'Watch Video →' }}</span>
                                    </a>
                                </div>
                            @elseif($item['type'] === 'photo')
                                <div class="flex items-center justify-between">
                                    <button type="button" 
                                            onclick="openLightboxModal('{{ $item['fallback_url'] }}', '{{ addslashes($item['title']) }}', '{{ addslashes($item['category']) }}', '{{ addslashes($item['description']) }}')"
                                            class="text-xs font-bold text-emerald-700 hover:text-emerald-800 flex items-center gap-1 cursor-pointer">
                                        <span>View Fullscreen</span>
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path></svg>
                                    </button>

                                    <a href="{{ $item['fallback_url'] }}" 
                                       target="_blank" 
                                       rel="noopener noreferrer"
                                       class="text-xs font-bold text-slate-600 hover:text-slate-900 flex items-center gap-1">
                                        <span>High-Res Photo &rarr;</span>
                                    </a>
                                </div>
                            @elseif($item['type'] === 'instagram')
                                <a href="{{ $item['direct_url'] }}" 
                                   target="_blank" 
                                   rel="noopener noreferrer"
                                   class="w-full inline-flex items-center justify-center gap-2 py-2 rounded-xl text-xs font-bold text-white bg-gradient-to-r from-purple-600 to-pink-600 hover:opacity-95 transition shadow-xs">
                                    <span>Follow on Instagram</span>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                </a>
                            @elseif($item['type'] === 'facebook')
                                <a href="{{ $item['direct_url'] }}" 
                                   target="_blank" 
                                   rel="noopener noreferrer"
                                   class="w-full inline-flex items-center justify-center gap-2 py-2 rounded-xl text-xs font-bold text-white bg-blue-600 hover:bg-blue-700 transition shadow-xs">
                                    <span>View on Facebook</span>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                </a>
                            @endif
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </main>

    <!-- RESPONSIVE VIDEO THEATER MODAL -->
    <div id="videoModal" 
         style="display: none;"
         class="fixed inset-0 z-[99999] overflow-y-auto items-center justify-center p-4 bg-slate-950/90 backdrop-blur-md"
         onclick="handleVideoModalBackdrop(event)">
        
        <div class="relative w-full max-w-4xl bg-black rounded-3xl overflow-hidden shadow-2xl border border-slate-800"
             onclick="event.stopPropagation()">
            
            <div class="px-6 py-4 bg-slate-900 flex items-center justify-between border-b border-slate-800">
                <h4 id="videoModalTitle" class="text-sm font-bold text-white font-heading truncate max-w-lg"></h4>
                <button type="button" 
                        onclick="closeVideoModal()" 
                        class="p-2 rounded-full text-slate-400 hover:text-white hover:bg-slate-800 transition cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <div id="videoModalContainer" class="aspect-video w-full bg-black flex items-center justify-center">
                <iframe id="videoModalIframe"
                        src="" 
                        class="w-full h-full" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen></iframe>
                <video id="videoModalPlayer"
                       src=""
                       controls
                       playsinline
                       class="hidden w-full h-full object-contain bg-black"></video>
            </div>
        </div>
    </div>

    <!-- RESPONSIVE PHOTO LIGHTBOX MODAL -->
    <div id="photoLightboxModal" 
         style="display: none;"
         class="fixed inset-0 z-[99999] overflow-y-auto items-center justify-center p-4 sm:p-6 bg-slate-950/90 backdrop-blur-md"
         onclick="handleLightboxModalBackdrop(event)">
        
        <div class="relative w-full max-w-5xl bg-slate-900 rounded-3xl overflow-hidden shadow-2xl border border-slate-800 flex flex-col max-h-[92vh]"
             onclick="event.stopPropagation()">
            
            <!-- Modal Header -->
            <div class="px-6 py-4 bg-slate-950 flex items-center justify-between border-b border-slate-800/80">
                <div class="flex items-center gap-3 truncate">
                    <span id="lightboxCategory" class="px-2.5 py-0.5 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-wider"></span>
                    <h4 id="lightboxTitle" class="text-sm sm:text-base font-bold text-white font-heading truncate"></h4>
                </div>
                <div class="flex items-center gap-2">
                    <a id="lightboxNewTabLink"
                       href="" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       title="Open full resolution in new tab"
                       class="p-2 rounded-full text-slate-400 hover:text-white hover:bg-slate-800 transition cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    </a>
                    <button type="button" 
                            onclick="closeLightboxModal()" 
                            class="p-2 rounded-full text-slate-400 hover:text-white hover:bg-slate-800 transition cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
            </div>

            <!-- Image Viewport -->
            <div class="flex-1 bg-black flex items-center justify-center p-2 sm:p-4 overflow-hidden min-h-[300px]">
                <img id="lightboxImg" 
                     src="" 
                     alt="" 
                     class="max-h-[68vh] w-auto max-w-full object-contain rounded-xl shadow-lg">
            </div>

            <!-- Modal Footer Description -->
            <div class="px-6 py-4 bg-slate-950 border-t border-slate-800/80">
                <p id="lightboxDesc" class="text-xs sm:text-sm text-slate-300 leading-relaxed"></p>
            </div>
        </div>
    </div>

</div>

<!-- JAVASCRIPT: NATIVE INLINE PLAYBACK, THEATER MODAL, AND LIGHTBOX -->
<script>
    // 0. Top Spotlight Video Player (What is iCEEDS?)
    function playSpotlightVideo() {
        const video = document.getElementById('spotlightVideoPlayer');
        const poster = document.getElementById('spotlightPoster');
        const closeBtn = document.getElementById('spotlightCloseBtn');

        if (video && poster) {
            poster.classList.add('opacity-0', 'pointer-events-none');
            video.setAttribute('controls', 'true');
            if (closeBtn) closeBtn.classList.remove('hidden');
            const p = video.play();
            if (p !== undefined) {
                p.catch(function(e) { console.log('Spotlight play err:', e); });
            }
        }
    }

    function resetSpotlightVideo() {
        const video = document.getElementById('spotlightVideoPlayer');
        const poster = document.getElementById('spotlightPoster');
        const closeBtn = document.getElementById('spotlightCloseBtn');

        if (video) {
            video.pause();
            video.removeAttribute('controls');
            video.currentTime = 0;
        }
        if (poster) {
            poster.classList.remove('opacity-0', 'pointer-events-none');
        }
        if (closeBtn) {
            closeBtn.classList.add('hidden');
        }
    }

    // 1. Inline Video Playback inside the 16:9 Card
    function playInlineVideo(id, videoUrl, videoType) {
        const box = document.getElementById('video-box-' + id);
        if (!box) return;

        const poster = box.querySelector('.video-poster');
        const playerContainer = box.querySelector('.video-player-container');

        if (poster && playerContainer) {
            poster.classList.add('hidden');
            if (videoType === 'video' || (videoUrl && videoUrl.endsWith('.mp4'))) {
                playerContainer.innerHTML = '<video src="' + videoUrl + '" controls autoplay playsinline class="w-full h-full object-contain bg-black"></video>';
            } else {
                playerContainer.innerHTML = '<iframe src="' + videoUrl + '?autoplay=1&rel=0" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
            }
            playerContainer.classList.remove('hidden');
        }
    }

    // 2. Video Theater Modal
    function openVideoModal(videoUrl, title, videoType) {
        const modal = document.getElementById('videoModal');
        const iframe = document.getElementById('videoModalIframe');
        const player = document.getElementById('videoModalPlayer');
        const titleEl = document.getElementById('videoModalTitle');

        if (modal) {
            if (titleEl) titleEl.textContent = title;

            if (videoType === 'video' || (videoUrl && videoUrl.endsWith('.mp4'))) {
                if (iframe) {
                    iframe.src = '';
                    iframe.classList.add('hidden');
                }
                if (player) {
                    player.src = videoUrl;
                    player.classList.remove('hidden');
                    player.play().catch(function() {});
                }
            } else {
                if (player) {
                    player.pause();
                    player.src = '';
                    player.classList.add('hidden');
                }
                if (iframe) {
                    iframe.src = videoUrl + (videoUrl.includes('?') ? '&' : '?') + 'autoplay=1&rel=0';
                    iframe.classList.remove('hidden');
                }
            }

            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
    }

    function closeVideoModal() {
        const modal = document.getElementById('videoModal');
        const iframe = document.getElementById('videoModalIframe');
        const player = document.getElementById('videoModalPlayer');

        if (modal) {
            if (iframe) iframe.src = '';
            if (player) {
                player.pause();
                player.src = '';
            }
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }
    }

    function handleVideoModalBackdrop(event) {
        if (event.target && event.target.id === 'videoModal') {
            closeVideoModal();
        }
    }

    // 3. Photo Lightbox Modal
    function openLightboxModal(imageUrl, title, category, desc) {
        const modal = document.getElementById('photoLightboxModal');
        const img = document.getElementById('lightboxImg');
        const titleEl = document.getElementById('lightboxTitle');
        const catEl = document.getElementById('lightboxCategory');
        const descEl = document.getElementById('lightboxDesc');
        const linkEl = document.getElementById('lightboxNewTabLink');

        if (modal && img) {
            img.src = imageUrl;
            img.alt = title;
            if (titleEl) titleEl.textContent = title;
            if (catEl) catEl.textContent = category;
            if (descEl) descEl.textContent = desc;
            if (linkEl) linkEl.href = imageUrl;

            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
    }

    function closeLightboxModal() {
        const modal = document.getElementById('photoLightboxModal');
        const img = document.getElementById('lightboxImg');

        if (modal) {
            modal.style.display = 'none';
            if (img) img.src = '';
            document.body.style.overflow = '';
        }
    }

    function handleLightboxModalBackdrop(event) {
        if (event.target && event.target.id === 'photoLightboxModal') {
            closeLightboxModal();
        }
    }

    // 4. Category Filtering
    function filterGallery(category) {
        const items = document.querySelectorAll('.gallery-item');
        items.forEach(el => {
            const type = el.getAttribute('data-type');
            const cat = el.getAttribute('data-category');
            if (category === 'all' || 
                type === category || 
                cat === category ||
                (category === 'videos' && (type === 'youtube' || type === 'video')) ||
                (category === 'youtube' && (type === 'youtube' || type === 'video'))) {
                el.style.display = '';
            } else {
                el.style.display = 'none';
            }
        });

        // Update Button Styles
        const buttons = document.querySelectorAll('.filter-btn');
        buttons.forEach(btn => {
            const btnFilter = btn.getAttribute('data-filter');
            if (btnFilter === category) {
                btn.classList.add('bg-blue-700', 'text-white', 'shadow-sm');
                btn.classList.remove('bg-slate-100', 'hover:bg-slate-200', 'text-slate-700');
            } else {
                btn.classList.remove('bg-blue-700', 'text-white', 'shadow-sm');
                btn.classList.add('bg-slate-100', 'hover:bg-slate-200', 'text-slate-700');
            }
        });
    }

    // 5. Global Keyboard Listener (ESC to close modals)
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeVideoModal();
            closeLightboxModal();
        }
    });
</script>

@endsection
