<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => Str::random(5).' - '.$faker->word().' '.Str::random(30),
        'description' => $faker->sentence(20),
        'p_compra' => random_int(50,100),
        'p_menudeo' => random_int(50,100),
        'p_mayoreo' => random_int(50,100),
        'stock' => random_int(50,100),
        'stock_min' => random_int(5,15),
        'photo' => $faker->imageUrl(),
        'category_id' => random_int(1,30),
    ];
});
