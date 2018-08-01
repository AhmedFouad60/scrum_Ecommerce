

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

                            {!! Form::close() !!}