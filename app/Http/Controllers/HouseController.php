<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Repositories\HouseRepository;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function __construct(protected HouseRepository $houseRepository)
    {
    }

    public function houses()
    {
        $houses = $this->houseRepository->getHouses();

        return view('houses', [
            'houses' => $houses,
        ]);
    }
}
