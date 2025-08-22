<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Post;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        // This method can be used to return a list of resources
        return response()->json(['message' => 'API index method']);
    }

    public function show($id)
    {
        $post = Post::findorFail($id);
        return response()->json($post);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'postedby' => 'required|integer|exists:users,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->postedby = $request->input('postedby');

        if ($request->hasFile('image')) {
            $post->image_path = $request->file('image')->store('images/posts', 'public');
        }

        $post->save();

        return response()->json($post, 201);
    }

    public function showAll()
    {
        $post = Post::all();
        return response()->json($post);
    }
}
