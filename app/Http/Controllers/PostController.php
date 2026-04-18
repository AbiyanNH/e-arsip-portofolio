<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    // Menampilkan semua data surat
    public function index()
    {
        $posts = Post::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('dashboard.posts.index', compact('posts'));
    }

    // Menampilkan form tambah data
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.posts.create', compact('categories'));
    }

    // Menyimpan data surat baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nosurat' => 'required|max:255',
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'tanggal' => 'required|max:255',
            'perihal' => 'required',
            'diterima' => 'required|max:255',
            'image' => 'required|file|max:5120|mimes:pdf',
        ]);

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('post-images', 'public');
        }

        $validated['user_id'] = Auth::id();
        $validated['published_at'] = now();

        Post::create($validated);

        return redirect('/dashboard/posts')->with('success', 'Telah berhasil memposting');
    }

    // Menampilkan detail surat
    public function show(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }
        return view('dashboard.posts.show', compact('post'));
    }

    // Menampilkan form edit
    public function edit(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }
        $categories = Category::all();
        return view('dashboard.posts.edit', compact('post', 'categories'));
    }

    // Mengupdate data surat
    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $rules = [
            'nosurat' => 'required|max:255',
            'title' => 'required|max:255',
            'category_id' => 'required',
            'tanggal' => 'required|max:255',
            'perihal' => 'required',
            'diterima' => 'required|max:255',
            'image' => 'file|max:5120|mimes:pdf',
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validated = $request->validate($rules);

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('post-images', 'public');
        }

        Post::where('id', $post->id)->update($validated);

        return redirect('/dashboard/posts')->with('success', 'Postingan telah berhasil diubah');
    }

    // Menghapus data surat
    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Data telah berhasil dihapus');
    }

    // Cek slug (AJAX)
    public function checkSlug(Request $request)
    {
        $slug = Str::slug($request->title);
        return response()->json(['slug' => $slug]);
    }
}