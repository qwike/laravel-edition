<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\FormCreateRequest;
use App\Notifications\Telegram;
use App\Repositories\OrderRepository;
use App\Repositories\TelegramChatRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

use \Illuminate\Support\Facades\Notification;
use NotificationChannels\Telegram\Exceptions\CouldNotSendNotification;


class FormController extends Controller
{
    public function create(
        FormCreateRequest $request,
        OrderRepository $orderRepository,
        TelegramChatRepository $telegramChatRepository,
    ): JsonResponse {
        $orderRepository->create($request->validated());
        $chatIds = $telegramChatRepository->getAll()->pluck('chat_id');

        try {
            Notification::send($chatIds, new Telegram());
        } catch (CouldNotSendNotification $e) {
            Log::error($e);
        }


        return response()->json([
            'status' => true,
        ]);
    }

    public function getForm(): View
    {
        return view('partials.formModal');
    }
}
