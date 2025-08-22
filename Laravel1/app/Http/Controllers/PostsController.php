<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Jobs\PruneOldPostsJob;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function prunePosts()
    {
    PruneOldPostsJob::dispatch();
    
    return redirect()->back()->with('success', 'Post pruning job has been queued!');
    }

    public function create()
    {
        $users = User::all();
        return view('Posts.create', compact('users'));
    }

    public function store(StorePostRequest $request)
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
        return redirect()->route('posts.index')->with('success', 'Post Created Successfully!');
    }

    public function home()
{
    $posts = Post::paginate(5);
    return view('Posts.index', compact('posts'));
}

    public function show($id){
        $post = Post::findorFail($id);
        $users = User::all();
        //return $post->load('user', 'comments');
        return view('Posts.view', compact('post', 'users'));
    }

    public function editPost($id){
        $post = Post::findorFail($id);
        $users = User::all();
        return view('Posts.edit', compact('post', 'users'));
    }

    public function update(StorePostRequest $request){
        $post = Post::findorFail($request->input('id'));
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

        Storage::disk('public')->delete($post->image_path);
        

        $post->title = $request->input('title');
        $post->postedby = $request->input('postedby');
        $post->description = $request->input('description');
        $post->image_path = $path;
        $post->save();
        return redirect()->route('posts.index')->with('success', 'Post Updated Successfully!');
        //return $editPost;
}

    public function destroy($id){
        $post = Post::findorFail($id);
        Storage::disk('public')->delete($post->image_path);
        $post->image_path = null;
        //$post->comments()->delete(); // Delete associated comments
        $post->save();
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post Deleted Successfully!');
    }
}
