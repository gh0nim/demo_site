@extends('layouts.app')
@section('content')
    @include('temp.navbar')
    <!-- Start Hero Section -->



    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Shop

                            <h2>Select your cart items</h2>

                        </h1>
                    </div>
                </div>
                <div class="col-lg-7">

                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->


    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">
                <h1>
                    @php
                        $client_id = DB::table('bill_forms')->where('email', $request)->select('id')->get();
                    @endphp
                    @foreach ($client_id as $item)
                        @php

                            $wanted_client_id = $item->id;

                        @endphp
                    @endforeach


                </h1>
                <!-- Start Column 1 -->
                @foreach ($product as $product)
                    <div class="col-12 col-md-4 col-lg-3 mb-5">
                        <a class="product-item"
                            href="{{ route('cart', [
                                'product_id' => $product->product_id,
                                'product_name' => $product->product_name,
                                'product_price' => $product->product_price,
                                'product_image' => $product->product_image,
                                'client_id' => $wanted_client_id,
                            ]) }}">
                            <img height="250px" width="250px" src="{{ asset('assets/images/' . $product->product_image) }}"
                                class="img-fluid product-thumbnail">
                            <h3 class="product-title"> {{ $product->product_name }}</h3>
                            <strong class="product-price">${{ $product->product_price }}</strong>

                            <span class="icon-cross">
                                <img src="images/cross.svg" class="img-fluid">
                            </span>
                        </a>
                    </div>
                @endforeach
                <!-- End Column 1 -->

            </div>
        </div>
    </div>
    @include('temp.footer')
@endsection
