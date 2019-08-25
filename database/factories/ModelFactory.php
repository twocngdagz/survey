<?php

use Carbon\Carbon;

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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Form::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Application Form'
    ];
});

$factory->state(App\Form::class, 'published', function ($faker) {
    return [
        'published_at' => Carbon::parse('-1 week')
    ];
});

$factory->state(App\Form::Class, 'unpublished', function ($faker) {
    return [
        'published_at' => null
    ];
});

$factory->define(App\Question::class, function ($faker) {
    return [

    ];
});
