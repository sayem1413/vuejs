<!DOCTYPE html>
<html>
    <head>
        <title>E-Shop BD</title>
        <!-- for-mobile-apps -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Smart Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- //for-mobile-apps -->
        <link href="{{asset('frontEnd/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="{{asset('frontEnd/css/flexslider.css')}}" type="text/css" media="screen" />
        <!-- pignose css -->
        <link href="{{asset('frontEnd/css/pignose.layerslider.css')}}" rel="stylesheet" type="text/css" media="all" />

        <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/jquery-ui.css')}}">
        <!-- //pignose css -->
        <link href="{{asset('frontEnd/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
        <!-- js -->
        <script type="text/javascript" src="{{asset('frontEnd/js/jquery-2.1.4.min.js')}}"></script>
        <!-- //js -->
        <script src="{{asset('frontEnd/js/imagezoom.js')}}"></script>

        <script src="{{asset('frontEnd/js/jquery.flexslider.js')}}"></script>
        <!-- cart -->
        <script src="{{asset('frontEnd/js/simpleCart.min.js')}}"></script>
        <!-- cart -->
        <!-- for bootstrap working -->
        <script type="text/javascript" src="{{asset('frontEnd/js/bootstrap-3.1.1.min.js')}}"></script>
        <!-- //for bootstrap working -->
        <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
        <script src="{{asset('frontEnd/js/jquery.easing.min.js')}}"></script>
    </head>
    <body>
        <!-- header -->
        <!-- //header -->
        @include('frontEnd.includes.header')
        <!-- header-bot -->
        <!-- //header-bot -->
        <!-- banner -->
        
        <!-- //banner-top -->
        <div id="app">
            <frontend-menu></frontend-menu>
            <frontend-main></frontend-main>
        </div>
        
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- footer -->
        @include('frontEnd.includes.footer')
        <!-- //footer -->
        <!-- login -->
        <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-info">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
                    </div>
                    <div class="modal-body modal-spa">
                        <div class="login-grids">
                            <div class="login">
                                <div class="login-bottom">
                                    <h3>Sign up for free</h3>
                                    <a href="{{route('register')}}" class="btn btn-primary">Register Here!</a>
                                </div>
                                <div class="login-right">
                                    <h3>Sign in with your account</h3>
                                    <form method="POST" action="{{ url('/user/login') }}">
                                    @csrf
                                        <div class="sign-in">
                                            <h4>Email :</h4>
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="sign-in">
                                            <h4>Password :</h4>
                                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                            <a href="#">Forgot password?</a>
                                        </div>
                                        <div class="single-bottom">
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                            <label for="brand"><span></span>Remember Me.</label>
                                        </div>
                                        <div class="sign-in">
                                            <input type="submit" value="SIGNIN" >
                                        </div>
                                    </form>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //login -->
    </body>
</html>


