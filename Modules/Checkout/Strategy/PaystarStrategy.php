<?php

namespace Modules\Checkout\Strategy;

use Illuminate\Support\Facades\Config;
use Modules\Checkout\Strategy\Interfaces\PaymentStrategyInterfaces;

class PaystarStrategy implements PaymentStrategyInterfaces
{

    public function pay($user, $order, $cart, $payment, $type): string
    {

        if ($type == 1){
            $gateway = Config::get('paystar.Authorization');
            $amount = $order->order_final_amount;
            $orderId = $order->id;
            $callback = route('paystar.callback');
            $key = Config::get('paystar.key');
            $card_number = (string)$cart->cart_number;
            $signAlgorithm = $amount . '#' . $orderId . '#' . $callback;
            $sign = hash_hmac('sha512', $signAlgorithm, $key);

            $data = array(
                "amount" => $amount,
                "order_id" => $orderId,
                "callback" => $callback,
                "sign"=> $sign,
                "card_number"=> $card_number,
                "callback_method"=> 1
            );

            $dataSecret = array(
                "Authorization: Bearer " . $gateway,
                "Content-Type: application/json",
            );

            $jasonData = json_encode($data);

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://core.paystar.ir/api/pardakht/create',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $jasonData,
                CURLOPT_HTTPHEADER => $dataSecret,
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            return $response;

        } else if ($type == 2){

            $gateway = Config::get('paystar.Authorization');
            $callback = route('paystar.verify');
            $amount = $payment->amount;
            $ref_num = $payment->ref_num;
            $card_number = (string)json_decode($payment->bank_first_response)->card_number;;
            $tracking_code = (string)json_decode($payment->bank_first_response)->tracking_code;
            $key = Config::get('paystar.key');
            $signAlgorithm = $amount . '#' . $ref_num . '#' . $card_number . '#' . $tracking_code;
            $sign = hash_hmac('sha512', $signAlgorithm, $key);

            $data = array(
                "ref_num" => $ref_num,
                "amount" => $amount,
                "sign"=> $sign,
                "callback"=> $callback,
            );

            $dataSecret = array(
                "Authorization: Bearer " . $gateway,
                "Content-Type: application/json",
            );

            $jasonData = json_encode($data);

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://core.paystar.ir/api/pardakht/verify',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $jasonData,
                CURLOPT_HTTPHEADER => $dataSecret,
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            return $response;

        }

        return true;
    }

}
