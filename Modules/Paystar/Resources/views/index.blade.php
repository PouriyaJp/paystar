@extends('paystar::layouts.master')

@section('content')

    <section class="row col-md-12 p-5">

        @if(!empty($statusMessages))

            <section class="col-12 border-bottom d-flex justify-content-between mb-2" style="margin-top: 35vh">
                <section class="field-title">وضعیت</section>
                <section type="text" class="field-value overflow-auto">{{ $statusMessages }}</section>
            </section>

        @else

            <form id="payment-form" action="{{ route('paystar.verify', [$card_number, $tracking_code, $transaction_id]) }}" method="post">
                @csrf

                <header class="field-title">وضعیت</header>
                <section type="text" class="field-value overflow-auto">تراکنش موفق</section>

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
                    <section class="field-value overflow-auto">{{ $card_number }}</section>
                </section>

                <section class="col-6 border-bottom  my-2 py-2">
                    <section class="field-title">کد رهگیری بانکی</section>
                    <section class="field-value overflow-auto">{{ $tracking_code }}</section>
                </section>

                <section class="col-6 border-bottom  my-2 py-2">
                    <section class="field-title">محصول</section>
                    <section class="field-value overflow-auto">{{ $orders->product->name }}</section>
                </section>

                <section class="col-6 border-bottom  my-2 py-2">
                    <section class="field-title">قیمت</section>
                    <section class="field-value overflow-auto">{{ $orders->order_final_amount }}</section>
                </section>


                <section><button class="btn btn-primary" type="submit">تاییدیه پرداخت</button></section>
            </form>

            <div class="countdown-container bg-light rounded p-3 col-md-4">
                <div class="countdown-content d-flex align-items-center">
                    <span id="countdown-number" class="countdown-number display-4 font-weight-bold">10</span>
                    <span class="countdown-label h5 text-secondary">ثانیه</span>
                </div>
            </div>


        @endif

    </section>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var countdown = 10; // زمان شمارش معکوس به ثانیه

            var countdownInterval = setInterval(function() {
                countdown--;
                if (countdown === 0) {
                    clearInterval(countdownInterval);
                    $('#payment-form').submit(); // ارسال فرم
                }

                $('#countdown-number').text(countdown); // نمایش شمارنده به کاربر
            }, 1000);
        });
    </script>
@endsection
