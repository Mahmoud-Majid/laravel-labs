<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
   
    public function index()
    {
      $posts = Post::all();

      return view('posts.index',['allPosts'=>$posts]);

    }
    public function create()
    {
       $user = User::all();
       return view('posts.create', ['users'=>$user]);
    }

    public function store()
    {
      $data = request()->all();
      Post::create([
         'title' => $data['title'],
         'description' => $data['description'],
         'user_id' => $data['post_creator'],
      ]);
      
      //  return redirect()->route('posts.index');
      return to_route('posts.index');
    }

    public function show($post)
    {
       $post = Post::find($post);
    
       return view('posts.show', ['post'=>$post]);     
    }

    public function edit($id)
    {
         $post = Post::findOrFail($id);
         return view('posts.edit', ['post'=>$post]);

   }

  public function update($id){
      $data = request()->all();
      $post = Post::findOrFail($id);
      $post->update([
         'title' => $data['title'],
         'description' => $data['description'],
      ]);
    

    return to_route('posts.index');
  }


  public function destroy ($id){
      $post = Post::findOrFail($id);
      $post->delete();
      return to_route('posts.index');
     
     }
}