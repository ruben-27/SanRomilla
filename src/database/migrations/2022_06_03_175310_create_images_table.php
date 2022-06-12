<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->tinyIncrements('id')->unsigned();
            $table->string('file_name', 200);
            $table->tinyInteger('category_id')->unsigned()->nullable();
            $table->smallInteger('year_id')->unsigned()->nullable();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('set null');
            $table->foreign('year_id')
                ->references('id')->on('years')
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
        Schema::dropIfExists('images');
    }
}
