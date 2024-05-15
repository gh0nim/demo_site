@extends('layouts.dash')
@section('dashcontent')
    <div class="container-scroller ">
        @include('dashboard.temp.nav')
        <div class="container-fluid page-body-wrapper">
            @include('dashboard.temp.headnav')

            <div class="main-panel m-auto">
                <div class="row">
                    <div class="col-lg-10 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body ">

                                <h1>
                                    @if (session('add'))
                                        {{ session('add') }}
                                    @endif
                                    @if (session('update'))
                                        {{ session('update') }}
                                    @endif
                                    @if (session('delete all '))
                                        {{ session('delete all') }}
                                    @endif
                                </h1>

                                <h4 class="card-title">Products Table</h4>
                                <div style="display: flex;justify-content: space-between">
                                    <a href="{{ route('create_item_nav') }}  " class="btn btn-primary  ">Add Item</a>
                                    <a href="{{ route('delete_all') }}  " class="btn btn-danger  ">Delete all</a>

                                </div>
                                <div class="table">

                                    <table class="table">
                                        <thead>
                                            @if ($product->count() > 0)
                                                <tr>
                                                    <th>#</th>
                                                    <th>Product ID</th>
                                                    <th>Product Name</th>
                                                    <th>Product Price</th>
                                                    <th>Product image</th>
                                                    <th>Created_at</th>
                                                    <th>Updated_at</th>
                                                    <th>Operation</th>
                                                </tr>
                                            @else
                                                <h2 class="mt-5">
                                                    {{ 'No products' }}

                                                </h2>
                                            @endif
                                        </thead>
                                        <tbody>

                                            @php
                                                $i = 1;
                                            @endphp
                                            
                                            @foreach ($product as $product)
                                                <tr>
                                                    <td>{{ $i++ }} </td>
                                                    <td>{{ $product->product_id }}</td>
                                                    <td>{{ $product->product_name }}</td>
                                                    <td>{{ $product->product_price }}</td>
                                                    <td>
                                                        <img src="{{ asset('assets/images/' . $product->product_image) }}"
                                                            alt="image" height="300px" width="280px">
                                                    </td>
                                                    <td>{{ $product->created_at }}</td>
                                                    <td>{{ $product->updated_at }}</td>

                                                    <td>
                                                        <a href="{{ route('delete_product', [
                                                            'product_id' => $product->product_id,
                                                        ]) }}"
                                                            class="btn btn-danger">Delete</a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('show_item', $product->product_id) }}"
                                                            class="btn btn-success">
                                                            Show</a>
                                                    </td>

                                                </tr>
                                            @endforeach



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
