<?php

namespace Modules\Auth\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrderMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct()
    {
    }

    public function build()
    {
        return $this
            ->markdown('Auth::mails.new-order-mail')
            ->subject('Новый заказ! | '.config('app.name'));
    }
}
