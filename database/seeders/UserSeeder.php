<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
            'id' => 1,
            'name' => "Mohamed Admin",
            'email' => "admin@email.com",
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
        ]);
    }
}
