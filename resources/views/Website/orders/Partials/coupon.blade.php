<div class="col-md-4 col-sm-12 estimate-ship-tax" style="background: #ffffff;">
    <table class="table">
        <thead>
        <tr>
            <th>
                <span class="estimate-title">Discount Code</span>
                <p>Enter your coupon code if you have one..</p>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                {{ Form::open(array('url' => '/coupons')) }}

                    <div class="form-group">
                        <input type="text" name="coupon_code" id="add-coupon" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
                    </div>
                    <div class="clearfix pull-right">
                        <button type="submit" id="apply-coupon" class="btn-upper btn btn-primary">Apply Coupon</button>
                    </div>
                {{ Form::close() }}


            </td>
        </tr>
        </tbody>
    </table>
</div>