<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;

class Post extends Model
{
    protected $fillable = [

      'title',
      'content',
      'likes'
    ];

    function tags() {

      return $this -> belongsToMany(Tag::class);
    }
}
