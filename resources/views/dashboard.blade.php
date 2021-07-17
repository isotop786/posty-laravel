@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('content')

    @if(session('status'))
    <div class="flex justify-center my-4">
    <div class="bg-green-400 text-white p-3">
         {{session('status')}}
    </div>
    </div>
   
    @endif
    <div class="flex justify-center ">
        <div class="w-8/12 bg-white rounded-lg p-6">
        
        Dashboard  {{$id}} {{$user->name}}

        {{-- {{auth()->user()->posts()}} --}}
        </div>
    </div>

    @if(count($posts)>0)

     <div class="flex justify-center my-3">
        <div class="w-8/12 bg-white rounded-lg p-6">
        
        <h1 class="text-2xl">Posts of {{auth()->user()->name}}</h1>

        <ul class="w-4/12">
             @foreach ($posts as $p)
                <li class="p-2 bg-gray-100 my-2">{{$p->body}}</li>
             @endforeach
        </ul>

    

        {{-- {{auth()->user()->posts()}} --}}
        </div>
    </div>

    @else 
    <div>No Posts yet</div>

    @endif

   

    {{-- <div class="flex w-8/12 justify-center bg-gray-100 p-3">
       <div class=" rounded">
        @if($posts)
            @foreach ($posts as $p )
                <div>{{$p->body}}</div>
            @endforeach
        @endif
       </div>
    </div> --}}
@endsection