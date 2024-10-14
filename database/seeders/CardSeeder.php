<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Card;

class CardSeeder extends Seeder
{
    public function run()
    {
        Card::create([
            'account_id' => 1,
            'card_number' => '6273811234567890',
            'balance' => 50000000,
        ]);

        Card::create([
            'account_id' => 2,
            'card_number' => '5022291234567890',
            'balance' => 10000000,
        ]);

        Card::create([
            'account_id' => 3,
            'card_number' => '5057851234567890',
            'balance' => 25000000,
        ]);
    }
}
