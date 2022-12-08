@extends('layout');

@section('content')

<div class="header">
    <h1>Create New Blog Post</h1> 
    
</div>

<form action="{{route('blogs.store')}}" method="POST" class="post-form" enctype="multipart/form-data">
    @csrf
    <div>
      <label for="title">Blog Name :</label> <br>
      <input type="text" name="title" id="title" value="{{old('title')}}" >
      @error('title')
        <p class="error-msg">{{$message}}</p>
      @enderror
    </div>
    
    <div>
        <label for="img">Image :</label><br>
        <input type="file" name="img" id="img" value="{{old('img')}}" >
        @error('img')
        <p class="error-msg">{{$message}}</p>
        @enderror
    </div>

    <div>
        <label for="desc">Description :</label><br>
        <textarea name="desc" id="desc" cols="30" rows="7" >{{old('desc')}}</textarea>
        @error('desc')
        <p class="error-msg">{{$message}}</p>
        @enderror
    </div>

    <button type="submit">Submit</button>

</form>


@endsection


@section('title',' Laravel Blog')
