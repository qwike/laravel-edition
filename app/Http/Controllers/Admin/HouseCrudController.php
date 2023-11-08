<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\HouseRequest;
use App\Models\House;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\MediaLibraryUploaders\Uploaders\MediaMultipleFiles;
use Spatie\MediaLibrary\InteractsWithMedia;

class HouseCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\House::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/house');
        CRUD::setEntityNameStrings('Домик', 'Домики');
    }

    protected function setupListOperation()
    {
        CRUD::setColumns([
            [
                'name' => 'name',
                'label' => 'Наименование',
                'type' => 'text',
                'limit' => 120,
            ],
            [
                'name' => 'description',
                'label' => 'Описание',
                'type' => 'text',
                'limit' => 30,
            ],
            [
                'name' => 'price',
                'label' => 'Стоимость',
                'type' => 'number',
            ],
            [
                'name' => 'created_at',
                'label' => 'Создано',
                'type' => 'date'
            ],
            [
                'name' => 'updated_at',
                'label' => 'Обновлено',
                'type' => 'date'
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(HouseRequest::class);
        CRUD::addFields([
            [
                'name' => 'name',
                'label' => 'Наименование',
                'type' => 'text',
            ],
            [
                'name' => 'description',
                'label' => 'Описание',
                'type' => 'textarea',
            ],
            [
                'name' => 'price',
                'label' => 'Стоимость',
                'type' => 'number',
            ],
            [
                'name' => 'image',
                'label' => 'Изображение',
                'type' => 'upload_multiple',
                'withMedia' => [
                    'collection' => House::COLLECTION_NAME_HOUSE,
                ],
                'hint' => 'Формат: jpeg, jpg, png, webp. Максимальный размер: 2MB',
            ],
        ]);
    }

    protected function setupShowOperation()
    {
        CRUD::setColumns([
            [
                'name' => 'name',
                'label' => 'Наименование',
                'type' => 'text',
            ],
            [
                'name' => 'description',
                'label' => 'Описание',
                'type' => 'textarea',
            ],
            [
                'name' => 'price',
                'label' => 'Стоимость',
                'type' => 'number',
            ],
            [
                'name' => 'image',
                'label' => 'Изображение(-я)',
                'type' => 'upload_multiple_image',
                'withMedia' => [
                    'uploader' => MediaMultipleFiles::class,
                    'collection' => House::COLLECTION_NAME_HOUSE,
                ],
            ],
            [
                'name' => 'created_at',
                'label' => 'Создано',
                'type' => 'date',
            ],
            [
                'name' => 'updated_at',
                'label' => 'Обновлено',
                'type' => 'date',
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
