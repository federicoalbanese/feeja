<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\TransactionRepository;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TransactionEloquent implements TransactionRepository
{
    public function createTransaction($fromCard, $toCard, $amount): Transaction
    {
        return Transaction::create([
            'from_card_id' => $fromCard->id,
            'to_card_id' => $toCard->id,
            'amount' => $amount,
        ]);
    }

    public function getTopUsersWithTransactions(): Collection
    {
        $recentTime = Carbon::now()->subMinutes(10);

        return Transaction::query()
            ->where('created_at', '>=', $recentTime)
            ->select(['from_card_id', DB::raw('count(*) as transactions_count')])
            ->groupBy('from_card_id')
            ->orderByDesc('transactions_count')
            ->take(3)
            ->with(['fromCard.account.user',])
            ->get();
    }
}
