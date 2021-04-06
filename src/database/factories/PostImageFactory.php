<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Eloquents\PostImage;
use Faker\Generator as Faker;

$factory->define(PostImage::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\Eloquents\User::class)->create()->id,
        'category' => 'クラフト',
        'title' => $faker->text,
        'descriptionA' => $faker->text,
        'descriptionB' => $faker->text,
        'descriptionC' => $faker->text,
        'descriptionD' => $faker->text,
        'image_path' => 'https://res.cloudinary.com/dk2uwbtnl/image/upload/v1616067100/ppr2bzejnquiklqkdgig.png',
        'public_id' => 'https://res.cloudinary.com/dk2uwbtnl/image/upload/v1616067100/ppr2bzejnquiklqkdgig.png',
        'web_page' => null,
        'materialA' => $faker->name,
        'materialB' => $faker->name,
        'materialC' => $faker->name,
        'amountA' => $faker->name,
        'amountB' => $faker->name,
        'amountC' => $faker->name,
        'goodsA' => $faker->name,
        'goodsB' => $faker->name,
        'goodsC' => $faker->name,
    ];
});
