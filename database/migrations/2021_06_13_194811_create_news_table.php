<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            // Уникальный номер
            $table->string('guid')->unique();
            // Название
            $table->string('title');
            // Ссылка
            $table->string('link');
            // Краткое описание
            $table->text('description');
            // Дата и время публикации
            $table->dateTimeTz('pubdate');
            // Автор (если указан)
            $table->string('author')->nullable();
            // Изображение (если есть)
            // relation with Image model
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
        Schema::dropIfExists('news');
    }
}
