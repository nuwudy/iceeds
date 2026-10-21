@extends('admin.layouts.app')

@section('title', 'Edit Article: ' . $post->title . ' | iCEEDS Administration')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">

    <!-- Top Action Bar -->
    <div class="flex items-center justify-between pb-6 border-b border-slate-800">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-500/10 border border-blue-500/20 text-xs font-semibold text-blue-400 font-mono mb-2">
                <span>Editorial Desk &bull; Edit Article</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-white font-heading tracking-tight">
                Edit Publication
            </h1>
        </div>

        <div class="flex items-center gap-3">
            @if($post->status === 'published')
                <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="px-3.5 py-2 rounded-xl text-xs font-bold text-slate-300 bg-slate-800 hover:bg-slate-700 transition flex items-center gap-1.5">
                    <span>View on Site</span>
                    <svg class="w-3.5 h-3.5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                </a>
            @endif
            <a href="{{ route('admin.blog.index') }}" class="px-4 py-2 rounded-xl text-xs font-bold text-slate-300 bg-slate-800 hover:bg-slate-700 transition">
                &larr; Back
            </a>
        </div>
    </div>

    <!-- Edit Form -->
    <form action="{{ route('admin.blog.update', $post) }}" method="POST" enctype="multipart/form-data" class="bg-slate-900 rounded-3xl p-6 sm:p-8 border border-slate-800 shadow-xl space-y-6">
        @csrf
        @method('PUT')

        @if($errors->any())
            <div class="p-4 rounded-2xl bg-red-500/10 border border-red-500/30 text-red-400 text-xs space-y-1">
                @foreach($errors->all() as $error)
                    <div>&bull; {{ $error }}</div>
                @endforeach
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Article Title -->
            <div class="sm:col-span-2">
                <label for="title" class="block text-xs font-mono font-bold uppercase text-slate-300 mb-1.5">
                    Article Title <span class="text-red-400">*</span>
                </label>
                <input type="text" 
                       id="title" 
                       name="title" 
                       value="{{ old('title', $post->title) }}" 
                       required 
                       class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-sm text-white focus:outline-none focus:border-blue-500 font-medium">
            </div>

            <!-- Custom Slug -->
            <div>
                <label for="slug" class="block text-xs font-mono font-bold uppercase text-slate-300 mb-1.5">
                    URL Slug
                </label>
                <input type="text" 
                       id="slug" 
                       name="slug" 
                       value="{{ old('slug', $post->slug) }}" 
                       class="w-full px-4 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white focus:outline-none focus:border-blue-500 font-mono">
            </div>

            <!-- Category -->
            <div>
                <label for="category" class="block text-xs font-mono font-bold uppercase text-slate-300 mb-1.5">
                    Category <span class="text-red-400">*</span>
                </label>
                <input type="text" 
                       id="category" 
                       name="category" 
                       value="{{ old('category', $post->category) }}" 
                       required 
                       class="w-full px-4 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white focus:outline-none focus:border-blue-500">
            </div>

            <!-- Author Name -->
            <div>
                <label for="author_name" class="block text-xs font-mono font-bold uppercase text-slate-300 mb-1.5">
                    Author Name
                </label>
                <input type="text" 
                       id="author_name" 
                       name="author_name" 
                       value="{{ old('author_name', $post->author_name) }}" 
                       class="w-full px-4 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white focus:outline-none focus:border-blue-500">
            </div>

            <!-- Author Role -->
            <div>
                <label for="author_role" class="block text-xs font-mono font-bold uppercase text-slate-300 mb-1.5">
                    Author Role / Affiliation
                </label>
                <input type="text" 
                       id="author_role" 
                       name="author_role" 
                       value="{{ old('author_role', $post->author_role) }}" 
                       class="w-full px-4 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white focus:outline-none focus:border-blue-500">
            </div>

            <!-- Reading Time & Status -->
            <div>
                <label for="reading_time" class="block text-xs font-mono font-bold uppercase text-slate-300 mb-1.5">
                    Reading Time
                </label>
                <input type="text" 
                       id="reading_time" 
                       name="reading_time" 
                       value="{{ old('reading_time', $post->reading_time) }}" 
                       class="w-full px-4 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white focus:outline-none focus:border-blue-500">
            </div>

            <div>
                <label for="status" class="block text-xs font-mono font-bold uppercase text-slate-300 mb-1.5">
                    Publication Status <span class="text-red-400">*</span>
                </label>
                <select id="status" 
                        name="status" 
                        required 
                        class="w-full px-4 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white focus:outline-none focus:border-blue-500">
                    <option value="published" {{ old('status', $post->status) === 'published' ? 'selected' : '' }}>Published (Live)</option>
                    <option value="draft" {{ old('status', $post->status) === 'draft' ? 'selected' : '' }}>Draft (Private)</option>
                </select>
            </div>

            <!-- Featured Image Upload & URL -->
            <div>
                <label for="featured_image_file" class="block text-xs font-mono font-bold uppercase text-slate-300 mb-1.5">
                    Replace Featured Image
                </label>
                <input type="file" 
                       id="featured_image_file" 
                       name="featured_image_file" 
                       accept="image/*"
                       class="w-full px-3 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-slate-400 focus:outline-none">
            </div>

            <div>
                <label for="featured_image_url" class="block text-xs font-mono font-bold uppercase text-slate-300 mb-1.5">
                    Current / Existing Image Path
                </label>
                <input type="text" 
                       id="featured_image_url" 
                       name="featured_image_url" 
                       value="{{ old('featured_image_url', $post->featured_image) }}" 
                       class="w-full px-4 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white focus:outline-none focus:border-blue-500 font-mono">
            </div>

            <!-- Excerpt -->
            <div class="sm:col-span-2">
                <label for="excerpt" class="block text-xs font-mono font-bold uppercase text-slate-300 mb-1.5">
                    Short Excerpt / Summary
                </label>
                <textarea id="excerpt" 
                          name="excerpt" 
                          rows="2" 
                          class="w-full px-4 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white focus:outline-none focus:border-blue-500">{{ old('excerpt', $post->excerpt) }}</textarea>
            </div>

            <!-- Full Content (Markdown Supported) -->
            <div class="sm:col-span-2">
                <div class="flex items-center justify-between mb-1.5">
                    <label for="content" class="block text-xs font-mono font-bold uppercase text-slate-300">
                        Article Content <span class="text-red-400">*</span>
                    </label>
                    <span class="text-[10px] font-mono text-cyan-400">Markdown &amp; HTML Supported</span>
                </div>
                <textarea id="content" 
                          name="content" 
                          rows="16" 
                          required 
                          class="w-full px-4 py-3 rounded-2xl bg-slate-950 border border-slate-800 text-sm text-white focus:outline-none focus:border-blue-500 font-mono leading-relaxed">{{ old('content', $post->content) }}</textarea>
            </div>
        </div>

        <div class="pt-4 border-t border-slate-800 flex items-center justify-end gap-3">
            <a href="{{ route('admin.blog.index') }}" class="px-5 py-2.5 rounded-xl text-xs font-bold text-slate-400 hover:text-white transition">
                Cancel
            </a>
            <button type="submit" class="px-7 py-2.5 rounded-xl text-xs font-bold text-white bg-blue-600 hover:bg-blue-500 shadow-lg shadow-blue-600/30 transition cursor-pointer">
                Save Changes
            </button>
        </div>
    </form>

</div>

@endsection
