<?php

use Faker\Generator as Faker;

$factory->define(App\Image::class, function (Faker $faker) {
    for ($i=1; $i <= 10; $i++) {
        return [
            'post_id' => $i,
            'title' => $faker->name,
            'description' => $faker->paragraph,
            'path' => $faker->image('/temp', 200, 200, 'cats', false),
        ];
    }

});
