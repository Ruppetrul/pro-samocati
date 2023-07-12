<?php

namespace Modules\Auth\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Modules\Auth\Mail\NewOrderMail;
use Modules\Auth\Mail\VerifyCodeMail;
use Modules\Auth\Services\VerifyService;

class NewOrderNotification extends Notification
{
    use Queueable;

    public function __construct()
    {
        //
    }

    /**
     * Send via (email).
     *
     * @param $notifiable
     *
     * @return string[]
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Send to mail.
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function toMail($notifiable)
    {
        return (new NewOrderMail())->to($notifiable->email);
    }

    /**
     * Save into atabase.
     *
     * @param $notifiable
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
