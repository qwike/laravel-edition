<?php

namespace App\Http\Controllers\Admin;

use App\Enums\OrderTypeEnum;
use App\Enums\StatusEnum;
use App\Http\Requests\OrderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class OrderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Order::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/order');
        CRUD::setEntityNameStrings('Заявка', 'Заявки');
    }

    protected function setupListOperation()
    {
        CRUD::setColumns([
            [
                'name' => 'id',
                'label' => 'id',
                'type' => 'text',
            ],
            [
                'name' => 'orderable_type',
                'label' => 'Тип',
                'type' => 'enum',
                'options' => OrderTypeEnum::options(),
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
                'label' => 'Обновлено',
                'type' => 'date'
            ],
        ]);
    }

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
                'label' => 'Обновлено',
                'type' => 'date',
            ],
        ]);
    }
    protected function setupUpdateOperation()
    {
        $order = $this->crud->getCurrentEntry();
        CRUD::setValidation(OrderRequest::class);
        CRUD::addFields([
            [
                'name' => 'orderable_id',
                'label' => 'Наименование',
                'entity' => false,
                'model' => $order->orderable_type?->value,
                'type' => 'select',
                'attribute' => 'name',
                'allows_null' => true,
                'attributes' => [
                    'readonly' => 'readonly',
                    'disabled' => 'disabled',
                ],
            ],
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
                'attributes' => [
                    'readonly' => 'readonly',
                    'disabled' => 'disabled',
                ],
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
