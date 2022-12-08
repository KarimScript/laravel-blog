@extends('layout');

@section('content')

<div class="header">
    <h1>Post Details</h1> 
</div>

<div class="posts-list">


<div class="post-details">
    <div class="image"> <img src="/images/{{$post->img}}" alt="blog post"> </div>
    <div class="text">
      <h3 class="title">{{$post->title}}</h3>
      <p class="author">By: {{$post->user->name}}</p>
      <p>on {{date('d-m-Y', strtotime($post->created_at) )}}</p>
      <p>{{$post->desc}}</p>
    </div>
</div>

 


</div>


@endsection
