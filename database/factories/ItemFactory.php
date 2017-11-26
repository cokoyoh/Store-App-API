<?php

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'name' => $faker->words(3,false),
        'description' => $faker->paragraph(3,true),
        'total_number' => $faker->randomNumber(3, false),
        'price' =>  $faker->randomNumber(6,false)
    ];
});
