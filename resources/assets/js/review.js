
$(".add-review").click(function () {
    let form=$('#product-review');
    let formData=new FormData();
    params=form.serializeArray();


    $.each(params,function (i,val) {
        formData.append(val.name,val.value);
    });
    /**console log for formdata*/
    // for (var pair of formData.entries()) {
    //     console.log(pair[0]+ ', ' + pair[1]);
    // }

    // make ajax request to add review to the product
    $.ajax({
        type:'POST',
        url:"/product/review",
        data:formData,
        cache: false,
        processData: false,
        contentType: false,
        dataType:'json',
        success:function (data,textStatus) {
            //do what you want ...inform user with success message or do something with the front-end
            $.each(data.errors, function(key, value){
               toastr.error(value);
            });
            if (data.success){
                setTimeout(function(){
                    window.location.reload(1);
                }, 1000);
                toastr.success('Review submitted successfully.');

            }



        },

    });

});