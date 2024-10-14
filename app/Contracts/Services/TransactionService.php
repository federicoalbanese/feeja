<?php

namespace App\Contracts\Services;

use App\Exceptions\InsufficientFundsException;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Collection;

interface TransactionService
{
    /**
     * @throws InsufficientFundsException
     */
    public function transfer(array $data): Transaction;

    public function getTopUsersWithTransactions(): Collection;
}
