<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'bid' => Str::random(10),
        'ticket_id' => $faker->numberBetween(1, 3),
        'jumlah' => $faker->numberBetween(1, 5),
        'invoice' => null,
        'status' => $faker->randomElement(['booked', 'uploaded', 'accepted', 'declined']),
        'email' => $faker->email,
        'expired' => now()->addDay(),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
