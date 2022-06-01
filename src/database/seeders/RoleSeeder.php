<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->store([
            [
                'name' => 'ROLE_IMAGES',
                'description' => 'Can create & delete images'
            ],
            [
                'name' => 'ROLE_COLABORATORS',
                'description' => 'Can create, update & delete colaborators'
            ],
            [
                'name' => 'ROLE_INSCRIPTIONS',
                'description' => 'Can create, update & delete inscriptions'
            ],
            [
                'name' => 'ROLE_MARKS',
                'description' => 'Can create, update & delete marks'
            ],
            [
                'name' => 'ROLE_CATEGORIES',
                'description' => 'Can create, update & delete categories'
            ],
            [
                'name' => 'ROLE_SPONSORS',
                'description' => 'Can create, update & delete sponsors'
            ],
            [
                'name' => 'ROLE_DONATIONS',
                'description' => 'Can create donatios'
            ]
        ]);
    }
}
