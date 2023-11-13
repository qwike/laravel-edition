<?php

namespace App\Repositories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository
{
    public function create(array $data): Order
    {
        return Order::query()->create($data);
    }
    public function orders(): Collection
    {
        return Order::query()->get();
    }
}
