<?php

namespace App\Contracts\Repositories;

use App\Models\Card;

interface CardRepository
{
    public function findByCardNumber(string $cardNumber): Card;

    public function decreaseBalance(Card $card, float$amount): Card;

    public function increaseBalance(Card $card, float $amount): Card;
}
