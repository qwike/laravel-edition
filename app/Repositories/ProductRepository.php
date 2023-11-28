<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository
{
    public function getProducts(): Collection
    {
        return Product::query()->orderBy('name', 'ASC')->get();
    }
}
