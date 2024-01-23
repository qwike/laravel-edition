<?php

namespace App\Repositories;

use App\Enums\StatusEnum;
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

    public function orderGetAllByStatus(StatusEnum $status): Collection
    {
        return Order::query()->with('orderable')->where('status', '=', $status)->get();
    }
    public function getFirstById(int $id): ?Order
    {
        return Order::query()->find($id);
    }

    public function update(int $id, array $data): bool
    {
        return Order::query()->where('id', '=', $id)->update($data);
    }
}
