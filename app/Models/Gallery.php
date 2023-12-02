<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Gallery extends Model implements HasMedia
{
    use CrudTrait;
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'image',
    ];

    public const COLLECTION_NAME_GALLERY = 'gallery';

    public function getGalleryImage(): ?Media
    {
        return $this->getFirstMedia(self::COLLECTION_NAME_GALLERY);
    }
}
