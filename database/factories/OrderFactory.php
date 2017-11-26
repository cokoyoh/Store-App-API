<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    $user = \App\User::inRandomOrder()->first();
    $item = \App\Item::inRandomOrder()->first();
    return [
        'number_of_items' => $faker->numberBetween(1,20),
        'amount' => $faker->randomFloat(2,500,10000),
        'user_id' => $user->id,
        'item_id' => $item->id,
    ];
});
