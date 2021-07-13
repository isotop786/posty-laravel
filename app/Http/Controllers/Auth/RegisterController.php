<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;




class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request->only('email','password'));

        // validate
        $request->validate([
            'name' => 'required|min:4|max:255',
            'username'=>'required|min:4|unique:users|max:255',
            'email' => 'required|unique:users|email',
            'password'=>'required|min:6|confirmed'

        ]);


        // store user 
        User::create([
            'name' => $request->name,
            'username'=>$request->username,
            'email'=> $request->email,
            'password'=>Hash::make($request->password)
        ]);
        // sign the user in 
       auth()->attempt($request->only('email','password'));
      

        return redirect()->route('dashboard');
        // redirect
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        // if(auth()->attemp($request->only(['email','password']))){
        //     return redirect()->route('dashboard')->with('success','Login Success');
        // }else{
        //     return back()->with('status','Invalid details ');
        // }

        if(!auth()->attempt($request->only(['email','password']))){
            return back()->with('status','Invaild email or password');
        }

        auth()->attempt($request->only(['email','password']));
        return redirect()->route('dashboard')->with('status','Login Success!!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('posts');
    }
}
