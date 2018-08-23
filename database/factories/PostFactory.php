<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
    	'post_types'=>$faker->randomElement(['formation', 'stage', 'indéfini']),
        'title' => $faker->sentence(),
        'description' => $faker->paragraph(2),
        'start_date'=> $faker->dateTime($max = 'now', $timezone = null),
        'end_date'=> $faker->dateTime($max = 'now', $timezone = null),
        'price' => $faker->numberBetween(7, 2),
        'nb_max'=>$faker->randomDigit()
    ];
});