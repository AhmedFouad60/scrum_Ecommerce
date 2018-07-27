@extends('Website.Products.layout')
@section('content')

    @include('Website.Products.Partials.header')

    <section class="bg-grey cart">
        <div class="container">
            <div class="row ">
                <div class="shopping-cart">
                    <div class="shopping-cart-table ">
                        <div class="table-responsive">
                            {!!Form::open()
                                   !!}
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="cart-romove item">Remove</th>
                                    <th class="cart-description item">Image</th>
                                    <th class="cart-product-name item">Product Name</th>
                                    <th class="cart-qty item">Quantity</th>
                                    <th class="cart-sub-total item">Subtotal</th>
                                    <th class="cart-total last-item">Grandtotal</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>

                                    <td colspan="7">
                                        <div class="shopping-cart-btn">
                                                    <span class="">
                                                        <a href="{!!url('/products')!!}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>

                                                        <a id="update-cart" class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping cart</a>
                                                        <a id="clear-cart" class="btn btn-upper btn-primary pull-right mr10 outer-right-xs" ">Clear shopping cart</a>
                                                    </span>
                                        </div>
                                    </td>
                                </tr>
                                </tfoot>

                                <tbody>

                                @forelse(Cart::content() as $key=>$row)
                                    <?php $product=\App\Models\products::where('id',$row->id)->first();?>
                                    <tr id="{{$row->rowId}}">
                                        <td class="romove-item"><a title="cancel" class="btn btn-danger btn-xs remove-cart"><i class="fa fa-trash-alt "></i></a></td>
                                        <td class="cart-image">
                                            <a class="entry-thumbnail" href="{!!url('products')!!}/{!!@$product->slug!!}">
                                                <img src="{{$product->image}}" class="img-responsive" alt="">
                                            </a>
                                        </td>
                                        <td class="cart-product-name-info">
                                            <h4 class='cart-product-description'><a href="{!!url('products')!!}/{!!@$product->slug!!}">{{$row->name}}</a></h4>
                                            <!-- <div class="cart-product-info">
                                                    <span class="product-color">Color:<span>Blue</span></span>
                                            </div> -->
                                        </td>

                                        <td class="cart-product-quantity">
                                            <div class="col-md-10 quant-input">
                                                <input type="number" name="qty[{{$key}}]" value="{{$row->qty}}" id="qty{{$row->rowId}}" min="1" class="form-control">

                                            </div>
                                            <div class="col-md-2"><a><i style="zoom:2;" class="fa fa-refresh edit-cart" aria-hidden="true"></i></a></div>
                                        </td>
                                        <td class="cart-product-sub-total"><span class="cart-sub-total-price">${{$row->price}} USD</span></td>
                                        <td class="cart-product-grand-total"><span class="cart-grand-total-price">${{$row->total}} USD</span></td>
                                    </tr>
                                @empty
                                @endif

                                </tbody>

                            </table>
                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection

@include('Website.Products.Partials.CartScript')