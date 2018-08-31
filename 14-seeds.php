<?php

/*
 * Для того, что бы быстро заполнить таблицу, 
 * с небольшим количеством полей (например категории)
 * можно использовать seeder
 */

/* php artisan make:seeder CategoriesTableSeeder */
    


use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
         Category::insert([
            ['name' => 'лыжи'],
            ['name' => 'php'],
            ['name' => 'природа'],
            ['name' => 'футбол'],
            ['name' => 'музыка'],
            ['name' => 'город'],
         ] 
       );
        
    }
}

/*
 * и потом в DatabaseSeeder
 * сделать вызов $this->call(CategoriesTableSeeder::class);
 * и запустить в консоле php artisan db:seed
 */

/*
 * Это очень сильно сбережёт время на заполение сайта
 * если дадут огромный список того, чего надо занести в базу
 */
