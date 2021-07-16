<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;

class LikeController extends Controller
{
    public function store(Post $post,Request $request)
    {
        // dd($post->likedBy($request->user()));

        // dd('store',$user_id,$post_id);
        // Like::create([
        //     'user_id'=>auth()->id(),
        //     'post_id'=>$post
        // ]);

        
        if($post->likedBy($request->user()))
        {
            return back()->with('message','You can not like more than once');
        }

        $post->likes()->create([
            'user_id'=>auth()->id()
        ]);


        return back();
    }   
}
