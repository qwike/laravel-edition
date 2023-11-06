<?php

namespace App\Http\Controllers;

use App\Repositories\HouseRepository;
use Illuminate\View\View;

class HouseController extends Controller
{
    public function __construct(protected HouseRepository $houseRepository)
    {
    }

    public function houses(): View
    {
        $houses = $this->houseRepository->getHouses();

        return view('houses', [
            'houses' => $houses,
        ]);
    }

    public function show($id): View
    {
        $house = $this->houseRepository->getHouse($id);

        return view('house', [
            'house' => $house,
        ]);
    }
}
