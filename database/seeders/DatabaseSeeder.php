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

        $role = \App\Models\Role::create([
            'name' => 'admin',
        ]);

        $user = \App\Models\User::factory()->create([
            'name' => 'Administrador',
            'user_name' => env('USER_ADMIN_USER'),
            'email' => env('USER_ADMIN_EMAIL'),
            'email_verified_at' => now(),
            'role_id' => $role->id,
            'password' => bcrypt(env('USER_ADMIN_PASSWORD')),
        ]);

        $role = \App\Models\Role::create([
            'name' => 'user',
        ]);

    }
}
