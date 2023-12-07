Заявка № <b>{{$order->id}}</b>
<b>Статус:</b> {{$order->status?->label()}}
<b>Категория:</b> {{$order->orderable_type?->label()}}

<b>Дата:</b> {{$order->created_at}}
<b>Клиент:</b> {{$order->name}}
<b>Телефон:</b> <a href="tel:{{$order->phone}}">{{$order->phone}}</a>

@isset($order->comment)
<b>Комментарий:</b> {{$order->comment}}
@endisset
@isset($order->comment_admin)
<b>Заметка:</b> {{$order->comment_admin}}
@endisset
