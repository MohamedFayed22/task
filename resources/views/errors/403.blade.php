<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="baseUrl" content="{{ asset('/') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | @yield('title')</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{  asset('assets_'.direction().'/assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{  asset('assets_'.direction().'/assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{  asset('assets_'.direction().'/assets/css/core.css')}}" rel="stylesheet" type="text/css">
    <link href="{{  asset('assets_'.direction().'/assets/css/components.css')}}" rel="stylesheet" type="text/css">
    <link href="{{  asset('assets_'.direction().'/assets/css/colors.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->

    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/plugins/loaders/pace.min.js')}}"></script>
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/core/libraries/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/core/libraries/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <!-- /core JS files -->


    <!-- Theme JS files -->
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/core/app.js')}}"></script>
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/plugins/ui/ripple.min.js')}}"></script>
    <!-- /theme JS files -->

</head>

<body class="login-container">



<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <!-- Error title -->
                <div class="text-center content-group">
                    <h1 class="error-title">403</h1>
                    <h5>Oops, an error has occurred. Forbidden!</h5>
                </div>
                <!-- /error title -->


                <!-- Error content -->
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
                        <form action="#" class="main-search panel panel-body">
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control input-lg" placeholder="Search...">
                                <div class="form-control-feedback">
                                    <i class="icon-search4 text-size-large text-muted"></i>
                                </div>
                            </div>

                            <div class="text-center">
                                <a href="{{ route('home') }}" class="btn bg-pink-400"><i class="icon-circle-left2 position-left"></i> Back to dashboard</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /error wrapper -->


                <!-- Footer -->
                <div class="footer text-muted text-center">
                    &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
                </div>
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

</body>
</html>
