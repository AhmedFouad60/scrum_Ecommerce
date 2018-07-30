<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Gloudemans\Shoppingcart\Facades\Cart;

class CartWebsiteController extends Controller
{
    public function addCart(Request $request){
        //default quantity is one if not specified
        $qty=1;
        if (!empty($request->get('qty'))){
            $qty=$request->get(qty);
        }

        $product_id=$request->get('id');
        $product_details=products::where('id',$product_id)->first();
        Cart::add($product_details->id,$product_details->title,$qty,$product_details->price);

//        Cart::destroy();
    }
    public function latest(Request $request)
    {
//        dd($request->all());

        if ($request['page']){
            return response()->view('Website.Products.Partials.cartView');
//            dd($pageName);
        }

        return response()->view('Website.Products.Partials.latest');
    }
    public function deleteCart(Request $request){
        $row_id=$request->get('id');
        Cart::remove($row_id);
    }
//    public function editCart(){}
    public function updateCart(Request $request){
        $cart=$request->all();
        foreach ($cart['qty'] as $key=>$val){
            Cart::update($key,$val);
        }

        return 'true';

    }
    public function clearCart(){
        Cart::destroy();
        return 'true';
    }


}
