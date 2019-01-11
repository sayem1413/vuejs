<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin Dashboard</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{asset('admin-dist/')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{asset('admin-dist/')}}/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{asset('admin-dist/')}}/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="{{asset('admin-dist/')}}/vendor/morrisjs/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{asset('admin-dist/')}}/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        
        <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
        
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <div id="app">
            <div id="wrapper">

                <!-- Navigation -->
                <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <!-- /.navbar-top-links -->
                    @include('admin.includes.header')
                    <div class="navbar-default sidebar" role="navigation">
                        @include('admin.includes.menu')
                        <!-- /.sidebar-collapse -->
                    </div>
                    <!-- /.navbar-static-side -->
                </nav>

                <div id="page-wrapper">
                    <admin-main></admin-main>
                </div>
                <!-- /#page-wrapper -->

            </div>
        </div>
        <!-- /#wrapper -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- jQuery -->
        <script src="{{asset('admin-dist/')}}/vendor/jquery/jquery.min.js"></script>
        
        
        
        <!-- Bootstrap Core JavaScript -->
        <script src="{{asset('admin-dist/')}}/vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{asset('admin-dist/')}}/vendor/metisMenu/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="{{asset('admin-dist/')}}/vendor/raphael/raphael.min.js"></script>
        <script src="{{asset('admin-dist/')}}/vendor/morrisjs/morris.min.js"></script>
        <script src="{{asset('admin-dist/')}}/data/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{asset('admin-dist/')}}/dist/js/sb-admin-2.js"></script>
        

    </body>

</html>


