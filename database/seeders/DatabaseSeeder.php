<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//! usually seeders trigers factories
//? it can go directly to the eloquent models


//! having isolated seeders have tow penifites
//? you can run them in isolation
//? you can have dedicated seeders that help you build you complex test.
//! keep it simple
//? but when it grows grow with it.



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'Omar',
            'last_name' => 'Naji Alhayek',
            'email' => 'test@example.com',
        ]);
        $this->call(JobSeeder::class);
    }//? php artisan migrate:fresh + php artisan db:seed =
     //? php artisan migrate:fresh --seed
    //! php artisan db:seed only for this file?
}
