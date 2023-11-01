<?php

namespace App\Helpers;

class MediaHelper
{
    public static function defaultImage(): string
    {
        return asset('image/placeholder.png');
    }
}