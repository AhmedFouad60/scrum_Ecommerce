
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