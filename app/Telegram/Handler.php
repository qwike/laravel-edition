<?php

namespace App\Telegram;

use App\Enums\StatusEnum;
use App\Models\Order;
use DefStudio\Telegraph\Enums\ChatActions;
use DefStudio\Telegraph\Models\TelegraphChat;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Stringable;
use DefStudio\Telegraph\Keyboard\Keyboard;

class Handler extends WebhookHandler
{
    public bool $getComment = false;
    protected int $currentId;
    public function getOrderInfo(int $id): string
    {
        $order = Order::query()->find($id);
        $message = "<b>Заявка №" . $order->id . "</b>" .
            "\n\n<b>Статус - </b><i>"  . $order->status->label() . "</i>" .
            "\n\n<b>Категория:</b> " . $order->orderable_type->label() .
            "\n<b>Клиент:</b> " . $order->name .
            "\n<b>Номер телефона:</b> <a href='tel:".$order->phone."'>" . $order->phone . "</a>" .
            "\n<b>Комментарий:</b> " . $order->comment .
            "\n<b>Дата:</b> " . $order->created_at;
        if ($order->comment_admin)
        {
            $message .= "\n\n<b>Заметка:</b> " . $order->comment_admin;
        }
        return $message;
    }

    public function work(): void
    {
        Order::query()->find($this->data->get("id"))->update(array("status" => StatusEnum::working));
        $this->reply("Заявка взята в работу!");
        $this->chat->edit($this->messageId)->message($this->getOrderInfo((int) $this->data->get("id")))->send();
        $newKeyboard = Keyboard::make()
            ->button('Отложить')->action('retention')->param('id', $this->data->get("id"))
            ->button('Закрыть')->action('close')->param('id', $this->data->get("id"));
        $this->replaceKeyboard($newKeyboard);
    }

    public function retention(): void
    {
        Order::query()->find($this->data->get("id"))->update(array("status" => StatusEnum::retention));
        $this->reply("Заявка поставлена на удержание!");
        $this->chat->edit($this->messageId)->message($this->getOrderInfo((int) $this->data->get("id")))->send();
        $newKeyboard = Keyboard::make()
            ->button('Взять в работу')->action('work')->param('id', $this->data->get("id"))
            ->button('Закрыть')->action('close')->param('id', $this->data->get("id"));
        $this->replaceKeyboard($newKeyboard);
    }

    public function close(): void
    {
        Order::query()->find($this->data->get("id"))->update(array("status" => StatusEnum::closed));
        $this->reply("Заявка закрыта!");
        $this->chat->edit($this->messageId)->message($this->getOrderInfo((int) $this->data->get("id")))->send();
        $this->replaceKeyboard(Keyboard::make());
    }

    public function sendOrders(Collection $orders, array $buttons): void
    {
        $chat = TelegraphChat::find($this->chat->id);
        $chat->action(ChatActions::TYPING)->send();
        if($orders->isEmpty()) {
            $chat->message("В данный момент нет этих заявок.")->send();
            return;
        }
        foreach ($orders as $order) {
            $message = "<b>Заявка №" . $order->id . "</b>" .
                "\n\n<b>Статус - </b><i>"  . $order->status->label() . "</i>" .
                "\n\n<b>Категория:</b> " . $order->orderable_type->label() .
                "\n<b>Клиент:</b> " . $order->name .
                "\n<b>Номер телефона:</b> <a href='tel:".$order->phone."'>" . $order->phone . "</a>" .
                "\n<b>Комментарий:</b> " . $order->comment .
                "\n<b>Дата:</b> " . $order->created_at;
            if ($order->comment_admin)
            {
                $message .= "\n\n<b>Заметка:</b> " . $order->comment_admin;
            }
            $keyboard = Keyboard::make()
                ->when($buttons['working'], fn(Keyboard $keyboard) => $keyboard->button('Взять в работу')->action('work')->param('id', $order->id))
                ->when($buttons['retention'], fn(Keyboard $keyboard) => $keyboard->button('Отложить')->action('retention')->param('id', $order->id))
                ->when($buttons['close'], fn(Keyboard $keyboard) => $keyboard->button('Закрыть')->action('close')->param('id', $order->id))
                ->button('Добавить/Изменить заметку')->action('changeCommentMessage')->param('id', $order->id);
            $chat->message($message)->keyboard($keyboard)->send();
        }
    }

    public function ordersInProcess(): void
    {
        $orders = Order::query()->where('status', StatusEnum::process)->get();
        $this->sendOrders($orders, [
            'working' => true,
            'retention' => true,
            'close' => true,
        ]);
    }

    public function ordersInWorking(): void
    {
        $orders = Order::query()->where('status', StatusEnum::working)->get();
        $this->sendOrders($orders, [
            'working' => false,
            'retention' => true,
            'close' => true,
        ]);
    }

    public function ordersOnRetention(): void
    {
        $orders = Order::query()->where('status', StatusEnum::retention)->get();
        $this->sendOrders($orders, [
            'working' => true,
            'retention' => false,
            'close' => true,
        ]);
    }

    public function changeCommentMessage(): void
    {
        $chat = TelegraphChat::find($this->chat->id);
        $chat->message('Введите заметку')->send();
    }

    protected function handleUnknownCommand(Stringable $text): void
    {

        if ($text->value() == '/start')
        {
            $this->reply('Приступаю к работе');
        }
        else
        {
            $this->reply('Друг, я тебя не понимаю');
        }
    }

    protected function handleChatMessage(Stringable $text): void
    {
//        $this->comment = $text;
        if($this->currentId == 2 ){
            Order::query()->find($this->currentId)->update(array("comment_admin" => $text));
            $this->reply('Заявку успешно записанна');
            $this->currentId = 0;
        }
        else{
            $this->reply($text);
        }

        //Log::info(json_encode($this->message->toArray(), JSON_UNESCAPED_UNICODE));
    }
}
