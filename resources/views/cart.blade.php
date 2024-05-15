@extends('layouts.app')
@section('content')
    @include('temp.navbar')




    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Cart</h1>
                    </div>
                </div>
                <div class="col-lg-7">

                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->



    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table class="table">
                            <thead>

                                @if ($order->count() > 0)
                                    <tr>
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        {{-- <th class="product-quantity">Quantity</th> --}}
                                        {{-- <th class="product-total">Total</th> --}}
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                @else
                                    <h1>
                                        {{ 'your cart is empty' }}

                                    </h1>
                                @endif

                            </thead>
                            <tbody>
                                @php
                                    $order_total_price = 0;

                                @endphp

                                @foreach ($order as $order)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="{{ asset('assets/images/' . $order->order_image) }}" alt="image"
                                                class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black">{{ $order->order_name }}</h2>
                                        </td>
                                        <td>${{ $order->order_price }}</td>
                                        @php
                                            $order_total_price = $order_total_price + $order->order_price;
                                        @endphp
                                        {{-- <td>
                                            <div class="input-group mb-3 d-flex align-items-center quantity-container"
                                                style="max-width: 120px;">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-black decrease"
                                                        type="button">&minus;</button>
                                                </div>
                                                <input type="text" class="form-control text-center quantity-amount"
                                                    value="1" placeholder=""
                                                    aria-label="Example text with button addon"
                                                    aria-describedby="button-addon1">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-black increase"
                                                        type="button">&plus;</button>
                                                </div>
                                            </div>

                                        </td> --}}
                                        {{-- <td>${{ $order->order_price }}</td> --}}
                                        <td><a href="{{ route('delete_item', [
                                            'order_id' => $order->order_id,
                                        ]) }}"
                                                class="btn btn-black btn-sm">delete</a></td>
                                    </tr>
                                @endforeach
                                <span class="icon-cross">
                                    <img src="{{ asset('images/cross.svg') }}" class="img-fluid">
                                </span>

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <a href="{{route('back_to_shop')}}" class="btn btn-outline-black btn-sm btn-block">Continue
                                Shopping</a>
                        </div>



                        <div class="col-md-6 mb-3 mb-md-0">
                            <a href="{{ route('delete_item_all') }}" class="btn btn-black btn-sm btn-block">Empty Cart</a>
                        </div>




                    </div>


                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                </div>
                            </div>

                            <h1>

                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <span class="text-black">Total</span>
                                    </div>
                                    <div class="col-md-6 text-right">

                                        <strong class="text-black">${{ $order_total_price }}</strong>


                                    </div>
                                </div>
                            </h1>


                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-black btn-lg py-3 btn-block"
                                        href="{{ route('checkout', [
                                            'order_total_price' => $order_total_price,
                                        ]) }}">
                                        Proceed
                                        To Checkout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('temp.footer')
@endsection
