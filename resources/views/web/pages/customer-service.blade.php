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
                @if(session('success'))
                <h5 class="text-white text-center w-100 p-2 bg-success"> {{ session('success') }}</h5>
                @endif
            </div>
        </div>
        <form action="{{route('customer-message')}}" method="post" id="customerForm">
            <div class="row">
                <h1 class="fashion_taital mt-5">Customer Service</h1>

                <div class="col-md-6 offset-md-3">
                    <h1>Write to us</h1>

                    @csrf
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
                            <option value="">Select country</option>
                            <option value="Pakistan">Pakistan</option>
                            @foreach($countries as $country)
                            <option value="{{$country->name}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="userCity">City *</label>
                        <select class="form-control" id="userCity" name="city">
                            <option value="">Select city</option>
                            <option value="Lahore">Lahore</option>
                            @foreach($cities as $city)
                            <option value="{{$city->name}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="userMessage">Message *</label>
                        <textarea class="form-control" id="userMessage" name="message"></textarea>
                    </div>
                    <button type="submit" id="submitBtn" class="btn btn-primary bg-theme mt-4 w-100">Submit</button>
                    <span id="loadingBtn" class="btn btn-primary bg-theme mt-4 w-100" style="display: none;">
                        <i class="fa fa-spinner fa-spin"></i>
                    </span>

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
        object-fit: contain;
    }

    .bg-theme {
        background: #64a7ee;
        border-color: #64a7ee;
    }

    .fs-m {
        font-size: medium;
    }

    p {
        margin: 5px;
    }

    .rmBtnMobile {
        position: absolute;
        top: 0;
        right: 12px;
        color: #dc3545 !important;
    }

</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        finalCartItems();
        $('#CartInstantView').hide();
        autoFillCartInfo();
    });


   
    let checked = false;
    // From JS
    $('#customerForm').on('submit', function(e) {
        $('#submitBtn').hide();
        $('#loadingBtn').show();
        if (!checked) {
            e.preventDefault();
            if ($('#userName').val() && $('#userPhone').val() && $('#userMessage').text()) {
                setTimeout(() => {
                    checked = true;
                    $(e.target).submit();
                }, 50);
            } else {
                alert('Name, Phone, City, Country and Message are required. Please fill into all required fields.');
                $('#submitBtn').show();
                $('#loadingBtn').hide();
            }
        }


    })
    // From JS end
    
</script>
@endpush

@endsection