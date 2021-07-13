@extends('layouts.app')

@section('title')
Registration
@endsection

@section('content')
    <div class="flex justify-center"> 
        <div class="w-4/12 p-6 bg-white rounded-lg">
            <form action={{route('register')}} method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input type="text" name="name" id="name" placeholder="Your name"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg
                @error('name') border-red-500 @enderror
                "
                value="{{old('name')}}">
                @error('name')
                    <div class="text-red-600 p-1">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="username" class="sr-only">Username</label>
                <input type="text" name="username" id="email" placeholder="Username"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg 
                @error('username')
                    border-red-500
                @enderror
                "
                value="{{old('username')}}"
                >
                @error('username')
                    <div class="text-red-600 p-1">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" id="email" placeholder="Your Email"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg
                @error('email') border-red-500 @enderror
                "
                value="{{old('email')}}"
                >
                @error('email')
                    <div class="text-red-600 p-1">
                    {{$message}}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" placeholder="Password"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg
                @error('password')
                    border-red-500
                @enderror
                "
               
                >
                @error('password')
                    <div class="p-1 text-red-600">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation confirm" class="sr-only">Confirme Password</label>
                <input type="password" name="password_confirmation" id="password_confirm" placeholder="Password Again"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg
                @error('password_confirmation')
                     border-red-500
                @enderror
                "
                >
                @error('password_confirmation')
                    <div>{{$message}}</div>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3
                rounded font-medium w-full
                ">Register</button>
            </div>

            </form> 
        </div>
    </div>
@endsection
