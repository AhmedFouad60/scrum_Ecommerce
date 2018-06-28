@extends('Website.Products.layout')



@section('content')

    {{--navbar stuff--}}
    @include('Website.Products.Partials.header')
    @include('Website.Products.Partials.HomeCarousel')

    <section class="hot-deals">
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

































@endsection

