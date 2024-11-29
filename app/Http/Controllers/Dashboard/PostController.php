<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $posts = Post::latest()->paginate(2);

        return view('dashboard.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $categories = Category::pluck('name', 'id');

        return view('dashboard.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request) {
        $data = $request->validated();

        Post::create($data);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post) {
        return view('dashboard.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post) {
        $categories = Category::pluck('name', 'id');

        return view('dashboard.posts.create', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Post $post) {
        $data = $request->only(['title', 'image', 'excerpt', 'content', 'category_id', 'status']);

        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post) {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.')->withInput();
    }

    public function toggleStatus(Post $post) {
        $post->status = $post->status === 'draft' ? 'published' : 'draft';
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post status updated successfully.');
    }
}
