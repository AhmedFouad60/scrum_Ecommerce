@extends('Website.Products.layout')



@section('content')

    {{--navbar stuff--}}
    @include('Website.Products.Partials.header')
    @include('Website.Products.Partials.HomeCarousel')

    <section class="hot-deals bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                	<h3 class="section-title">Hot Deals</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @include('Website.Products.Partials.trendingCarousel')

                </div>
            </div>
        </div>

    </section>

    <section class="offer-section" style="background: #00BCD4;">
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="margin-bottom: 25px;">
                    <a href="#">
                        <img src="images/banner2.jpg"  class="img-responsive" alt="offer1">
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="#">
                        <img src="images/banner3.jpg" class="img-responsive" alt="offer3">
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{--we only the source that give this offer e.i[every store sell T-shirt with 50$ but we sell it with 10$]--}}

    <section class="exclusive-area">

    </section>

    <section class="featured-product bg-grey">

        @include('Website.Products.Partials.featured-product')


    </section>

    <section class="latest-news" style="background:#03A9F4;">
        @include('Website.Products.Partials.latest-news')

    </section>



    {{--include the script that handle the cart --}}
@include('Website.Products.Partials.CartScript')


























@endsection

