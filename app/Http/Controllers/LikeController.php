<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\DB;



class LikeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }


    public function store(Post $post,Request $request)
    {
        

        if($post->likedBy($request->user()))
        {
            return back()->with('message','You can not like more than once');
        }

        $post->likes()->create([
            'user_id'=>auth()->id()
        ]);


        return back();
    }   


    public function deleteLike($postId,Request $request)
    {
        $dis = $request->user()->likes()->where('post_id',$postId)->delete();

        // dd($dis);


        return back();                  
    }
}
