<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Order\Repositories\Interfaces\OrderRepositoryInterface;
use Modules\Product\Entities\Product;
use Modules\Product\Repositories\Interfaces\ProductRepositoryInterface;
use Modules\User\Repositories\Interfaces\UserRepositoryInterface;

class OrderController extends Controller
{

    public function __construct(OrderRepositoryInterface $orderRepository,UserRepositoryInterface $userRepository, ProductRepositoryInterface $productRepository)
    {
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {

        // page for show information order

        $orders = $this->orderRepository->allOrder();
        if (!empty($orders->id) && $orders->deleted_at == null){

            return view('order::index', compact('orders'));

        }else {
            return redirect()->back();
        }

    }

    public function store(Product $product)
    {

        $user = Auth::user()->id;
        $products = $product->id;
        $amount = $product->price;

        $result = $this->orderRepository->storeOrder([
            'user_id' => $user,
            'product_id' => $products,
            'order_final_amount' => $amount,
            'order_status' => 1
        ]);

        return redirect()->back();
    }

}
