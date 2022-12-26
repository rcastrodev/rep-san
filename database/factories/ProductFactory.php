<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => function () {
            return Category::inRandomOrder()->first()->id;
        },
        'name'                  => $faker->name,
        'description'           => 'Accesorio fundido',
        'possible_materials'    => 'Bronce',
        'picture_description'   => 'images/products/plano.png',
    ];
});
