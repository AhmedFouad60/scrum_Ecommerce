<section class="bg-grey checkout">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">

                @if(Cart::total()>0)

                    <div class="col-md-8">

                        <div class="panel-group checkout-steps" id="accordion">

                            @include('Website.orders.Partials.CheckoutMethod')
          {{--------------------------------- End step01 -----------------------------}}

                            {!!Form::open([
                                                'id'=>'create-order-order',
                                                 'method'=>'post',
                                                 'class'=>'dashboard-form',
                                                 'action'=>'OrdersController@payment'

                                ])!!}

                            @include('Website.orders.Partials.billingINfo')

           {{--------------------------------- End step02 -----------------------------}}

                            @include('Website.orders.Partials.shippingINfo')

            {{--------------------------------- End step03 -----------------------------}}

                            @include('Website.orders.Partials.paymentINfo')

            {{--------------------------------- End step04 -----------------------------}}


                            @include('Website.orders.Partials.orderReview')

            {{--------------------------------- End step05 -----------------------------}}

                            {!! Form::close() !!}



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