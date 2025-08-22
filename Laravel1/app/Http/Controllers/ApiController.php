<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;

class ApiController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'API is working']);
    }

    public function getAllPosts()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    public function getPost($id)
    {
        $post = Post::find($id);
        if ($post) {
            return response()->json($post);
        } else {
            return response()->json(['error' => 'Post not found'], 404);
        }
    }

    public function CreatePost(StorePostRequest $request)
    {
        
        $validated = $request->validated();
        if(!$validated) {
            return redirect()->back()->withErrors($request->errors())->withInput();
        }

        $path = '';
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg',
            ]);
            if(!$validated) {
            return redirect()->back()->withErrors($request->errors())->withInput();
        }
            $path = $request->file('image')->store('images/posts', 'public');
        }

        $post = new Post();
        $post->title = $request->input('title');
        $post->postedby = $request->input('postedby');
        $post->description = $request->input('description');
        $post->image_path = $path;
        $post->save();
        return redirect()->route('api.getAllPosts')->with('success', 'Post Created Successfully!');
    }
}
