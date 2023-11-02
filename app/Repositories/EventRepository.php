<?php

namespace App\Repositories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;

class EventRepository
{
    public function getMainEvents(): Collection
    {
        return Event::query()->orderBy('created_at', 'DESC')->limit(2)->get();
    }

    public function getEvents(): Collection
    {
        return Event::query()->orderBy('created_at', 'DESC')->get();
    }
}
