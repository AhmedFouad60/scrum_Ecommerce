
<div class="panel panel-default checkout-step-02">


    <div class="panel-heading">
        <h4 class="unicase-checkout-title">
            <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
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
                {{--if the user logged in --}}
                @if (Auth::check())
                    <div class="row" id="payment-existing">
                        <select name="address_id" class="form-control">
                            <option value="{!!Auth::user()->address!!},{!!Auth::user()->country!!},{!!Auth::user()->city!!},{!!Auth::user()->distinct!!}" selected="selected">{!!Auth::user()->country!!},{!!Auth::user()->address!!}</option>
                            {{--<option value="{!!Auth::user()->name!!},{!!user('client.web')->address!!},{!!user('client.web')->district!!},{!!user('client.web')->city!!},{!!user('client.web')->country!!},{!!user('client.web')->state!!}" selected="selected">{!!@user('client.web')->name!!},{!!@user('client.web')->address!!},{!!@user('client.web')->district!!},{!!@user('client.web')->city!!},{!!@user('client.web')->country!!},{!!@user('client.web')->state!!}</option>--}}
                        </select>
                    </div>
                @else
                    <p class="alert alert-info">you are not logged in yet :)</p>
                @endif



                <br>
                <input id="address-new" type="radio" name="billingaddress" value="register"  class="billing-address">
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
                    {{Form::text('payment[payment_address_2]',null,['placeholder' => trans('order.placeholder.payment_address_2')]) }}

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