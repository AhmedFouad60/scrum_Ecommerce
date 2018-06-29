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

    <section class="offers">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
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

































@endsection

