<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UnitEnum;
use App\Http\Requests\EntertainmentRequest;
use App\Models\Entertainment;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class EntertainmentCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Entertainment::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/entertainment');
        CRUD::setEntityNameStrings('Развлечение', 'Развлечения');
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
        CRUD::setValidation(EntertainmentRequest::class);
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
                'decimals' => 2,
                'hint' => '0 - Бесплатно',
            ],
            [
                'name' => 'unit',
                'label' => 'Единица измерения',
                'type' => 'enum',
                'enum_class' => UnitEnum::class,
                'enum_function' => 'label',
            ],
            [
                'name' => 'image',
                'label' => 'Изображение',
                'type' => 'upload',
                'withMedia' => [
                    'collection' => Entertainment::COLLECTION_NAME_ENTERTAINMENT,
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
                'decimals' => 2,
            ],
            [
                'name' => 'unit',
                'label' => 'Единица измерения',
                'type' => 'enum',
                'options' => UnitEnum::options(),
            ],
            [
                'name' => 'image',
                'label' => 'Изображение',
                'type' => 'image',
                'width' => '200px',
                'height' => '200px',
                'withMedia' => [
                    'collection' => Entertainment::COLLECTION_NAME_ENTERTAINMENT,
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
