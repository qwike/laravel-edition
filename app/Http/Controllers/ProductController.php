<?php

namespace App\Http\Controllers;

use App\Repositories\AddressRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected ProductRepository $productRepository, protected AddressRepository $addressRepository)
    {
    }


    public function products()
    {
//      $products = Product::query()->orderBy('name', 'DESC')->get();
//        $addresses = Address::query()->orderBy('name', 'DESC')->get();

        $products = $this->productRepository->getProducts();
        $addresses= $this->addressRepository->getAddress();
        return view('products', [
            'products' => $products,
            'addresses' => $addresses,
        ]);
    }
}
