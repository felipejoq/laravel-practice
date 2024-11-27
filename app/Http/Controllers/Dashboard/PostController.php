<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $posts = Post::all();

        // return json
        return response()->json($posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return "This is the create page of the PostController";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {


        return "Post created successfully";
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