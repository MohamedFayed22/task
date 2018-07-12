<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="{{  asset('assets_'.direction().'/assets/css/icons/icomoon/styles.css')}}" rel="stylesheet"
          type="text/css">
    <link href="{{  asset('assets_'.direction().'/assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{  asset('assets_'.direction().'/assets/css/core.css')}}" rel="stylesheet" type="text/css">
    <link href="{{  asset('assets_'.direction().'/assets/css/components.css')}}" rel="stylesheet" type="text/css">
    <link href="{{  asset('assets_'.direction().'/assets/css/colors.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript"
            src="{{  asset('assets_'.direction().'/assets/js/plugins/loaders/pace.min.js')}}"></script>
    <script type="text/javascript"
            src="{{  asset('assets_'.direction().'/assets/js/core/libraries/jquery.min.js')}}"></script>
    <script type="text/javascript"
            src="{{  asset('assets_'.direction().'/assets/js/core/libraries/bootstrap.min.js')}}"></script>
    <script type="text/javascript"
            src="{{  asset('assets_'.direction().'/assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <!-- /core JS files -->


    <!-- Theme JS files -->
    <script type="text/javascript"
            src="{{  asset('assets_'.direction().'/assets/js/plugins/forms/validation/validate.min.js')}}"></script>
    <script type="text/javascript"
            src="{{  asset('assets_'.direction().'/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/core/app.js')}}"></script>
    <script type="text/javascript"
            src="{{  asset('assets_'.direction().'/assets/js/pages/login_validation.js')}}"></script>

    <script type="text/javascript"
            src="{{  asset('assets_'.direction().'/assets/js/plugins/ui/ripple.min.js')}}"></script>
    <!-- /theme JS files -->


</head>

<body class="login-container login-cover">

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content pb-20">
            @include('particals.messages')

                <!-- Form with validation -->
                <form method="POST" action="{{ route('login') }}" class="form-validate">
                    {{ csrf_field() }}

                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                            <h5 class="content-group">{{ __('login.Login-account') }}

                            </h5>
                        </div>

                        <div class="form-group has-feedback has-feedback-left {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" placeholder="{{ __('login.email') }}" class="form-control" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group has-feedback has-feedback-left {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" placeholder="{{ __('login.password') }}" name="password"
                                   required="required">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group login-options">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" class="styled"
                                               name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        {{ __('login.remember') }}
                                    </label>
                                </div>


                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn bg-pink-400 btn-block">{{ __('login.sign_in') }} <i
                                        class="icon-arrow-right14 position-right"></i></button>
                        </div>

                        <span class="help-block text-center no-margin">
                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                @if ($localeCode != LaravelLocalization::getCurrentLocale())
                                    <li class="p-r-10 inline">
                        <a rel="alternate" hreflang="{{ $localeCode }}"
                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                                @endif

                            @endforeach
                        </span>
                    </div>
                </form>
                <!-- /form with validation -->

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
