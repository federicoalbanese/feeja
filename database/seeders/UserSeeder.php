<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone_number' => '09123456789',
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'phone_number' => '09129876543',
        ]);

        User::create([
            'name' => 'Ali Reza',
            'email' => 'ali@example.com',
            'phone_number' => '09121112222',
        ]);
    }
}
