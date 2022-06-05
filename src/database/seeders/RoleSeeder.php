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
                'public' => 'Imágenes',
                'description' => 'Can create & delete images',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            [
                'name' => 'ROLE_COLABORATORS',
                'public' => 'Colaboradores',
                'description' => 'Can create, update & delete colaborators',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            [
                'name' => 'ROLE_INSCRIPTIONS',
                'public' => 'Inscripciones',
                'description' => 'Can create, update & delete inscriptions',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            [
                'name' => 'ROLE_MARKS',
                'public' => 'Marcas',
                'description' => 'Can create, update & delete marks',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            [
                'name' => 'ROLE_CATEGORIES',
                'public' => 'Categorías',
                'description' => 'Can create, update & delete categories',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            [
                'name' => 'ROLE_SPONSORS',
                'public' => 'Patrocinadores',
                'description' => 'Can create, update & delete sponsors',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            [
                'name' => 'ROLE_DONATIONS',
                'public' => 'Donaciones',
                'description' => 'Can create donatios',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            [
                'name' => 'ROLE_YEARS',
                'public' => 'Años',
                'description' => 'Can create & update years',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]
        ]);
    }
}
