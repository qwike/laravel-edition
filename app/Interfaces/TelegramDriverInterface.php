<?php

namespace App\Interfaces;

use DefStudio\Telegraph\Models\TelegraphBot;
use Illuminate\Http\Request;

interface TelegramDriverInterface
{
    public function handle(Request $request, TelegraphBot $bot): void;
}
