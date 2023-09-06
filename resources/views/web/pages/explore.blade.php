@extends('web.layout.web')
@section('content')
@include('web.partials.header')
</div>
<!-- fashion section start -->
<div class="fashion_section">
    <!-- <div id="main_slider" class="carousel slide" data-ride="carousel"> -->
    <div id="main_slider" class="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <h2 class="fashion_taital mt-5">{{$title}}</h2>
                    <div class="fashion_section_2">
                        <div class="row">
                            @foreach($products as $new)
                            @php if($title == 'Best Seller'){
                                $new = $new->product;
                            } @endphp
                            <div class="col-lg-4 col-sm-6">
                                <div class="box_main">
                                    <h4 class="shirt_text">{{$new->name}}</h4>
                                    <p class="price_text">Price <s style="color: #969696;">Rs. {{$new->st_price}}</s><br><span style="color: #262626;"> Rs. {{$new->price}}</span></p>
                                    <div class="tshirt_img">
                                        <!-- <img class="product-img" title="{{$new->label}}" src="{{env('ADMIN_URL') .'/uploads/images/products/'. $new->images[0]->path}}"
                                        alt="{{$new->label}}">
                                        <img class="play-button" onclick="playVideo('{{$new->video[0]->url}}');" data-url="{{$new->video[0]->url}}" src="{{asset('theme/images/play-button.png')}}" 
                                        data-toggle="modal" data-target=".video-modal-lg" alt="Play"> -->
                                        <iframe width="267" height="476" class="prod-video" src="{{url($new->video[0]->url)}}" sandbox="allow-forms allow-scripts allow-pointer-lock allow-same-origin allow-top-navigation" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true">
                                        </iframe>
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
                            <div class="col-md-12 mt-5 tbl-pagination">
                                {{ $products->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a> -->
    </div>
</div>
<!-- fashion section end -->
@push('modal')
<div class="modal fade video-modal-lg" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- stopVideo(); -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="stopVideo();" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
            <iframe width="267" height="476" class="prod-video" id="prodVideoLink" src="" 
                sandbox="allow-forms allow-scripts allow-pointer-lock allow-same-origin allow-top-navigation"
                style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" 
                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true">
                </iframe>
                <!-- width=100%; height:600px; -->
            </div>
        </div>
    </div>
</div>
@endpush
@endsection