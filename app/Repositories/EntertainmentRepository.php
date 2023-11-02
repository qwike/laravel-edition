<?php


namespace App\Repositories;


use App\Models\Entertainment;
use Illuminate\Database\Eloquent\Collection;

class EntertainmentRepository
{
    public function getEntertainments(): Collection
    {
        return Entertainment::query()->orderBy('created_at', 'DESC')->get();
    }
}
