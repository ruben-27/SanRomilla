<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('years')->insert([
            [
                'year' => '2020',
                'ong' => 'entreculturas',
                'ong_message' => 'Diviértete!!',
                'amount_raised' => 21236.38,
                'active' => 0,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            [
                'year' => '2021',
                'ong' => 'entreculturas',
                'ong_message' => 'Quiérete!!',
                'amount_raised' => 36714.59,
                'active' => 0,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            [
                'year' => '2022',
                'ong' => 'entreculturas',
                'ong_message' => 'Atrévete!!',
                'amount_raised' => 0,
                'active' => 1,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]
        ]);
    }
}
