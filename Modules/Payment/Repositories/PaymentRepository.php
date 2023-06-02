<?php

namespace Modules\Payment\Repositories;

use Modules\Payment\Entities\Payment;
use Modules\Payment\Repositories\Interfaces\PaymentRepositoryInterface;

class PaymentRepository implements PaymentRepositoryInterface
{

    public function allPayment()
    {
        return Payment::orderByDesc('id')->whereNotNull('id')->first();
    }

    public function storePayment($data)
    {
        return Payment::create($data);
    }
    public function updatePayment($data)
    {
        $payment = Payment::find($data['id']);
        $payment->update($data);
        return $payment;
    }


}
