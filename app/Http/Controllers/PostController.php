<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;

class PostController extends Controller
{
    public function postCreatePost(Request $request)
    {
        $post = new Post();
        $post->body = $request['body'];

        // Post relates to the User
        $request->user()->posts()->save($post);
        return redirect()->route('home');
    }
}