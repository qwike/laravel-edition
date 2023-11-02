<?php

namespace App\Repositories;

use App\Models\Excursion;
use Illuminate\Database\Eloquent\Collection;

class ExcursionRepository
{
    public function getMainExcursions(): Collection
    {
        return Excursion::query()->limit(5)->get();
    }
}
