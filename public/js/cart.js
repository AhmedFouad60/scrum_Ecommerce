$(document).ready(function () {
    //your code here

    //Add csrf-token to external js file .. check this thread
    //https://stackoverflow.com/questions/30686266/how-to-include-csrf-token-in-an-external-js-file-in-laravel/30686315
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')        }
    });


    $("#update-cart").click(function(){
        console.log("fuck you test ");
        var form=$('#cart-cart-update');
        var formData=new FormData();

        params=form.serializeArray();
        console.log(params);
        $.each(params, function(i, val) {
            formData.append(val.name, val.value);
        });

        $.ajax({
            type: 'POST',
            url: '/carts/cart/update',
            data:formData,
            cache: false,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {
                $('.top-cart-row').load('/carts/cart/latest');
                toastr.success('Product updated successfully.');
            },
            error: function () {
                //do what you want ...inform user with Error message or do something with the front-end

            }
        });
    });

    // #clear-cart
    $("#clear-cart").click(function(){
        console.log("fuck you clear cart ");

        if(!confirm("Do You want to clear the cart!")){
            return false;
        }


        var form=$('#cart-cart-update');
        var formData=new FormData();

        params=form.serializeArray();
        console.log(params);
        $.each(params, function(i, val) {
            formData.append(val.name, val.value);
        });

        $.ajax({
            type: 'POST',
            url: '/carts/cart/clear',
            data:formData,
            cache: false,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {
                toastr.success('Cart cleared successfully.');
                setTimeout(function(){
                    window.location.reload(1);
                }, 1000);
            },
            error: function () {
                //do what you want ...inform user with Error message or do something with the front-end

            }
        });
    });

    //your code here


    $(".add-cart").click(function () {
        var id=$(this).attr('id');
        console.log('id is: '+id);
        //make ajax request to add item in the cart
        $.ajax({
            type:'POST',
            url:"/carts/cart/add",
            data:{id:id},
            dataType:'html',
            success:function (data,textStatus) {
                //do what you want ...inform user with success message or do something with the front-end

                /** The load() method loads data from a server and puts the returned data into the selected element.*/
                $('.top-cart-row').load('/carts/cart/latest');
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
            url:'/carts/cart/delete',
            data:{id:id},
            dataType:'html',
            success:function(data, textStatus, jqXHR)
            {
                // $(".top-cart-row").load('/carts/cart/latest');
                toastr.success('Product deleted successfully.');
                setTimeout(function(){
                    window.location.reload(1);
                }, 1000);
            },
            error:function () {
                //do what you want ...inform user with Error message or do something with the front-end

            }
        });

    });


}); /** end of JQuery****/

