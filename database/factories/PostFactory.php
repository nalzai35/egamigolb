<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'content' => $faker->paragraph,
        'user_id' => rand(1, 30),
    ];
});


// Di bawah ini untuk di panggil melalui tinker
// factory(App\Post::class, 10)->create()->each(function($post) { $post->categories()->attach(rand(1, 10)); });
