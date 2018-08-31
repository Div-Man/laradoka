<?php

/* Migrations - класс для работы с базой*/

/*Создание php artisan make:migration create_users_table */


/*
 * Класс миграции содержит два метода: up и down . 
 * Метод up используется для добавления новых таблиц, 
 * столбцов или индексов в вашу базу данных, тогда как 
 * метод down должен отменить операции, выполняемые методом up
 */

 public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('airline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('flights');
    }
    
    
    /* Запуск миграции  - php artisan migrate */
    
    
    
    ///////////////////////////////////////////
    
    
    /*
     * Чтобы отменить последнюю операцию миграции, 
     * вы можете использовать команду rollback . 
     * Эта команда откатывает последнюю «пакетную» миграции, 
     * которая может включать в себя несколько файлов миграции:
     */
    
    php artisan migrate:rollback 
        
    //////////////////////////////
        
      /* откатить несколько миграций */  
        
     php artisan migrate:rollback --step=5
            
    //////////////////////////////////
            
    /* Откатить все миграции */
    
    php artisan migrate:reset 
        
        
        ///////////////////////////////////////
        
        переименование таблицы
        
        Schema::rename($from, $to);
    
    /////////////////////////////////
    
    Чтобы удалить существующую таблицу, 
    вы можете использовать методы drop или dropIfExists
    
     Schema::drop('users'); Schema::dropIfExists('users'); 
     
     
     //////////////////////////////////////////////////////
     
     Для добавление столбцов, используется метод table
     вместо create 
     
     Schema::create('users', function (Blueprint $table) {
    $table->increments('id');
});



команда	Описание
$table->bigIncrements('id');	Автоматически увеличивающий эквивалентный столбец UNSIGNED BIGINT (первичный ключ).
$table->bigInteger('votes');	BIGINT эквивалентный столбец.
$table->binary('data');	BLOB эквивалент.
$table->boolean('confirmed');	Эквивалентная колонка BOOLEAN.
$table->char('name', 100);	CHAR эквивалентная колонка с дополнительной длиной.
$table->date('created_at');	DATE эквивалентная колонка.
$table->dateTime('created_at');	DATETIME эквивалентный столбец.
$table->dateTimeTz('created_at');	DATETIME (с часовым поясом) эквивалентный столбец.
$table->decimal('amount', 8, 2);	DECIMAL эквивалентный столбец с точностью (общее число) и масштаб (десятичные цифры).
$table->double('amount', 8, 2);	ДВОЙНОЙ эквивалентный столбец с точностью (всего цифр) и шкалой (десятичные цифры).
$table->enum('level', ['easy', 'hard']);	Эквивалентная колонка ENUM.
$table->float('amount', 8, 2);	Эквивалентный столбец FLOAT с точностью (итоговые цифры) и шкалой (десятичные цифры).
$table->geometry('positions');	Эквивалентная колонка GEOMETRY.
$table->geometryCollection('positions');	Эквивалентная колонка GEOMETRYCOLLECTION.
$table->increments('id');	Автоматически увеличивающий эквивалентный столбец UNSIGNED INTEGER (первичный ключ).
$table->integer('votes');	Эквивалентная колонка INTEGER.
$table->ipAddress('visitor');	Эквивалентный столбец IP-адреса.
$table->json('options');	Эквивалентная колонка JSON.
$table->jsonb('options');	JSONB эквивалентный столбец.
$table->lineString('positions');	Эквивалент столбца LINESTRING.
$table->longText('description');	Эквивалентная колонка LONGTEXT.
$table->macAddress('device');	Эквивалентный столбец MAC-адреса.
$table->mediumIncrements('id');	Автоматическое увеличение эквивалентного столбца UNSIGNED MEDIUMINT (первичный ключ).
$table->mediumInteger('votes');	Эквивалентная колонка MEDIUMINT.
$table->mediumText('description');	Столбец эквивалентен MEDIUMTEXT.
$table->morphs('taggable');	Добавляет taggable_id UNSIGNED BIGINT и  taggable_type эквивалентные столбцы VARCHAR.
$table->multiLineString('positions');	MULTILINESTRING эквивалентный столбец.
$table->multiPoint('positions');	Эквивалентная колонка MULTIPOINT.
$table->multiPolygon('positions');	Эквивалентный столбец MULTIPOLYGON.
$table->nullableMorphs('taggable');	Добавляет нулевые версии столбцов  morphs() .
$table->nullableTimestamps();	Псевдоним метода timestamps() .
$table->point('position');	Эквивалент столбца.
$table->polygon('positions');	Эквивалентная колонка POLYGON.
$table->rememberToken();	Добавляет эквивалентный столбец VARCHAR (100) с нулевым значением.
$table->smallIncrements('id');	Автоматическое увеличение эквивалентного столбца UNSIGNED SMALLINT (первичный ключ).
$table->smallInteger('votes');	Эквивалентный столбец SMALLINT.
$table->softDeletes();	Добавляет эквивалентный столбец TIMESTAMP, deleted_at помощью  deleted_at для мягких удалений.
$table->softDeletesTz();	Добавляет эквивалентный столбец с  deleted_at TIMESTAMP (с deleted_at ) для мягких удалений.
$table->string('name', 100);	Эквивалентный столбец VARCHAR с дополнительной длиной.
$table->text('description');	ТЕКСТ эквивалент.
$table->time('sunrise');	Эквивалентный столбец TIME.
$table->timeTz('sunrise');	TIME (с часовым поясом) эквивалентный столбец.
$table->timestamp('added_on');	Эквивалент столбца TIMESTAMP.
$table->timestampTz('added_on');	TIMESTAMP (с часовым поясом) эквивалентный столбец.
$table->timestamps();	Добавляет эквивалентные столбцы TIMESTAMP с updated_at nullable  created_at и updated_at .
$table->timestampsTz();	Добавляет эквивалентные столбцы с отметкой nullable created_at и updated_at TIMESTAMP (с updated_at поясом).
$table->tinyIncrements('id');	Автоматическое увеличение эквивалентного столбца UNINIGNED TINYINT (первичный ключ).
$table->tinyInteger('votes');	Эквивалентная колонка TINYINT.
$table->unsignedBigInteger('votes');	Эквивалентная колонка UNSIGNED BIGINT.
$table->unsignedDecimal('amount', 8, 2);	UNSIGNED DECIMAL эквивалентный столбец с точностью (общие цифры) и шкалой (десятичные цифры).
$table->unsignedInteger('votes');	Эквивалентная колонка UNSIGNED INTEGER.
$table->unsignedMediumInteger('votes');	UNSIGNED MEDIUMINT эквивалентная колонка.
$table->unsignedSmallInteger('votes');	UNSIGNED SMALLINT эквивалентный столбец.
$table->unsignedTinyInteger('votes');	UNSIGNED эквивалентный столбец TINYINT.
$table->uuid('id');	UUID эквивалентная колонка.
$table->year('birth_year');	ГОД эквивалент.
        
        
чтобы сделать столбец «nullable», вы можете использовать метод nullable :
    
