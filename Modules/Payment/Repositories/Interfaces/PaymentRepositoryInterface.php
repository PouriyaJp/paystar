<?php

namespace Modules\Payment\Repositories\Interfaces;

Interface PaymentRepositoryInterface{

    public function allPayment();
    public function storePayment($data);
    public function updatePayment($data);

}
