@extends('layouts.dash')
@section('dashcontent')
    @if (session('add'))
        {{ session('add') }}
    @endif
    <div class="container-scroller ">
        @include('dashboard.temp.nav')
        <div class="container-fluid page-body-wrapper">
            @include('dashboard.temp.headnav')

            <div class="main-panel m-auto">
                <div class="row">
                    <div class="col-lg-10 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body ">
                                <h4 class="card-title">Products Table</h4>
                                {{-- <a href="{{ route('create_item_nav') }}  " class="btn btn-primary  ">Add Item</a> --}}

                                <div class="table">
                                    <table class="table">
                                        <thead>

                                            <tr>
                                                <th>Product ID</th>
                                                <th>Product Name</th>
                                                <th>Product Price</th>
                                                <th>Product image</th>
                                                <th>Created_at</th>
                                                <th>Updated_at</th>
                                                <th>Operation</th>
                                            </tr>



                                        </thead>
                                        <tbody>

                                            <tr>

                                                <td>
                                                    {{ $product[0]->product_id }} </td>
                                                <td>{{ $product[0]->product_name }}</td>
                                                <td>{{ $product[0]->product_price }}</td>
                                                <td>
                                                    <img src="{{ asset('assets/images/' . $product[0]->product_image) }}"
                                                        alt="image" height="180px" width="180px">
                                                </td>
                                                <td>{{ $product[0]->created_at }}</td>
                                                <td>{{ $product[0]->updated_at }}</td>

                                                <td>
                                                    <a href="{{ route('delete_product', [
                                                        'product_id' => $product[0]->product_id,
                                                    ]) }}"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('update_item',
                                                    [
                                                      'id'=>   $product[0]->product_id,
                                                
                                                    ]) }}" class="btn btn-primary">  Update</a>
                                                </td>

                                            </tr>




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
