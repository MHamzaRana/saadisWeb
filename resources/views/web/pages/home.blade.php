@extends('web.layout.web')
@section('content')
@include('web.partials.header')
@include('web.partials.banner')
<!-- fashion section start -->
<div class="fashion_section">
    <!-- <div id="main_slider" class="carousel slide" data-ride="carousel"> -->
    <div id="main_slider" class="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <h1 class="fashion_taital mt-5">New Arrival</h1>
                    <div class="fashion_section_2">
                        <div class="row">
                            @foreach($newArrivals as $new)
                            <div class="col-lg-4 col-sm-6">
                                <div class="box_main">
                                    <h4 class="shirt_text">{{$new->name}}</h4>
                                    <p class="price_text">Price <s style="color: #969696;">Rs. {{$new->st_price}}</s><br><span style="color: #262626;"> Rs. {{$new->price}}</span></p>
                                    <div class="tshirt_img">
                                        <img class="product-img" src="{{env('ADMIN_URL') .'/uploads/images/products/'. $new->images[0]->path}}">
                                        <img class="play-button" data-url="{{$new->video[0]->url}}" src="{{asset('theme/images/play-button.png')}}">

                                        <!-- <iframe width="100%" height="500" src="https://www.youtube.com/embed/HyQWr89JVEg"
                                            sandbox="allow-forms allow-scripts allow-pointer-lock allow-same-origin allow-top-navigation">
                                        </iframe> -->
                                    </div>
                                    <div class="btn_main">
                                        <div class="buy_bt btn btn-default cart_add" data-id="{{$new->id}}"><a onclick="addToCart('{{$new->id}}');">Add <i class="fa fa-shopping-cart"></i></a></div>
                                        <div class="buy_bt btn btn-default cart_remove" data-id="{{$new->id}}" style="display: none;"><a onclick="removeFromCart('{{$new->id}}');">Remove <i class="fa fa-shopping-cart"></i></a></div>
                                        <!-- <div class="seemore_bt"><a href="#">See More</a></div> -->
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="loadMore">
        <a  href="{{route('explore','new-arrival')}}">
           <span>More</span> <i class="fa fa-angle-down"></i>
        </a>
        </div>
       
        <!-- <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a> -->
    </div>
</div>
<!-- fashion section end -->
<!-- electronic section start -->
<div class="fashion_section">
    <!-- <div id="electronic_main_slider" class="carousel slide" data-ride="carousel"> -->
    <div id="electronic_main_slider" class="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <h1 class="fashion_taital">Bin Saeed</h1>
                    <div class="fashion_section_2">
                        <div class="row">
                        @foreach($binSaeed as $BSitem)
                            <div class="col-lg-4 col-sm-6">
                                <div class="box_main">
                                    <h4 class="shirt_text">{{$BSitem->name}}</h4>
                                    <p class="price_text">Price <s style="color: #969696;">Rs. {{$BSitem->st_price}}</s><br><span style="color: #262626;"> Rs. {{$BSitem->price}}</span></p>
                                    <div class="tshirt_img">
                                        <img class="product-img" src="{{env('ADMIN_URL') .'/uploads/images/products/'. $BSitem->images[0]->path}}">
                                        <img class="play-button" data-url="{{$BSitem->video[0]->url}}" src="{{asset('theme/images/play-button.png')}}">

                                        <!-- <iframe width="100%" height="500" src="https://www.youtube.com/embed/HyQWr89JVEg"
                                            sandbox="allow-forms allow-scripts allow-pointer-lock allow-same-origin allow-top-navigation">
                                        </iframe> -->
                                    </div>
                                    <div class="btn_main">
                                        <div class="buy_bt btn btn-default cart_add" data-id="{{$new->id}}"><a onclick="addToCart('{{$new->id}}');">Add <i class="fa fa-shopping-cart"></i></a></div>
                                        <div class="buy_bt btn btn-default cart_remove" data-id="{{$new->id}}" style="display: none;"><a onclick="removeFromCart('{{$new->id}}');">Remove <i class="fa fa-shopping-cart"></i></a></div>
                                        <!-- <div class="seemore_bt"><a href="#">See More</a></div> -->
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="loadMore">
        <a  href="{{route('explore','bin-saeed')}}">
           <span>More</span> <i class="fa fa-angle-down"></i>
        </a>
        </div>
        <!-- <a class="carousel-control-prev" href="#electronic_main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#electronic_main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a> -->
    </div>
</div>
<!-- electronic section end -->
<!-- jewellery  section start -->
<div class="jewellery_section">
    <div id="jewellery_main_slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <h1 class="fashion_taital">Alaaya</h1>
                    <div class="fashion_section_2">
                        <div class="row">
                        @foreach($alaaya as $ALitem)
                            <div class="col-lg-4 col-sm-6">
                                <div class="box_main">
                                    <h4 class="shirt_text">{{$ALitem->name}}</h4>
                                    <p class="price_text">Price <s style="color: #969696;">Rs. {{$ALitem->st_price}}</s><br><span style="color: #262626;"> Rs. {{$ALitem->price}}</span></p>
                                    <div class="tshirt_img">
                                        <img class="product-img" src="{{env('ADMIN_URL') .'/uploads/images/products/'. $ALitem->images[0]->path}}">
                                        <img class="play-button" data-url="{{$ALitem->video[0]->url}}" src="{{asset('theme/images/play-button.png')}}">

                                        <!-- <iframe width="100%" height="500" src="https://www.youtube.com/embed/HyQWr89JVEg"
                                            sandbox="allow-forms allow-scripts allow-pointer-lock allow-same-origin allow-top-navigation">
                                        </iframe> -->
                                    </div>
                                    <div class="btn_main">
                                        <div class="buy_bt btn btn-default cart_add" data-id="{{$new->id}}"><a onclick="addToCart('{{$new->id}}');">Add <i class="fa fa-shopping-cart"></i></a></div>
                                        <div class="buy_bt btn btn-default cart_remove" data-id="{{$new->id}}" style="display: none;"><a onclick="removeFromCart('{{$new->id}}');">Remove <i class="fa fa-shopping-cart"></i></a></div>
                                        <!-- <div class="seemore_bt"><a href="#">See More</a></div> -->
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="loadMore">
        <a  href="{{route('explore','alaaya')}}">
           <span>More</span> <i class="fa fa-angle-down"></i>
        </a>
        </div>
        <!-- <a class="carousel-control-prev" href="#jewellery_main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#jewellery_main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a> -->
        <!-- <div class="loader_main">
            <div class="loader"></div>
        </div> -->
    </div>
</div>
<!-- jewellery  section end -->
@endsection