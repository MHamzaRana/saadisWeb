@extends('web.layout.web')
@section('content')
@include('web.partials.header')
</div>
<!-- cart items section start -->
<div class="fashion_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($errors->any())
                <h5 class="text-white text-center w-100 p-2 bg-danger">* {{ $errors->first() }}</h5>
                @endif
                @if(!empty($success))
                <h5 class="text-white text-center w-100 p-2 bg-success">* {{ $success }}</h5>
                @endif
            </div>
        </div>
        <form action="{{route('place-order')}}" method="post" id="cartForm">
            <div class="row">
                <h1 class="fashion_taital mt-5">{{$title}}</h1>

                <div class="col-md-6">
                    <h1>User details</h1>

                    @csrf
                    <input type="hidden" name="items" id="cartItems" value="">
                    <div class="form-group">
                        <label for="userName">Name *</label>
                        <input type="text" class="form-control" name="name" required id="userName" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="userPhone">Phone *</label>
                        <input type="text" class="form-control" name="phone" required id="userPhone" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label for="secondary_phone">Secondary Phone</label>
                        <input type="text" class="form-control" name="secondary_phone" id="secondary_phone" placeholder="(Optional)">
                    </div>
                    <div class="form-group">
                        <label for="userCountry">Country *</label>
                        <select class="form-control" id="userCountry" name="country">
                            <option value="Saudia">Saudia</option>
                            <option value="Pakistan">Pakistan</option>
                            @foreach($countries as $country)
                            <option value="{{$country->name}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="userCity">City *</label>
                        <select class="form-control" id="userCity" name="city">
                            <option value="Karachi">Karachi</option>
                            <option value="Lahore">Lahore</option>
                            @foreach($cities as $city)
                            <option value="{{$city->name}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="userAddress">Address *</label>
                        <input type="text" class="form-control" id="userAddress" name="shipment_address" placeholder="1234 Main St">
                    </div>
                    <button type="submit" class="btn btn-primary bg-theme mt-4 w-100">Place Order</button>

                </div>
                @php
                $total = 0;
                $ids = [];
                @endphp
                <div class="col-md-6">
                    * Delivery charges may vary depending on the parcel weight.
                    @foreach($products as $new)
                    <div class="card mt-4">
                        <div class="card-body">
                            <img class="col-md-4 card-img float-left prod-card-img" src="{{env('ADMIN_URL') .'/uploads/images/products/'. $new->images[0]->path}}">
                            <h5 class="card-title">{{$new->name}}</h5>
                            <p class="card-text">Price: Rs. <span id="prc_pid{{($new->id)}}">{{$new->price}}</span></p>
                            @if($new->inventory && intval($new->inventory->qty) > 0)
                            @php $total += intval($new->price); array_push($ids,$new->id); @endphp
                            <div class="offset-md-8 col-md-4">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="qty[pid{{($new->id)}}]">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </span>
                                    <input type="text" id="qty_pid{{($new->id)}}" name="qty[pid{{($new->id)}}]" class="form-control input-number" value="1" min="0" @if(intval($new->inventory->qty) < 5) max="{{$new->inventory->qty}}" @else max="5" @endif>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="qty[pid{{($new->id)}}]">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </span>
                                </div>
                            </div>
                            @else
                            <div class="badge badge-danger p-2 float-right fs-m" data-id="{{$new->id}}">Sold out <i class="fa fa-shopping-cart"></i></div>
                            <p>Not included</p>
                            @endif
                            <!-- <div class="buy_bt btn btn-default cart_remove" data-id="{{$new->id}}" style="display: none;"><a onclick="removeFromCart('{{$new->id}}');">Remove <i class="fa fa-shopping-cart"></i></a></div> -->
                        </div>
                    </div>
                    @endforeach

                    <div class="card mt-4">
                        <div class="card-body">
                            <h3 class="card-title p-0">Total</h3>
                            <p class="card-text">Price: Rs. <span id="totalCharges">{{$total}}</span><br>
                                Delivery Charges: Rs. <span id="deliveryCharges">200</span><br>
                                Net Amount: Rs. <span id="netAmount">{{(intval($total) + intval(200))}}</span></p>

                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
<!-- fashion section end -->

@push('styles')
<style>
    .prod-card-img {
        padding: 0 10px 0 0;
        max-height: 150px;
        object-fit: cover;
    }

    .bg-theme {
        background: #63a5ee;
        border-color: #63a5ee;
    }

    .fs-m {
        font-size: medium;
    }
</style>
@endpush

@push('scripts')
<script>
    let ids = JSON.parse("{{json_encode($ids)}}");
    $(document).ready(function() {
        finalCartItems();
        $('#CartInstantView').hide();
        autoFillCartInfo();
    });


    // Quantity JS started
    $('.btn-number').click(function(e) {
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        type = $(this).attr('data-type');
        var input = $("input[name='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {

                if (currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if (parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if (type == 'plus') {

                if (currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function() {
        $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {

        minValue = parseInt($(this).attr('min'));
        maxValue = parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if (valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        grossAmnt = 0;
        netAmnt = 0;
        totalQty = 0;
        $.each(ids, function(k, v) {
            console.log(v);
            console.log($('#prc_pid' + v).text());
            console.log($('#qty_pid' + v).val());
            prc = $('#prc_pid' + v).text();
            qty = $('#qty_pid' + v).val();
            totalPrc = (parseInt(prc) * parseInt(qty));
            totalQty += parseInt(qty);
            grossAmnt += totalPrc;
        });
        setTimeout(() => {
            $('#totalCharges').text(grossAmnt);
            if (totalQty <= 2)
                $('#deliveryCharges').text(125);
            else if (totalQty > 2 && totalQty <= 5)
                $('#deliveryCharges').text(250);
            else if (totalQty > 5 && totalQty <= 10)
                $('#deliveryCharges').text(500);
            else if (totalQty > 10 && totalQty <= 15)
                $('#deliveryCharges').text(750);
            else if (totalQty > 15 && totalQty <= 20)
                $('#deliveryCharges').text(1000);
            else if (totalQty > 20 && totalQty <= 25)
                $('#deliveryCharges').text(1250);
            else if (totalQty > 25 && totalQty <= 30)
                $('#deliveryCharges').text(1500);

            setTimeout(() => {
                netAmnt = grossAmnt + parseInt($('#deliveryCharges').text());
                $('#netAmount').text(netAmnt);
            }, 300);
        }, 400);

    });
    $(".input-number").keydown(function(e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    // Quantity JS ended
    let checked = false;
    // From JS
    $('#cartForm').on('submit', function(e) {
        if (!checked) {
            e.preventDefault();
            if ($('#userName').val() && $('#userPhone').val() && $('#userAddress').val()) {
                localStorage.setItem('userName', $('#userName').val());
                localStorage.setItem('userPhone', $('#userPhone').val());
                localStorage.setItem('userCity', $('#userCity').val());
                localStorage.setItem('userCountry', $('#userCountry').val());
                localStorage.setItem('userAddress', $('#userAddress').val());
                if ($('#secondary_phone').val())
                    localStorage.setItem('secondary_phone', $('#secondary_phone').val());
                setTimeout(() => {
                    checked = true;
                    $(e.target).submit();
                }, 500);
            } else {
                alert('Name, Phone, City, Country and Address are required. Please fill into all required fields.');
            }
        }


    })
    // From JS end
</script>
@endpush

@endsection