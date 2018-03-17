<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Thread::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => implode(' ', $faker->paragraphs),
        'user_id' => function() { // esta função irá criar uma thread e chama a factory de criar usuário, e cria o usuário automaticamente
        	return factory(App\User::class)->create()->id;
        }
    ];
});

$factory->define(App\Reply::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph,
        'user_id' => function() { // esta função irá criar uma thread e chama a factory de criar usuário, e cria o usuário automaticamente pegando o id
        	return factory(App\User::class)->create()->id;
        },
        'thread_id' => function() { // esta função irá criar uma replica e chama a factory de criar usuário, e cria o usuário automaticamente pegando o id da thread tbm
        	return factory(App\Thread::class)->create()->id;
        }
    ];
});
