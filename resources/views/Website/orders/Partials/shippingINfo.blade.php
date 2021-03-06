    <div class="panel panel-default checkout-step-03">

            <div class="panel-heading">
                <h4 class="unicase-checkout-title">
                    <a data-toggle="collapse" class="collapsed collapseThree" data-parent="#accordion" href="#collapseThree">
                        <span>3</span>Shipping Information
                    </a>
                </h4>
            </div>

        <div id="collapseThree" class="panel-collapse collapse">

            <div class="panel-body">

                <div class="radio radio-checkout-unicase">
                    <input id="shippingaddress-exist" type="radio" name="shippingaddress" value="guest" checked class="shipping-address">
                    <label class="radio-button guest-check" for="shippingaddress-exist">I want to use an existing address</label>
                    <br>
                    {{--if the user logged in --}}
                    @if (Auth::check())
                        <div class="row" id="payment-existing">
                            <select name="shipping_address_id" class="form-control">
                                <option value="{!!Auth::user()->address!!},{!!Auth::user()->country!!},{!!Auth::user()->city!!},{!!Auth::user()->distinct!!}" selected="selected">{!!Auth::user()->country!!},{!!Auth::user()->address!!}</option>
                                {{--<option value="{!!Auth::user()->name!!},{!!user('client.web')->address!!},{!!user('client.web')->district!!},{!!user('client.web')->city!!},{!!user('client.web')->country!!},{!!user('client.web')->state!!}" selected="selected">{!!@user('client.web')->name!!},{!!@user('client.web')->address!!},{!!@user('client.web')->district!!},{!!@user('client.web')->city!!},{!!@user('client.web')->country!!},{!!@user('client.web')->state!!}</option>--}}
                            </select>
                        </div>
                    @else
                        <p class="alert alert-info">you are not logged in yet :)</p>
                    @endif
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
        </div>
    </div>











