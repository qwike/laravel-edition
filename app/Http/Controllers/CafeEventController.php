<?php

namespace App\Http\Controllers;

use App\Repositories\CafeEventRepository;

class CafeEventController extends Controller
{
    public function __construct(protected CafeEventRepository $cafeEventRepository)
    {
    }

    public function cafe()
    {
        $cafeEvents = $this->cafeEventRepository->getCafeEvents();

        return view('cafe', [
            'cafeEvents' => $cafeEvents
        ]);
    }
}
