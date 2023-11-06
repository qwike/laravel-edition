<?php

namespace App\Repositories;

use App\Models\House;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaRepository
{
    public function getCountImagesHouse(int $id): int
    {
        return Media::query()
            ->where('model_type', '=', House::class)
            ->where('model_id', '=', $id)
            ->where('collection_name', '=', 'house')
            ->count();
    }
}