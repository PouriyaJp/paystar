<?php

namespace Modules\User\Entities;

use Modules\Cart\Entities\Cart;
use Modules\Order\Entities\Order;
use Modules\Payment\Entities\Payment;
use Modules\User\Database\factories\UserFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function newFactory()
    {
        return UserFactory::new();
    }

    public function orders()
    {

        return $this->hasMany(Order::class);

    }

    public function carts()
    {

        return $this->hasMany(Cart::class);

    }

    public function payments()
    {

        return $this->hasOne(Payment::class, 'user_id');

    }
}
