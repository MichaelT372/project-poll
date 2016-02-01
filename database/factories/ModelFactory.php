<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Poll::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence($nbWords = 10, $variableNbWords = true),
    	'slug' => $faker->uuid
    ];
});

$factory->define(App\Option::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence($nbWords = 5, $variableNbWords = true),
		'votes' => $faker->numberBetween(0, 1000)
    ];
});

