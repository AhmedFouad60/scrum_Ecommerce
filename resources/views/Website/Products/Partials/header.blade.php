<header class="header">

    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-md-5 topbar-contact-info hidden-xs">
                    <ul class="rel-ls-none rel-ls-inline ">
                        <li>
                            <a href="mailto:info@renfos.com">
                                <span class="fa fa-envelope message-icon"></span>
                                mr.fouad992@gmail.com
                            </a>
                        </li>

                        <li>
                            <a href="callto:12345678">
                                <span class="fa fa-phone"></span>
                                12345678
                            </a>
                        </li>
                    </ul>

                </div>

                <div class="col-md-7 top-right-menu">
                    <ul class="rel-ls-none rel-ls-inline">

                        <li>
                            <div class="search-filed"><i class="fa fa-search"></i></div>
                            <div class="search-box col-xs-12 col-sm-12">
                                <form action="" method="get">
                                    <input type="text" name="search[q]" placeholder="Search" class="form-control">
                                </form>
                                <i class="fa fa-times"></i>
                            </div>
                        </li>

                        <li class="dropdown pull-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="fa fa-user-circle"></span>My Account
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">Login</a>
                                </li>
                                <li>
                                    <a href="#">Register</a>
                                </li>
                                <li>
                                    <a href="#">Wishlist</a>
                                </li>
                                <li>
                                    <a href="#">My Cart</a>
                                </li>
                                <li>
                                    <a href="#">Track my order</a>
                                </li>
                                <li>
                                    <a href="#">Checkout</a>
                                </li>
                            </ul>

                        </li>
                    </ul>

                </div>

            </div>
        </div>
    </div>


    <nav id="navbar" class="navbar yamm  navbar-default">
        <div class="container">

            <div class="navbar-header">

                <!-- Brand and toggle get grouped for better mobile display -->

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://demos.lavalite.org/shopping">Scrum_Ecommerce
                    {{--<img src="http://demos.lavalite.org/shopping/img/logo-white.png" class="logo-white" alt="">--}}
                    {{--<img src="http://demos.lavalite.org/shopping/img/logo.png" class="logo-color" alt="">--}}
                </a>

            </div><!--End of the navbar-header -->

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="{{URL::to('/products')}}" >Home </a>
                    </li>
                    <li class=""><a href="#" >Search </a></li>
                    <li class=""><a href="#">Clothing </a></li>
                    <li class=""><a href="#">Electronics </a></li>
                    <li class=""><a href="#">About Us </a></li>
                    <li class=""><a href="#">Blog </a></li>
                    <li class=""><a href="#">Contact </a></li>
                    <li class="top-cart-row">

                        @include('Website.Products.Partials.latest')
                    </li>



                </ul>
            </div>


















        </div><!--End of the container-->

    </nav>





</header>


