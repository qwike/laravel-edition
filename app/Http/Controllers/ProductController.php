<?php

namespace App\Http\Controllers;

use App\Repositories\AddressRepository;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    public function __construct(
        protected ProductRepository $productRepository,
        protected AddressRepository $addressRepository)
    {
    }

    public function products()
    {
        $products = $this->productRepository->getProducts();
        $addresses= $this->addressRepository->getAddress();

        return view('products', [
            'products' => $products,
            'addresses' => $addresses,
        ]);
    }
}
