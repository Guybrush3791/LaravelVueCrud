<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    function updatePost(Request $request, $id) {

      $post = Post::findOrFail($id);
      $post -> update($request->all());
      return response()->json($request->all(), 200);
    }

    function deletePost($id) {

      $post = Post::findOrFail($id);
      $post -> delete();

      return response()->json('deleted $id post', 200);
    }
}
