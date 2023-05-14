<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->name();
        'tel' => $faker->phoneNumber();
        'mail' => $faker->email;
        'date' => $faker->date($format = 'Y-m-d', $min = 'now', $max = ('2025-12-31'));
        'time' => $faker->
        'ppl' => $faker->
        'course_id' => $faker->
        'tbl_id' => $faker->
        'comment' => $faker->
        'memo' => $faker->
        'created_at' => $faker->
        'updated_at' => $faker
    ];
});
