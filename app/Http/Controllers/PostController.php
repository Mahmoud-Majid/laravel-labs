<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
       $allPosts = [
          [
             'id' => 1,
             'title' => 'Post 1',
             'posted_by' => 'ahmed',
             'created_at' => '2019-01-01',
          ],    
          [
             'id' => 2,
             'title' => 'Post 2',
             'posted_by' => 'ali',
             'created_at' => '2020-05-07',
          ],          
       ];
      //  dd($allPosts);
       return view('posts.index', data: [
          'allPosts' => $allPosts,
       ]);
    }
    public function create()
    {
       return view('posts.create', data: []);
    }
    public function store()
    {
       return "asdasasdasd";
    }
}