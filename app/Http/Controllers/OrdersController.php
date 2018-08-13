<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Omnipay\Omnipay;
use Gloudemans\Shoppingcart\Facades\Cart;




class OrdersController extends Controller
{
    public function index(){
        return view('Website.orders.index');
    }

    public function payment(Request $request){

        $attributes=$request->all();

        if($attributes['payment_method']=='Paypal'){
            $items=array();
            foreach (Cart::content() as $item){
                $items[]=array(
                    'name'      => $item->name,
                    'quantity'  => $item->qty,
                    'price'     =>$item->price
                );
            }

            $params = array(
                'cancelUrl'=> url('/'),
                'returnUrl'=> url('/orders/payment/success'),
                'amount'   => str_replace(',','',Cart::subtotal()),
                'currency' => 'USD',
                'data' => $attributes
            );

            Session::put('params', $params);
            Session::save();

            //use Omnipay for gateway payment processing
            $gateway = Omnipay::create('PayPal_Express');

            $gateway->setUsername('mr.fouad992-facilitator_api1.gmail.com');
            $gateway->setPassword('BLB98ZZKQN4S762D');
            $gateway->setSignature('Al1ekGWEdlMNUAGGaAmtpVxAoXHgAY0n6kdFzKwVOdaFgC2CDw4G.AB0');
            $gateway->setTestMode(true);
//            try {
                $response = $gateway->purchase($params)->setItems($items)->send();

                if ($response->isSuccessful()) {

                    // payment was successful: update database
                    print_r($response);
//                    dd($response);
                } elseif ($response->isRedirect()) {

                    // redirect to offsite payment gateway
                    $response->redirect();
                } else {

                    // payment failed: display message to customer
                    echo $response->getMessage();
                }

//            }
//            catch (\Exception $e){
        // internal error, log exception and display a generic message to the customer
//                exit('Sorry, there was an error processing your payment. Please try again later.');
//            }


        }else{
            $this->storePayment($attributes);
        }
    }

    public function getpayment(){

        $gateway = Omnipay::create('PayPal_Express');

        $gateway->setUsername('mr.fouad992-facilitator_api1.gmail.com');
        $gateway->setPassword('BLB98ZZKQN4S762D');
        $gateway->setSignature('Al1ekGWEdlMNUAGGaAmtpVxAoXHgAY0n6kdFzKwVOdaFgC2CDw4G.AB0');
        $gateway->setTestMode(true);


        $params     = Session::get('params');
        $attributes = $params['data'];

        //[completePurchase] ==> handle return from off-site gateways after purchase

        $response = $gateway->completePurchase($params)->send();
        $paypalResponse = $response->getData();// this is the raw response object
//
        if(isset($paypalResponse['PAYMENTINFO_0_ACK']) && $paypalResponse['PAYMENTINFO_0_ACK'] === 'Success') {
                $this->storePayment($attributes);
        } else {
            echo $response->getMessage();
            //Failed transaction

        }
//        return 'fuck you';
    }

    //store the payment information  after the payPal process success and the money reduced from my user account
    public function storePayment($attributes){

        try{

     /**  if the user want to use another address for billing not the one that he enter with registration */

        if($attributes['billingaddress']=='register'){
            $attributes['payment_address']= implode(',',$attributes['payment']);
        }else{
            $attributes['payment_address']=$attributes['address_id'];
        }

        /**  if the user want to use another address  for shipping not the one that he enter with registration */

            if($attributes['shippingaddress']=='register'){
                $attributes['shippingaddress']= implode(',',$attributes['shipping']);
            }else{
                $attributes['shippingaddress']= $attributes['shipping_address_id'];

            }

            /** subtotal ,total */
        $attributes['subtotal']=Cart::total();
        $attributes['total']=Cart::subtotal();

        /** Assign the order to the user who ordered it  */
        $attributes['user_id'] = !Auth::id()?Auth::id():99;
        $attributes['order_status_id'] = '1';
        $attributes['payment_status'] = 'Success';

        $order=Orders::create($attributes);

//save the order and the product in the pivot table
        foreach (Cart::content() as $key=>$row) {
            $order->products()->attach($row->id,['quantity' => $row->qty]);
        }
        Cart::destroy();
        return redirect('/')->with('success', ['your message,here']);
        }catch (Exception $e){
            return redirect('/')->with('fail', ['your message,here']);

        }





    }




}
