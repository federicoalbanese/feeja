<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Card extends Model
{
    use HasFactory;

    protected $fillable = ['account_id', 'card_number', 'balance'];

    /**
     * @return BelongsTo
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    /**
     * @return HasMany
     */
    public function sentTransactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'from_card_id');
    }

    /**
     * @return HasMany
     */
    public function receivedTransactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'to_card_id');
    }
}
