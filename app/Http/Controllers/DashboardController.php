<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        $post = Auth::user()->posts;
        $user = Auth::user();
        $id = Auth::id();
        return view('dashboard')->with(['id'=>$id,'user'=>$user,'posts'=>$post]);
    }
}
