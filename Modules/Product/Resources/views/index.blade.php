@extends('product::layouts.master')

@section('content')
    <!-- start cart -->

    @auth()
        @if(!empty($product->id))
            <section class="mb-4">
                <section class="container-xxl" >
                    <section class="row">
                        <section class="col">
                            <!-- start vontent header -->
                            <section class="content-header">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title">
                                        <span>{{ $product->name }}</span>
                                    </h2>
                                    <section class="content-header-link">
                                        <!--<a href="#">مشاهده همه</a>-->
                                    </section>
                                    <section><a class="btn btn-primary" href="{{ route('user.index') }}"><i class="fa fa-user-circle"></i>پروفایل کاربری</a></section>
                                    <section class="header-cart d-inline ps-3 border-start position-relative">
                                        <a class="btn btn-link position-relative text-dark header-cart-link" href="{{ route('order.index') }}">
                                            <i class="fa fa-shopping-cart"></i> <span style="top: 80%;" class="position-absolute start-0 translate-middle badge rounded-pill"></span>
                                        </a>
                                    </section>
                                </section>
                            </section>



                            <section class="row mt-4">

                                <!-- start product info -->
                                <section class="col-md-7">

                                    <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                        <section class="col-md-4">
                                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">
                                                <section class="product-gallery">
                                                    <section class="product-gallery-selected-image mb-3">
                                                        <img src="{{ $product->image }}" alt="">
                                                    </section>
                                                </section>
                                            </section>
                                        </section>
                                        <!-- start vontent header -->
                                        <section class="content-header mb-3">
                                            <section class="d-flex justify-content-between align-items-center">
                                                <h2 class="content-header-title content-header-title-small">
                                                    {{ $product->name }}
                                                </h2>
                                                <section class="content-header-link">
                                                    <!--<a href="#">مشاهده همه</a>-->
                                                </section>
                                            </section>
                                        </section>
                                        <section class="product-info">
                                            <p class="mb-3 mt-5">
                                                <i class="fa fa-info-circle me-1"></i>{{ $product->introduction }}
                                            </p>
                                        </section>
                                    </section>

                                </section>
                                <!-- end product info -->

                                <section class="col-md-3">
                                    <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">

                                        <form action="{{ route('order.store', $product) }}" method="post">
                                            @csrf
                                            <section name="price" class="d-flex justify-content-between align-items-center">
                                                <p class="text-muted">قیمت کالا</p>
                                                <p class="text-muted"  id="{{ $product->id }}">{{ $product->price }} <span class="small">ریال</span></p>
                                            </section>

                                            <section class="border-bottom mb-3"></section>

                                            <section class="">
                                                <button type="submit" id="next-level" class="btn btn-danger d-block">افزودن به سبد خرید</button>
                                            </section>
                                        </form>

                                    </section>
                                </section>
                            </section>
                        </section>
                    </section>

                </section>
            </section>
        @else
            <section class="col-md-10">
                <section class="container-md">
                    <section class="row">
                        <section class="col">

                            <section style="margin-top: 35vh">
                                <section class="content-header">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title">
                                            <span>ساخت محصول </span>
                                        </h2>
                                    </section>
                                </section>

                                <section class="content">
                                    <form action="{{ route('product.store') }}">
                                        <p class="text-dark">
                                            با کلیک کردن بر روی دکمه زیر یک محصول ساخته میشود، و به صفحه بعد منتقل میشوید .
                                        </p>
                                        <button type="submit" class="btn btn-primary">ساخت محصول</button>
                                    </form>

                                </section>
                            </section>

                        </section>
                    </section>
                </section>
            </section>
        @endif
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

    <!-- end cart -->
@endsection
