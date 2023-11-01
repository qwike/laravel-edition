<?php

namespace App\Http\Controllers\Admin;

use App\Enums\OrderTypeEnum;
use App\Enums\StatusEnum;
use App\Http\Requests\OrderRequest;
use App\Models\Event;
use App\Models\Excursion;
use App\Models\House;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class OrderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OrderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Order::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/order');
        CRUD::setEntityNameStrings('Заявка', 'Заявки');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setColumns([
            [
                'name' => 'orderable_type',
                'label' => 'Тип',
                'type' => 'enum',
                'options' => OrderTypeEnum::options(),
            ],
            [
                'name' => 'orderable.name',
                'label' => 'Наименование позиции',
                'type' => 'text',
            ],
            [
                'name' => 'name',
                'label' => 'Имя',
                'type' => 'text',
                'limit' => 120,
            ],
            [
                'name' => 'phone',
                'label' => 'Номер телефона',
                'type' => 'text',
            ],
            [
                'name' => 'comment',
                'label' => 'Комментарий',
                'type' => 'textarea',
            ],
            [
                'name' => 'comment_admin',
                'label' => 'Комментарий Администратора',
                'type' => 'textarea',
            ],
            [
                'name' => 'status',
                'label' => 'Статус',
                'type' => 'enum',
                'options' => StatusEnum::options(),
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
        ]); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */

    protected function setupShowOperation()
    {
        CRUD::setColumns([
            [
                'name' => 'orderable.name',
                'label' => 'Наименование позиции',
                'type' => 'text',
            ],
            [
                'name' => 'name',
                'label' => 'Имя',
                'type' => 'text',
                'limit' => 120,
            ],
            [
                'name' => 'phone',
                'label' => 'Номер телефона',
                'type' => 'text',
            ],
            [
                'name' => 'comment',
                'label' => 'Комментарий',
                'type' => 'textarea',
            ],
            [
                'name' => 'comment_admin',
                'label' => 'Комментарий Администратора',
                'type' => 'textarea',
            ],
            [
                'name' => 'status',
                'label' => 'Статус',
                'type' => 'enum',
                'options' => StatusEnum::options(),
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

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        CRUD::setValidation(OrderRequest::class);
        CRUD::addFields([
//            [
//                'name' => 'orderable',
//                'attribute' => 'name',
//                'label' => 'Наименование позиции',
//                'type' => 'text',
//                'attributes' => [
//                    'readonly' => 'readonly',
//                    'disabled' => 'disabled',
//                ],
//            ],
            [
                'name' => 'name',
                'label' => 'Имя',
                'type' => 'text',
                'attributes' => [
                    'readonly' => 'readonly',
                    'disabled' => 'disabled',
                ],
            ],
            [
                'name' => 'phone',
                'label' => 'Номер телефона',
                'type' => 'text',
                'attributes' => [
                    'readonly' => 'readonly',
                    'disabled' => 'disabled',
                ],
            ],
            [
                'name' => 'comment',
                'label' => 'Комментарий',
                'type' => 'textarea',
            ],
            [
                'name' => 'comment_admin',
                'label' => 'Комментарий Администратора',
                'type' => 'textarea',
            ],
            [
                'name' => 'status',
                'label' => 'Статус',
                'type' => 'enum',
                'enum_class' => StatusEnum::class,
                'enum_function' => 'label',
            ],
        ]);
    }
}
