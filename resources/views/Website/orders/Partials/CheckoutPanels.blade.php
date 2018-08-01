<section class="bg-grey checkout">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">

                @if(Cart::total()>0)

                    <div class="col-md-8">

                        <div class="panel-group checkout-steps" id="accordion">

                            <div class="panel panel-default checkout-step-01">

                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
                                            <span>1</span>Checkout Method
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 guest-login">
                                                <h4 class="checkout-subtitle">Guest or Register Login</h4>
                                                <p class="text title-tag-line">Register with us for future convenience:</p>
                                                <form class="register-form" role="form">
                                                    <div class="radio radio-checkout-unicase">
                                                        <input id="guest" type="radio" name="text" value="guest" checked>
                                                        <label class="radio-button guest-check" for="guest">Checkout as Guest</label>
                                                        <br>
                                                        <input id="register" type="radio" name="text" value="register">
                                                        <label class="radio-button" for="register">Register</label>
                                                    </div>
                                                </form>
                                                <h4 class="checkout-subtitle outer-top-vs">Register and save time</h4>
                                                <p class="text title-tag-line ">Register with us for future convenience:</p>
                                                <ul class="text instruction pb30">
                                                    <li class="save-time-reg">- Fast and easy check out</li>
                                                    <li>- Easy access to your order history and status</li>
                                                </ul>
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" class="collapsed btn-upper btn btn-primary checkout-page-button checkout-continue "  data-key="collapseTwo">Continue</a>

                                            </div>
                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                <h4 class="checkout-subtitle">Already registered?</h4>

                                                <p class="text title-tag-line">Please log in below:</p>

                                                {!!Form::open(['id'=>'client-login-form'])  !!}
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                                    {!! Form::email('email','')!!}
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                                                    {!! Form::password('password',array(''))!!}
                                                    <a href="#" class="forgot-password">Forgot your Password?</a>
                                                </div>

                                                {!! Form::close() !!}

                                            </div>



                                        </div>
                                    </div>
                                </div>

                            </div>

                            {{--checkout step02--}}
                            <div class="panel panel-default checkout-step-02">
                                {!!Form::open([
                                                'id'=>'create-order-order',
                                                 'method'=>'post',
                                                 'class'=>'dashboard-form',
                                                 'action'=>'OrdersController@payment'

                                ])!!}

                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#">
                                            <span>2</span>Billing Information
                                        </a>
                                    </h4>
                                </div>

                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">

                                        <div class="radio radio-checkout-unicase">
                                            <input id="address-exist" type="radio" name="billingaddress" value="guest" checked class="billing-address">
                                            <label class="radio-button guest-check" for="address-exist">I want to use an existing address</label>
                                            <br>
                                            <br>
                                            <input id="address-new" type="radio" name="billingaddress" value="register" name="billingaddress" class="billing-address">
                                            <label class="radio-button" for="address-new">I want to use a new address</label>
                                        </div>

                                        <div class="row hide" id="payment-new">
                                            <div class="col-md-6">
                                                {{Form::label(trans('order.label.payment_firstname'))}}
                                                {{Form::text('payment[firstname]',null,['placeholder' => trans('order.placeholder.payment_firstname')]) }}
                                            </div>
                                            <div class="col-md-6">
                                                {{Form::label(trans('order.label.payment_lastname'))}}
                                                {{Form::text('payment[lastname]',null,['placeholder' => trans('order.placeholder.payment_lastname')]) }}

                                            </div>
                                            <div class="col-md-12">
                                                {{Form::label(trans('order.label.payment_company'))}}
                                                {{Form::text('payment[payment_company]',null,['placeholder' => trans('order.placeholder.payment_company')]) }}
                                            </div>
                                            <div class="col-md-6">
                                                {{Form::label(trans('order.label.payment_address_1'))}}
                                                {{Form::text('payment[payment_address_1]',null,['placeholder' => trans('order.placeholder.payment_address_1')]) }}
                                            </div>
                                            <div class="col-md-6">
                                                {{Form::label(trans('order.label.payment_address_2'))}}
                                                {{Form::text('payment[payment[payment_address_2]',null,['placeholder' => trans('order.placeholder.payment_address_2')]) }}

                                            </div>
                                            <div class="col-md-6">
                                                {{Form::label(trans('order.label.payment_city'))}}
                                                {{Form::text('payment[payment_city]',null,['placeholder' => trans('order.placeholder.payment_city')]) }}
                                            </div>
                                            <div class="col-md-6">
                                                {{Form::label(trans('order.label.payment_postcode'))}}
                                                {{Form::text('payment[payment_postcode]',null,['placeholder' => trans('order.placeholder.payment_postcode')]) }}
                                            </div>
                                            <div class="col-md-6">
                                                {{Form::label(trans('order.label.payment_country_id'))}}
                                                {{Form::text('payment[payment_country_id]',null,['placeholder' => trans('order.placeholder.payment_country_id')]) }}
                                            </div>
                                            <div class="col-md-6">
                                                {{Form::label(trans('order.label.payment_zone_id'))}}
                                                {{Form::text('payment[payment_zone_id]',null,['placeholder' => trans('order.placeholder.payment_zone_id')]) }}
                                            </div>
                                        </div>
                                    </div>

                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" class="collapsed btn-upper btn btn-primary checkout-page-button checkout-continue" data-key="collapseThree">Continue</a>
                                </div>
                            </div>{{---End of step02 --}}



                            {{--checkout step03--}}

                            <div id="collapseThree" class="panel-collapse collapse">

                                <div class="panel-body">

                                    <div class="radio radio-checkout-unicase">
                                        <input id="shippingaddress-exist" type="radio" name="shippingaddress" value="guest" checked class="shipping-address">
                                        <label class="radio-button guest-check" for="shippingaddress-exist">I want to use an existing address</label>
                                        <br>
                                        {{--@if(user('client.web'))--}}
                                        {{--<div class="row" id="shipping-existing">--}}
                                        {{--<select name="shippingaddress_id" class="form-control">--}}
                                        {{--<option value="{!!user('client.web')->name!!},{!!user('client.web')->address!!},{!!user('client.web')->district!!},{!!user('client.web')->city!!},{!!user('client.web')->country!!},{!!user('client.web')->state!!}" selected="selected">{!!@user('client.web')->name!!},{!!@user('client.web')->address!!},{!!@user('client.web')->district!!},{!!@user('client.web')->city!!},{!!@user('client.web')->country!!},{!!@user('client.web')->state!!}</option>--}}
                                        {{--</select>--}}
                                        {{--</div>--}}
                                        {{--@endif--}}
                                        <br>
                                        <input id="shippingaddress-new" type="radio" name="shippingaddress" value="register"  class="shipping-address">
                                        <label class="radio-button" for="shippingaddress-new">I want to use a new address</label>

                                    </div>
                                    <div class="row hide" id="shipping-new">
                                        <div class="col-md-6">
                                            {{Form::label(trans('order.label.payment_firstname'))}}
                                            {{Form::text('shipping[firstname]',null,['placeholder' => trans('order.placeholder.payment_firstname')]) }}
                                        </div>
                                        <div class="col-md-6">
                                            class="col-md-6">
                                            {{Form::label(trans('order.label.payment_lastname'))}}
                                            {{Form::text('shipping[lastname]',null,['placeholder' => trans('order.placeholder.payment_lastname')]) }}
                                        </div>
                                        <div class="col-md-12">
                                            {{Form::label(trans('order.label.payment_company'))}}
                                            {{Form::text('shipping[payment_company]',null,['placeholder' => trans('order.placeholder.payment_company')]) }}
                                        </div>
                                        <div class="col-md-6">
                                            {{Form::label(trans('order.label.payment_address_1'))}}
                                            {{Form::text('shipping[payment_address_1',null,['placeholder' => trans('order.placeholder.payment_address_1')]) }}
                                        </div>
                                        <div class="col-md-6">
                                            {{Form::label(trans('order.label.payment_address_2'))}}
                                            {{Form::text('shipping[payment_address_2]',null,['placeholder' => trans('order.placeholder.payment_address_2')]) }}
                                        </div>
                                        <div class="col-md-6">
                                            {{Form::label(trans('order.label.payment_city'))}}
                                            {{Form::text('shipping[payment_city]',null,['placeholder' => trans('order.placeholder.payment_city')]) }}
                                        </div>
                                        <div class="col-md-6">
                                            {{Form::label(trans('order.label.payment_postcode'))}}
                                            {{Form::text('shipping[payment_postcode]',null,['placeholder' => trans('order.placeholder.payment_postcode')]) }}
                                        </div>
                                        <div class="col-md-6">
                                            {{Form::label(trans('order.label.payment_country_id'))}}
                                            {{Form::text('shipping[payment_country_id]',null,['placeholder' => trans('order.placeholder.payment_country_id')]) }}
                                        </div>
                                        <div class="col-md-6">
                                            {{Form::label(trans('order.label.payment_zone_id'))}}
                                            {{Form::text('shipping[payment_zone_id]',null,['placeholder' => trans('order.placeholder.payment_zone_id')]) }}
                                        </div>
                                    </div>


                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" class="collapsed btn-upper btn btn-primary checkout-page-button checkout-continue " data-key="collapseFour">Continue</a>



                                </div>
                            </div> {{--End of step03--}}

                            {{--checkout step04--}}

                            <div class="panel panel-default checkout-step-04">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="collapsed collapseFour" data-parent="#accordion" href="#">
                                            <span>4</span>Shipping Method
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p> i will display here each item and the shipping price of it</p>
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" class="collapsed btn-upper btn btn-primary checkout-page-button checkout-continue " data-key="collapseSix">Continue</a>


                                    </div>
                                </div>
                            </div>{{---End of step04--}}

                            {{--checkout step05--}}

                            <div class="panel panel-default checkout-step-05">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="collapsed collapseFive" data-parent="#accordion" href="#">
                                            <span>5</span>Payment Information
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFive" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="radio radio-checkout-unicase">
                                            <input id="paymentmethod" type="radio" name="payment_method" value="Cash On Delivery" checked>
                                            <label class="radio-button" for="paymentmethod">Cash On Delivery</label>
                                        </div>
                                        <div class="radio radio-checkout-unicase">
                                            <input id="paymentmethod" type="radio" name="payment_method" value="Paypal">
                                            <label class="radio-button" for="paymentmethod">Paypal</label>
                                        </div>

                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" class="collapsed btn-upper btn btn-primary checkout-page-button checkout-continue " data-key="collapseSix">Continue</a>
                                    </div>
                                </div>
                            </div>{{--End of step05--}}

                            {{--checkout step06--}}
                            <div class="panel panel-default checkout-step-06">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="collapsed collapseSix" data-parent="#accordion" href="#" >
                                            <span>6</span>Order Review
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseSix" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th class="text-right">Unit Price</th>
                                                <th class="text-right">Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse(Cart::content() as $key=>$row)
                                                <tr>
                                                    <td>{{$row->name}}</td>
                                                    <td>{{$row->qty}}</td>
                                                    <td class="text-right">${{number_format($row->price,2)}} USD</td>
                                                    <td class="text-right">${{number_format($row->total,2)}} USD</td>
                                                </tr>
                                            @empty
                                            @endif
                                            <tr>
                                                <td colspan="3" class="text-right">Subtotal</td>
                                                <td class="text-right">${{Cart::total()}} USD</td>
                                            </tr>

                                            <tr>
                                                <td colspan="3" class="text-right">Total</td>
                                                <td class="text-right">${{Cart::subtotal()}} USD</td>
                                            </tr>


                                            <tr>
                                                <td colspan="3" class="text-right">Total</td>
                                                {{--<td class="text-right">${{number_format($result,2)}} USD</td>--}}
                                            </tr>

                                            </tbody>

                                        </table>
                                        <br>
                                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button" >Confirm order</button>
                                    </div>
                                </div>
                            </div>

{{--                            {!! Form::close() !!}--}}


                            {{--End of step06---}}




                        </div> {{--- end of panel-group --}}



                    </div> {{-- col-md-8--}}


                @else
                    <div class="col-md-12">
                        <p>Your cart is empty!</p>
                        <br>
                        <a href="{!!url('/products')!!}" class="btn btn-upper btn-primary outer-left-xs">Continue</a>
                                    </div>

                @endif








            </div>
        </div>
    </div>
</section>