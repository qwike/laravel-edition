<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Project extends Model implements HasMedia
{
    use CrudTrait;
    use HasFactory;
    use InteractsWithMedia;

    public const COLLECTION_NAME_PROJECT = 'project';

    protected $fillable = [
        'name',
        'description',
    ];

    public function getProjectImage(): ?string
    {
        $url = "";
        $image = $this->getFirstMedia(self::COLLECTION_NAME_PROJECT);
        if($image) {
            $url = $image->getUrl();
        }
        else {
            $url = "/storage/images/placeholder.png";
        }
        return $url;
    }
}
