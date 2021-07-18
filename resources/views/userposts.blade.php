@extends('layouts.app')

@section('title')
All posts of {{$name}}
@endsection

@section('content')
    <div class="flex justify-center">
        <div class="w-9/12 bg-white p-6 rounded-lg">
            <h1 class="text-2xl text-center mb-2">All posts of {{$name}}</h1>
            <a class="bg-blue-500 text-white p-3 m-2 rounded hover:bg-blue-300 " href="{{route("posts")}}">Back to All Posts</a>
            @foreach ($posts as $post)
                 <div class="my-4 p-2 bg-gray-100 border-2">
                    
                    <span class="text-gray-600 text-sm">Posted {{$post->created_at->diffForHumans()}}</span>
                    <p class="mb-2">{{$post->body}}</p>
                    <p>{{$post->likes->count()}} {{Str::plural('like',$post->likes->count())}}</p>
                    @if(count($post->comments)>0)
                        {{$post->comments->count()}} {{Str::plural('Comment',$post->comments->count())}} 
                    @else 
                        <div>No Comments</div>

                    @endif    
                    </div>
            @endforeach
        </div>
    </div>
@endsection