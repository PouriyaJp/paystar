<?php

namespace Modules\Payment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Payment\Database\factories\PaymentFactory;
use Modules\User\Entities\User;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function newFactory()
    {
        return PaymentFactory::new();
    }

    public function user()
    {

        return $this->belongsTo(User::class);

    }
}
