<?php

use Carbon\Carbon;

$factory->define(\Tests\Stubs\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ];
});
