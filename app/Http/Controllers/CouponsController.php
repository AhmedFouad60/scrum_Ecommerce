<?php

namespace App\Http\Controllers;

use App\DataTables\couponDatatable;
use App\Models\Coupons;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CouponsController extends Controller
{

    public function __construct() {
        $this->middleware(['isAdmin'])->except('checkCoupon'); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(couponDatatable $couponDatatable)
    {
        return $couponDatatable->render('Admin.coupons.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate name, email and password fields
        $this->validate($request, [
            'name'=>'required|max:120',
            'code'=>'required',
//            'description'=>'required|max:225',
            'discount'=>'numeric',
            'type'=>'required',
            'end_date'=> 'required|date|date_format:Y-m-d',
            'start_date'=> 'required|date|date_format:Y-m-d',


        ]);

        $coupon = Coupons::create($request->all());

        //Redirect to the Admin.Users.index view and display message
        return redirect()->route('coupons.index')
            ->with('flash_message',
                'coupon successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon=Coupons::findOrFail($id);
        return view('Admin.coupons.edit',compact('coupon'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $coupon=Coupons::findOrFail($id);


        //Validate name, email and password fields
        $this->validate($request, [
            'name'=>'required|max:120',
            'code'=>'required',
//            'description'=>'required|max:225',
            'discount'=>'numeric',
            'type'=>'required',
            'end_date'=> 'required|date|date_format:Y-m-d',
            'start_date'=> 'required|date|date_format:Y-m-d',


        ]);


        $coupon->fill($request->all())->save();

        return redirect()->route('coupons.index')
            ->with('flash_message',
                'coupon successfully edited.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon=Coupons::findOrFail($id);
        $coupon->delete();
        return redirect()->route('coupons.index')
        ->with('flash_message',
            'coupon successfully deleted.');
    }


    public function checkCoupon(Request $request){


        if ($request['coupon_code'] == null){
          return redirect('/orders');
        }


        $coupon=Coupons::where('code','=',$request['coupon_code'])->get();//validate the coupon code

        if($coupon){ //the code is exists already

            $startDate=$coupon->pluck('start_date')[0];
            $endDate=$coupon->pluck('end_date')[0];

            //validate the date
            if( Carbon::now()->between( Carbon::parse($startDate),Carbon::parse($endDate) ) ){

                //update the total price of the invoice [checkout] in the cart .. provide info about the discount to paypal api

                if($coupon->pluck('type')[0] == "Percentage"){ //determine the discount type [percentage or fixed amount]

                    $subtotal = floatval(preg_replace( '#[^\d.]#', '', Cart::subtotal()));


                    $total =  number_format(($subtotal - $subtotal * ( $coupon->pluck('discount')[0] / 100 )),2);
                    $discount=$coupon->pluck('discount')[0];
                    $type=$coupon->pluck('type')[0];
                    return view("Website.orders.index",compact('total','discount','type'));



                }else{ //the discount is fixed price

                    $subtotal = floatval(preg_replace( '#[^\d.]#', '', Cart::subtotal()));

                    $total =  number_format($subtotal-$coupon->pluck('discount')[0],2);
                    $discount=$coupon->pluck('discount')[0];
                    $type=$coupon->pluck('type')[0];
                    return view("Website.orders.index",compact('total','discount','type'));


                }




            }else{
                // say the coupon expired already
                return view("Website.orders.index")->with('flash_message','coupon expired already');
            }




        }else{
            //the coupon code not exists
            return view("Website.orders.index")->with('flash_message','the coupon code not exists');

        }



    }
}
