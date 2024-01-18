<?php

namespace App\Notifications;

use NotificationChannels\Telegram\TelegramMessage;
use Illuminate\Notifications\Notification;

class Telegram extends Notification
{
    public function via($notifiable): array
    {
        return ["telegram"];
    }

    public function toTelegram($notifiable)
    {
        return TelegramMessage::create()
            // Optional recipient user id.
            ->to($notifiable)
            // Markdown supported.
            ->content("Появилась новая заявка");

//            ->buttonWithCallback('Confirm', 'confirm_invoice ');
    }
}
