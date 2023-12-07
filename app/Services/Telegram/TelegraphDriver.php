<?php

namespace App\Services\Telegram;

use App\Enums\StatusEnum;
use App\Interfaces\TelegramDriverInterface;
use App\Models\Order;
use App\Repositories\OrderRepository;
use App\Repositories\TelegramChatRepository;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Support\Stringable;

class TelegraphDriver extends WebhookHandler implements TelegramDriverInterface
{

    public function __construct(
        protected OrderRepository        $orderRepository,
        protected TelegramChatRepository $telegramChatRepository,
    )
    {
        parent::__construct();
    }

    public function ordersinprocess(): void
    {
        $this->getMessageByStatus(StatusEnum::process);
    }

    public function ordersinworking(): void
    {
        $this->getMessageByStatus(StatusEnum::working);
    }

    public function ordersinretention(): void
    {
        $this->getMessageByStatus(StatusEnum::retention);
    }


    public function changeorderstatus(): void
    {
        $chat = TelegraphChat::find($this->chat->id);
        $orderId = $this->data->get('order_id');
        $status = StatusEnum::from($this->data->get('order_type'));

        if ($this->orderRepository->update($orderId, ['status' => $status])) {
            match ($status) {
                StatusEnum::working => $chat->message(sprintf('Заявка %s поставлена в работу', $orderId))->send(),
                StatusEnum::closed => $chat->message(sprintf('Заявка %s закрыта', $orderId))->send(),
                StatusEnum::retention => $chat->message(sprintf('Заявка %s поставлена на удержание', $orderId))->send(),
                default => throw new \Exception('Unexpected match value'),
            };
            $chat->deleteMessage($this->messageId)->send();
        } else {
            $chat->message(sprintf('Заявка с id %s была удалена', $orderId)->send());
        }
    }

    public function comment(): void
    {
        $chat = $this->telegramChatRepository->getFirstById($this->chat->id);
        $chat->message('Введите заметку для заявки №' . $this->data->get('order_id'))->send();

        $chat->storage()->set('comment', true);
        $chat->storage()->set('message_id', $this->messageId);
        $chat->storage()->set('order_id', $this->data->get('order_id'));
    }


    public function start($name): void
    {
        $this->reply('Готов к работе');
    }

    protected function handleChatMessage(Stringable $text): void
    {
        $chat = $this->telegramChatRepository->getFirstById($this->chat->id);
        $orderId = $chat->storage()->get('order_id');

        if ($chat->storage()->get('comment')) {
            $order = $this->orderRepository->getFirstById($orderId);

            if ($order) {
                $chat->deleteMessage($chat->storage()->get('message_id'))->send();
                $this->orderRepository->update($orderId, ['comment_admin' => $text]);
                $this->formattedMessage($order, $chat);
            }


            $chat->storage()->set('message_id', null);
            $chat->storage()->set('order_id', null);
            $chat->storage()->set('comment', false);
        }
    }

    private function getMessageByStatus(StatusEnum $statusEnum): void
    {
        $orders = $this->orderRepository->orderGetAllByStatus($statusEnum);
        $chat = $this->telegramChatRepository->getFirstById($this->chat->id);

        if ($orders->isEmpty()) {
            $chat->message('Заявок не найдено')->send();
            return;
        }

        foreach ($orders as $order) {
            $this->formattedMessage($order, $chat);
        }
    }

    private function getActionButton(Order $order): array
    {
        return match ($order->status) {
            StatusEnum::process => [
                Button::make('В работу')->action('changeorderstatus')->param('order_id', $order->id)->param('order_type', StatusEnum::working->value),
                Button::make('Закрыть')->action('changeorderstatus')->param('order_id', $order->id)->param('order_type', StatusEnum::closed->value),
                Button::make('Отложить')->action('changeorderstatus')->param('order_id', $order->id)->param('order_type', StatusEnum::retention->value),
            ],
            StatusEnum::retention => [
                Button::make('В работу')->action('changeorderstatus')->param('order_id', $order->id)->param('order_type', StatusEnum::working->value),
                Button::make('Закрыть')->action('changeorderstatus')->param('order_id', $order->id)->param('order_type', StatusEnum::closed->value),
            ],
            StatusEnum::working => [
                Button::make('Закрыть')->action('changeorderstatus')->param('order_id', $order->id)->param('order_type', StatusEnum::closed->value),
                Button::make('Отложить')->action('changeorderstatus')->param('order_id', $order->id)->param('order_type', StatusEnum::retention->value),
            ],
            default => throw new \Exception('Unexpected match value'),
        };
    }

    private function formattedMessage(Order $order, TelegraphChat $telegraphChat): void
    {
        $telegraphChat->message(view('telegram.order_list', compact('order')))
            ->keyboard(Keyboard::make()
                ->row($this->getActionButton($order))
                ->row([
                    Button::make('Оставить коментарий')->action('comment')->param('order_id', $order->id)->param('order_status', $order->status->label()),
                ])
            )->send();
    }
}
