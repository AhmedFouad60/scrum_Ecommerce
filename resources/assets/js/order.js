$(document).ready(function () {
    //your code here

    $(".billing-address").click(function(e){
        if($("#address-new"). prop("checked") == true){
            $("#payment-new").removeClass('hide');
            $("#payment-existing").addClass('hide');
        }
        if($("#address-exist"). prop("checked") == true){
            $("#payment-existing").removeClass('hide');
            $("#payment-new").addClass('hide');
        }
    });


    $(".shipping-address").click(function(e){
        if($("#shippingaddress-new"). prop("checked") == true){
            $("#shipping-new").removeClass('hide');
            $("#shipping-existing").addClass('hide');
        }
        if($("#shippingaddress-exist"). prop("checked") == true){
            $("#shipping-existing").removeClass('hide');
            $("#shipping-new").addClass('hide');
        }
    });


});
/** end of JQuery **/