<?php

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
<<<<<<< HEAD
        'name' => $faker-> words(3, true),
=======
        'name' => $faker-> word,
>>>>>>> 57c49d9a4272345093eccf9bd02eb12185988c5e
        'description' => $faker->paragraph(3,true),
        'total_number' => $faker->randomNumber(3, false),
        'price' =>  $faker->randomNumber(6,false)
    ];
});
