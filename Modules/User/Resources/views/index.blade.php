@extends('user::layouts.master')

@section('content')

    @auth()

        <section class="row col-md-12 p-5">
            <section class="col-6 border-bottom mb-2 py-2">
                <section class="field-title">نام</section>
                <section type="text" class="field-value overflow-auto">{{ $user->first_name }}</section>
            </section>

            <section class="col-6 border-bottom my-2 py-2">
                <section class="field-title">نام خانوادگی</section>
                <section class="field-value overflow-auto">{{ $user->last_name }}</section>
            </section>

            <section class="col-6 border-bottom my-2 py-2">
                <section class="field-title">شماره تلفن همراه</section>
                <section class="field-value overflow-auto">{{ $user->mobile }}</section>
            </section>

            <section class="col-6 border-bottom my-2 py-2">
                <section class="field-title">ایمیل</section>
                <section class="field-value overflow-auto">{{ $user->email }}</section>
            </section>

            <section class="col-6 my-2 py-2">
                <section class="field-title">کد ملی</section>
                <section class="field-value overflow-auto">{{ $user->national_code }}</section>
            </section>


            <section><a class="btn btn-primary" href="{{ route('index') }}">بازگشت</a></section>

        </section>
    @endauth

    @guest()

        <section class="col-md-10">
            <section class="container-md">
                <section class="row">
                    <section class="col">

                        <section style="margin-top: 35vh">
                            <section class="content-header">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title">
                                        <span>ساخت کاربر و ورود به صفحه</span>
                                    </h2>
                                </section>
                            </section>

                            <section class="content">
                                <form action="{{ route('user.store') }}">
                                    <p class="text-dark">
                                        با کلیک کردن بر روی دکمه زیر یک کاربر ساخته میشود، و به صفحه بعد منتقل میشوید .
                                    </p>
                                    <button type="submit" class="btn btn-primary">ساخت کاربر</button>
                                </form>

                            </section>
                        </section>

                    </section>
                </section>
            </section>
        </section>

    @endguest

@endsection
