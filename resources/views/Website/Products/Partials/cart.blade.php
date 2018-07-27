<div class="dropdown dropdown-cart">
    <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
        <div class="items-cart-inner">
            <div class="basket">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="basket-item-count"><span class="count">{!!Cart::count()!!}</span></div>
            <div class="total-price-basket">
                <span class="lbl">cart </span>
            </div>
        </div>
    </a>
    <ul class="dropdown-menu">
        <li class="cart-list">
            <div class="cart-area">

                {{--if there are items in the cart render it ...also say NO ITEMS ADDED yet--}}
                @forelse(Cart::content() as $key=>$row)

                <?php $product=\App\Models\products::where('id',$row->id)->first();?>
                    <div class="cart-item product-summary mt10 mr10">
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="image">
                                    <a href="#"><img src="{{$product->image}}" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <h3 class="name"><a href="#">{{$row->name}} ({{$row->qty}})</a></h3>
                                <div class="price">${{$row->price}}</div>
                            </div>
                            <div class="col-xs-1 action">
                                <a><i id="del-{!!$row->rowId!!}" class="fa fa-trash remove-cart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                @empty
                    <p>No Items Added</p>
                @endif

            </div>
            <hr>
            <div class="clearfix cart-total">
                <div class="pull-right">
                    <span class="text">Sub Total :</span><span class='price'>${{Cart::subtotal()}}</span>
                </div>
                <div class="clearfix"></div>

                <a href="{!!url('orders')!!}" class="btn btn-upper btn-primary btn-block mt20">Checkout</a>
                <div class="clearfix"></div>
                <div class="text-center mt10">
                    <a href="{!!url('carts')!!}" > View Cart</a>
                </div>
            </div>
        </li>
    </ul>
</div>

<style type="text/css">
    .cart-area{
        max-height: 160px;
        overflow: hidden;
        overflow-y: auto;
    }
</style>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js">
</script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js">
</script>

<script type="text/javascript">
    $(".remove-cart").click(function(){
        var str = $(this).prop('id');
        var res = str.split("-");
        var id = res[1];

        $.ajax({
            type:'POST',
            url:"{{URL::to('carts/cart/delete')}}",
            data:{id:id, _token: '{{csrf_token()}}'},
            dataType:'html',
            success:function(data, textStatus, jqXHR)
            {
                $(".top-cart-row").load('{{url("carts/cart/latest")}}');
                toastr.success('Product deleted successfully.');
            },
            error:function () {
                //do what you want ...inform user with Error message or do something with the front-end

            }
        });


    });
</script>