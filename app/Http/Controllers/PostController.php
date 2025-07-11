<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required'],
            'slug' => ['required'],
            'content' => ['required'],
            'status' => ['required', 'integer'],
            'published_at' => ['required', 'date'],
        ]);

        return Post::create($data);
    }

    public function show(Post $post)
    {
        return $post;
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => ['required'],
            'slug' => ['required'],
            'content' => ['required'],
            'status' => ['required', 'integer'],
            'published_at' => ['required', 'date'],
        ]);

        $post->update($data);

        return $post;
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json();
    }
}
