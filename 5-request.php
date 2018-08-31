<?php

/* Request - отправленные данные с формы */


/*
 * Что бы получить данные нужного поля
 * можно использовать метод input
 * у экземпляра Request
 */

public function store(Request $request)
{
    $name = $request->input('name');
    
    /* другой способ */
    
    $name = $request->name;
    
}


/* Получение все данных, кроме файлов */

$input = $request->all(); 

//////////////////////////////////////////////


/* Проверить, отправились ли данные нужного поля*/

if ($request->has('name')) { } 

if ($request->has(['name', 'email'])) { } 

///////////////////////////////////////////

/* Получение старого ввода */

 $username = $request->old('username'); 
 
 //////////////////////////////////////////////////////
 
 /* Получение загруженных файлов */
 
 /* Метод file возвращает экземпляр класса Illuminate\Http\UploadedFile */
 
 $file = $request->file('photo'); 
 
 /* аналогично */
 $file = $request->photo; 
 
 
 /* Получить расширение файла */
 
  $path = $request->photo->path(); 
  $extension = $request->photo->extension(); 
  
  
  /* Метод store сохраняет файл на диск*/
  
  
  /* сюда вернётся путь до файла*/
  $path = $request->photo->store('images');
  
