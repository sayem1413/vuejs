
@extends('frontEnd.master')

@section('title')
Payment option
@endsection

@section('mainContent')
<hr/>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="well lead text-center text-success">Hello, You have to give shipping information to complete your order. If your product billing information & shipping information are same then just press on Save shipping information button </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="well box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Payemtn Option</h3>
                </div>
                <!-- box header -->
                <!-- form start -->
                {!! Form::open(['url'=>'/checkout/save-order', 'method'=>'POST', 'name'=>'paymentForm']) !!}
                <div class="form-group">
                    <div class="">
                        <label><input type="radio" name="paymentType" value="cashOnDelivery">Cash On Delivery</label>
                    </div>
                    <div class="">
                        <label><input type="radio" name="paymentType" value="bKash">  Bkash</label>
                    </div>
                    <div class="">
                        <label><input type="radio" name="paymentType" value="paypal">  Paypal</label>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-block">Save Order Info</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection