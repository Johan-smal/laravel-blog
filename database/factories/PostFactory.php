<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->words(rand(2, 5), true),
        'content' => $faker->paragraph(rand(5, 10), true),
    ];
});
