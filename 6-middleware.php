<?php

/* Middleware - дополнительный проверки*/


/* Создание - php artisan make:middleware CheckAge 
 * Создаться в папке app/Http/Middleware
 */


/*
 * Здесь разрешаем доступ к маршруту только в том случае, 
 * если поставленный age превышает 200. В противном случае 
 * мы перенаправим пользователей обратно в home URI:
 */

namespace App\Http\Middleware;

use Closure;

class CheckAge
{

    public function handle($request, Closure $next)
    {
        if ($request->age <= 200) {
            return redirect('home');
        }
        return $next($request);
    }
}


/*Что бы добавить эту проверку, для конкретного роута
 * надо этот класс добавить в массив $routeMiddleware (app/Http/Kernel.php)
 */

protected $routeMiddleware = [
    'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
    'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
   
    
    'myMiddleWare' => \Illuminate\Auth\Middleware\CheckAge::class,
];

/* Вызов */

 Route::get('user/age{30}', function () {})->middleware('myMiddleWare'); 

 
 /* Дополниетльный параметры */
 
 
namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        if (! $request->user()->hasRole($role)) {
            // Redirect...
        }

        return $next($request);
    }
}

Route::put('post/{id}', function ($id) {
    /*
     * Если пользователь редактор
     * то дать ему доступ
     */
})->middleware('role:editor');


/*
 * в request попадает post/{id},
 * в role попадает role:editor.
 * 
 * в next попадает то же post/{id}',
 * то есть если всё хорошо, то обновление сработает и
 * будет отработан метод, который сделан для put('post/{id}'
 * За это и отвечает next.
 */
