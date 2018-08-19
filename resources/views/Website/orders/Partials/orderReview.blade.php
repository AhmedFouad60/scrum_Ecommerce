

<div class="panel panel-default checkout-step-06">
    <div class="panel-heading">
        <h4 class="unicase-checkout-title">
            <a data-toggle="collapse" class="collapsed collapseSix" data-parent="#accordion" href="#collapseFive" >
                <span>5</span>Order Review
            </a>
        </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse">
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
                        <td class="text-right">${{number_format($row->price,2)}} USD</td>
                    </tr>
                @empty
                @endif
                <tr>
                    <td colspan="3" class="text-right">Subtotal</td>
                    <td class="text-right">${{Cart::subtotal()}} USD</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right">Discount</td>
                    @if($type!=null &&$type=="Percentage")
                    <td class="text-right">{{$discount}} %</td>
                        @else
                        <td class="text-right">${{$discount}} USD</td>

                    @endif
                </tr>

                <tr>
                    <td colspan="3" class="text-right">Total</td>
                    @if($total !='')
                        {{ Form::hidden('coupon_total', $total) }}
                        {{ Form::hidden('discount', $discount) }}
                        {{ Form::hidden('type', $type) }}


                        <td class="text-right">${{$total}} USD</td>

                    @else
                    <td class="text-right">${{Cart::subtotal()}} USD</td>
                    @endif



                </tr>




                </tbody>

            </table>
            <br>
            <button type="submit" class="btn-upper btn btn-primary checkout-page-button" >Confirm order</button>
        </div>
    </div>
</div>




