<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
       return view('posts.index', data: []);
    }
    public function create()
    {
       return view('posts.create', data: []);
    }
}