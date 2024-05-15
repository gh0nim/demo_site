@extends('layouts.dash')
@section('dashcontent')
    <div class="container-scroller">

        @include('dashboard.temp.nav')
        <div class="container-fluid page-body-wrapper">
            @include('dashboard.temp.headnav')
            <div class="main-panel">
                <a href="{{ route('home') }}">my_website</a>
                <div class="row">
                    <div class="col-md-6 grid-margin m-auto py-5 ">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add items</h4>

                                <form class="forms-sample" method="POST" enctype="multipart/form-data"
                                    action="{{ route('update_store', [
                                        'id' => $product[0]->product_id,
                                        'img' => $product[0]->product_image,
                                    ]) }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Product ID</label>
                                        <input name="product_id" type="number" class="form-control"
                                            value="{{ $product[0]->product_id }}" id="exampleInputUsername1" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Name</label>
                                        <input type="text" name="product_name" class="form-control"
                                            value="{{ $product[0]->product_name }}" id="exampleInputEmail1" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Product Price</label>
                                        <input type="number" class="form-control" id="exampleInputPassword1"
                                            value="{{ $product[0]->product_price }}" name="product_price" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputConfirmPassword1">Product Image</label>
                                        <input type="file" class="form-control" id="exampleInputConfirmPassword1"
                                            value="{{ $product[0]->product_image }}" name="product_image" />
                                    </div>

                                    <button type="submit" class="btn btn-primary mr-2">
                                        Update
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->

                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection
