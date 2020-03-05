<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Participant;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Participant::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'uid' => Str::random(10),
        'bid' => 'bid',
        'email' => $faker->companyEmail,
        'address' => $faker->streetAddress,
        'tel' => $faker->phoneNumber,
        'emergency' => $faker->phoneNumber,
        'gender' => $faker->randomElement(['male', 'female']),
        'birthdate' => $faker->date('Y-m-d', 'now'),
        'identity' => $faker->text,
        'community' => $faker->state,
        'size' => $faker->randomElement(['S', 'M', 'L', 'XL']),
        'img' => 'thisisgenerated',
        'medical' => null,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
