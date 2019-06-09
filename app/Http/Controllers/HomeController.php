<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{

    function getPosts() {

      $posts = Post::all();
      return view('page.posts', compact('posts'));
    }

    function updatePost(Request $request, $id) {

      $post = Post::findOrFail($id);
      $post -> update($request->all());
      return response()->json($request->all(), 200);
    }

    function deletePost($id) {

      $post = Post::findOrFail($id);
      $post -> delete();

      return response()->json('deleted ' . $id . ' post', 200);
    }
}
