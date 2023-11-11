<?php

namespace App\Models;

use App\Enums\UnitEnum;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Entertainment extends Model implements HasMedia
{
    use CrudTrait;
    use HasFactory;
    use InteractsWithMedia;

    public const COLLECTION_NAME_ENTERTAINMENT = 'entertainment';

    protected $fillable = [
        'name',
        'description',
        'price',
        'unit',
    ];

    protected $casts = [
        'unit' => UnitEnum::class,
    ];

    public function getEntertainmentImage(): ?Media
    {
        return $this->getFirstMedia(self::COLLECTION_NAME_ENTERTAINMENT);
    }
}
