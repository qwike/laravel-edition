<?php

namespace App\Factory;

use App\Interfaces\TelegramDriverInterface;

class TelegramBotFactory
{
    public static function make(): TelegramDriverInterface
    {
        return app(config('telegraph.webhook_handler'));
    }
}
