<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->integerIncrements('id')->unsigned();
            $table->string('name', 100);
            $table->string('last_name', 200);
            $table->char('dni', 9);
            $table->string('email', 200);
            $table->date('birthday');
            $table->char('gender', 1);
            $table->char('phone', 15)->nullable();
            $table->decimal('amount', 5, 2);
            $table->char('size', 3)->nullable();
            $table->tinyInteger('category_id')->unsigned()->nullable();
            $table->smallInteger('dorsal')->unsigned()->unique()->nullable();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('category_id')
                ->references('id')->on('categories')
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
        Schema::dropIfExists('inscriptions');
    }
}
