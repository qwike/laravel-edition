<?php

namespace App\Repositories;

use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Database\Eloquent\Collection;

class TelegramChatRepository
{
    public function getFirstById(int $id): ?TelegraphChat
    {
        return TelegraphChat::find($id);
    }
    public function getAll(): Collection
    {
        return TelegraphChat::all();
    }
}
