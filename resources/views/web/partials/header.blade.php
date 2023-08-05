<!-- banner bg main start -->
<div class="banner_bg_main" @if(isset($banner)) style="background-image: url({{$banner}});padding-bottom:4rem;" @endif>
    <!-- header top section start -->
    <div class="container">
        <div class="header_section_top">
            <div class="row">
                <div class="col-sm-12">
                    <div class="custom_menu">
                        <ul>
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
                    <div class="logo"><a href="{{env('APP_URL')}}"><img src="{{asset('theme/images/profile.png')}}"></a></div>
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
                    <a href="index.html">Home</a>
                    <a href="{{route('explore','new-arrival')}}">New Arrival</a>
                    <a href="{{route('explore','bin-saeed')}}">Bin Saeed</a>
                    <a href="{{route('explore','alaaya')}}">Aalaya</a>
                    <a href="{{route('explore','all-collections')}}">All Collections</a>
                </div>
                <span class="toggle_icon" onclick="openNav()"><img class="toggle-icon-img" src="{{asset('theme/images/toggle-icon.png')}}"></span>
                <div class="dropdown d-none">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
                <div @if(isset($title) && $title == 'Cart') class="main d-none" @else class="main" @endif>
                    <!-- Another variation with a button -->
                    <form action="{{route('explore','all-collections')}}" method="get" id="searchForm">
                    <div class="input-group">
                        
                        <input type="text" name="search" class="form-control" placeholder="Search" id="searchInput">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button" onclick="$('#searchForm').submit();" style="background-color: #63a5ee; border-color:#63a5ee ">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                        
                    </div>
                    </form>
                </div>
                <div @if(isset($title) && $title == 'Cart') class="header_box d-none" @else class="header_box" @endif>
                    <div class="lang_box d-none">
                        <a href="#" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true">
                            <img src="{{asset('theme/images/flag-uk.png')}}" alt="flag" class="mr-2 " title="United Kingdom"> English <i class="fa fa-angle-down ml-2" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu ">
                            <a href="#" class="dropdown-item">
                                <img src="{{asset('theme/images/flag-france.png')}}" class="mr-2" alt="flag">
                                French
                            </a>
                        </div>
                    </div>
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