<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Display a listing of blog posts for administration.
     */
    public function index(Request $request): View
    {
        $status = $request->query('status', 'all');
        $search = $request->query('search');

        $query = BlogPost::query()->latest();

        if ($status === 'published') {
            $query->where('status', 'published');
        } elseif ($status === 'draft') {
            $query->where('status', 'draft');
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('author_name', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        $posts = $query->paginate(15)->withQueryString();

        $stats = [
            'total' => BlogPost::count(),
            'published' => BlogPost::where('status', 'published')->count(),
            'draft' => BlogPost::where('status', 'draft')->count(),
        ];

        return view('admin.blog.index', [
            'posts' => $posts,
            'stats' => $stats,
            'currentStatus' => $status,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new blog post.
     */
    public function create(): View
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created blog post.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:blog_posts,slug'],
            'category' => ['required', 'string', 'max:100'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'content' => ['required', 'string'],
            'author_name' => ['nullable', 'string', 'max:150'],
            'author_role' => ['nullable', 'string', 'max:150'],
            'reading_time' => ['nullable', 'max:50'],
            'status' => ['required', 'in:published,draft'],
            'featured_image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'featured_image_url' => ['nullable', 'string', 'max:500'],
        ]);

        $imagePath = $validated['featured_image_url'] ?? null;
        if ($request->hasFile('featured_image_file')) {
            $file = $request->file('featured_image_file');
            $filename = 'blog_' . time() . '_' . Str::random(6) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/media/blogs'), $filename);
            $imagePath = 'storage/media/blogs/' . $filename;
        }

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);

        // Ensure slug is unique
        $originalSlug = $slug;
        $counter = 1;
        while (BlogPost::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;
        }

        $post = BlogPost::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'category' => $validated['category'],
            'excerpt' => $validated['excerpt'] ?? null,
            'content' => $validated['content'],
            'author_name' => ($validated['author_name'] ?? null) ?: 'iCEEDS Academic Directorate',
            'author_role' => ($validated['author_role'] ?? null) ?: 'Board of Studies',
            'reading_time' => ($validated['reading_time'] ?? null) ?: '5 min read',
            'featured_image' => $imagePath ?: 'images/departments/philosophy-theology-hero.webp',
            'status' => $validated['status'],
            'published_at' => $validated['status'] === 'published' ? now() : null,
        ]);

        return redirect()->route('admin.blog.index')->with('success', "Blog post \"{$post->title}\" created successfully.");
    }

    /**
     * Show the form for editing the specified blog post.
     */
    public function edit(BlogPost $blog): View
    {
        return view('admin.blog.edit', [
            'post' => $blog,
        ]);
    }

    /**
     * Update the specified blog post in storage.
     */
    public function update(Request $request, BlogPost $blog): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', "unique:blog_posts,slug,{$blog->id}"],
            'category' => ['required', 'string', 'max:100'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'content' => ['required', 'string'],
            'author_name' => ['nullable', 'string', 'max:150'],
            'author_role' => ['nullable', 'string', 'max:150'],
            'reading_time' => ['nullable', 'max:50'],
            'status' => ['required', 'in:published,draft'],
            'featured_image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'featured_image_url' => ['nullable', 'string', 'max:500'],
        ]);

        $imagePath = $blog->featured_image;
        if ($request->hasFile('featured_image_file')) {
            $file = $request->file('featured_image_file');
            $filename = 'blog_' . time() . '_' . Str::random(6) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/media/blogs'), $filename);
            $imagePath = 'storage/media/blogs/' . $filename;
        } elseif (!empty($validated['featured_image_url'])) {
            $imagePath = $validated['featured_image_url'];
        }

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);

        $blog->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'category' => $validated['category'],
            'excerpt' => $validated['excerpt'] ?? null,
            'content' => $validated['content'],
            'author_name' => ($validated['author_name'] ?? null) ?: 'iCEEDS Academic Directorate',
            'author_role' => ($validated['author_role'] ?? null) ?: 'Board of Studies',
            'reading_time' => ($validated['reading_time'] ?? null) ?: '5 min read',
            'featured_image' => $imagePath,
            'status' => $validated['status'],
            'published_at' => ($validated['status'] === 'published' && !$blog->published_at) ? now() : $blog->published_at,
        ]);

        return redirect()->route('admin.blog.index')->with('success', "Blog post \"{$blog->title}\" updated successfully.");
    }

    /**
     * Remove the specified blog post from storage.
     */
    public function destroy(BlogPost $blog): RedirectResponse
    {
        $title = $blog->title;
        $blog->delete();

        return redirect()->route('admin.blog.index')->with('success', "Blog post \"{$title}\" has been deleted.");
    }
}
