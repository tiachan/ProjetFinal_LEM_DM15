<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
    	'post_type'=>$faker->randomElement(['formation', 'stage', 'undefined']),
        'title' => $faker->sentence(),
        'description' => $faker->paragraph(2),
        'start_date'=> $faker->dateTimeBetween($max = 'now', '3 months', 'Europe/Paris'),
        'end_date'=> $faker->dateTimeBetween($max = '3 months', '6 months', 'Europe/Paris'),
        'price' => $faker->numberBetween(7, 2),
        'nb_max'=>$faker->randomDigit()
    ];
});