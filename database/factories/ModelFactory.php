<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Thread::class, function (Faker $faker) {
    return [
    	'title' => $faker->sentence,
    	'body' => $faker->paragraph,
    	'user_id' => function() {
    		return factory('App\User')->create()->id;
    	},
    ];
});

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
    	'user_id' => function() {
    		return factory('App\User')->create()->id;
    	},
    	'thread_id' => function() {
    		return factory('App\Thread')->create()->id;
    	},
    	'parent_id' => null,
    	'comment' => $faker->sentence,
    ];
});


