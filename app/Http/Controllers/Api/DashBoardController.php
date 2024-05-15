<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DashBoardResource;
use App\Http\Resources\OrderResource;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DashBoardController extends Controller
{
    public function show_item($id)
    {
        $bb = DB::table('products')->where('product_id', $id)->exists();
        if ($bb) {
            $data = [
                'title' => "one product that's id is $id",
                'status' => 200,
                // 'new response' =>new ProductResource(DB::table('products')->where('product_id', $id)->select('*')->first()) ,
                'response' => DashBoardResource::collection(DB::table('products')->where('product_id', $id)->select('*')->get())
            ];

            return response($data);
        } else {
            $data = [
                'title' => 'product not found',
                'status' => 404,
            ];

            return response($data);
        }
    }


    public function show_products()
    {
        $data =
            [
                'title' => 'all products',
                'status' => 200,
                'response' => DashBoardResource::collection(DB::table('products')->get())
            ];

        return response($data);
    }




    public function create_item(Request $request)
    {
        $validatedData =  Validator::make(
            $request->all(),
            [
                'product_id' => 'numeric|unique:products',
                'product_name' => 'required|max:30',
                'product_price' => 'required|numeric|max:9999999999',
                'product_image' => 'required|max:2050',

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




            $image_name = "";
            $trimed_image = "";
            if ($request->hasFile('product_image')) {
                $image = $request->product_image;
                $image_name =  $request->product_id . "-" . $request->product_name . "." . $image->extension();
                $new_image =   $image->move(public_path('assets/images'), $image_name);
                $trimed_image = substr_replace($new_image, $image_name, 0);
            }

            $x = [1, 2, 3];

            $data = [
                'title' => 'create a product',
                'status' => 200,
                'response' => new DashBoardResource(


                    Product::create([
                        'product_id' => $request->product_id,
                        'product_price' => $request->product_price,
                        'product_name' => $request->product_name,
                        'product_image' => $trimed_image,
                        'created_at' => now()
                    ])


                    // لما افتح الداتا بيز بدل المودل بيرجع ريسبونس ل non object


                    // DB::table('products')->insert(                         
                    //     array(
                    //         'product_id' => $request->product_id,
                    //         'product_price' => $request->product_price,
                    //         'product_name' => $request->product_name,
                    //         'product_image' => $trimed_image,
                    //         'created_at' => now()
                    //     )
                    // )



                )
            ];

            return response()->json($data);
        }
    }
    public function delete_product(Request $request)
    {

        $validatedData = Validator::make(
            $request->all(),
            [
                'product_id' => 'numeric|required',

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
            # code...

            $id = $request->product_id;

            if (!DB::table('products')->where('product_id', $id)->exists()) {
                $data = [
                    'title' => 'this product is not exist',
                    'status' => 404,

                ];
                return response($data);
            } else {
                DB::table('products')->where('product_id', $id)->delete();
                $data = [
                    'title' => 'product deleted successfully',
                    'status' => 200,

                ];

                return response($data);
            }
        }
    }

    public function delete_all()
    {
        $counter = Product::all()->count();
        if ($counter > 0) {
            DB::table('products')->select('*')->delete();
            $data = [
                'title' => 'all products deleted successfully',
                'status' => 200,

            ];

            return response($data);
        } else {
            $data = [
                'title' => 'no products to be deleted',
                'status' => 500,

            ];
            return response($data);
        }
    }



    public function show_all_orders()
    {

$result = Order::all();
if ($result->isNotEmpty()) {
    # code...
    $data = [
        'title' => 'all orders ',
        'status' => 200,
        'response' =>  OrderResource::collection(
            $result
        )
    ];
    
    return response($data);
}else{
      # code...
      $data = [
        'title' => 'no orders yet ',
        'status' => 404,
        
    ];
    
    return response($data);
}

    }





    public function update_store(Request $request, $id)
    {


        if (DB::table('products')->where('product_id', $id)->exists()) {


            if ($request->hasFile('product_image')) {

                $image_name = "";
                $trimed_image = "";
                $image = $request->product_image;
                $image_name =  $request->product_id . "-" . $request->product_name . "." . $image->extension();
                $new_image =   $image->move(public_path('assets/images'), $image_name);
                $trimed_image = substr_replace($new_image, $image_name, 0);


                $data = [
                    'title' => 'product updated successfully الصورة اتغيرت',
                    'status' => 200,
                    'response' => new DashBoardResource(
                        DB::table('products')
                            ->where('product_id', $id)
                            ->update(
                                [
                                    'product_id' => $request->product_id,
                                    'product_name' => $request->product_name,
                                    'product_price' => $request->product_price,
                                    'product_image' => $trimed_image,
                                    'updated_at' => now()
                                ]
                            )
                    )

                ];

                return response($data);
            } else {

                DB::table('products')
                    ->where('product_id', $id)->update(
                        [
                            'product_id' => $request->product_id,
                            'product_name' => $request->product_name,
                            'product_price' => $request->product_price,
                            // 'product_image' => $img,
                            'updated_at' => now()
                        ]

                    );


                $data = [
                    'title' => 'product updated successfully الصورة زى ما هى',
                    'status' => 200,
                    'response' =>
                    new DashBoardResource(
                        Product::first()
                    )

                ];

                return response($data);
            }
        } else {
            $data = [
                'title' => 'please enter an exist id',
                'status' => 404,
            ];
            return response($data);
        }
    }
}
