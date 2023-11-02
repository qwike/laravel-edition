<?php

namespace App\Repositories;

use App\Models\House;
use Illuminate\Database\Eloquent\Collection;

class HouseRepository
{
    public function getMainHouses(): Collection
    {
        return House::query()->limit(3)->get();
    }

    public function getHouses(): Collection
    {
        return House::query()->orderBy('name', 'DESC')->get();
    }
}
