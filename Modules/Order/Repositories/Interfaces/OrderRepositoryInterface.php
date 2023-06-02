<?php

namespace Modules\Order\Repositories\Interfaces;

Interface OrderRepositoryInterface{

    public function allOrder();
    public function storeOrder($data);
    public function updateOrder($data);
    public function destroyOrder($id);
}
