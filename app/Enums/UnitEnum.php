<?php

namespace App\Enums;

enum UnitEnum: string
{
    case rub30minutes = 'rub30minutes';
    case rub1hour = 'rub1hour';
    case rub2hours = 'rub2hours';
    case rub3hours = 'rub3hours';
    case rub6hours = 'rub6hours';
    case rub8hours = 'rub8hours';
    case rub12hours = 'rub12hours';
    case rub16hours = 'rub16hours';
    case rub1day = 'rub1day';

    public function label(): string
    {
        $options = self::options();
        return $options[$this->value] ?? 'n/a';
    }

    public static function options(): array
    {
        return [
            UnitEnum::rub30minutes->value => 'руб./30 минут',
            UnitEnum::rub1hour->value => 'руб./час',
            UnitEnum::rub2hours->value => 'руб./2 часа',
            UnitEnum::rub3hours->value => 'руб./3 часа',
            UnitEnum::rub6hours->value => 'руб./6 часов',
            UnitEnum::rub8hours->value => 'руб./8 часов',
            UnitEnum::rub12hours->value => 'руб./12 часов',
            UnitEnum::rub16hours->value => 'руб./16 часов',
            UnitEnum::rub1day->value => 'руб./день',
        ];
    }
}
