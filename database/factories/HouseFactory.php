<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Model;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'id' => $faker->unique()->ean8,
        'name_house' => $faker->name_house,
        'house_type' => $faker->house_type,
        'room_type' => $faker->room_type,
        'address' => $faker->address,
        'bed_room_num' => $faker->bed_room_num,
        'bath_room_num' => $faker->bath_room_num,
        'description' => $faker->description,
        'price' => $faker->price,
        'user_id' => 1,
        'status' => $faker->status
    ];
});
