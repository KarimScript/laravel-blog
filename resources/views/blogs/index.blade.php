@extends('layout');

@section('content')

<div class="header">
    <h1>Our Blogs Posts</h1> 
    
    <a class="create-btn" href={{Auth::check() ? route('blogs.create') : "/login"}}>create a post</a>
</div>

<div class="posts-list">

@foreach ($posts as $post)
<div class="post">
    <div class="image"> <img src="/images/{{$post->img}}" alt="blog post"> </div>
    <div class="text">
      <h3 class="title">{{$post->title}}</h3>
      <p class="author">By: {{$post->user->name}}</p>
      <p>on {{date('d-m-Y', strtotime($post->created_at) )}}</p>
      <a href="{{route('blogs.show',$post->slug)}}">read more</a>
    </div>
</div>
@endforeach
 


</div>


@endsection


@section('title',' Laravel Blog')
