@extends('layouts.app')

@section('title')
Posty | All Posts
@endsection

@section('content')
    <div class="flex justify-center my-3">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{route('posts')}}" method="post">
            @csrf

            <div class="mb-4">
                <label for="body" class="sr-only">Body of the Post</label>
               <textarea name="body" id="" cols="30" rows="4"
               class="bg-gray-100 w-full p-2 border-2 rounded-lg focus:outline-none
               @error('body')
                   border-red-500
               @enderror
               "
              placeholder="Type something..."
               ></textarea>
               @error('body')
                   <div class="text-red-500 p-1">{{$message}}</div>
               @enderror
            </div>
            <div>
            <button type="submit" class="items-end bg-blue-400 p-3 w-full  text-white
            rounded 
            ">Post</button>
            </div>
            
            </form>

               @if($posts->count())

                
         
            @foreach ($posts as $p)
               <div class="my-4 p-2 bg-gray-100 border-2">
                    <a href="" class="font-bold">{{$p->user->name}}</a>
                    <span class="text-gray-600 text-sm">{{$p->created_at->diffForHumans()}}</span>
                    <p class="mb-2">{{$p->body}}</p>

               
                    <div class="my-3 flex items-center">
                        
                            
                      @if(Auth::check())
                            @if($p->likedBy(auth()->user()))
                                <span class="bg-green-200 mr-4 p-1">You have like this post</span>
                                <form class="mr-2" action="" method="post">@csrf
                                    <button type="submit" disabled>Dislike</button>
                                </form>
                            @else 
                                <form  class="mr-3" action="{{route('like',[$p->id])}}" method="post">@csrf
                                    <button  type="submit"
                                 
                                     >Like</button>
                                </form>
                            @endif
                            
                                
                            
                                <span 
                                class="ml-2  p-1 rounded
                                @if($p->likes->count()>0)
                                bg-blue-200
                                @else
                                bg-red-300 
                                @endif
                                "
                                >

                                @if($p->likes->count()>0)
                                
                                {{$p->likes->count()}} {{Str::plural('like',$p->likes->count())}}</span>
                                @else
                                No Likes
                                @endif

                                @endif
                            </div>
                         

               </div>
                  
            @endforeach
          
                    {{$posts->links()}}
            @else
                <div class="flex justify-center mb-2">
                <div class="w-8/12 bg-light p-4 rounded-lg">
                    There is no Post yet.
                </div>
            </div>

    @endif

        </div>
    </div>

 

   
@endsection