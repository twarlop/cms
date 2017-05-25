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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Data\CoreField;
use App\Data\CoreTable;
use App\Data\CoreTableGroup;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(CoreTableGroup::class, function(Faker\Generator $faker){
    return [
        'group_name' => $faker->name
    ];
});

$factory->define(CoreTable::class, function(Faker\Generator $faker){

    $name = $faker->name;
    return [
        'table_name' => $name,
        'table_slug' => str_slug($name),
        'group_id' => rand(1, 3),
    ];
});

$factory->define(CoreField::class, function(Faker\Generator $faker){
    $name = $faker->name;
    return [
        'field_name' => $name,
        'field_slug' => str_slug($name),
        'table_id' => rand(1, 10),
        'field_type' => array_rand(['text', 'textarea', 'number', 'price', 'date', 'datetime', 'link'], 1),
        'field_settings' => '{}',
    ];
});