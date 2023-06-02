@extends('order::layouts.master')

@section('content')
    <section class="d-flex justify-content-center position-relative" style="margin-top: 35vh">
        <section class="col-md-8">

                <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                    <section class="product-image">
                        <img class="" src="{{ $orders->product->image }}" alt="">
                    </section>
                    <section class="d-flex justify-content-between align-items-center">
                        <p class="text-muted">قیمت کالا </p>
                        <p class="text-muted">{{ $orders->order_final_amount }} ریال</p>
                    </section>

                    <p class="my-3">
                        <i class="fa fa-info-circle me-1"></i>کاربر گرامی  خرید شما هنوز نهایی نشده است. برای ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه ارسال را انتخاب کنید. نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد. و در نهایت پرداخت این سفارش صورت میگیرد.
                    </p>


                    <section class="">
                        <a href="{{ route('cart.index') }}" class="btn btn-danger d-block">تکمیل فرآیند خرید</a>
                    </section>

                </section>

        </section>
    </section>
@endsection
