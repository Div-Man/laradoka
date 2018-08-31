<?php

/* faker - модель для быстрого заполенеия БД информацией*/

use Faker\Generator as Faker;


/*Здесь указывается таблица, в которую добавятся данные*/

$factory->define(App\Post::class, function ($faker) {
    return [
        'title' => $faker->title,
        'content' => $faker->paragraph,
        'user_id' => function () {
        
            /*Здесь указывается таблица,из которой возьмутся данные*/
            return factory(App\User::class, 7 /*количество*/)->create()->id;
        }
    ];
});
