
@extends('frontEnd.master')

@section('title')
Shipping Info
@endsection

@section('mainContent')
<hr/>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="well lead text-center text-success">Hello <b>{{$customerById->firstName}}</b> <b>{{$customerById->lastName}}</b> You have to give shipping information to complete your order. If your product billing information & shipping information are same then just press on Save shipping information button </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="well box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Shipping Form</h3>
                </div>
                <!-- box header -->
                <!-- form start -->
                {!! Form::open(['url'=>'/checkout/save-shipping', 'method'=>'POST', 'name'=>'shippingForm']) !!}
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="fullName" value="{{$customerById->firstName.' '.$customerById->lastName}}" class="form-control" placeholder="first name">
                </div>
                
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" value="{{$customerById->email}}" class="form-control" placeholder="email">
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <textarea name="address" class="form-control" placeholder="Enter your Address">{{$customerById->address}}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Mobile Number</label>
                    <input type="number" name="phoneNumber" value="{{$customerById->phoneNumber}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">District Name</label>
                    <select type="text" name="districtName" class="form-control">
                        <option value="dha">Dhaka</option>
                        <option value="nara">Narayangonj</option>
                        <option value="gaz">Gazipur</option>
                        <option value="sav">Savar</option>
                        <option value="com">Comilla</option>
                        <option value="chi">Chittagonj</option>
                        <option value="raj">Rajshahi</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Save Shipping Info</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<script>
    document.forms['shippingForm'].elements['districtName'].value = '{{$customerById->districtName}}';
</script>
@endsection



