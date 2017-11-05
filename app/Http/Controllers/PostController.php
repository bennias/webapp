<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;

class PostController extends Controller
{
    public function getDashboard()
    {
        /*
        returns all posts in array post
        accessible using $posts variable in view
        */

        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('home', ['posts' => $posts]);
    }


    public function postCreatePost(Request $request)
    {
        $this->validate($request,[
            'body' => 'required|max:250'
        ]);
        $post = new Post();
        $post->body = $request['body'];
        $message = 'An Error happend';
        // Post relates to the User
        if ($request->user()->posts()->save($post)){
            $message = 'Post successfully created';
        }

        return redirect()->route('home')->with(['message' => $message]);
    }

    public function getDeletePost($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        if(Auth::user() != $post->user){
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('home')->with(['message' => 'Successfully deleted']);
    }

    public function postEditPost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);
        $post = Post::find($request['postId']);
        $post->body = $request['body'];
        $post->update();
        return response()->json(['new_body' => $post->body ], 200);
    }


}