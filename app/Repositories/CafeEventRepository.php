<?php


namespace App\Repositories;


use App\Models\CafeEvent;
use Illuminate\Database\Eloquent\Collection;

class CafeEventRepository
{
    public function getMainCafeEvents(): Collection
    {
        return CafeEvent::query()->limit(1)->get();
    }

    public function getCafeEvents(): Collection
    {
        return CafeEvent::query()->get();
    }
}
