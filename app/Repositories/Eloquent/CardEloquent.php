<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\CardRepository;
use App\Models\Card;

class CardEloquent implements CardRepository
{
    public function findByCardNumber(string $cardNumber): Card
    {
        return Card::where('card_number', $cardNumber)->first();
    }

    public function decreaseBalance(Card $card, float$amount): Card
    {
        $card->balance -= $amount;
        $card->save();

        return $card->refresh();
    }

    public function increaseBalance(Card $card, float $amount): Card
    {
        $card->balance += $amount;
        $card->save();

        return $card->refresh();
    }
}
