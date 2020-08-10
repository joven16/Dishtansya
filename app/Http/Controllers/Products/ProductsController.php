<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\ProductsModel;
use Validator;

class ProductsController extends Controller
{
    public function products(){
        return response()->json(ProductsModel::get(), 200);
    }

    public function orderByID($id){
        $country = OrderModel::find($id);
        if(is_null($country)){
            return response()->json(["message" => "Record not found!"], 404);
        }
        return response()->json($country, 200);
    }

    public function orderSave(Request $request){
        $rules = [
            'product_id' => 'required',
            'quantity' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $id = $request['product_id'];
        $product = OrderModel::find($id);
        if(is_null($product)){
            return response()->json(["message" => "Record not found!"], 404);
        }
        return response()->json($product, 200);

        // $order = OrderModel::create($request->all());
        // return response()->json(["message" => "You have successfully ordered this product"], 201);
    }

    // public function orderUpdate(Request $request, $id){
    //     $order = OrderModel::find($id);
    //     if(is_null($order)){
    //         return response()->json(["message" => "Record not found!"], 404);
    //     }
    //     $order->update($request->all());
    //     return response()->json($order, 200);
    // }

    // public function orderDelete(Request $request, $id){
    //     $order = OrderModel::find($id);
    //     if(is_null($order)){
    //         return response()->json(["message" => "Record not found!"], 404);
    //     }
    //     $order->delete();
    //     return response()->json(null, 204);
    // }
}
 