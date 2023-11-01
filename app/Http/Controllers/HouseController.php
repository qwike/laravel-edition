<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function houses()
    {
        $houses = House::query()->orderBy('name', 'DESC')->get();

        return view('houses', [
            'houses' => $houses,
        ]);
    }
}
