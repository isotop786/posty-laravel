@extends('layouts.app')

@section('title')
Login
@endsection

@section('content')
<div class="flex justify-center">
      
    <div class="w-4/12 rounded-lg p-6 bg-white">
    <h1 class="text-2xl mb-3 text-center">Login</h1>
        <form action="{{route('login')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="sr-only">Email</label>
            <input name="email" class="bg-gray-200 w-full border-2 p-4 rounded-lg
            @error('email')
                border-red-600
            @enderror
            "
            placeholder="Your Email"
             type="email" name="email" />
             @error('email')
                <div class="text-red-500 p-1">{{$message}}</div>
             @enderror
        </div>
          <div class="mb-3">
            <label for="password" class="sr-only">Password</label>
            <input 
            class="bg-gray-200 w-full border-2 p-4 rounded-lg 
            @error('password')
                border-red-600
            @enderror
            "
            type="password" name="password" placeholder="Your Password" />
            @error('password')
                <div class="text-red-500 p-1">{{$message}}</div>
            @enderror
        </div>
        <div>
            <input
            class="bg-blue-400 p-3 w-full text-white rounded"
             type="submit" value="Login">
        </div>
        </form>
    </div>
</div>
@endsection