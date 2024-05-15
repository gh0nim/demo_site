@extends('layouts.dash')
@section('dashcontent')
    <div class="container-scroller ">
        @include('dashboard.temp.nav')
        <div class="container-fluid page-body-wrapper">
            @include('dashboard.temp.headnav')

            <div class="main-panel m-auto">
                <div class="row">
                    <div class="col-lg-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body ">


                                @php
                                    $total_cost = 0;

                                @endphp
                                <div class="table">
                                    <table class="table">
                                        <thead>
                                            @if ($order->count() > 0)
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>Order Name</th>
                                                    <th>Order Price</th>
                                                    <th>Order image</th>
                                                    <th>Created_at</th>
                                                    <th>Ordered_by</th>
                                                </tr>
                                            @endif
                                        </thead>
                                        <tbody>

                                            @foreach ($order as $order)
                                                <tr>
                                                    <td>{{ $order->order_id }}</td>
                                                    <td>{{ $order->order_name }}</td>
                                                    <td>{{ $order->order_price }}</td>
                                                    <td>

                                                        <img src=" {{ asset('assets/images/' . $order->order_image) }} "
                                                            alt="image" height="250px" width="250px">
                                                    </td>
                                                    <td>{{ $order->created_at }}</td>
                                                    <td>{{ $order->updated_at }}</td>


                                                    <td>
                                                        {{ $order->bill_forms->first_name }}
                                                    </td>



                                                </tr>
                                                @php
                                                    $total_cost = $total_cost + $order->order_price;
                                                @endphp
                                            @endforeach
                                            <h4 class="card-title">Orders Table,, <span>Total
                                                    cost:{{ $total_cost }}</span>
                                            </h4>



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
