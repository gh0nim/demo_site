<?php

namespace App\Http\Controllers;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view(
            'index',
            [
                'product' => Product::all()
            ]
        );
    }

    public function cart($product_id, $product_name, $product_price, $product_image, $client_id)
    {
        if (!DB::table('orders')->where('order_id', $product_id)->exists()) {
            DB::table('orders')->insert(
                array(
                'order_id' => $product_id,
                'order_name' => $product_name,
                'order_price' => $product_price,
                'order_image' => $product_image,
                'client_id' => $client_id,
                'product_id' => $product_id,
                'created_at' => now()
            ));
        }
        $order =  DB::table('orders')->select('*')->get();
        return view(
            'cart',
            [
                'order' => $order
            ]
        );
    }



    
    public function shop(Request $request)
    {
        $validatedData = $request->validate(
            [
                'first_name' => 'required|max:30',
                'last_name' => 'required|max:30',
                'email' => 'required|max:50',
                'cupon_code' => 'required|max:10',
                'phone' => 'required|max:30',
                'order_note' => 'max:50'
            ]
        );
        DB::table('bill_forms')->insert(
            array(
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'cupon_code' => $request->cupon_code,
                'order_notes' => $request->order_notes
            )
        );
        return view(
            'shop',
            [
                'product' => Product::all(),
                'request' => $request->email,
            ]
        );
    }
    public function delete_item($order_id)
    {
        DB::table('orders')
            ->where('order_id', $order_id)
            ->delete();
        $order =  DB::table('orders')->select('*')->get();

        return view(
            'cart',
            [
                'order' => $order
            ]
        );
    }
    public function checkout($order_total_price)
    {
        $order =  DB::table('orders')->select('*')->get();

        return view('checkout', [
            'order_total_price' => $order_total_price,
            'order' => $order,

        ]);
    }
    public function about()
    {
        return view('about');
    }
    public function services()
    {
        return view('services');
    }


    public function nav_cart()
    {
        $order =  DB::table('orders')->select('*')->get();

        return view(
            'cart',
            [
                'order' => $order
            ]
        );
    }


    public function thank_you()
    {
        return view('thank_you');
    }

    public function delete_item_all()
    {
        Order::select('*')->delete();
        return redirect('/nav_cart');
    }



    public function back_to_shop(Request $request)
    {
        return view(
            'shop',
            [
                'product' => Product::all(),
                'request' => $request,
                'wanted_client_id' => 1,
                'client_id' => 1,

            ]
        );
    }
}
