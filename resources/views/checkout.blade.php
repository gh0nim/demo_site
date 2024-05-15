@extends('layouts.app')
@section('content')
    @include('temp.navbar')

    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Checkout</h1>
                    </div>
                </div>
                <div class="col-lg-7">

                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <div class="untree_co-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    {{-- <div class="border p-4 rounded" role="alert">
		            Returning customer? <a href="#">Click here</a> to login
		          </div> --}}
                </div>
            </div>

            {{-- fffffffffffffoooooooooooooorrrrrrrrrrrrmmmmmmmmmmm --}}

            <form enctype="multipart/form-data" action="{{ route('thank_you') }}" method="post">
                @csrf
                {{-- <div class="row">
                    <div class="col-md-6 mb-5 mb-md-0">
                        <h2 class="h3 mb-3 text-black">Billing Details</h2>
                        <div class="p-3 p-lg-5 border bg-white">
                            <div class="form-group">
                                <label for="c_country" class="text-black">Country <span class="text-danger">*</span></label>
                                <select id="c_country" class="form-control">
                                    <option value="1">Select a country</option>
                                    <option value="2">Egypt</option>
                                    <option value="3">Algeria</option>
                                    <option value="4">Morocco</option>
                                    <option value="5">Ghana</option>
                                    <option value="6">India</option>
                                    <option value="7">Bahrain</option>
                                    <option value="8">Colombia</option>
                                    <option value="9">USA</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="c_fname" class="text-black">First Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_fname" name="first_name">
                                </div>
                                <div class="col-md-6">
                                    <label for="c_lname" class="text-black">Last Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_lname" name="last_name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_companyname" class="text-black">Company Name </label>
                                    <input type="text" class="form-control" id="c_companyname" name="company_name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_address" class="text-black">Address <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_address" name="address"
                                        placeholder="Street address">
                                </div>
                            </div>



                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="c_email_address" class="text-black">Email Address <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_email_address" name="email">
                                </div>


                            </div>

                            <div class="form-group row mb-5">


                                <div class="col-md-6">
                                    <label for="c_postal_zip" class="text-black">Posta / Zip <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_postal_zip" name="zip">
                                </div>

                                <div class="col-md-6">
                                    <label for="c_phone" class="text-black">Phone <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_phone" name="phone"
                                        placeholder="Phone Number">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="c_create_account" class="text-black" data-bs-toggle="collapse"
                                    href="#create_an_account" role="button" aria-expanded="false"
                                    aria-controls="create_an_account"><input type="checkbox" value="1"
                                        id="c_create_account"> Create an account?</label>
                                <div class="collapse" id="create_an_account">
                                    <div class="py-2 mb-4">
                                        <p class="mb-3">Create an account by entering the information below. If you are a
                                            returning customer please login at the top of the page.</p>
                                        <div class="form-group">
                                            <label for="c_account_password" class="text-black">Account Password</label>
                                            <input type="email" class="form-control" id="c_account_password"
                                                name="password" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="c_ship_different_address" class="text-black" data-bs-toggle="collapse"
                                    href="#ship_different_address" role="button" aria-expanded="false"
                                    aria-controls="ship_different_address"><input type="checkbox" value="1"
                                        id="c_ship_different_address"> Ship To A Different Address?</label>

                            </div>

                            <div class="form-group">
                                <label for="c_order_notes" class="text-black">Order Notes</label>
                                <textarea name="order_notes" id="c_order_notes" cols="30" rows="5" class="form-control"
                                    placeholder="Write your notes here..."></textarea>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="row mb-5">
                            <div class="col-md-12">
                                <h2 class="h3 mb-3 text-black">Coupon Code</h2>
                                <div class="p-3 p-lg-5 border bg-white">

                                    <label for="c_code" class="text-black mb-3">Enter your coupon code if you have
                                        one</label>
                                    <div class="input-group w-75 couponcode-wrap">
                                        <input type="text" class="form-control me-2" id="c_code"
                                            placeholder="Coupon Code" name="cupon_code" aria-label="Coupon Code"
                                            aria-describedby="button-addon2">

                                    </div>

                                </div>
                            </div>
                        </div> --}}

                        <div class="row mb-5">
                            <div class="col-md-12">
                                <h2 class="h3 mb-3 text-black">Your Order</h2>
                                <div class="p-3 p-lg-5 border bg-white">
                                    <table class="table site-block-order-table mb-5">
                                        <thead>
                                            <th>Order</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </thead>
                                        <tbody>

                                            @foreach ($order as $order)
                                                <tr>
                                                    <td>
                                                        <img 
                                                        src="{{ asset('assets/images/' . $order->order_image ) }}"
                                                        alt=""  style="width: 70px;height: 70px;">
                                                        
                                                        </td>
                                                    <td>{{ $order->order_name }} <strong class="mx-2">x</strong> 1</td>
                                                    <td>${{ $order->order_price }}</td>
                                                    
                                                </tr>
                                            @endforeach

                                            <tr>
                                                <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                                <td class="text-black font-weight-bold">
                                                    <strong>${{ $order_total_price }}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="border p-3 mb-3">
                                        <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse"
                                                href="#collapsebank" role="button" aria-expanded="false"
                                                aria-controls="collapsebank">Direct Bank Transfer</a></h3>

                                        <div class="collapse" id="collapsebank">
                                            <div class="py-2">
                                                <p class="mb-0">Make your payment directly into our bank account. Please
                                                    use your Order ID as the payment reference. Your order won’t be shipped
                                                    until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border p-3 mb-3">
                                        <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse"
                                                href="#collapsecheque" role="button" aria-expanded="false"
                                                aria-controls="collapsecheque">Cheque Payment</a></h3>

                                        <div class="collapse" id="collapsecheque">
                                            <div class="py-2">
                                                <p class="mb-0">Make your payment directly into our bank account. Please
                                                    use your Order ID as the payment reference. Your order won’t be shipped
                                                    until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border p-3 mb-5">
                                        <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse"
                                                href="#collapsepaypal" role="button" aria-expanded="false"
                                                aria-controls="collapsepaypal">Paypal</a></h3>

                                        <div class="collapse" id="collapsepaypal">
                                            <div class="py-2">
                                                <p class="mb-0">Make your payment directly into our bank account. Please
                                                    use your Order ID as the payment reference. Your order won’t be shipped
                                                    until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-black btn-lg py-3 btn-block">Place Order</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </form>

        </div>
    </div>


    @include('temp.footer')
@endsection
