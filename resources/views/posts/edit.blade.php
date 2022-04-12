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
        <label for="exampleInputPosted" class="form-label">Posted By</label>
        <textarea name="description" type="text" class="form-control" id="exampleInputPosted">{{$post->description}}
        </textarea>
    </div>



    <button type="submit" class="btn btn-primary">Update Post</button>
</form>
@endsection