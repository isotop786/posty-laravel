<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {

        $posts = Post::orderBy('id','desc')->paginate(4);
        return view('posts.index')->with('posts',$posts);
    }

    public function store(Request $request)
    {
       $request->validate([
           'body'=>'required|min:4'
       ]);

    //    Post::create([
    //        'user_id'=> Auth::user()->id,
    //        'body'=> $request->body
    //    ]);

        $request->user()->posts()->create([
            'body' => $request->body
        ]);

       return redirect()->route('dashboard')->with('status','successfully posted');


    }
}
