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
            <li><a class="p-3" href="">Home</a></li>
            @if(Auth::check())
            <li><a class="p-3" href="">Dashboard</a></li>
            @endif
            <li><a class="p-3" href="">Post</a></li>
        </ul>

        <ul class="flex item-center">
            @if(Auth::check())
                <li><a href="" class="p-3">{{Auth::user()->name}}</a></li>
                 <li><a class="p-3" href="">Logout</a></li>
            @else
            <li><a class="p-3" href="{{route('login')}}">Login</a></li>
             <li><a class="p-3" href="{{route('register')}}">Register</a></li>
            @endif    



        </ul>
    </nav>

    @yield('content')
</body>
</html>