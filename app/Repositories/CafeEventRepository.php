<?php


namespace App\Repositories;


use App\Models\CafeEvent;
use Illuminate\Database\Eloquent\Collection;

class CafeEventRepository
{
    public function getMainCafeEvents(): Collection
    {
        return CafeEvent::query()->orderBy('created_at', 'DESC')->limit(3)->get();
    }

    public function getCafeEvents(): Collection
    {
        return CafeEvent::query()->get();
    }
}
