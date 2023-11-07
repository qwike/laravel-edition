<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class EventCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Event::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/event');
        CRUD::setEntityNameStrings('Мероприятие', 'Мероприятия');
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
                'type' => 'textarea',
            ],
            [
                'name' => 'date',
                'label' => 'Дата Проведения',
                'type' => 'text',
            ],
            [
                'name' => 'created_at',
                'label' => 'Создано',
                'type' => 'date'
            ],
            [
                'name' => 'updated_at',
                'label' => 'Отредактировано',
                'type' => 'date'
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(EventRequest::class);
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
                'name' => 'date',
                'label' => 'Дата Проведения',
                'type' => 'text',
                'hint' => 'Например: сезон, месяц или конкретная дата (03.09.2030 или 4 Февраля 2030 г.)',
            ],
            [
                'name' => 'image',
                'label' => 'Изображение',
                'type' => 'upload',
                'withMedia' => [
                    'collection' => Event::COLLECTION_NAME_EVENT,
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
                'limit' => 120,
            ],
            [
                'name' => 'description',
                'label' => 'Описание',
                'type' => 'textarea',
            ],
            [
                'name' => 'date',
                'label' => 'Дата Проведения',
                'type' => 'text',
            ],
            [
                'name' => 'image',
                'label' => 'Изображение',
                'type' => 'image',
                'width' => '200px',
                'height' => '200px',
                'withMedia' => [
                    'collection' => Event::COLLECTION_NAME_EVENT,
                ],
            ],
            [
                'name' => 'created_at',
                'label' => 'Создано',
                'type' => 'date',
            ],
            [
                'name' => 'updated_at',
                'label' => 'Отредактировано',
                'type' => 'date',
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
