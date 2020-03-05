<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'bid' => Str::random(10),
        'jenis' => 'Reguler',
        'kategori' => '21K',
        'harga' => 500000,
        'jumlah' => 1,
        'invoice' => null,
        'status' => $faker->numberBetween(0, 4),
        'email' => $faker->email,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
