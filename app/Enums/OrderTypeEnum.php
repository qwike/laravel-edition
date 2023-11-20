<?php

namespace App\Enums;

use App\Models\CafeEvent;
use App\Models\Excursion;
use App\Models\House;

enum OrderTypeEnum: string
{
    case cafe_events = CafeEvent::class;
    case excursions = Excursion::class;
    case houses = House::class;

    public function label(): string
    {
        $options = self::options();
        return $options[$this->value] ?? 'n/a';
    }

    public static function options(): array
    {
        return [
            OrderTypeEnum::cafe_events->value => 'Мероприятия',
            OrderTypeEnum::excursions->value => 'Экскурсии',
            OrderTypeEnum::houses->value => 'Домики',
        ];
    }
}
