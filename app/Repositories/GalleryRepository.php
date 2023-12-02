<?php

namespace App\Repositories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Collection;

class GalleryRepository
{
    public function getGallery(): Collection
    {
        return Gallery::query()->get();
    }
}
