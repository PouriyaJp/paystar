<?php

namespace Modules\Checkout\Strategy\Interfaces;

interface PaymentStrategyInterfaces
{

    public function pay($user, $order, $cart, $payment, $type): string;

}
