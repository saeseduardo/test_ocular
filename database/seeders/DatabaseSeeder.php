<?php

namespace Database\Seeders;

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
        \App\Models\User::factory()->create([
            'name' => 'Administrador',
            'user_name' => 'adminsystem',
            'email' => env('USER_ADMIN_EMAIL'),
            'email_verified_at' => now(),
            'password' => bcrypt(env('USER_ADMIN_PASSWORD')),
        ]);
    }
}
