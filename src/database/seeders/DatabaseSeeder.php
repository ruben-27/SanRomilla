<?php

namespace Database\Seeders;

use App\Models\Donation;
use App\Models\Role;
use App\Models\User;
use App\Models\Sponsor;
use App\Models\Inscription;
use App\Models\Mark;
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
        // Seeders
        $this->call([
            RoleSeeder::class,
            GeneralDataSeeder::class,
            YearSeeder::class,
            CategorySeeder::class
        ]);

        // Factories
        User::Factory(10)->create();
        Donation::Factory(20)->create();
        Sponsor::Factory(5)->create();
        Inscription::Factory(100)->create();
        Mark::Factory(100)->create();


        $roles = Role::all();
        User::all()->each( function ($user) use ($roles) {
            $user->roles()->attach(
                $roles->random(rand(1, count($roles)))->pluck('id')->toArray()
            );
        });

    }
}
