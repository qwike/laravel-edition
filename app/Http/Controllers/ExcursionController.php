<?php

namespace App\Http\Controllers;

use App\Repositories\ExcursionRepository;
use Illuminate\Http\Request;

class ExcursionController extends Controller
{
    public function __construct(protected ExcursionRepository $excursionRepository)
    {
    }

    public function excursions()
    {
        $excursions = $this->excursionsRepository->getExcursions();

        return view('excursions', [
            'excursions' => $excursions,
        ]);
    }
}
