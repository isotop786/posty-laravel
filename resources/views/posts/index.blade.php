@extends('layouts.app')

@section('title')
Posty | All Posts
@endsection

@section('content')
    <div class="flex justify-center my-3">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{route('posts')}}" method="post">
            @csrf

            @if(Auth::check())
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
              @else
            <div class="bg-blue-500 text-white p-6  rounded-lg my-3">
                <h1 class="text-2xl mb-3">Wanna make a post <a class="p-1 ruonded-lg bg-white text-blue-700" href="{{route('register')}}">Register</a> Today!!</h1>
                <p class="mt-3">Already have an account ? <a style="border-bottom:1px solid white" href="{{route('login')}}">Login</a> here</p>
            </div>
            @endif

               @if($posts->count())

                
         
            @foreach ($posts as $p)
               <div class="my-4 p-2 bg-gray-100 border-2">
                    <a href="" class="font-bold">{{$p->user->name}}</a>
                    <span class="text-gray-600 text-sm">{{$p->created_at->diffForHumans()}}</span>
                    <p class="mb-2">{{$p->body}}</p>

               
                    <div class="my-3 flex items-center">
                        
                            
                      @if(Auth::check())
                            @if($p->likedBy(auth()->user()))
                                
                                <form class="mr-2" action="{{route('deletelike',[$p->id])}}" method="post">@csrf
                                @method('DELETE')
                                    <button
                                    class="text-red-400"
                                     type="submit" >Dislike</button>
                                </form>
                            @else 
                                <form  class="mr-3" action="{{route('like',[$p->id])}}" method="post">@csrf
                                    <button  type="submit"
                                    class="text-blue-400"
                                     >Like</button>
                                </form>
                            @endif
                            
                                
                            
                                <span 
                                class="ml-2  p-1 rounded
                             
                                "
                                >
                                {{$p->likes->count()}} {{Str::plural('like',$p->likes->count())}}</span>
                               

                            @else 
                            {{$p->likes->count() }}  {{Str::plural('like',$p->likes->count())}}

                                @endif
                            </div>
                         
                          @auth()
                          <hr>
                   <div class="items-center my-4">
                    <div>
                     
                     {{-- {{$p->comments()->where('user_id',auth()->id())}} --}}
                        {{-- {{$p->comments()->get()}} --}}
                     {{-- {{dd($p->comments())}} --}}

                    @if(count($p->comments()->get()))
                    {{-- {{$p->comments()->get()->count}} comments --}}
                    <h2>{{count($p->comments()->get())}} {{Str::plural('Comment',count($p->comments()->get()))}}</h2>
                    @else
                    No Comments
                    @endif
                     @foreach ($p->comments()->get() as $c)
                        <p><strong>{{$c->user->name}}</strong> commented: "<em>{{$c->body}}</em>"</p>
                     @endforeach
                    </div>

                    <div class="p-3 my-2">
                    <form action="" method="post">
                    @csrf 
                    <div>
                    <input class="bg-white p-1 rounded" type="text" name="" id=""><button class="p-1 bg-blue-200" type="submit">comment</button>
                    </div>
                    </form>
                    </div>
                   </div>
               @endauth

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