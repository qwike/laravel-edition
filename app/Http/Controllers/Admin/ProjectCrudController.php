<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ProjectCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Project::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/project');
        CRUD::setEntityNameStrings('Проект', 'Проекты');
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
        CRUD::setValidation(ProjectRequest::class);
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
                'name' => 'image',
                'label' => 'Изображение',
                'type' => 'upload',
                'withMedia' => [
                    'collection' => Project::COLLECTION_NAME_PROJECT,
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
                'name' => 'image',
                'label' => 'Изображение',
                'type' => 'image',
                'width' => '200px',
                'height' => '200px',
                'withMedia' => [
                    'collection' => Project::COLLECTION_NAME_PROJECT,
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
