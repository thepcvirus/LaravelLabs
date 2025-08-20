<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function create()
    {
        $users = User::all();
        return view('create', compact('users'));
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->postedby = $request->input('postedby');
        $post->description = $request->input('description');
        $post->save();
        return redirect()->route('posts.index')->with('success', 'Post Created Successfully!');
    }

    public function home()
{
    $posts = Post::paginate(5);
    return view('index', compact('posts'));
}

    public function show($id){
        $post = Post::findorFail($id);
        $users = User::all();
        //return $post->load('user', 'comments');
        return view('view', compact('post', 'users'));
    }

    public function editPost($id){
        $post = Post::findorFail($id);
        $users = User::all();
        return view('edit', compact('post', 'users'));
    }

    public function update(Request $request){
        $post = Post::findorFail($request->input('id'));
        $post->title = $request->input('title');
        $post->postedby = $request->input('postedby');
        $post->description = $request->input('description');
        $post->save();
        return redirect()->route('posts.index')->with('success', 'Post Updated Successfully!');
        //return $editPost;
}

    public function destroy($id){
        $post = Post::findorFail($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post Deleted Successfully!');
    }
}
