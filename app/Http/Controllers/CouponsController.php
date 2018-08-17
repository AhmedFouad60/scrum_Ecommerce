<?php

namespace App\Http\Controllers;

use App\DataTables\couponDatatable;
use App\Models\Coupons;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
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
            'description'=>'required|max:225',
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
            'description'=>'required|max:225',
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
}
