<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
   
    public function index()
    {
      $posts = Post::paginate();
      $comments = \App\Models\Comment::with('commentable')->get();

      return view('posts.index',['allPosts'=>$posts, 'comments'=>$comments ]);

    }
    public function create()
    {
       $users = User::all();
       return view('posts.create', ['users'=>$users]);
    }

    public function store(StorePostRequest $request)
    {
       request()->validate([
           'title' => ['required', 'min:3'],
           'description' => ['required', 'min:5'],
       ],
      [
            'title.required' => 'Title cannot be empty',
            'title.min' => 'Title must be at least 3 characters',
            'description.required' => 'Description cannot be empty',
            'description.min' => 'Description must be at least 5 characters',
         ]);
   
      //    $post = Post::create([
      //       'title' => request('title'),
      //       'description' => request('description'),
      //       'user_id' => request('user_id'),
      //    ]);
   
      //    return redirect('posts');
      // ]);

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
         $users = User::all();
         return view('posts.edit', ['post'=>$post, 'users'=>$users]);

   }

   public function update($id){
      $data = request()->all();
      $post = Post::findOrFail($id);
      $post->update([
         'title' => $data['title'],
         'description' => $data['description'],
         'user_id' => $data['post_creator'],
      ]);
    

    return to_route('posts.index');
  }


  public function destroy ($id){
      $post = Post::findOrFail($id);
      $post->delete();
      $post->delete()->comments()->delete();
      return to_route('posts.index');
     
     }
}