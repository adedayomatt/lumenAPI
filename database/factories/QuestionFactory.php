<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Question::class, function (Faker $faker) {
    return [
        'question_no' => $faker->numberBetween(1,100),
        'answer' => $faker->randomElement($array = array ('a','b','c', 'd')),
        'subject_id' => $faker->numberBetween(1,4),
        'paper_id' =>  $faker->numberBetween(1,2),
    ];
});
