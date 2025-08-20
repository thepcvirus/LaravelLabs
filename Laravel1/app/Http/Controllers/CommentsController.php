<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\User;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->post_id = $request->input('post_id');
        $comment->user_id = $request->input('user_id');
        $comment->comment = $request->input('comment');
        $comment->save();
        return redirect()->route('posts.show',$request->input('post_id'))->with('success', 'Comment Created Successfully!');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->back()->with('success', 'Comment Deleted Successfully!');
    }

    public function edit($id){
        $comment = Comment::findorFail($id);
        $users = User::all();
        return view('edit_comment', compact('comment', 'users'));
    }

    public function update(Request $request){
        $comment = Comment::findorFail($request->input('id'));
        $comment->comment = $request->input('comment');
        $comment->user_id = $request->input('user_id');
        $comment->save();
        return redirect()->route('posts.show',$request->post_id)->with('success', 'Comment Updated Successfully!');
        //return $editPost;
}
}
