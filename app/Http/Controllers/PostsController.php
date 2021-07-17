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

    public function delete(Post $post)
    {
        // dd($post);
        // dd($post->id);
        // $del = Post::find($post->id());

        // $del->delete();
        // dd(auth()->user()->id);
        // dd($post->user->id);

        // if($post->user_id == auth()->user()->id){
        //     $post->delete();
        // }else{
        //     dd("don't be over smart");
        // }

        # protected by model defined method

        // if($post->ownedBy(auth()->user())){
        //     $post->delete();
        // }
        // else{
        //     dd("Do not try to be over smart");
        // }

        # Using Policy 
        $this->authorize('delete',$post);

        $post->delete();
       

        return back();
    }
}
