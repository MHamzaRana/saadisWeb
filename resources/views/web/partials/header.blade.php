<!-- Mobile view  -->
<div class="row mobile_nav">
    <div class="col-md-12 bg-dark p-3">
        <span class="toggle_icon ml-2" onclick="openMobileNav()"><img alt="Toggle" src="{{asset('theme/images/toggle-icon.png')}}" alt="Toogle"></span>
    </div>
</div>
<div id="mobileSidenav" class="mobilesidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeMobileNav()">&times;</a>
    <a href="{{route('home')}}">Home</a>
    <a href="{{route('explore','new-arrival')}}">New Arrival <span class="badge badge-primary ml-2">New</span></a>
    <a href="{{route('explore','bin-saeed')}}">Bin Saeed  <i class="ml-2 fa fa-star"></i></a> <!-- <span class="badge badge-primary float-right mr-2">Brand</span> -->
    <a href="{{route('explore','aalaya')}}">Aalaya  <i class="ml-2 fa fa-star"></i></a>
    <a href="{{route('explore','all-collections')}}">All Collections</a>
    <a href="{{route('explore','best-seller')}}">Best Seller</a>
    <a href="{{route('explore','today-deal')}}">Today's Deal</a>
    <a href="{{route('customer-service')}}">Customer Service <i class="ml-2 fa fa-mobile"></i></a>
</div>
<!-- banner bg main start -->
<div class="banner_bg_main" @if(isset($banner)) style="background-image: url({{$banner}});padding-bottom:4rem;" @endif>
    <!-- header top section start -->
    <div class="container">
        <div class="header_section_top">
            <div class="row">
                <div class="col-sm-12">
                    <div class="custom_menu">
                        <ul>
                            <li><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
                            <li><a href="{{route('explore','best-seller')}}">Best Sellers</a></li>
                            <li><a href="{{route('explore','all-collections')}}">All Collections</a></li>
                            <li><a href="{{route('explore','new-arrival')}}">New Arrival</a></li>
                            <li><a href="{{route('explore','today-deal')}}">Today's Deals</a></li>
                            <li><a href="{{route('customer-service')}}">Customer Service</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header top section start -->
    <!-- logo section start -->
    <div class="logo_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="logo">
                        <a href="{{env('APP_URL')}}" class="home-link"><img src="{{asset('theme/images/profile.png')}}" alt="Profile"></a>
                        <a onclick="openMobileNav()" class="menu-link cursor-pointer"><img src="{{asset('theme/images/profile.png')}}" alt="Profile"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- logo section end -->
    <!-- header section start -->
    <div class="header_section">
        <div class="container">
            <div class="containt_main">
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href="{{route('home')}}">Home</a>
                    <a href="{{route('explore','new-arrival')}}">New Arrival</a>
                    <a href="{{route('explore','bin-saeed')}}">Bin Saeed</a>
                    <a href="{{route('explore','aalaya')}}">Aalaya</a>
                    <a href="{{route('explore','all-collections')}}">All Collections</a>
                </div>
                <span class="toggle_icon" onclick="openNav()"><img class="toggle-icon-img" src="{{asset('theme/images/toggle-icon.png')}}" alt="Toogle"></span>
                <div class="dropdown d-none">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
                <div @if(isset($title) && $title == 'Cart' ) class="main d-none" @else class="main" @endif>
                    <!-- Another variation with a button -->
                    <form action="{{route('explore','all-collections')}}" method="get" id="searchForm">
                        <div class="input-group">

                            <input type="text" name="search" class="form-control" placeholder="Search" id="searchInput">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button" onclick="$('#searchForm').submit();" style="background-color: #64a7ee; border-color:#64a7ee ">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
                <div @if(isset($title) && $title == 'Cart' ) class="header_box d-none" @else class="header_box" @endif>
                    <!-- <div class="lang_box">
                        <a href="#" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true">
                            <img src="{{asset('theme/images/flag-uk.png')}}" alt="flag" class="mr-2 " title="United Kingdom"> English <i class="fa fa-angle-down ml-2" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu ">
                            <a href="#" class="dropdown-item">
                                <img src="{{asset('theme/images/flag-france.png')}}" class="mr-2" alt="flag">
                                French
                            </a>
                        </div>
                    </div> -->
                    <div class="login_menu">
                        <ul>
                            <li><a href="{{route('cart')}}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span class="padding_10">Cart</span></a>
                            </li>
                            <li><a href="{{route('cart')}}">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span class="padding_10">Cart</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header section end -->