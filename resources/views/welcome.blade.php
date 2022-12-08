@extends('layout');

@section('content')

<div class="hero">
    <div class="content">
        <h1>Blogs</h1>
        <a class="hero-btn" href="{{route('blogs.index')}}">Browse Blogs</a>
    </div>
    
</div>


@endsection


@section('title','Blog')





{{-- @if(Auth::check())

Weclome karim

@endif 


       @guest
           Welcome Guest 
       @endguest

       @auth
           Welcome karim
       @endauth

--}}
