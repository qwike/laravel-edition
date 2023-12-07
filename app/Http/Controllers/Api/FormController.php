<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\FormCreateRequest;
use App\Notifications\Telegram;
use App\Repositories\OrderRepository;
use App\Repositories\TelegramChatRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use \Illuminate\Support\Facades\Notification;


class FormController extends Controller
{
    public function create(
        FormCreateRequest $request,
        OrderRepository $orderRepository,
        TelegramChatRepository $telegramChatRepository,
    ): JsonResponse {
        $orderRepository->create($request->validated());
        $chatIds = $telegramChatRepository->getAll()->pluck('chat_id');

        Notification::send($chatIds, new Telegram());

        return response()->json([
            'status' => true,
        ]);
    }

    public function getForm(): View
    {
        return view('partials.formModal');
    }
}
