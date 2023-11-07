<?php

namespace App\Http\Controllers;

use App\Repositories\EntertainmentRepository;

class EntertainmentController extends Controller
{
    public function __construct(protected EntertainmentRepository $entertainmentRepository)
    {
    }

    public function entertainments()
    {
        $entertainments = $this->entertainmentRepository->getEntertainments();

        return view('entertainments', [
            'entertainments' => $entertainments,
        ]);
    }
}
