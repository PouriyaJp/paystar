<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Order\Database\factories\OrderFactory;
use Modules\Product\Entities\Product;
use Modules\User\Entities\User;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected static function newFactory()
    {
        return OrderFactory::new();
    }

    public function user()
    {

        return $this->belongsTo(User::class);

    }

    public function product()
    {

        return $this->belongsTo(Product::class);

    }
}
