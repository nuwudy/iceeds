<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950 text-slate-100 antialiased">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Media Library | iCEEDS Administration</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', system-ui, sans-serif; }
        h1, h2, h3, .font-heading { font-family: 'Outfit', sans-serif; }
        .font-mono { font-family: 'JetBrains Mono', monospace; }
        .dragover { border-color: #3b82f6 !important; background-color: rgba(59, 130, 246, 0.1) !important; }
    </style>
</head>
<body class="min-h-screen flex flex-col bg-slate-950 text-slate-200">

    <!-- Top Admin Header -->
    <header class="bg-slate-900 border-b border-slate-800 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-18 flex items-center justify-between">
            <!-- Brand -->
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.media') }}" class="flex items-center gap-3">
                    <div class="bg-white/95 px-3 py-1.5 rounded-xl border border-white/20 shadow-sm flex items-center justify-center">
                        <picture>
                            <source srcset="{{ asset('images/logo.webp') }}" type="image/webp">
                            <img src="{{ asset('images/logo.png') }}" alt="iCEEDS Logo" class="h-7 w-auto object-contain">
                        </picture>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="text-[10px] uppercase font-bold tracking-wider px-2 py-0.5 rounded bg-blue-500/20 text-blue-300 border border-blue-500/30">Media Manager</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Right Controls: View Site & Logout -->
            <div class="flex items-center gap-3 sm:gap-4">
                <a href="{{ route('home') }}" target="_blank" class="hidden sm:flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold text-slate-300 hover:text-white bg-slate-800 hover:bg-slate-700 transition">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                    <span>View Website</span>
                </a>

                <div class="flex items-center gap-3 pl-3 border-l border-slate-800">
                    <div class="hidden md:block text-right">
                        <span class="text-xs font-bold text-white block">{{ Auth::user()->name ?? 'Administrator' }}</span>
                        <span class="text-[10px] text-slate-400 block font-mono">{{ Auth::user()->email ?? 'admin@iceeds.com' }}</span>
                    </div>

                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold text-red-400 hover:text-red-300 bg-red-500/10 hover:bg-red-500/20 border border-red-500/20 transition cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Container -->
    <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">

        <!-- Flash Notifications -->
        @if(session('success'))
            <div class="p-4 rounded-2xl bg-emerald-500/15 border border-emerald-500/30 text-emerald-300 text-xs sm:text-sm flex items-center justify-between gap-3">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-emerald-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                    <span>{{ session('success') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-emerald-400 hover:text-white font-bold">&times;</button>
            </div>
        @endif

        @if(session('error'))
            <div class="p-4 rounded-2xl bg-red-500/15 border border-red-500/30 text-red-300 text-xs sm:text-sm flex items-center justify-between gap-3">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-red-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    <span>{{ session('error') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-red-400 hover:text-white font-bold">&times;</button>
            </div>
        @endif

        <!-- Media Metrics Bar -->
        <section class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 sm:gap-4">
            <div class="bg-slate-900 rounded-2xl p-4 border border-slate-800">
                <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 font-mono block mb-1">Total Assets</span>
                <span class="text-2xl font-black font-heading text-white">{{ number_format($stats['total']) }}</span>
            </div>

            <div class="bg-slate-900 rounded-2xl p-4 border border-slate-800">
                <span class="text-[10px] font-bold uppercase tracking-wider text-blue-400 font-mono block mb-1">Images</span>
                <span class="text-2xl font-black font-heading text-blue-400">{{ number_format($stats['images']) }}</span>
            </div>

            <div class="bg-slate-900 rounded-2xl p-4 border border-slate-800">
                <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-400 font-mono block mb-1">Audio Tracks</span>
                <span class="text-2xl font-black font-heading text-emerald-400">{{ number_format($stats['audios']) }}</span>
            </div>

            <div class="bg-slate-900 rounded-2xl p-4 border border-slate-800">
                <span class="text-[10px] font-bold uppercase tracking-wider text-purple-400 font-mono block mb-1">Videos</span>
                <span class="text-2xl font-black font-heading text-purple-400">{{ number_format($stats['videos']) }}</span>
            </div>

            <div class="bg-slate-900 rounded-2xl p-4 border border-slate-800">
                <span class="text-[10px] font-bold uppercase tracking-wider text-red-400 font-mono block mb-1">PDFs & Docs</span>
                <span class="text-2xl font-black font-heading text-red-400">{{ number_format($stats['pdfs'] + $stats['documents']) }}</span>
            </div>

            <div class="bg-slate-900 rounded-2xl p-4 border border-slate-800">
                <span class="text-[10px] font-bold uppercase tracking-wider text-amber-400 font-mono block mb-1">Storage Used</span>
                <span class="text-2xl font-black font-heading text-amber-400 font-mono text-xl">{{ $stats['total_size'] }}</span>
            </div>
        </section>

        <!-- UPLOAD DROPZONE SECTION -->
        <section class="bg-slate-900/90 rounded-3xl p-6 sm:p-8 border border-slate-800 shadow-xl">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-5">
                <div>
                    <h2 class="text-xl font-bold font-heading text-white">Upload New Media</h2>
                    <p class="text-xs text-slate-400 mt-0.5">
                        Directly upload images (JPG, PNG, WEBP, SVG), audio files (MP3, WAV), videos (MP4, WEBM), and documents (PDF, DOCX). Max 100MB per file.
                    </p>
                </div>
            </div>

            <!-- Upload Form -->
            <form action="{{ route('admin.media.upload') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                @csrf
                <div 
                    id="dropzone" 
                    class="border-2 border-dashed border-slate-700 hover:border-blue-500 rounded-2xl p-8 text-center cursor-pointer transition-all duration-200 bg-slate-950/60"
                >
                    <input 
                        type="file" 
                        name="files[]" 
                        id="fileInput" 
                        multiple 
                        accept="image/*,audio/*,video/*,.pdf,.doc,.docx,.txt" 
                        class="hidden"
                    >

                    <div class="max-w-md mx-auto space-y-3">
                        <div class="w-14 h-14 rounded-2xl bg-blue-500/10 text-blue-400 flex items-center justify-center mx-auto border border-blue-500/20">
                            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-sm font-bold text-white block">
                                Drag & drop files here, or <span class="text-blue-400 hover:underline">browse files</span>
                            </span>
                            <span class="text-xs text-slate-500 block mt-1">
                                Supported: Images (PNG, JPG, SVG, WEBP) &bull; Audio (MP3, WAV) &bull; Video (MP4, WEBM) &bull; Documents (PDF, DOCX)
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Selected Files Preview Bar -->
                <div id="fileSelectionBar" class="hidden mt-4 p-4 rounded-xl bg-slate-950 border border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-3">
                    <div class="flex items-center gap-2 text-xs text-slate-300">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                        <span id="fileCountText">0 files ready to upload</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <button type="button" onclick="clearSelectedFiles()" class="px-3 py-1.5 rounded-lg text-xs font-semibold text-slate-400 hover:text-white bg-slate-800 transition">
                            Cancel
                        </button>
                        <button type="submit" id="startUploadBtn" class="px-5 py-2 rounded-xl text-xs font-bold text-white bg-blue-600 hover:bg-blue-500 shadow-md shadow-blue-600/30 transition cursor-pointer">
                            Upload Files Now
                        </button>
                    </div>
                </div>
            </form>
        </section>

        <!-- MEDIA BROWSER, FILTER TABS & SEARCH -->
        <section class="space-y-6">
            <!-- Filter & Search Toolbar -->
            <div class="flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4">
                <!-- Filter Tabs -->
                <div class="flex flex-wrap items-center gap-1.5 bg-slate-900 p-1.5 rounded-2xl border border-slate-800">
                    <a href="{{ route('admin.media', ['type' => 'all', 'q' => $search]) }}" class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition {{ $currentType === 'all' ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                        All ({{ $stats['total'] }})
                    </a>
                    <a href="{{ route('admin.media', ['type' => 'image', 'q' => $search]) }}" class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition {{ $currentType === 'image' ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                        Images ({{ $stats['images'] }})
                    </a>
                    <a href="{{ route('admin.media', ['type' => 'audio', 'q' => $search]) }}" class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition {{ $currentType === 'audio' ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                        Audio ({{ $stats['audios'] }})
                    </a>
                    <a href="{{ route('admin.media', ['type' => 'video', 'q' => $search]) }}" class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition {{ $currentType === 'video' ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                        Video ({{ $stats['videos'] }})
                    </a>
                    <a href="{{ route('admin.media', ['type' => 'pdf', 'q' => $search]) }}" class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition {{ $currentType === 'pdf' ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                        PDF & Docs ({{ $stats['pdfs'] + $stats['documents'] }})
                    </a>
                </div>

                <!-- Search Input -->
                <form action="{{ route('admin.media') }}" method="GET" class="relative max-w-xs w-full">
                    <input type="hidden" name="type" value="{{ $currentType }}">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    </div>
                    <input 
                        type="text" 
                        name="q" 
                        value="{{ $search }}"
                        placeholder="Search media..." 
                        class="w-full pl-10 pr-4 py-2 bg-slate-900 border border-slate-800 rounded-xl text-xs font-medium text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                    >
                </form>
            </div>

            <!-- Media Grid -->
            @if($mediaFiles->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
                    @foreach($mediaFiles as $media)
                        <div class="bg-slate-900 rounded-2xl border border-slate-800 overflow-hidden flex flex-col justify-between group hover:border-slate-700 transition">
                            
                            <!-- Media Visual Preview Container -->
                            <div class="relative bg-slate-950 aspect-video flex items-center justify-center overflow-hidden border-b border-slate-800/80">
                                @if($media->file_type === 'image')
                                    <img 
                                        src="{{ $media->url }}" 
                                        alt="{{ $media->alt_text ?? $media->title }}" 
                                        class="w-full h-full object-cover group-hover:scale-105 transition duration-300"
                                        loading="lazy"
                                    >
                                @elseif($media->file_type === 'audio')
                                    <div class="w-full h-full p-4 flex flex-col items-center justify-center bg-gradient-to-br from-emerald-950/40 via-slate-950 to-slate-950 text-emerald-400">
                                        <svg class="w-8 h-8 mb-2 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                                        </svg>
                                        <audio controls class="w-full max-w-[200px] h-7 mt-1 scale-90">
                                            <source src="{{ $media->url }}" type="{{ $media->mime_type }}">
                                        </audio>
                                    </div>
                                @elseif($media->file_type === 'video')
                                    <div class="w-full h-full relative group/video flex items-center justify-center bg-slate-950">
                                        <video class="w-full h-full object-cover" preload="metadata">
                                            <source src="{{ $media->url }}" type="{{ $media->mime_type }}">
                                        </video>
                                        <a href="{{ $media->url }}" target="_blank" class="absolute inset-0 flex items-center justify-center bg-black/40 group-hover/video:bg-black/20 transition">
                                            <div class="w-10 h-10 rounded-full bg-blue-600/90 text-white flex items-center justify-center shadow-lg">
                                                <svg class="w-5 h-5 ml-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" /></svg>
                                            </div>
                                        </a>
                                    </div>
                                @elseif($media->file_type === 'pdf')
                                    <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-red-950/30 to-slate-950 text-red-400 p-4">
                                        <svg class="w-10 h-10 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                        <span class="text-[10px] font-bold uppercase tracking-wider text-red-300 font-mono">PDF Document</span>
                                    </div>
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center bg-slate-950 text-slate-400 p-4">
                                        <svg class="w-10 h-10 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 font-mono">Document</span>
                                    </div>
                                @endif

                                <!-- Extension Badge -->
                                <span class="absolute top-2.5 right-2.5 text-[9px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-md bg-slate-900/90 text-slate-200 border border-slate-700/80 font-mono">
                                    .{{ $media->extension }}
                                </span>
                            </div>

                            <!-- Card Body Information -->
                            <div class="p-4 space-y-2">
                                <h3 class="text-xs font-bold text-white truncate" title="{{ $media->title }}">
                                    {{ $media->title }}
                                </h3>
                                <div class="flex items-center justify-between text-[11px] text-slate-400 font-mono">
                                    <span>{{ $media->formatted_size }}</span>
                                    <span>{{ $media->created_at->format('M d, Y') }}</span>
                                </div>
                            </div>

                            <!-- Action Buttons Bar -->
                            <div class="p-3 bg-slate-950/70 border-t border-slate-800/80 flex items-center justify-between gap-2">
                                <!-- 1-Click Copy Public URL -->
                                <button 
                                    type="button" 
                                    onclick="copyMediaUrl('{{ $media->url }}', this)" 
                                    class="inline-flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg text-xs font-semibold text-slate-300 hover:text-white bg-slate-800 hover:bg-slate-700 transition cursor-pointer"
                                    title="Copy direct public link"
                                >
                                    <svg class="w-3.5 h-3.5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>
                                    <span>Copy URL</span>
                                </button>

                                <div class="flex items-center gap-1.5">
                                    <!-- Direct Open / Download -->
                                    <a 
                                        href="{{ $media->url }}" 
                                        target="_blank" 
                                        class="p-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800 transition"
                                        title="View full asset in new tab"
                                    >
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.media.destroy', $media) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this media asset?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 rounded-lg text-red-400 hover:text-red-300 hover:bg-red-500/20 transition cursor-pointer" title="Delete media asset">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="pt-6">
                    {{ $mediaFiles->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-slate-900 rounded-3xl p-12 text-center border border-slate-800 max-w-lg mx-auto">
                    <div class="w-14 h-14 rounded-2xl bg-slate-800 text-slate-400 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-white font-heading">No Media Assets Found</h3>
                    <p class="text-xs text-slate-400 mt-1 max-w-sm mx-auto">
                        @if($search)
                            No media matching "{{ $search }}". Try clearing your search term.
                        @else
                            Your library has no {{ $currentType !== 'all' ? $currentType : '' }} files yet. Use the upload box above to add your first assets.
                        @endif
                    </p>
                    @if($search)
                        <div class="mt-4">
                            <a href="{{ route('admin.media', ['type' => $currentType]) }}" class="px-4 py-2 rounded-xl text-xs font-semibold text-blue-400 hover:text-white bg-slate-800 transition">
                                Clear Search
                            </a>
                        </div>
                    @endif
                </div>
            @endif
        </section>

    </main>

    <!-- Footer -->
    <footer class="mt-auto border-t border-slate-900 py-6 text-center text-xs text-slate-500">
        <p>iCEEDS Institutional Administration &bull; Media Library v2.0</p>
    </footer>

    <!-- Interactive JavaScript -->
    <script>
        const dropzone = document.getElementById('dropzone');
        const fileInput = document.getElementById('fileInput');
        const fileSelectionBar = document.getElementById('fileSelectionBar');
        const fileCountText = document.getElementById('fileCountText');

        if (dropzone && fileInput) {
            dropzone.addEventListener('click', () => fileInput.click());

            ['dragenter', 'dragover'].forEach(eventName => {
                dropzone.addEventListener(eventName, (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    dropzone.classList.add('dragover');
                }, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                dropzone.addEventListener(eventName, (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    dropzone.classList.remove('dragover');
                }, false);
            });

            dropzone.addEventListener('drop', (e) => {
                const dt = e.dataTransfer;
                if (dt && dt.files && dt.files.length) {
                    fileInput.files = dt.files;
                    updateFileSelection();
                }
            });

            fileInput.addEventListener('change', updateFileSelection);
        }

        function updateFileSelection() {
            if (fileInput && fileInput.files && fileInput.files.length > 0) {
                const count = fileInput.files.length;
                fileCountText.textContent = `${count} file${count > 1 ? 's' : ''} selected: ` + Array.from(fileInput.files).map(f => f.name).slice(0, 3).join(', ') + (count > 3 ? '...' : '');
                fileSelectionBar.classList.remove('hidden');
            } else {
                fileSelectionBar.classList.add('hidden');
            }
        }

        function clearSelectedFiles() {
            if (fileInput) fileInput.value = '';
            fileSelectionBar.classList.add('hidden');
        }

        function copyMediaUrl(url, button) {
            navigator.clipboard.writeText(url).then(() => {
                const originalHtml = button.innerHTML;
                button.innerHTML = `<span class="text-emerald-400 font-bold">✓ Copied!</span>`;
                setTimeout(() => {
                    button.innerHTML = originalHtml;
                }, 2000);
            }).catch(err => {
                console.error('Copy failed: ', err);
            });
        }
    </script>
</body>
</html>
