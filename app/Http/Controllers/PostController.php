<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
      $posts = Post::paginate(5);
      return view('guests.posts.index', compact('posts'));
    }

    public function show(Post $post) {
      return view('guests.posts.show', compact('post'));
    }
}
