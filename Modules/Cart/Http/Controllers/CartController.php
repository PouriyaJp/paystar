<?php

namespace Modules\Cart\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cart\Http\Requests\CartRequest;
use Modules\Cart\Repositories\Interfaces\CartRepositoryInterface;
use Modules\User\Repositories\Interfaces\UserRepositoryInterface;

class CartController extends Controller
{

    public function __construct(UserRepositoryInterface $userRepository, CartRepositoryInterface $cartRepository)
    {
        $this->userRepository = $userRepository;
        $this->cartRepository = $cartRepository;
    }

    public function index()
    {

        $cart = $this->cartRepository->allCart();

        //check card_number
        if (empty($cart->id)){
            return view('cart::index');
        } else {
            return redirect()->route('checkout.index');
        }


    }

    public function store(CartRequest $request)
    {

        $user = $this->userRepository->allUser()->first();
        $cart = $this->cartRepository->storeCart([
            'user_id' => $user->id,
            'cart_number' => (int)$request->cart_number
        ]);

        return redirect()->route('checkout.index');

    }

}
