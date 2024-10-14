<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserTransactionCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_name' => $this->resource->fromCard->account->user->name,
            'total_transactions' => $this->resource->transactions_count,
            'last_10_transactions' => TransactionResource::collection($this->resource->fromCard->sentTransactions->take(10)),
        ];
    }
}
