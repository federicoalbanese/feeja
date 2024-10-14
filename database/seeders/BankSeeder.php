<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bank;

class BankSeeder extends Seeder
{
    public function run()
    {
        $banks = [
            ['name' => 'Ansar Bank', 'prefix' => '627381'],
            ['name' => 'Pasargad Bank', 'prefix' => '502229'],
            ['name' => 'Iran Zamin Bank', 'prefix' => '505785'],
            ['name' => 'City Bank', 'prefix' => '502806'],
            ['name' => 'Parsian Bank', 'prefix' => '622106'],
            ['name' => 'Tosee Taavon Bank', 'prefix' => '502908'],
            ['name' => 'Parsian Bank', 'prefix' => '639194'],
        ];

        foreach ($banks as $bank) {
            Bank::create($bank);
        }
    }
}
