<?php

/*
 * По умолчанию, имя таблицы будет взято
 * из названии модели, но это имя можно изменить
 * добавив свойство в самое начало
 */

protected $table = 'my_flights';


/*
 * По умолчанию Eloquent ожидает, что в ваших таблицах 
 * created_at updated_at столбцы created_at и updated_at . 
 * Если вы не хотите, чтобы эти столбцы автоматически 
 * управлялись Eloquent, установите для свойства $timestamps 
 * на вашей модели значение false :
 */

public $timestamps = false;

/////////////////////////////////////////////////

/*
 * Для того что бы использовать метод create
 * обязательно нужно заполнить массив fillable
 * это обязательный поля для заполнения
 */

protected $fillable = ['name'];

 $flight = App\Flight::create([
     'name' => 'Flight 10'
     ]); 
 
 
 /////////////////////////////////
 
 /*
  * Есть и другой массив $guarded
  * в этот массив нужно записать те поля
  * которые не будут обработаны
  * 
  * если его оставить пустым
  * то все поля будут добавлены
  */
 
 protected $guarded = ['price'];
 
 //////////////////////////////////////////
 
 /*
  * Другой способ сохранения, осуществляется
  * с помощью метода save
  */
 
 /*
  * Тут уже будет добавление в то поле
  * которое указано ($flight->name)
  */

 
namespace App\Http\Controllers;

use App\Flight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlightController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request...

        $flight = new Flight;

        $flight->name = $request->name;

        $flight->save();
    }
}
