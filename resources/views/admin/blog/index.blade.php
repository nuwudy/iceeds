@extends('admin.layouts.app')

@section('title', 'Knowledge Hub & Blog Articles | iCEEDS Administration')

@section('content')

<div class="space-y-6">

    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-800">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-500/10 border border-blue-500/20 text-xs font-semibold text-blue-400 font-mono mb-2">
                <span>Academic Directorate &amp; Editorial Desk</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-white font-heading tracking-tight">
                Knowledge Hub &amp; Blog Publications
            </h1>
            <p class="text-xs sm:text-sm text-slate-400 mt-1">
                Manage policy research, theological analysis, institutional insights, and academic publications.
            </p>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('blog.index') }}" target="_blank" class="px-4 py-2 rounded-xl text-xs font-bold text-slate-300 bg-slate-800 hover:bg-slate-700 transition flex items-center gap-1.5">
                <span>View Public Hub</span>
                <svg class="w-3.5 h-3.5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
            </a>
            <a href="{{ route('admin.blog.create') }}" class="px-5 py-2 rounded-xl text-xs font-bold text-white bg-blue-600 hover:bg-blue-500 shadow-lg shadow-blue-600/30 transition flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                <span>Write New Article</span>
            </a>
        </div>
    </div>

    <!-- Stats Bar -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="p-4 rounded-2xl bg-slate-900 border border-slate-800 shadow-sm">
            <span class="text-[11px] font-mono uppercase text-slate-400 font-bold block">Total Publications</span>
            <span class="text-2xl font-black text-white font-heading mt-1 block">{{ $stats['total'] }}</span>
        </div>
        <div class="p-4 rounded-2xl bg-slate-900 border border-slate-800 shadow-sm">
            <span class="text-[11px] font-mono uppercase text-emerald-400 font-bold block">Published &amp; Live</span>
            <span class="text-2xl font-black text-emerald-400 font-heading mt-1 block">{{ $stats['published'] }}</span>
        </div>
        <div class="p-4 rounded-2xl bg-slate-900 border border-slate-800 shadow-sm">
            <span class="text-[11px] font-mono uppercase text-amber-400 font-bold block">Drafts</span>
            <span class="text-2xl font-black text-amber-400 font-heading mt-1 block">{{ $stats['draft'] }}</span>
        </div>
    </div>

    <!-- Toolbar Filters & Search -->
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 bg-slate-900 p-3 rounded-2xl border border-slate-800">
        <div class="flex items-center gap-2 text-xs font-semibold">
            <a href="{{ route('admin.blog.index') }}" 
               class="px-3.5 py-1.5 rounded-xl transition {{ $currentStatus === 'all' ? 'bg-blue-600 text-white font-bold' : 'text-slate-400 hover:text-white' }}">
                All ({{ $stats['total'] }})
            </a>
            <a href="{{ route('admin.blog.index', ['status' => 'published']) }}" 
               class="px-3.5 py-1.5 rounded-xl transition {{ $currentStatus === 'published' ? 'bg-blue-600 text-white font-bold' : 'text-slate-400 hover:text-white' }}">
                Published ({{ $stats['published'] }})
            </a>
            <a href="{{ route('admin.blog.index', ['status' => 'draft']) }}" 
               class="px-3.5 py-1.5 rounded-xl transition {{ $currentStatus === 'draft' ? 'bg-blue-600 text-white font-bold' : 'text-slate-400 hover:text-white' }}">
                Drafts ({{ $stats['draft'] }})
            </a>
        </div>

        <form action="{{ route('admin.blog.index') }}" method="GET" class="w-full sm:w-72">
            <input type="hidden" name="status" value="{{ $currentStatus }}">
            <input type="text" 
                   name="search" 
                   value="{{ $search ?? '' }}"
                   placeholder="Search title, author, category..."
                   class="w-full px-3.5 py-1.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-blue-500 font-mono">
        </form>
    </div>

    <!-- Posts Table -->
    <div class="bg-slate-900 rounded-3xl border border-slate-800 overflow-hidden shadow-xl">
        @if($posts->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-300">
                    <thead class="bg-slate-950 text-slate-400 font-mono uppercase text-[10px] tracking-wider border-b border-slate-800">
                        <tr>
                            <th class="py-3.5 px-4">Article</th>
                            <th class="py-3.5 px-4">Category</th>
                            <th class="py-3.5 px-4">Author</th>
                            <th class="py-3.5 px-4">Status</th>
                            <th class="py-3.5 px-4">Date</th>
                            <th class="py-3.5 px-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60">
                        @foreach($posts as $post)
                            <tr class="hover:bg-slate-800/40 transition">
                                <td class="py-4 px-4 min-w-[240px]">
                                    <div class="flex items-center gap-3">
                                        @if($post->featured_image)
                                            <img src="{{ asset($post->featured_image) }}" alt="" class="w-12 h-10 rounded-lg object-cover shrink-0 border border-slate-700 bg-slate-950">
                                        @endif
                                        <div>
                                            <a href="{{ route('admin.blog.edit', $post) }}" class="font-bold text-white hover:text-blue-400 block line-clamp-1">
                                                {{ $post->title }}
                                            </a>
                                            <span class="text-[10px] text-slate-500 font-mono block mt-0.5">/blog/{{ $post->slug }}</span>
                                        </div>
                                    </div>
                                </td>

                                <td class="py-4 px-4 whitespace-nowrap">
                                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-mono font-bold bg-slate-800 text-slate-300 border border-slate-700">
                                        {{ $post->category }}
                                    </span>
                                </td>

                                <td class="py-4 px-4 whitespace-nowrap">
                                    <span class="text-white block font-medium">{{ $post->author_name }}</span>
                                    <span class="text-[10px] text-slate-500 font-mono">{{ $post->reading_time }}</span>
                                </td>

                                <td class="py-4 px-4 whitespace-nowrap">
                                    @if($post->status === 'published')
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-mono font-bold bg-emerald-500/15 text-emerald-400 border border-emerald-500/30">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                            <span>Published</span>
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-mono font-bold bg-amber-500/15 text-amber-400 border border-amber-500/30">
                                            <span>Draft</span>
                                        </span>
                                    @endif
                                </td>

                                <td class="py-4 px-4 whitespace-nowrap font-mono text-[11px] text-slate-400">
                                    {{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}
                                </td>

                                <td class="py-4 px-4 whitespace-nowrap text-right">
                                    <div class="inline-flex items-center gap-2">
                                        @if($post->status === 'published')
                                            <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="p-1.5 rounded-lg text-slate-400 hover:text-white bg-slate-800 hover:bg-slate-700 transition" title="View Article on Site">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                            </a>
                                        @endif
                                        <a href="{{ route('admin.blog.edit', $post) }}" class="p-1.5 rounded-lg text-blue-400 hover:text-white bg-blue-500/10 hover:bg-blue-600 transition" title="Edit Article">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        </a>
                                        <form action="{{ route('admin.blog.destroy', $post) }}" method="POST" onsubmit="return confirm('Delete this article permanently?');">
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
                {{ $posts->links() }}
            </div>
        @else
            <div class="p-12 text-center text-slate-400">
                <p class="font-bold text-sm">No blog publications found.</p>
                <a href="{{ route('admin.blog.create') }}" class="mt-4 inline-block px-5 py-2.5 rounded-xl bg-blue-600 text-white font-bold text-xs">
                    Write First Article
                </a>
            </div>
        @endif
    </div>

</div>

@endsection
