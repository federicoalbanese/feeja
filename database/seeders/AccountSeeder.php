<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    public function run()
    {
        Account::create([
            'user_id' => 1,  // John Doe
            'account_number' => '1234567890123456',
        ]);

        Account::create([
            'user_id' => 2,  // Jane Smith
            'account_number' => '2345678901234567',
        ]);

        Account::create([
            'user_id' => 3,  // Ali Reza
            'account_number' => '3456789012345678',
        ]);
    }
}
