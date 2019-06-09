<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 100)
              -> create()
              -> each(function($post) {


            $tags = App\Tag::inRandomOrder()->take(rand(1, 3))->get();
            $post->tags()->attach($tags);
        });
    }
}
