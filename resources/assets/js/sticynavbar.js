$(document).ready(function() {
    // When the user scrolls the page, execute myFunction
    window.onscroll = function() {myFunction()};


$('.navbar-nav li a').click(function (e) {
    e.preventDefault()
        // If this isn't already active
        if (!$(this).hasClass("active")) {
            // Remove the class from anything that is active
            $("li.active").removeClass("active");
            window.onbeforeunload = null;
            // And make this active
            $(this).parent().addClass("active");
            window.onbeforeunload = null;
        }

});



// Get the navbar
    var navbar = document.getElementById("navbar");
    console.log('navbar');

// Get the offset position of the navbar
    var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")

            adjust_navbar()

        } else {
            navbar.classList.remove("sticky");
            adjust_navbar_back()
        }
    }

    function adjust_navbar() {

        navbar.classList.add("sticky-nav")
        $(".navbar-nav li a ").css( "color", "#555" );
        $(".navbar-default .navbar-brand").css( "color", "#00aff0" );


    }

    function adjust_navbar_back() {
        navbar.classList.remove("sticky-nav")
        $( ".navbar-nav li a " ).css( "color", "#FFFFFF" );
        $(".navbar-default .navbar-brand").css( "color", "#FFFFFF" );

    }
});

