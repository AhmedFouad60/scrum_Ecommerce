@extends('Website.Products.layout')

@push('css')
    <style>
        body{
            height: 1000px;
        }
    </style>
@endpush

@section('content')
            {{--TODO: use the traits to make function getimages()--}}
            {{--TODO: i don't want the image path to be like this in the production
            url(http://127.0.0.1:8000/storage/products/Lg/62_1.jpg)
            i don't want to show the name storage but to be
             domainname/produts/Lg/62_1.jpg

            --}}
            {{--TODO: Adjust the fonts in all pages in the project--}}

    {{--navbar stuff--}}
    @include('Website.Products.Partials.header')
<section class="recent-listing single-product bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-detail-wraper">
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <div class="single-product-large-image">
                                <div class="tab-content">
                                    @forelse($productPhotos as $key=>$image)
                                            <div role="tab-pane" class="tab-pane {{$key == 0 ? 'active fade in':'fade'}}"id="single-img-{{$key}}">
                                                <div class="product-img" style="background-image: url({!! asset("/storage/products/Lg/".$image)!!});">
                                                    
                                                </div>

                                            </div>
                                        @empty
                                    @endforelse
                                </div>
                            </div>
                            <div class="single-product-small-image">
                                <ul class="sm-img-nav" role="tablist">
                                    @forelse($productPhotos as $key=>$image)
                                        <li role="presentation" class="{{$key==0 ? 'active': ''}}">

                                            <a href="#single-img-{{$key}}" aria-controls="single-img-{{$key}}" role="tab" data-toggle="tab">
                                                <div class="product-thumb" style="background-image: url({!! asset("/storage/products/Xs/".$image)!!});">

                                                </div>
                                            </a>
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <div class="detail-block">
                                <div class="product-detail-heading">
                                    <div class="detail-heading-left">
                                        <h3>{!!@$product->title!!}</h3>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="price text-primary">
                                                    <p>${!!@$product->price!!}</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-right">

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="stock-container info-container mt10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="stock-box">
                                                <span>Availability:</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="stock-box">
                                                {!!  $product->quantity > 0 ?'<span class="text-success">instock</span>':'<span class="text-warning">out of stock</span>'!!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-desc">
                                    {!!  $product->small_description!!}
                                </div>

                                <div class="product-desc" style="margin-top:50px;">

                                    <div class="quantity-container info-container">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <span class="label">Qty</span>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="number" name="" id="qty" class="form-control" value="1" min="1" max="10" step="" required="required" title="">
                                            </div>
                                            <div class="col-sm-7">
                                                <a id="{!!$product->id!!}" class="add-cart links-item btn btn-primary"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product-desc-block">
                    <div class="product-desc-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Description</a></li>
                            <li role="presentation"><a href="#review" aria-controls="review" role="tab" data-toggle="tab">Review</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active description" id="description">
                                <p>{!!@$product->large_description!!}</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="review">
                                <div class="product-reviews">
                                    <h4 class="title">Customer Reviews</h4>
                                </div>
                                <div class="product-review reviews-show">
                                    {{--TODO: show all reviews--}}
                                    @include('Website.Products.Partials.ReviewShow')


                                </div>
                                <div class="product-reviews">
                                    <h4 class="title">Write your review now</h4>
                                    <hr>
                                </div>
                                {{--TODO:: if the user doesn't logged in redirct to the login/register page--}}
                                @include('Website.Products.Partials.productReview',['store'])

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

