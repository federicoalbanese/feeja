<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'from_card' => [
                'card_number' => $this->fromCard->card_number,
                'account_holder' => $this->fromCard->account->user->name,
            ],
            'to_card' => [
                'card_number' => $this->toCard->card_number,
                'account_holder' => $this->toCard->account->user->name,
            ],
            'amount' => $this->amount,
            'transaction_date' => $this->created_at->toDateTimeString(),
        ];

    }
}
