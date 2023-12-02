<?php

namespace App\Http\Controllers;

use App\Repositories\GalleryRepository;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function __construct(
        protected GalleryRepository $galleryRepository)
    {
    }

    public function gallery()
    {
        $gallery = $this->galleryRepository->getGallery();

        return view('gallery', [
            'gallery' => $gallery,
        ]);
    }
}
