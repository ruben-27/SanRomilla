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
        DB::table('roles')->insert([
            [
                'name' => 'ROLE_IMAGES',
                'description' => 'Can upload and delete images'
            ],
            [
                'name' => 'ROLE_CREATE_USERS',
                'description' => 'Can create users'
            ],
            [
                'name' => 'ROLE_UPDATE_USERS',
                'description' => 'Can update users'
            ],
            [
                'name' => 'ROLE_DELETE_USERS',
                'description' => 'Can delete users'
            ]
        ]);
    }
}
