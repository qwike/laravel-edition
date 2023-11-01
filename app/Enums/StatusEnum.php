<?php

namespace App\Enums;

enum StatusEnum: string
{
    case process = 'process';
    case working = 'working';
    case retention = 'retention';
    case closed = 'closed';

    public function label(): string
    {
        $options = self::options();
        return $options[$this->value] ?? 'n/a';
    }

    public static function options(): array
    {
        return [
            StatusEnum::process->value => 'В процессе',
            StatusEnum::working->value => 'В работе',
            StatusEnum::retention->value => 'На удержании',
            StatusEnum::closed->value => 'Закрыта',
        ];
    }
}
