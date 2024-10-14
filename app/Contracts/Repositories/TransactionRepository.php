<?php

namespace App\Contracts\Repositories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Collection;

interface TransactionRepository
{
    public function createTransaction($fromCard, $toCard, $amount): Transaction;

    public function getTopUsersWithTransactions(): Collection;
}
