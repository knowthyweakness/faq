<?php
/**
 * Created by PhpStorm.
 * User: thoss
 * Date: 5/6/2019
 * Time: 10:19 PM
 */
use Faker\Generator as Faker;
$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        'fname' => $faker->firstName,
        'lname' => $faker->lastName,
        'body' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    ];
});