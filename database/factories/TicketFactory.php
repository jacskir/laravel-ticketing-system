<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ticket;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName . ' ' . $faker->lastName,
        'ticket' => $faker->sentence(12, true),
        'status' => $faker->randomElement(['new', 'open', 'closed']),
    ];
});
