<?php

namespace Modules\User\Repositories;

use Modules\Product\Entities\Product;
use Modules\Product\Repositories\Interfaces\ProductRepositoryInterface;
use Modules\User\Entities\User;
use Modules\User\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    public function allUser()
    {
        return User::whereNotNull('id')->first();
    }

}
