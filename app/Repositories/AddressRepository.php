<?php

namespace App\Repositories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Collection;

class AddressRepository
{
    public function getAddress(): Collection
    {
        return Address::query()->orderBy('created_at', 'DESC')->get();
    }
}
