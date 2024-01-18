<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TelegramRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class TelegramCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\DefStudio\Telegraph\Models\TelegraphChat::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/telegram');
        CRUD::setEntityNameStrings('Телеграмм', 'Телеграммы');
    }
    protected function setupListOperation()
    {
        CRUD::setColumns([
            [
                'name'  => 'name',
                'label' => 'Пользователь',
                'type'  => 'text',
                'limit' => 120,
            ],
            [
                'name'  => 'chat_id',
                'label' => 'ID пользователя',
                'type'  => 'text',
                'limit' => 120,
            ],
            [
                'name'  => 'created_at',
                'label' => 'Создано',
                'type'  => 'date'
            ],
            [
                'name'  => 'updated_at',
                'label' => 'Обновлено',
                'type'  => 'date'
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(TelegramRequest::class);
        CRUD::addFields([
            [
                'name'  => 'name',
                'label' => 'ФИО',
                'type'  => 'text'
            ],
            [
                'name'  =>  'chat_id',
                'label' =>  'chat id',
                'type'  =>  'text'
            ]
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }
}
