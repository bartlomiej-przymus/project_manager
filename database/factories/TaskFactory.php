<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'completed' => false,
        'description' => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'project_id' => 7,
    ];
});
