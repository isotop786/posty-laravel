<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    @yield('title')
    </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="bg-gray-300">  
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex item-center ">
            <li><a class="p-3" href="{{route("home")}}">Home</a></li>
            @if(Auth::check())
            <li><a class="p-3" href="{{route('dashboard')}}">Dashboard</a></li>
            @endif
            <li><a class="p-3" href="{{route('posts')}}">Post</a></li>
            <li><a class="p-3" href="{{route('images')}}">Image Gallery</a></li>
        </ul>

        <ul class="flex item-center">
            @if(Auth::check())
                <li><a href="" class="p-3">{{Auth::user()->name}}</a></li>
                 {{-- <li><a class="p-3" href="{{route('logout')}}">Logout</a></li> --}}
                 <li><form action="{{route('logout')}}" method="POST">
                    @csrf 
                    <input class="p-2 bg-red-400 text-white" type="submit" value="Logout  ">
                 </form></li>
            @else
            <li><a class="p-3" href="{{route('login')}}">Login</a></li>
             <li><a class="p-3" href="{{route('register')}}">Register</a></li>
            @endif    



        </ul>
    </nav>

    @yield('content')
</body>
</html>