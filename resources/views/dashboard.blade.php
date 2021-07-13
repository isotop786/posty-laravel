@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('content')

    @if(session('status'))
    <div class="flex justify-center">
    <div class="bg-green-400 text-white p-3">
         {{session('status')}}
    </div>
    </div>
   
    @endif
    <div class="flex justify-center ">
        <div class="w-8/12 bg-white rounded-lg p-6">
        

        Dashboard  {{$id}} {{$user->name}}
        </div>
    </div>
@endsection