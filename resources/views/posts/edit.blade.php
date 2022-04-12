@extends('layouts.app')

@section('title')Create @endsection

@section('content')
<form class="col-6 mx-auto my-5" method="POST" action="{{route('posts.update',['post' => $post["id"] ])}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="exampleInputTitle" class="form-label">Title</label>
        <input name="title" value="{{$post->title}}" type="text" class="form-control" id="exampleInputTitle">
    </div>

    <div class="mb-3">
        <label for="exampleInputPosted" class="form-label">Description</label>
        <textarea name="description" type="text" class="form-control" id="exampleInputPosted">{{$post->description}}
        </textarea>
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Post Creator</label>
        <select name='post_creator' class="form-control">
            @foreach ($users as $user)
            <option value="{{$user->id}}" @if($user->id == $post->user_id) selected @endif >{{$user->name}}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update Post</button>
</form>
@endsection