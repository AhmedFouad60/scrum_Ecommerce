{{--Here there will be the script for handle [add-to-cart,....]--}}
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


/**
 * This is bad choice for me .... to implement this function in this file
 * ... the best implement in cart.blade.php*/

    {{--$(".remove-cart").click(function(){--}}
            {{--var str = $(this).prop('id');--}}
            {{--var res = str.split("-");--}}
            {{--var id = res[1];--}}

            {{--$.ajax({--}}
                {{--type:'POST',--}}
                {{--url:"{{URL::to('carts/cart/delete')}}",--}}
                {{--data:{id:id, _token: '{{csrf_token()}}'},--}}
                {{--dataType:'html',--}}
                {{--success:function(data, textStatus, jqXHR)--}}
                {{--{--}}
                    {{--$(".top-cart-row").load('{{url("carts/cart/latest")}}');--}}
                    {{--toastr.success('Product deleted successfully.');--}}
                {{--},--}}
                {{--error:function () {--}}
                    {{--//do what you want ...inform user with Error message or do something with the front-end--}}

                {{--}--}}
            {{--});--}}


        {{--});--}}



    });









</script>