<?php

namespace Database\Seeders;

use App\Models\Donation;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // Factories
        User::Factory(10)->create();
        Donation::Factory(20)->create();

        // Seeders
        $this->call([
            RoleSeeder::class
        ]);

        $roles = Role::all();
        User::all()->each( function ($user) use ($roles) {
            $user->roles()->attach(
                $roles->random(rand(1, count($roles)))->pluck('id')->toArray()
            );
        });

    }
}
