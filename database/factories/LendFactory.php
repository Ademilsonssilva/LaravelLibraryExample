<?php

use Faker\Generator as Faker;
use \Carbon\Carbon as Carbon;
use App\User;
use App\Book;

$factory->define(App\Lend::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomElement(User::all()->pluck('id')->all()),
        'book_id' => $faker->randomElement(Book::all()->pluck('id')->all()),
        'days' => $faker->randomDigitNotNull,
        'lend_date' => $faker->dateTimeBetween(Carbon::today()->subDays(3), Carbon::today()->addDays(3)),
        'devolution_date' => (rand(0,1) ? $faker->dateTimeBetween(Carbon::today()->addDays(3),Carbon::today()->addDays(6)) : null),
    ];
});
