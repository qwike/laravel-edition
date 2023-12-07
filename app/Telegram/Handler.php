<?php

namespace App\Telegram;

use App\Enums\StatusEnum;
use App\Models\Order;
use App\Repositories\OrderRepository;
use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Models\TelegraphChat;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Stringable;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

use function PHPUnit\Framework\isEmpty;


class Handler extends WebhookHandler
{
    public array $category = ["App\Models\House" => "Домики", "App\Models\Excursion" => "Экскурсии", "App\Models\CafeEvent" => "Кафе" 	];

    public function ordersinprocess(): void
    {
        $orders = Order::query()->where('status', '=', 'process')->get();
        $chat = TelegraphChat::find($this->chat->id);
        if($orders->isEmpty()){
            $chat->message('<i>"Новых" </i> заявок нет')->send();
            return;
        }
        foreach($orders as $order){
            $text =
                "Заявка №" . "<b>" . $order->id . "</b>" .
                "\n<b>Статус:</b> "    . $order->status->label() .
                "\n<b>Категория:</b> "   . $this->category[$order->orderable_type?->value] .
                "\n<b>Дата:</b> "        . $order->created_at .
                "\n\n<b>Клиент:</b> "      . $order->name .
                "\n<b>Телефон:</b> <a href='tel:" . $order->phone . "'>" . $order->phone . "</a>";
            if(isset($order->comment)){
                $text = $text . "\n<b>Комментарий:</b> " . $order->comment;
            }
            if(isset($order->comment_admin)){
                $text = $text . "\n\n<b>Заметка:</b> "  . $order->comment_admin;
            }
            $chat->message($text)
                ->keyboard(Keyboard::make()
                    ->row([
                        Button::make('В работу')->action('changeorderstatus')->param('order_id', $order->id)->param('order_type', 'inWork'),
                        Button::make('Закрыть')->action('changeorderstatus')->param('order_id', $order->id)->param('order_type', 'close'),
                        Button::make('Отложить')->action('changeorderstatus')->param('order_id', $order->id)->param('order_type', 'retention')
                    ])->row([
                        Button::make('Оставить коментарий')->action('comment')->param('order_id', $order->id)->param('order_status',$order->status->label()),
                    ]))->send();
        }
    }
    public function ordersinworking(): void
    {
        $orders = Order::query()->where('status', '=', 'working')->get();
        $chat = TelegraphChat::find($this->chat->id);
        if($orders->isEmpty()){
            $chat->message('Отсутствуют заявки <i>"В работе"</i>')->send();
            return;
        }
        foreach($orders as $order){
            $text =
                "Заявка №" . "<b>" . $order->id . "</b>" .
                "\n<b>Статус:</b> "    . $order->status->label() .
                "\n<b>Категория:</b> "   . $this->category[$order->orderable_type?->value] .
                "\n<b>Дата:</b> "        . $order->created_at .
                "\n\n<b>Клиент:</b> "      . $order->name .
                "\n<b>Телефон:</b> <a href='tel:" . $order->phone . "'>" . $order->phone . "</a>";
            if(isset($order->comment)){
                $text = $text . "\n<b>Комментарий:</b> " . $order->comment;
            }
            if(isset($order->comment_admin)){
                $text = $text . "\n\n<b>Заметка:</b> "  . $order->comment_admin;
            }
            $chat->message($text)
                ->keyboard(Keyboard::make()
                    ->row([
                        Button::make('Закрыть')->action('changeorderstatus')->param('order_id', $order->id)->param('order_type', 'close'),
                        Button::make('Отложить')->action('changeorderstatus')->param('order_id', $order->id)->param('order_type', 'retention')
                    ])->row([
                        Button::make('Оставить коментарий')->action('comment')->param('order_id', $order->id)->param('order_status',$order->status->label()),
                    ]))->send();
        }
    }
    public function ordersinretention(): void
    {
        $orders = Order::query()->where('status', '=', 'retention')->get();
        $chat = TelegraphChat::find($this->chat->id);
        if($orders->isEmpty()){
            $chat->message('Отсутствуют заявки <i>"На удержании"</i>')->send();
            return;
        }
        foreach($orders as $order){
            $text =
                "Заявка №" . "<b>" . $order->id . "</b>" .
                "\n<b>Статус:</b> "    . $order->status->label() .
                "\n<b>Категория:</b> "   . $this->category[$order->orderable_type?->value] .
                "\n<b>Дата:</b> "        . $order->created_at .
                "\n\n<b>Клиент:</b> "      . $order->name .
                "\n<b>Телефон:</b> <a href='tel:" . $order->phone . "'>" . $order->phone . "</a>";
            if(isset($order->comment)){
                $text = $text . "\n<b>Комментарий:</b> " . $order->comment;
            }
            if(isset($order->comment_admin)){
                $text = $text . "\n\n<b>Заметка:</b> "  . $order->comment_admin;
            }
            $chat->message($text)
                ->keyboard(Keyboard::make()
                    ->row([
                        Button::make('В работу')->action('changeorderstatus')->param('order_id', $order->id)->param('order_type', 'inWork'),
                        Button::make('Закрыть')->action('changeorderstatus')->param('order_id', $order->id)->param('order_type', 'close'),
                    ])->row([
                        Button::make('Оставить коментарий')->action('comment')->param('order_id', $order->id)->param('order_status',$order->status->label()),
                    ]))->send();
        }
    }


