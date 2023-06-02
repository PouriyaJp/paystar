<?php

namespace Modules\Cart\Repositories;

use Modules\Cart\Entities\Cart;
use Modules\Cart\Repositories\Interfaces\CartRepositoryInterface;


class CartRepository implements CartRepositoryInterface
{

    public function allCart()
    {
        return Cart::whereNotNull('id')->first();
    }

    public function storeCart($data)
    {
        //dd($data);
        return Cart::create($data);
    }

}
