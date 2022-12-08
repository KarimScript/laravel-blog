@extends('layout');

@section('content')

<div class="header">
    <h1>Edit Blog Post</h1> 
    
</div>

<form action="{{route('blogs.update',$post->id)}}" method="POST" class="post-form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
      <label for="title">Blog Name :</label> <br>
      <input type="text" name="title" id="title" value="{{$post->title}}" >
      @error('title')
        <p class="error-msg">{{$message}}</p>
      @enderror
    </div>
    
    <div>
        <label for="img">Image :</label><br>
        <input type="file" name="img" id="img" value="{{$post->img}}" >
        @error('img')
        <p class="error-msg">{{$message}}</p>
        @enderror
    </div>

    <div>
        <label for="desc">Description :</label><br>
        <textarea name="desc" id="desc" cols="30" rows="7" >{{$post->desc}}</textarea>
        @error('desc')
        <p class="error-msg">{{$message}}</p>
        @enderror
    </div>

    <button type="submit">Submit</button>

</form>


@endsection


@section('title',' Laravel Blog')
