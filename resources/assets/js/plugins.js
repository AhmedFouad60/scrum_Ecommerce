$(document).ready(function(){

    // Owl carousel
    if ($('#trending-slider').length) {
        $("#trending-slider").owlCarousel({
            // rtl:true,
            rewind:true,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:3,
                    nav:false
                },
                1000:{
                    items:5,
                    nav:true,
                    loop:false
                }
            }

        });
    }

    //Raty plugin
    $('.star-rate').raty({
        // This is the config you need to change the tag from image to icon
        starType : 'i',
        // half:true,
    });

});



