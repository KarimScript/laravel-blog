<x-app-layout>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="posts-list" style="display: flex;gap:40px;flex-wrap:wrap;justify-content:center">
          @if (count($posts) > 0)
            @foreach ($posts as $post)
             <div class="post" style="width:500px">
                 <div class="image" style=""> <img width="100%" src="/images/{{$post->img}}" alt="blog post"> </div>
                 <div class="text">
                   <h3 class="title">{{$post->title}}</h3>
                   <p class="author">By: {{$post->user->name}}</p>
                   <p>on {{date('d-m-Y', strtotime($post->created_at) )}}</p>
                   <a href="{{route('blogs.show',$post->slug)}}">read more</a>
                   <div class="buttons" style="display: flex;justify-content:space-between">
                    <a style="color:blue" href="{{route('blogs.edit',$post->id)}}">Update</a>
                   
                    <form action="{{route('blogs.destroy',$post->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button style="color:red"  class="delete" type="submit">Delete</button>
                     </form>
                   </div>
                 </div>
             </div>
            @endforeach
          @else
            <div style="display:flex;flex-direction:column;text-align:center">
              <h1 style="font-size:40px"> OOPS ! You haven't created a Blog yet </h1>
              <a href="{{route('blogs.create')}}" style="font-size: 30px;color:white;background:blue">
                Create a Blog
              </a>

           </div>
           
        
          @endif
         </div>
        </div>
    </div>
</x-app-layout>
