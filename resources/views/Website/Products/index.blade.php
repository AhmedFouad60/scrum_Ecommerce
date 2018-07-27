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
{{--banner ...i will make it custom ads for companies ..this will be added by admin--}}
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
{{--@include('Website.Products.Partials.CartScript')--}}


    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js">
    </script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js">
    </script>


    <script type="text/javascript">

        $(document).ready(function () {
            //your code here


            $(".add-cart").click(function () {
                var id=$(this).attr('id');
                console.log('id is: '+id);
                //make ajax request to add item in the cart
                $.ajax({
                    type:'POST',
                    url:"{{URL::to('carts/cart/add')}}",
                    data:{id:id, _token: '{{csrf_token()}}'},
                    dataType:'html',
                    success:function (data,textStatus) {
                        //do what you want ...inform user with success message or do something with the front-end

                        /** The load() method loads data from a server and puts the returned data into the selected element.*/
                        $('.top-cart-row').load('{{url("carts/cart/latest")}}');
                        toastr.success('product added to cart successfully.');



                    },
                    error:function () {
                        //do what you want ...inform user with Error message or do something with the front-end

                    }
                });

            });



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
            });









    </script>























@endsection

