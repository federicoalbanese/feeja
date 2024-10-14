<?php

namespace App\Services;

use App\Contracts\Repositories\CardRepository;
use App\Contracts\Repositories\TransactionRepository;
use App\Enums\TransactionEnum;
use App\Exceptions\InsufficientFundsException;
use App\Mail\BalanceChanged;
use App\Models\Card;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

readonly class TransactionService implements \App\Contracts\Services\TransactionService
{

    public function __construct(private TransactionRepository $transactionRepository,private CardRepository $cardRepository)
    {
    }


    /**
     * @throws InsufficientFundsException
     */
    public function transfer(array $data): Transaction
    {
        $fromCard = $this->cardRepository->findByCardNumber($data['from_card']);
        $toCard = $this->cardRepository->findByCardNumber($data['to_card']);
        $amount = $data['amount'];

        if ($fromCard->balance < $amount) {
            throw new InsufficientFundsException();
        }

        $transaction = DB::transaction(function () use ($fromCard, $toCard, $amount) {
            $this->cardRepository->decreaseBalance($fromCard, $amount);

            $this->cardRepository->increaseBalance($toCard, $amount);

            return $this->transactionRepository->createTransaction($fromCard, $toCard, $amount);

        });

        $this->sendBalanceChangeEmail($fromCard, TransactionEnum::Decreased, $amount);
        $this->sendBalanceChangeEmail($toCard, TransactionEnum::Increased, $amount);

        return $transaction;
    }

    private function sendBalanceChangeEmail(Card $card, TransactionEnum $type, float $amount): void
    {
        $user = $card->account->user;

        Mail::to($user->email)->queue(new BalanceChanged($card, $type->value, $amount));
    }

    public function getTopUsersWithTransactions(): Collection
    {
        return $this->transactionRepository->getTopUsersWithTransactions();
    }
}
