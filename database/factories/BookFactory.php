<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'name' => $faker->words($faker->randomDigitNotNull, true),
        'author' => $faker->name,
        'synopsis' => $faker->paragraph($faker->randomDigitNotNull),
        'quantity' => $faker->randomDigitNotNull,
        'limited' => $faker->boolean,
    ];
});
