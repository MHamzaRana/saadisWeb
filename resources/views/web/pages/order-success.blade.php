@extends('web.layout.web')
@section('content')
@push('styles')

<style>
    body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
    }

    h1 {
        color: #63a5ee;
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
        color: #63a5ee;
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
        color: #63a5ee;
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
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card mb-5">
            <table class="table table-responsive">
                <thead>

                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>



@push('scripts')
<script>
    localStorage.removeItem('items');
</script>
@endpush
@endsection