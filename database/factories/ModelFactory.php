<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
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
