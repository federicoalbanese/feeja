<?php

namespace App\Mail;

use App\Models\Card;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BalanceChanged extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly Card $card,
        public readonly string $action,
        public readonly float $amount
    )
    {
    }

    public function build()
    {
        return $this->subject('Balance Change Notification')
            ->view(sprintf('emails.%s.balance_changed', config('app.locale')));
    }
}
