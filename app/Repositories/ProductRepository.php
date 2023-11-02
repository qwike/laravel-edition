<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository
{
    public function getProducts(): Collection
    {
        return Product::query()->orderBy('created_at', 'DESC')->get();
    }
}