Schema::table('users', function (Blueprint $table) {
    $table->string('email')->nullable();
});

//////////////////////////////////////////////

Модификаторы

Модификатор	Описание
->after('column')	Поместите столбец «после» другого столбца (MySQL)
->autoIncrement()	Установите столбцы INTEGER как автоматическое приращение (первичный ключ)
->charset('utf8')	Укажите набор символов для столбца (MySQL)
->collation('utf8_unicode_ci')	Укажите сортировку для столбца (MySQL / SQL Server)
->comment('my comment')	Добавить комментарий к столбцу (MySQL)
->default($value)	Укажите значение по умолчанию для столбца
->first()	Поместите столбец «первым» в таблицу (MySQL)
->nullable($value = true)	Позволяет (по умолчанию) значения NULL вставляться в столбец
->storedAs($expression)	Создайте сохраненный сгенерированный столбец (MySQL)
->unsigned()	Установите столбцы INTEGER как UNSIGNED (MySQL)
->useCurrent()	Установите столбцы TIMESTAMP для использования CURRENT_TIMESTAMP в качестве значения по умолчанию
->virtualAs($expression)	Создайте виртуальный сгенерированный столбец (MySQL)
        
//////////////////////////////////////////////////
        
Переименование столбцов
        
Прежде чем переименовывать столбец, обязательно добавьте 
зависимость doctrine/dbal к вашему файлу composer.json 
 
Schema::table('users', function (Blueprint $table) {
    $table->renameColumn('from', 'to');
});


////////////////////////////////////

Удаление столбцов

Чтобы удалить столбец, используйте метод dropColumn в dropColumn . 
Прежде чем удалять столбцы из базы данных SQLite, 
вам нужно будет добавить зависимость doctrine/dbal к 
вашему файлу composer.json и запустить команду composer 
update в вашем терминале для установки библиотеки:
    
Schema::table('users', function (Blueprint $table) {
    $table->dropColumn('votes');
});



////////////////////////////////////

Создание индексов

$table->string('email')->unique(); 

можно потом

$table->unique('email');



команда	Описание
$table->primary('id');	Добавляет первичный ключ.
$table->primary(['id', 'parent_id']);	Добавляет составные клавиши.
$table->unique('email');	Добавляет уникальный индекс.
$table->index('state');	Добавляет простой индекс.
$table->spatialIndex('location');	Добавляет пространственный индекс. (кроме SQLite)
        
