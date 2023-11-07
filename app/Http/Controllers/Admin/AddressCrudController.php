<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddressRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class AddressCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Address::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/address');
        CRUD::setEntityNameStrings('Адрес', 'Адреса');
    }

    protected function setupListOperation()
    {
        CRUD::setColumns([
            [
                'name'  => 'name',
                'label' => 'Адрес',
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
                'label' => 'Отредактировано',
                'type'  => 'date'
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(AddressRequest::class);
        CRUD::addFields([
            [
                'name'  => 'name',
                'label' => 'Адрес',
                'type'  => 'text'
            ],
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
