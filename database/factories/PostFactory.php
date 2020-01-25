<?php
use App\Post;
use App\User;

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class),
        'title'   => $faker->unique()->word,
        'body'    => $faker->sentence(),
    ];
});
