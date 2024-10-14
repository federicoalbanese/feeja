<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        Transaction::create([
            'from_card_id' => 1,
            'to_card_id' => 2,
            'amount' => 200000,
        ]);

        Transaction::create([
            'from_card_id' => 2,
            'to_card_id' => 3,
            'amount' => 1500000,
        ]);
        Transaction::create([
            'from_card_id' => 2,
            'to_card_id' => 1,
            'amount' => 2300000,
        ]);
        Transaction::create([
            'from_card_id' => 1,
            'to_card_id' => 3,
            'amount' => 1200000,
        ]);
        Transaction::create([
            'from_card_id' => 3,
            'to_card_id' => 1,
            'amount' => 1500000,
        ]);
        Transaction::create([
            'from_card_id' => 3,
            'to_card_id' => 2,
            'amount' => 2000000,
        ]);
        Transaction::create([
            'from_card_id' => 2,
            'to_card_id' => 3,
            'amount' => 5400000,
        ]);
    }
}
