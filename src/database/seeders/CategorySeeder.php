<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Babyrunners',
                'min_age' => null,
                'max_age' => 7,
                'distance' => 330,
                'start_time' => '11:00:00',
                'price' => 4,
                'status' => 'n',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            [
                'name' => 'Benjamines',
                'min_age' => 8,
                'max_age' => 9,
                'distance' => 560,
                'start_time' => '11:10:00',
                'price' => 4.20,
                'status' => 'n',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            [
                'name' => 'Alevines',
                'min_age' => 10,
                'max_age' => 11,
                'distance' => 850,
                'start_time' => '11:20:00',
                'price' => 4.50,
                'status' => 'n',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            [
                'name' => 'Infantiles',
                'min_age' => 12,
                'max_age' => 13,
                'distance' => 1000,
                'start_time' => '11:30:00',
                'price' => 4.70,
                'status' => 'n',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            [
                'name' => 'Cadetes',
                'min_age' => 14,
                'max_age' => 15,
                'distance' => 1609,
                'start_time' => '11:45:00',
                'price' => 5,
                'status' => 'n',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            [
                'name' => 'Juveniles',
                'min_age' => 16,
                'max_age' => 17,
                'distance' => 1609,
                'start_time' => '12:00:00',
                'price' => 5.50,
                'status' => 'n',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            [
                'name' => 'Absoluta',
                'min_age' => 18,
                'max_age' => null,
                'distance' => 1609,
                'start_time' => '12:15:00',
                'price' => 6,
                'status' => 'n',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]
        ]);
    }
}