    public function changeorderstatus() : void
    {
        $chat = TelegraphChat::find($this->chat->id);
        $order = Order::query()->find($this->data->get("order_id"));
        switch ($this->data->get("order_type")) {
            case "inWork":
                $order->update(array("status" => StatusEnum::working));
                $chat->message("Заявка " . $this->data->get("order_id") . " поставлена в работу")->send();
                break;
            case "close":
                $order->update(array("status" => StatusEnum::closed));
                $chat->message("Заявка " . $this->data->get("order_id") . " закрыта")->send();
                break;
            case "retention":
                $order->update(array("status" => StatusEnum::retention));
                $chat->message("Заявка " . $this->data->get("order_id") . " поставлена на удержание")->send();
                break;
        }

        $chat->deleteMessage($this->messageId)->send();
    }
    public function comment() : void
    {
        $chat = TelegraphChat::find($this->chat->id);
        $chat->message('Введите заметку для заявки №' . $this->data->get("order_id"))->send();

        $chat->storage()->set('comment', true);
        $chat->storage()->set('message_id', $this->messageId);
        $chat->storage()->set('order_id', $this->data->get("order_id"));
        $chat->storage()->set('order_status', $this->data->get("order_status"));
//        $chat->deleteMessage($this->messageId)->send();
    }


    public function start($name): void
    {
        $this->reply("Готов к работе");
    }
    protected function handleChatMessage(Stringable $text): void
    {
        $chat = TelegraphChat::find($this->chat->id);

        DB::table('telegraph_chats')->where('chat_id', '=', $this->chat->chat_id)->update(array("notified" => 'false'));
        $data = DB::table('telegraph_chats')->where('chat_id', '=', $this->chat->chat_id)->first();
//        $this->reply($data->name);

        if($chat->storage()->get('comment')){
            $chat->storage()->set('comment', false);



            $chat->deleteMessage($chat->storage()->get('message_id'))->send();
            Order::query()->find($chat->storage()->get('order_id'))->update(array("comment_admin" => $text));
            $order = Order::query()->where('id', '=', $chat->storage()->get('order_id'))->first();
            $text =
                "Заявка №" . "<b>" . $order->id . "</b>" .
                "\n<b>Статус:</b> "    . $order->status->label() .
                "\n<b>Категория:</b> "   . $this->category[$order->orderable_type?->value] .
                "\n<b>Дата:</b> "        . $order->created_at .
                "\n\n<b>Клиент:</b> "      . $order->name .
                "\n<b>Телефон:</b> <a href='tel:" . $order->phone . "'>" . $order->phone . "</a>";
            if(isset($order->comment)){
                $text = $text . "\n<b>Комментарий:</b> " . $order->comment;
            }
            if(isset($order->comment_admin)){
                $text = $text . "\n\n<b>Заметка:</b> "  . $order->comment_admin;
            }

            switch ($chat->storage()->get('order_status')) {
                case "В процессе":
                    $chat->message($text)->keyboard(Keyboard::make()
                        ->row([
                            Button::make('В работу')->action('changeorderstatus')->param('order_id', $order->id)->param('order_type', 'inWork'),
                            Button::make('Закрыть')->action('changeorderstatus')->param('order_id', $order->id)->param('order_type', 'close'),
                            Button::make('Отложить')->action('changeorderstatus')->param('order_id', $order->id)->param('order_type', 'retention')
                        ])->row([
                            Button::make('Оставить коментарий')->action('comment')->param('order_id', $order->id)->param('order_status',$order->status->label()),
                        ]))->send();
                    break;
                case "В работе":
                    $chat->message($text)->keyboard(Keyboard::make()
                        ->row([
                            Button::make('Закрыть')->action('changeorderstatus')->param('order_id', $order->id)->param('order_type', 'close'),
                            Button::make('Отложить')->action('changeorderstatus')->param('order_id', $order->id)->param('order_type', 'retention')
                        ])->row([
                            Button::make('Оставить коментарий')->action('comment')->param('order_id', $order->id)->param('order_status',$order->status->label()),
                        ]))->send();
                    break;
                case "На удержании":
                    $chat->message($text)->keyboard(Keyboard::make()
                        ->row([
                            Button::make('В работу')->action('changeorderstatus')->param('order_id', $order->id)->param('order_type', 'inWork'),
                            Button::make('Закрыть')->action('changeorderstatus')->param('order_id', $order->id)->param('order_type', 'close'),
                        ])->row([
                            Button::make('Оставить коментарий')->action('comment')->param('order_id', $order->id)->param('order_status',$order->status->label()),
                        ]))->send();
                    break;
            }
            $chat->storage()->set('message_id', null);
            $chat->storage()->set('order_id', null);
            $chat->storage()->set('order_status', null);

        }

    }
}
