<?php

namespace App\Models;

use App\Enums\OrderTypeEnum;
use App\Enums\StatusEnum;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Order extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'orderable_type',
        'orderable_id',
        'name',
        'phone',
        'comment',
        'comment_admin',
        'status',
    ];

    protected $casts = [
        'status' => StatusEnum::class,
        'orderable_type' => OrderTypeEnum::class,
    ];

    protected $attributes = [
        'status' => StatusEnum::process,
    ];

    public function orderable(): MorphTo
    {
        return $this->morphTo();
    }
}
