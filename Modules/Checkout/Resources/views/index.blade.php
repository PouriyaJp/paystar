@extends('checkout::layouts.master')

@section('content')
    <section class="row col-md-12 p-5">

            <section class="col-6 border-bottom mb-2 py-2">
                <section class="field-title">نام</section>
                <section type="text" class="field-value overflow-auto">{{ $cart->user->first_name }}</section>
            </section>

            <section class="col-6 border-bottom my-2 py-2">
                <section class="field-title">نام خانوادگی</section>
                <section class="field-value overflow-auto">{{ $cart->user->last_name }}</section>
            </section>

            <section class="col-6 border-bottom my-2 py-2">
                <section class="field-title">شماره تلفن همراه</section>
                <section class="field-value overflow-auto">{{ $cart->user->mobile }}</section>
            </section>

            <section class="col-6 border-bottom my-2 py-2">
                <section class="field-title">ایمیل</section>
                <section class="field-value overflow-auto">{{ $cart->user->email }}</section>
            </section>

            <section class="col-6 border-bottom  my-2 py-2">
                <section class="field-title">شماره کارت</section>
                <section class="field-value overflow-auto">{{ $cart->cart_number }}</section>
            </section>

            <section class="col-6 border-bottom  my-2 py-2">
                <section class="field-title">محصول</section>
                <section class="field-value overflow-auto">{{ $orders->product->name }}</section>
            </section>

            <section class="col-6 border-bottom  my-2 py-2">
                <section class="field-title">قیمت</section>
                <section class="field-value overflow-auto">{{ $orders->order_final_amount }}</section>
            </section>


            <section><a class="btn btn-primary" href="{{ route('checkout.payment') }}">پرداخت</a></section>

    </section>
@endsection
