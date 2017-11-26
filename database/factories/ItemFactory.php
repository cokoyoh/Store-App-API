<?php

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'name' => $faker->words(3,false),
        'description' => $faker->paragraph(3,true),
        'total_number' => $faker->numberBetween(10, 200),
        'price' => $faker->numberBetween(200,1000)
    ];
});
