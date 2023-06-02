<?php

namespace Modules\Checkout\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Modules\Cart\Repositories\Interfaces\CartRepositoryInterface;
use Modules\Checkout\Strategy\PaystarStrategyContext;
use Modules\Order\Repositories\Interfaces\OrderRepositoryInterface;
use Modules\Payment\Repositories\Interfaces\PaymentRepositoryInterface;
use Modules\Product\Repositories\Interfaces\ProductRepositoryInterface;
use Modules\User\Repositories\Interfaces\UserRepositoryInterface;
use Sunra\PhpSimple\HtmlDomParser;

class CheckoutController extends Controller
{

    public function __construct(UserRepositoryInterface $userRepository, ProductRepositoryInterface $productRepository, OrderRepositoryInterface $orderRepository, CartRepositoryInterface $cartRepository, PaymentRepositoryInterface $paymentRepository)
    {
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
        $this->cartRepository = $cartRepository;
        $this->paymentRepository = $paymentRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {

        $cart = $this->cartRepository->allCart();
        $orders = $this->orderRepository->allOrder();

        // check checkout page for creat transaction
        if (!empty($cart->id) && $orders != null){
            return view('checkout::index', compact('orders', 'cart'));
        } else {
            return redirect()->route('index');
        }

    }

    public function gateway()
    {

        //send necessary information to strategy pattern (pay star)

        $user = $this->userRepository->allUser();
        $order = $this->orderRepository->allOrder();
        $cart = $this->cartRepository->allCart();
        $payment = $this->paymentRepository->allPayment();
        $type = 1;
        $paymentStrategyContext = new PaystarStrategyContext('paystar');
        $paymentResult = $paymentStrategyContext->pay($user, $order, $cart, $payment, $type); // call strategy pattern:location Modules\Checkout\Strategy

        $response = json_decode($paymentResult, true);
        $token = $response['data']['token']; // Token received from pay star

        // store ref_num received from pay star in database with repository pattern
        $payment = $this->paymentRepository->storePayment([
            'ref_num' => $response['data']['ref_num'],
        ]);

        // check response status
        if ($response['status'] == 1){

            $result = Http::withToken($token)->post('https://core.paystar.ir/api/pardakht/payment', ['token' => $token]);
            $html = $result->body();

            return view('checkout::gateway', compact('html'));
        } else{
            return redirect()->back();
        }

    }
}
