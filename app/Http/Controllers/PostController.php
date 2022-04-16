<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
   use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
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
     $data = request()->all();
     $slug = SlugService::createSlug(Post::class, 'slug', $data['title']);
     $path = Storage::putFile('public', request()->file('image'));
     $url = Storage::url($path);

     Post::create([
        'title' => $data['title'],
        'description' => $data['description'],
        'user_id' => $data['post_creator'],
        'slug' => $slug,
        'image_path' => $url,
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

   public function update($id, StorePostRequest $request){

      $post = Post::findOrFail($id);
      $data = request()->all();
      $path = Storage::putFile('public', request()->file('image'));
      $url = Storage::url($path);
      $slug = SlugService::createSlug(Post::class, 'slug', $data['title']);

      $post->update([
         'title' => $data['title'],
         'description' => $data['description'],
         'user_id' => $data['post_creator'],
         'image_path' => $data['image'],
         'slug' => $slug,
         'image_path' => $url,
      ]);
    

    return to_route('posts.index');
  }


  public function destroy ($id){
      $post = Post::findOrFail($id);
      $location =  $post->image_path;
      $imageName = basename($location);

      // $imageURL = "D:\DOCS MOHMA\iti\OPEN SOURCE\Larvel\Day 1\Lab1\\example-app\storage\app\public" . '\\' . $imageName;
      // unlink($imageURL);
      $post->comments()->delete();
      $post->delete();
      return to_route('posts.index');
     
     }
}