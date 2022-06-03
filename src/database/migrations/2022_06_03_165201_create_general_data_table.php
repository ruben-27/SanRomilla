<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_data', function (Blueprint $table) {
            $table->integer('max_people')->unsigned();
            $table->string('ong', 80);
            $table->string('ong_message', 1000);
            $table->dateTime('start_datetime');
            $table->decimal('shirt_price', 4, 2);
            $table->date('start_date_inscription');
            $table->date('end_date_inscription');
            $table->decimal('shirt_benefit', 4, 2);
            $table->boolean('active');
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
        Schema::dropIfExists('general_data');
    }
}
