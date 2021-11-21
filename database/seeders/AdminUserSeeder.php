<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Phil',
            'email' => 'philippe@gaiia.fr',
            'role_id' => 1,
            'email_verified_at' => now(),
            'password' => bcrypt('savonnier'),
            'role_id' => 1,
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Franck',
            'email' => 'contact@gaiia.fr',
            'role_id' => 1,
            'email_verified_at' => now(),
            'password' => bcrypt('savonnier'),
            'role_id' => 1,
            'remember_token' => Str::random(10),
        ]);
    }
}
