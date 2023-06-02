<?php

namespace Modules\Product\Repositories;

use Modules\Product\Entities\Product;
use Modules\Product\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{

    public function allProduct()
    {
        return Product::whereNotNull('id')->first();
    }

    public function storeProduct($data)
    {
        return Product::create($data);
    }

}
