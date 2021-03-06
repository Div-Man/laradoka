<?php


/*
 *Одна модель данных соответствует лишь одной таблице.
 * 
*Модель данных называется в единственном числе, в 
 * ВерхнейВерблюжейНотации: Category, ShopCategory
 * 
*Таблица данных называется во множественном числе в 
 * нижней_змеиной_нотации: categories, shop_categories
 * 
*В отношениях типа "один ко многим/одному", Название 
 * полей, являющихся внешними ключами, ссылающимися 
 * на определитель во внешней таблице, пишутся в нижней_змеиной_нотации, 
 * единственном числе по имени вызывающего 
 * метода и постфиксом _id: categоry_id, product_id.
 * 
*Пивотные (стержневые) таблицы, выражающие отношение "Многие ко многим", 
 * называются в единственном числе, нижней змеиной нотации по именам 
 * связанных моедлей, в алфавитном порядке: role_user, но не user_role, .
 * 
*В отношениях типа "многие ко многим", внешние ключи называютсяв 
 * единственном числе, нижней змеиной нотации, 
 * по именам моделей и постфиксом _id.
 * 
*Таблица данных должна содержать поля:
*id(int, unsigned, auto-increment)
*created_at(timestamp) опционально, при использовании таймштампов
*updated_at(timestamp) опционально, при использовании таймштампов
*deleted_at(timestamp) опционально, при использовании трейта "мягкого удаления"
 */



/*
 * Один к одному
 */


/*
 * Вывести телефон у кажого пользователя
 */

class User extends Model
{
    public function phone()
    {
        /*
         * будет брать id у таблице users
         * и сравнивать с user_id в таблице phones
         */
        return $this->hasOne('App\Phone');
    }
}

/*
 * Динамические свойства позволяют вам обращаться к 
 * методам отношений, как если бы они были свойствами, 
 * определенными в модели:
 */

$phone = User::find(1)->phone;


/* Определение обратной связи */

class Phone extends Model
{
    public function user()
    {
         /*
         * будет брать user_id в таблице phones
         * и сравнивать с id в таблице users
         */
        return $this->belongsTo('App\User');
    }
}


///////////////////////////////////////

/* Один ко многим */

/* почти тоже самое, что и один к одному
 * только вместо hasOne используется hasMany
 */


/* Выводим комменты к определённому посту*/

class Post extends Model
{
    /**
     * Get the comments for the blog post.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}

$comments = App\Post::find(1)->comments; 

foreach ($comments as $comment) {  
    
}


/* обратная связь */

class Comment extends Model
{
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}

/////////////////////////////////////////////

/* Многие ко многим */

/* Для этого отношения обязательно 
 * нужна промежуточная таблица (пивотная)
 * и для этой таблицы модель не нужна
 */


/*
 * метод belongsToMany, обязательно обратится к трём таблицам
 * 
 * Например, есть таблицы students, groups и group_student (пивотная).
 * И этот метод будет искать классы group и student и когда найдёт, 
 * то потом будет искать таблицы в базе с таким же название и 
 * автоматически преобразует их во множественное число
 * 
 * В пивотоной таблице будут столбцы student_id	group_id
 */

class Student extends Eloquent{
    
    public function groups()
    {
        return $this->belongsToMany('Group');
    }
}

class Group extends Eloquent{
    
    public function students()
    {
        return $this->belongsToMany('Student');
    }
}
