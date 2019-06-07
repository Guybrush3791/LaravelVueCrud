<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{

    function getPosts() {

      $posts = Post::all();

      return view('page.posts', compact('posts'));
    }// tmptmp
}
