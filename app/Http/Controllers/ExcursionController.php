<?php

namespace App\Http\Controllers;

use App\Repositories\ExcursionRepository;

class ExcursionController extends Controller
{
    public function __construct(protected ExcursionRepository $excursionRepository)
    {
    }

    public function excursions()
    {
        $excursions = $this->excursionRepository->getExcursions();

        return view('excursions', [
            'excursions' => $excursions,
        ]);
    }
}
