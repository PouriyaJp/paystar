<?php

namespace Modules\Checkout\Strategy;

use Modules\Checkout\Strategy\Interfaces\PaymentStrategyInterfaces;

class PaystarStrategyContext
{

    private PaymentStrategyInterfaces $strategyInterfaces;



    public function __construct(string $payment)
    {

        $this->strategyInterfaces = match ($payment) {
            'paystar' => new PaystarStrategy(),
            default => new PaystarStrategy()
        };

    }

    public function pay($user, $order, $cart, $payment, $type)
    {
        return $this->strategyInterfaces->pay($user, $order, $cart, $payment, $type);
    }

}
