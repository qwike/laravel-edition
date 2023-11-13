<?php

namespace App\Telegram;

use App\Enums\StatusEnum;
use App\Models\Order;
use App\Repositories\OrderRepository;
use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Models\TelegraphChat;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use Illuminate\Support\Stringable;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

class Handler extends WebhookHandler
{
    public function work(): void
    {
        Order::query()->find($this->data->get("id"))->update(array("status" => StatusEnum::working));
        $this->reply("Заявка взята в работу!");
        $chat = TelegraphChat::find($this->data->get("chatId"));
        $chat->replaceKeyboard(
            $this->data->get("messageId"),
            Keyboard::make()->buttons([
                Button::make('Закрыть')->action('work')->param('id', $this->data->get("id")),
            ])
        )->send();
    }
    public function hello(): void
    {
        $this->reply('В мувыр приехал, должен был косарь отдать!');
    }
    public function orders(): void
    {
        $category = ["App\Models\House" => "Домики", "App\Models\Excursion" => "Экскурсии", "App\Models\Events" => "Мероприятия"];
        $chat = TelegraphChat::find($this->chat->id);
        $orders = Order::query()->get();
        foreach ($orders as $order) {
            $text = "<b>Категория:</b> " . $category[$order->orderable_type?->value] .
                "\n<b>Клиент:</b> " . $order->name .
                "\n<b>Номер телефона:</b> <a href='tel:".$order->phone."'>" . $order->phone . "</a>" .
                "\n<b>Комментарий:</b> " . $order->comment .
                "\n<b>Дата:</b> " . $order->created_at;
            $chat->message($text)
                ->keyboard(
                    Keyboard::make()->buttons([
                        Button::make('Взять в работу')->action('work')->param('id', $order->id)->param('messageId', $this->messageId)->param('chatId', $this->chat->id),
                    ])
                )->send();
        }
    }

    public function order(): void
    {
        $chat = TelegraphChat::find($this->chat->id);
        $chat->message('Начинаю работу')
            ->keyboard(
                Keyboard::make()->buttons([
                    Button::make('open')->url('https://test.it'),
                ])
            )->send();
    }
    public function chekak($name): void
    {
        $this->reply("Да норм, $name!");
    }

    protected function handleUnknownCommand(Stringable $text): void
    {

        if ($text->value() == '/start')
        {
            $this->reply('НАЧИНАЮ МЕСИТЬ ГЛИНУ');
        }
        else
        {
            $this->reply('Друг, я тебя не понимаю, честно');
        }
    }

    protected function handleChatMessage(Stringable $text): void
    {
        $this->reply($text);
        //
        //Log::info(json_encode($this->message->toArray(), JSON_UNESCAPED_UNICODE));
    }
}
