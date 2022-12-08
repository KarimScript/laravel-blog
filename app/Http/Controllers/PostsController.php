<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('blogs.index',[
           'posts' => Post::orderBy('created_at','DESC')->get()
        ]);
    }

    // public function userPosts($id){
    //     return view('dashboard')
    //     ->with('posts', Post::where('user_id',$id)->get());
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'img' => 'required|mimes:jpg,png,jpeg,svg',
            'desc' => 'required',
          ]);

        // create slug
        $slug = Str::slug($request->title,'-');

        //   handle image
          $newImageName = uniqid() . '-' . $slug . '.' . $request->img->extension();
          $request->img->move(public_path('images'),$newImageName);
          
        
          Post::create([
            'title' => strip_tags($request->input('title')) ,
            'slug' => $slug,
            'img' => $newImageName,
            'desc' => strip_tags($request->input('desc')) ,
            'user_id' => auth()->user()->id 
          ]);
         
  
          return redirect()-> route('blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('blogs.show')
        ->with('post', Post::where('slug',$slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('blogs.edit')
        ->with('post', Post::where('id',$id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'img' => 'required|mimes:jpg,png,jpeg,svg',
            'desc' => 'required',
          ]);

        // create slug
        $slug = Str::slug($request->title,'-');

        //   handle image
          $newImageName = uniqid() . '-' . $slug . '.' . $request->img->extension();
          $request->img->move(public_path('images'),$newImageName);
          
        Post::where('id',$id)->update([
            'title' => strip_tags($request->input('title')) ,
            'slug' => $slug,
            'img' => $newImageName,
            'desc' => strip_tags($request->input('desc')) ,
            'user_id' => auth()->user()->id 
          ]);
         
  
          return redirect()-> route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $to_delete = Post::findOrFail($id);
        $to_delete ->delete();

        return redirect()-> route('dashboard');
    }
}
