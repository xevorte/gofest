<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Testimonial;
use Faker\Generator as Faker;

$factory->define(Testimonial::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 5),
        'travel_package_id' => $faker->numberBetween(1, 4),
        'title' => $faker->sentence(4),
        'description' => $faker->paragraph(2, 3),
        'rating' => $faker->numberBetween(4, 5)
    ];
});
