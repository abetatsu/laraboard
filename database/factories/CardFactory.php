<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Card;
use Faker\Generator as Faker;

$factory->define(Card::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(10),
        'content' => $faker->paragraph,
        'user_id' => $faker->randomElement(['1', '2']),
        'listing_id' => $faker->numberBetween($min = 1, $max = 4),
    ];
});
