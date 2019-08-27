<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker, array $override) {
    return [
        'name' => $faker->word,
        'price' => $faker->randomNumber,
        'category_id' => isset($override['category_id']) ? $override['category_id'] : factory(App\Category::class)->create()->id
    ];
});
