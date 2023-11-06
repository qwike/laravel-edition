<?php

namespace App\Repositories;

use App\Models\House;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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

    public function getHouse($id): Model
    {
        return House::query()->findOrFail($id);
    }
}
