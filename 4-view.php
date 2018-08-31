<?php

/* view - подключает шаблон*/


/*
 * Первый аргумен, это название шаблона,
 * второй  - массив данных
 */
 Route::get('/', function () { 
     return view('greeting', ['name' => 'James']); 
 }); 
