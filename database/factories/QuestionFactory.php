<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Question::class, function (Faker $faker) {
    $title = $faker ->sentence();
    return [
        //
        'title' => $title,
        'slug' => Str::slug($title),
        'body' => $faker->paragraph(),
        'user_id'=>$faker->randomDigit(1,20),
        'category_id'=> $faker->randomDigit(1,20),

        
    ];
});
