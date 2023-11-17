<?php

namespace App\Enums;

enum UnitEnum: string
{
    case rub5minutes = 'rub5minutes';
    case rub10minutes = 'rub10minutes';
    case rub30minutes = 'rub30minutes';
    case rub1hour = 'rub1hour';
    case rub2hours = 'rub2hours';
    case rub3hours = 'rub3hours';
    case rub6hours = 'rub6hours';
    case rub8hours = 'rub8hours';
    case rub12hours = 'rub12hours';
    case rub16hours = 'rub16hours';
    case rub1day = 'rub1day';
    case rub3day = 'rub3day';
    case rub1week = 'rub1week';

    public function label(): string
    {
        $options = self::options();
        return $options[$this->value] ?? 'n/a';
    }

    public static function options(): array
    {
        return [
            UnitEnum::rub5minutes->value => '₽/5 минут',
            UnitEnum::rub10minutes->value => '₽10 минут',
            UnitEnum::rub30minutes->value => '₽/30 минут',
            UnitEnum::rub1hour->value => '₽/час',
            UnitEnum::rub2hours->value => '₽/2 часа',
            UnitEnum::rub3hours->value => '₽/3 часа',
            UnitEnum::rub6hours->value => '₽/6 часов',
            UnitEnum::rub8hours->value => '₽/8 часов',
            UnitEnum::rub12hours->value => '₽/12 часов',
            UnitEnum::rub16hours->value => '₽/16 часов',
            UnitEnum::rub1day->value => '₽/день',
            UnitEnum::rub3day->value => '₽/3 дня',
            UnitEnum::rub1week->value => '₽/неделю',
        ];
    }
}
