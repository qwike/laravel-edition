<?php

namespace App\Http\Controllers;

use App\Models\Excursion;
use Illuminate\Http\Request;

class ExcursionController extends Controller
{
    public function excursions()
    {
        $excursions = Excursion::query()->get();

        return view('excursions', [
            'excursions' => $excursions,
        ]);
    }
}
