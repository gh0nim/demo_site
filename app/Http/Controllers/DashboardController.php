<?php

namespace App\Http\Controllers;

use App\BillForm;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('dashboard.dashbord');
    }


    public function show_item($id)
    {

        return view(
            'dashboard.show_item',
            [

                'product' => DB::table('products')->where('product_id', $id)->select("*")->get()
            ]
        );
    }


    public function create_item(Request $request)
    {
        $request->validate(
            [
                'product_id' => 'unique:products',
                'product_name' => 'required',
                'product_price' => 'required',
                'product_image' => 'required|file'

            ]
        );
        $image_name = "";
        $trimed_image = "";
        if ($request->hasFile('product_image')) {
            $image = $request->product_image;
            $image_name =  $request->product_id . "-" . $request->product_name . "." . $image->extension();
            $new_image =   $image->move(public_path('assets/images'), $image_name);
            $trimed_image = substr_replace($new_image, $image_name, 0);
        }
        DB::table('products')->insert(
            array(
                'product_id' => $request->product_id,
                'product_name' => $request->product_name,
                'product_price' => $request->product_price,
                'product_image' => $trimed_image,
                'created_at' => now()
            )
        );

        return redirect('/show_products')->with('add', 'product added successfully');
    }
    public function show_products()
    {
        $product = DB::table('products')->select('*')->get();
        return view(
            'dashboard.products',
            compact('product')
        );
    }
    public function create_item_nav()
    {
        return view('dashboard.dashbord');
    }
    public function show_orders()
    {
        $order = Order::all();
        // $order = DB::table('orders')->select('*')->get();
        return view(
            'dashboard.orders',
            [
                'order' => $order,


            ]
        );
    }
    public function delete_product($product_id)
    {
        DB::table('products')
            ->where('product_id', $product_id)
            ->delete();
        return redirect(route('show_products'));
    }


    public function update_item($id)
    {
        $product =  DB::table('products')
            ->where('product_id', $id)
            ->select('*')
            ->get();
        return view("dashboard.update_item", [
            'product' => $product,


        ]);
    }







    public function update_store(Request $request, $id, $img)
    {

        if ($request->hasFile('product_image')) {

            $image_name = "";
            $trimed_image = "";
            $image = $request->product_image;
            $image_name =  $request->product_id . "-" . $request->product_name . "." . $image->extension();
            $new_image =   $image->move(public_path('assets/images'), $image_name);
            $trimed_image = substr_replace($new_image, $image_name, 0);

            DB::table('products')
                ->where('product_id', $id)
                ->update(
                    array(
                        'product_id' => $request->product_id,
                        'product_name' => $request->product_name,
                        'product_price' => $request->product_price,
                        'product_image' => $trimed_image,
                        'updated_at' => now()
                    )
                );
            return redirect(route('show_products'))->with('update', 'product updated successfully الصورة اتغيرت');
        } else {


            DB::table('products')
                ->where('product_id', $id)
                ->update(
                    array(
                        'product_id' => $request->product_id,
                        'product_name' => $request->product_name,
                        'product_price' => $request->product_price,
                        'product_image' => $img,
                        'updated_at' => now()
                    )
                );
            return redirect(route('show_products'))->with('update', 'product updated successfully الصورة زى ما هى');
        }
    }
    public function delete_all()
    {
        DB::table('products')->select('*')->delete();
        return redirect(route('show_products'))->with('delete all', 'aAll products deleted successfully');
    }
}
