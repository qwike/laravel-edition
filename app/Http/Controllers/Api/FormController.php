<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\FormCreateRequest;
use App\Repositories\OrderRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class FormController extends Controller
{
    public function create(FormCreateRequest $request, OrderRepository $orderRepository): JsonResponse
    {
        $orderRepository->create($request->validated());
        return response()->json([
            'status' => true,
        ]);
    }

    public function getForm(): View
    {
        return view('partials.formModal');
    }
}
