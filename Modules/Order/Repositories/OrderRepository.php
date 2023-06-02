<?php

namespace Modules\Order\Repositories;

use Modules\Order\Entities\Order;
use Modules\Order\Repositories\Interfaces\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{

    public function allOrder()
    {
        return Order::with('product', 'user')->first();
    }

    public function storeOrder($data)
    {
        return Order::create($data);
    }

    public function updateOrder($data)
    {
        $order = Order::find($data['id']);
        $order->update($data);
        return $order;
    }

    public function destroyOrder($id)
    {
        return Order::destroy($id);
    }
}
