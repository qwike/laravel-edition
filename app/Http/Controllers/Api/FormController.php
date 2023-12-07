<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\FormCreateRequest;
use App\Notifications\Telegram;
use App\Repositories\OrderRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use \Illuminate\Support\Facades\Notification;


class FormController extends Controller
{
    public function create(FormCreateRequest $request, OrderRepository $orderRepository): JsonResponse
    {
        $orderRepository->create($request->validated());

        $chat_id = DB::table('telegraph_chats')->select('chat_id')->where("notified", "=", "false")->get();
        foreach($chat_id as $chat) {
            DB::table('telegraph_chats')->where("chat_id", "=", $chat->chat_id)->update(array("notified" => "true"));
        }
        Notification::send($chat_id, new Telegram());

        return response()->json([
            'status' => true,
        ]);

    }

    public function getForm(): View
    {
        return view('partials.formModal');
    }
}
