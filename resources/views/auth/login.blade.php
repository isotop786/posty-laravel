@extends('layouts.app')

@section('title')
Login
@endsection

@section('content')
<div class="flex justify-center">
    <div class="w-4/12 rounded-lg p-4 bg-white">
        <form action="">
        @csrf
        <div class="mb-3">
            <label class="sr-only">Email</label>
            <input class="bg-gray-200 w-full border-2 p-4 rounded-lg"
            placeholder="Your Email"
             type="email" name="email" />
        </div>
          <div class="mb-3">
            <label for="password" class="sr-only">Password</label>
            <input 
            class="bg-gray-200 w-full border-2 p-4 rounded-lg"
            type="password" name="password" placeholder="Your Password" />
        </div>
        <div>
            <input
            class="bg-blue-400 p-3 w-full text-white"
             type="submit" value="Login">
        </div>
        </form>
    </div>
</div>
@endsection