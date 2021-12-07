<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'store_id' => 1,
        'bar_code' => Str::random(6),
        'qty' => rand(0, 99),
        'price' => rand(10, 50),
    ];
});
