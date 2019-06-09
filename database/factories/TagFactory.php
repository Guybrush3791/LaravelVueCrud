<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
    return [

        'name' => $faker -> unique() -> word,
        'description' => $faker -> sentence
    ];
});
