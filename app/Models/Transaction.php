<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['from_card_id', 'to_card_id', 'amount'];

    /**
     * @return BelongsTo
     */
    public function fromCard(): BelongsTo
    {
        return $this->belongsTo(Card::class, 'from_card_id');
    }

    /**
     * @return BelongsTo
     */
    public function toCard(): BelongsTo
    {
        return $this->belongsTo(Card::class, 'to_card_id');
    }
}
