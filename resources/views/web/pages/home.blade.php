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
                                        <!-- <img class="product-img" title="{{$new->label}}" src="{{env('ADMIN_URL') .'/uploads/images/products/'. $new->images[0]->path}}" alt="{{$new->label}}"> -->
                                        <iframe width="300" height="476" class="prod-video" src="{{url($new->video[0]->url)}}" sandbox="allow-forms allow-scripts allow-pointer-lock allow-same-origin allow-top-navigation" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true">
                                        </iframe>
                                        <!-- iframe width is 267 -->
                                        <!-- <img class="play-button" onclick="playVideo('{{$new->video[0]->url}}');" data-url="{{$new->video[0]->url}}" src="{{asset('theme/images/play-button.png')}}" data-toggle="modal" data-target=".video-modal-lg" alt="Paly"> -->

                                        <!-- <iframe width="100%" height="500" src="https://www.youtube.com/embed/HyQWr89JVEg"
                                            sandbox="allow-forms allow-scripts allow-pointer-lock allow-same-origin allow-top-navigation">
                                        </iframe> -->
                                    </div>
                                    <div class="btn_main">
                                        @if($new->inventory && $new->inventory->qty > 0)
                                        <div class="buy_bt btn btn-default cart_add" data-id="{{$new->id}}"><a onclick="addToCart('{{$new->id}}');">Add <i class="fa fa-shopping-cart"></i></a></div>
                                        <div class="buy_bt btn btn-default cart_remove" data-id="{{$new->id}}" style="display: none;"><a onclick="removeFromCart('{{$new->id}}');">Remove <i class="fa fa-shopping-cart"></i></a></div>
                                        <!-- <div class="seemore_bt"><a href="#">See More</a></div> -->
                                        @else
                                        <div class="buy_bt btn btn-default fw-bold">Sold out</div>
                                        @endif
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
            <a href="{{route('explore','new-arrival')}}">
                <i class="fa fa-hand-pointer-o icon-shadow"></i><span class="loadMoreText"> Click To See More Items </span>ِ<br>مزید دیکھنے کیلئے کلک کریں<br><i class="fa fa-2x fa-angle-down"></i>
            </a>
        </div>

        <!-- <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a> -->
    </div>
</div>
<!-- fashion section end -->

@push('styles')
<style>
    .fw-bold {
        font-weight: bold;
    }
</style>
@endpush
@endsection