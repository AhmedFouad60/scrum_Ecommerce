<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){
        return view('Website.orders.index');
    }

    public function payment(Request $request){

        $attributes=$request->all();

        if($attributes['payment_method']=='paypal'){
            $items=array();
            foreach (Cart::content() as $item){
                $items[]=array(
                    'name'      => $item->name,
                    'quantity'  => $item->qty,
                    'price'     =>$item->price
                );
            }

            $params = array(
                'cancelUrl'=> '/order/failed',
                'returnUrl'=> '/orders/payment/success',
                'amount'   => str_replace(',','',Cart::total()),
                'currency' => 'USD',
                'data' => $attributes
            );

            Session::put('params', $params);
            Session::save();

            //use Omnipay for gateway payment processing



        }else{

        }
    }

    public function getpayment(){

    }

}
