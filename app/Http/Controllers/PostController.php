<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return response()->json(Post::all(), 200);
    }

    public function store(Request $request)
    {
        $post = Post::create($request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string'
        ]));

        return response()->json($post, 201);
    }
}
