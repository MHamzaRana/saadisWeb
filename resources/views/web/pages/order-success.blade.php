@extends('web.layout.web')
@section('content')
@push('styles')

<style>
    body {
        text-align: center;
        /* padding: 40px 0; */
        background: #EBF0F5;
    }

    h1 {
        color: #64a7ee;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 10px;
    }

    p {
        color: #404F5E;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-size: 20px;
        margin: 0;
    }

    .checkDiv>i {
        color: #64a7ee;
        font-size: 100px;
        line-height: 200px;
        margin-left: -15px;
    }

    .card {
        background: white;
        /* padding: 60px; */
        padding: 30px 60px 60px 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
    }

    .home {
        margin-bottom: 30px;
    }

    .home a {
        color: #64a7ee;
    }
</style>
@endpush
<div class="card mb-5">
    <h2 class="home"><a href="{{env('APP_URL')}}"><i class="fa fa-arrow-left"></i> Back to home</a></h2>
    <!-- <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;"> -->
    <div class="checkDiv" style="border-radius:200px; height:200px; width:200px; background: #edf5fd; margin:0 auto;">
        <i class="checkmark">✓</i>
    </div>
    <h1>Success</h1>
    <p>Your order has been placed successfully!<br /> Below is the order summary.<br>Take a screenshot or download.</p>
</div>
<div class="row mb-5">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <h2>Order Summary</h2>
            <p class="mb-3">* Order is placed with available items and respective quantities.</p>
            <hr>
            <div class="form-row">
                <span for="name">Name:</span>
                <input class="form-control border-less-field" readonly type="text" value="{{$order->name}}">
            </div>

            <div class="form-row">
                <span for="name">Phone:</span>
                <input class="form-control border-less-field" readonly type="text" value="{{$order->phone}}">
            </div>

            <div class="form-row">
                <span for="name">Shipment Address:</span>
                <input class="form-control border-less-field" readonly type="text" value="{{$order->shipment_address}}">
            </div>
            <hr>
            <div class="form-row mt-3 mb-3">
                <strong class="col-md-3 bold">Total Items Price:</strong>
                <strong class="col-md-3">Rs. {{intval($order->price) - intval($order->delivery_charges)}}/-</strong>
                <strong class="col-md-3">Delivery Charges:</strong>
                <strong class="col-md-3">Rs. {{$order->delivery_charges}}/-</strong>
                <strong class="col-md-3 bg-primary text-white p-1">Total:</strong>
                <strong class="col-md-3 bg-primary text-white p-1">Rs. {{$order->price}}/-</strong>
            </div>
            <div class="table-responsive">
                <table class="table table-striped w-100">
                    <thead>
                        <tr>
                            <th>
                                Item
                            </th>
                            <th>
                                Quantity
                            </th>
                            <th>
                                Price
                            </th>
                            <th>
                                Total
                            </th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach($order->orderProducts as $item)
                        <tr>
                            <td>{{$item->product->name}}</td>
                            <td>{{$item->qty}}</td>
                            <td>{{$item->product->price}}</td>
                            <td>{{intval($item->product->price) * intval($item->qty)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>



@push('scripts')
<script>
    localStorage.removeItem('items');
</script>
@endpush
@endsection