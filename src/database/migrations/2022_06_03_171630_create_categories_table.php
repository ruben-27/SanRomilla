<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->tinyIncrements('id')->unsigned();
            $table->string('name', 50);
            $table->tinyInteger('min_age')->unsigned();
            $table->tinyInteger('max_age')->unsigned();
            $table->decimal('KM', 5, 2);
            $table->time('start_time');
            $table->decimal('price', 4, 2);
            $table->char('status', 1);
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
        Schema::dropIfExists('categories');
    }
}
