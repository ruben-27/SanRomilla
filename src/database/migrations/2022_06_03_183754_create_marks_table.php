<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->integerIncrements('id')->unsigned();
            $table->string('name', 100);
            $table->string('last_name', 200);
            $table->tinyInteger('place')->unsigned();
            $table->smallInteger('dorsal')->unsigned()->unique();
            $table->time('time');
            $table->time('pace');
            $table->char('gender', 1);
            $table->tinyInteger('category_id')->unsigned()->nullable();
            $table->tinyInteger('year_id')->unsigned()->nullable();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('set null');
            $table->foreign('year_id')
                ->references('year')->on('years')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marks');
    }
}