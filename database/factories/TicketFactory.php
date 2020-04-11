<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ticket;
use App\User;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'ticket' => $faker->sentence(12, true),
        'status' => $faker->randomElement(['new', 'open', 'closed']),
        'assignee_id' => User::all()->random()->id,
    ];
});
