@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('content')
    <div class="flex justify-center ">
        <div class="w-8/12 bg-white rounded-lg p-6">
        Dashboard  {{$id}} {{$user->name}}
        </div>
    </div>
@endsection