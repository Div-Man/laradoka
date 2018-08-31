<?php

/*
 * Что бы разгрузить логику в route
 * для этого можно использовать контроллер
 */

/*
 * Если у контроллера, только 1 метод
 * то этот метод можно назвать __invoke 
 */

class ShowProfile extends Controller
{
    public function __invoke($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }
}

//Теперь метод указывать не нужно
Route::get('user/{id}', 'ShowProfile');


/*
 * Что бы не создавать такой контроллер вручную
 * можно использовать композер
 *  php artisan make:controller ShowProfile --invokable 
 */


/////////////////////////////////////////////////

/*
 * Можно указывать дополнительные проверки
 */

 Route::get('profile', ' UserController@show ')->middleware('auth'); 
 
 /** А можно вызвать и в конструкторе*/
 
 class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('log')->only('index');

        $this->middleware('subscribed')->except('store');
    }
}


/////////////////////////////

/*
 * Что бы быстро сделать типичный контроллер
 * для этого можно использовать композер с командой
 *  php artisan make:controller PhotoController --resource 
 * он создаст типичный CRUD
 */

/////////////////////////////////////////////


/*
 * Можно расширить контроллер
 * подключив в него любой класс
 * в конструкторе
 */

class UserController2 extends Controller
{
    /**
     * The user repository instance.
     */
    protected $users;

    /**
     * Create a new controller instance.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }
}
