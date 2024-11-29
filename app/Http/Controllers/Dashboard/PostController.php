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
        $posts = Post::all();

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

        if (empty($data['image'])) {
            $data['image'] = '/images/default-img.webp';
        }

        Post::create($data);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post) {
        //
    }
}
