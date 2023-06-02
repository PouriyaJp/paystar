<?php

namespace Modules\Cart\Repositories\Interfaces;

Interface CartRepositoryInterface{

    public function allCart();
    public function storeCart($data);

}
