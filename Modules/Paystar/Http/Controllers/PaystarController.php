<?php

namespace Modules\Paystar\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cart\Repositories\Interfaces\CartRepositoryInterface;
use Modules\Checkout\Strategy\PaystarStrategyContext;
use Modules\Order\Repositories\Interfaces\OrderRepositoryInterface;
use Modules\Payment\Repositories\Interfaces\PaymentRepositoryInterface;
use Modules\User\Repositories\Interfaces\UserRepositoryInterface;

class PaystarController extends Controller
{

    public function __construct(UserRepositoryInterface $userRepository , OrderRepositoryInterface $orderRepository, CartRepositoryInterface $cartRepository, PaymentRepositoryInterface $paymentRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->cartRepository = $cartRepository;
        $this->paymentRepository = $paymentRepository;
        $this->userRepository = $userRepository;
    }

    public function callback(Request $request)
    {

        // This Method For Verify Payment

        $query = $request->query;

        $bankFirstResponse = array(
            'status' => $query->get('status'),
            'ref_num' => $query->get('ref_num'),
            'order_id' => $query->get('order_id'),
            'tracking_code' => $query->get('tracking_code'),
            'card_number' => $query->get('card_number'),
            'transaction_id' => $query->get('transaction_id'),
        );
        $data = json_encode($bankFirstResponse);

        $paymentId = $this->paymentRepository->allPayment();
        $orders = $this->orderRepository->allOrder();
        $user = $this->userRepository->allUser();
        $cart = $this->cartRepository->allCart();

        // update column Payment Table with received information from pay star
        $payment = $this->paymentRepository->updatePayment([
            'id' => $paymentId->id,
            'amount' => $orders->order_final_amount,
            'user_id' => $user->id,
            'cart_id' => $cart->id,
            'bank_first_response' => $data
        ]);

        // check response status
        $code = $query->get('status');

        $statusMessages = [
            -1 => "درخواست نامعتبر",
            -2 => "درگاه فعال نیست",
            -3 => "توکن تکراری",
            -4 => "مبلغ بیشتر از سقف مجاز درگاه است",
            -5 => "شناسه ref_num معتبر نیست",
            -6 => "تراکنش قبلا وریفای شده است",
            -7 => "پارامترهای ارسال شده نامعتبر است",
            -8 => "تراکنش را نمیتوان وریفای کرد",
            -9 => "تراکنش وریفای نشد",
            -98 => "تراکنش ناموفق",
            -99 => "خطای سامانه",
        ];

        $cart = $this->cartRepository->allCart();
        $orders = $this->orderRepository->allOrder();

        if ($request->query('status') == 1){
            $card_number = $request->query('card_number');
            $tracking_code = $request->query('tracking_code');
            $transaction_id = $request->query('transaction_id');

            return view('paystar::index', compact('card_number', 'tracking_code', 'transaction_id', 'cart', 'orders'));
        } else if (isset($statusMessages[$code])) {
            $statusMessages = $statusMessages[$code];
            return view('paystar::index', compact('statusMessages'));
        } else {
            return "وضعیت مشخص شده معتبر نیست";
        }


    }

    public function verify()
    {

        // This Method For Show Received Response Pay star Gateway

        $user = $this->userRepository->allUser();
        $order = $this->orderRepository->allOrder();
        $cart = $this->cartRepository->allCart();
        $payment = $this->paymentRepository->allPayment();
        $type = 2;
        $paymentStrategyContext = new PaystarStrategyContext('paystar');
        $paymentResult = $paymentStrategyContext->pay($user, $order, $cart, $payment, $type);

        $jsonCode = json_decode($paymentResult, true);

        // update Payment Table
        $paymentUpdate = $this->paymentRepository->updatePayment([
            'id' => $payment->id,
            'status' => 1,
            'bank_second_response' => $jsonCode
        ]);

        $code = $jsonCode['status'];

        // last update Order Table
        if ($code == 1 && $order->payment_id == null){
            $lastUpdateOrder = $this->orderRepository->updateOrder([
                'id' => $order->id,
                'payment_id' => $payment->id,
                'payment_object' => 'ok',
                'payment_status' => 1
            ]);
        }

        // IF Payment is Successfully SoftDelete Order Record
        $deleteOrder = $this->orderRepository->destroyOrder($order->id);

        //check response status
        $statusMessages = [
            1 => "پرداخت با موفقیت انجام شد",
            -1 => "درخواست نامعتبر",
            -2 => "درگاه فعال نیست",
            -3 => "توکن تکراری",
            -4 => "مبلغ بیشتر از سقف مجاز درگاه است",
            -5 => "شناسه ref_num معتبر نیست",
            -6 => "تراکنش قبلا وریفای شده است",
            -7 => "پارامترهای ارسال شده نامعتبر است",
            -8 => "تراکنش را نمیتوان وریفای کرد",
            -9 => "تراکنش وریفای نشد",
            -98 => "تراکنش ناموفق",
            -99 => "خطای سامانه",
        ];

        if (isset($statusMessages[$code])) {
            $statusMessages = $statusMessages[$code];
            return view('paystar::paystar', compact('statusMessages', 'cart', 'order', 'payment'));
        } else {
            return "وضعیت مشخص شده معتبر نیست";
        }

    }

}
