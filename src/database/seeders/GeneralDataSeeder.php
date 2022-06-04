<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class GeneralDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('general_data')->insert([
            'max_people' => '5000',
            'start_datetime' => \Carbon\Carbon::createFromDate(2022,07,22)->toDateTimeString(),
            'shirt_price' => 5.99,
            'start_date_inscription' =>\Carbon\Carbon::createFromDate(2022,01,15),
            'end_date_inscription' =>\Carbon\Carbon::createFromDate(2022,07,21),
            'shirt_benefit' => 4.56,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);
    }
}
