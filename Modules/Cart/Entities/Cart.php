<?php

namespace Modules\Cart\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Cart\Database\factories\CartFactory;
use Modules\Payment\Entities\Payment;
use Modules\User\Entities\User;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','cart_number'];

    protected static function newFactory()
    {
        return CartFactory::new();
    }

    public function user()
    {

        return $this->belongsTo(User::class);

    }
}
