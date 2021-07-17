<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Commet;

class CommetController extends Controller
{
    public function __construc()
    {
        $this->middleware(['auth']);
    }

    public function index(Post $post,Request $request)
    {
        $c = $post->comments()->where('user_id',$request->user()->id)->get();

        // $c = Commet::where('user_id',$request->user())
        //            ->where('post_id',$postID)->get();

            //   dd($c->count());     
            dd($c);

        // dd(Commet::all()->count());
        // $all_comments = $post->comments()->where('user_id',$request->user());

        // dd($all_comments->count());
    }

}
