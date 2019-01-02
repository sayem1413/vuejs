
@extends('frontEnd.master')

@section('title')
Register-Login
@endsection

@section('mainContent')
<hr/>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="well lead text-center text-success">You have to register or login (if registerd) to complete your order. </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="well box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Register</h3>
                </div>
                <!-- box header -->
                <!-- form start -->
                {!! Form::open(['url'=>'/checkout/sign-up', 'method'=>'POST',]) !!}
                <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" name="firstName" class="form-control" placeholder="first name">
                </div>
                <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" name="lastName" class="form-control" placeholder="last name">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="email">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <textarea name="address" class="form-control" placeholder="Enter your Address"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Mobile Number</label>
                    <input type="number" name="phoneNumber" class="form-control">
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
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-lg-6">
            <div class="well box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Login</h3>
                </div>
                <!-- box header -->
                <!-- form start -->
                {!! Form::open(['url'=>'/customer/login', 'method'=>'POST',]) !!}
                
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="email">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    
</div>
@endsection

