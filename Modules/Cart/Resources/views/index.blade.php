@extends('cart::layouts.master')

@section('content')

    <!-- partial:index.partial.html -->

        <div class="cc">

            <h2>شماره کارت بانکی</h2>

            <span class="provider mastercard">MasterCard</span>
            <span class="provider amex">American Express</span>
            <span class="provider visa">Visa</span>

            <form action="{{ route('cart.store') }}" method="post">
                @csrf
            <!-- card number -->
                <div class="creditcart col-md-12">
                    <img width="32px" src="https://shaba.smohammadabedy.ir/bank-iran/no-img.png">
                    <input name="cart_number" type="text" class="creditcart-input col-md-12" maxlength="16" style="direction:ltr" placeholder="شماره کارت را وارد کنید">
                </div>
            <section class="d-flex justify-content-end my-4">
                <button class="btn btn-link btn-sm text-info text-decoration-none mx-1" type="submit">ارسال</button>
            </section>
            </form>
        </div>

    <!-- partial -->
@endsection
