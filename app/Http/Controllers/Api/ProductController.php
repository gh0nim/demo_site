<?php

namespace App\Http\Controllers\Api;

use App\BillForm;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function shop(Request $request)    // creating new client
    {
        $validatedData = Validator::make(
            $request->all(),
            [
                'first_name' => 'required|max:30',
                'last_name' => 'required|max:30',
                'email' => 'required|unique:bill_forms|max:50',
                'cupon_code' => 'required|max:10',
                'phone' => 'required|max:30',
                'order_note' => 'max:50'
            ]
        );
        if ($validatedData->fails()) {

            $data = [
                'title' => 'Validation error',
                'status' => 505,
                'response' => $validatedData->errors()
            ];

            return response($data);
        } else {

            $data = [
                'title' => 'user created successfully',
                'status' => 200,
                'response' => new ProductResource(
                    BillForm::create(
                        [
                            'first_name' => $request->first_name,
                            'last_name' => $request->last_name,
                            'phone' => $request->phone,
                            'email' => $request->email,
                            'cupon_code' => $request->cupon_code,
                            'order_notes' => $request->order_notes
                        ]
                    )
                )

            ];
            return response($data);
        }
    }
    public function delete_item(Request $request)
    {
        DB::table('orders')
            ->where('order_id', $request->order_id)
            ->delete();

        $data = [
            'title' => 'order deleted successfully',
            'status' => 200,

        ];
        return response($data);
    }

    public function cart(Request $request)
    {

        $validatedData = Validator::make(
            $request->all(),
            [
                'order_id' => 'required|numeric',
                'order_image' => 'file|required',
                'order_name' => 'required',
                'order_price' => 'required|numeric',
                'client_id' => 'required|numeric',
                'product_id' => 'required|numeric'
            ]
        );
        if ($validatedData->fails()) {

            $data = [
                'title' => 'Validation error',
                'status' => 505,
                'response' => $validatedData->errors()
            ];

            return response($data);
            
        } else {

       



                $data = [
                    'title' => 'order created successfully',
                    'status' => 200,
                    'response' => new OrderResource(
                        Order::create([
                            'order_id' => $request->product_id,
                            'order_name' => $request->product_name,
                            'order_price' => $request->product_price,
                            'order_image' => $request->product_image,
                            'client_id' => $request->client_id,
                            'product_id' => $request->product_id,
                            'created_at' => now()
                        ])
                    )

                ];
                return response($data);
            } 
        
    } 
     public function nav_cart() //deletes all orders in cart
    {
        DB::table('orders')->delete();
        $data = [
            'title' => 'All orders deleted',
            'status' => 200,
            
        ];

        return response($data);
    }
  
}
