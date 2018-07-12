<!DOCTYPE html>
<html lang="en" dir="{{ direction() }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="lang" content="{{ app()->getLocale() }}">
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

    <link href="{{  asset('assets_'.direction().'/assets/css/map.css')}}" rel="stylesheet" type="text/css">

    <link href="{{  asset('assets_'.direction().'/assets/css/colors.css')}}" rel="stylesheet" type="text/css">
    <link href="{{  asset('assets_'.direction().'/assets/css/extras/animate.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">


   


    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/bootstrap.min.css"/>

    <!--
        RTL version
    -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.rtl.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/default.rtl.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/semantic.rtl.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/bootstrap.rtl.min.css"/>

    <link href="{{  asset('assets_'.direction().'/css/feedback.rtl.css')}}" rel="stylesheet" type="text/css">


    <style type="text/css">

        .ajs-message.ajs-custom
        {
            color: #205823;
            background-color: #E8F5E9;
            border-color: #4CAF50;
        }


    </style>


    <!-- /global stylesheets -->

@yield('style')




<!-- Core JS files -->

    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/plugins/loaders/pace.min.js')}}"></script>
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/core/libraries/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/core/libraries/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/plugins/loaders/blockui.min.js')}}"></script>

    <!-- /core JS files -->

    <!-- Theme JS files -->

    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/plugins/forms/styling/switchery.min.js')}}"></script>

    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>

    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/plugins/ui/moment/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/plugins/pickers/daterangepicker.js')}}"></script>
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/core/app.js')}}"></script>

    <script type="text/javascript" src="{{ asset('assets_'.direction().'/assets/js/plugins/pickers/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets_'.direction().'/assets/js/plugins/pickers/anytime.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets_'.direction().'/assets/js/plugins/pickers/pickadate/picker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets_'.direction().'/assets/js/plugins/pickers/pickadate/picker.date.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets_'.direction().'/assets/js/plugins/pickers/pickadate/picker.time.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets_'.direction().'/assets/js/plugins/pickers/pickadate/legacy.js') }}"></script>
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/pages/picker_date.js')}}"></script>
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/pages/form_layouts.js')}}"></script>


    <!-- Theme JS files -->


    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/pages/dashboard.js')}}"></script>
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/pages/form_select2.js')}}"></script>

    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/plugins/ui/ripple.min.js')}}"></script>
    <!-- /theme JS files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>

    {{--<script type="text/javascript" src="{{  asset('assets_'.direction().'/js/html2canvas.js')}}"></script>--}}
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/js/feedback.js')}}"></script>



    <script src="{{ asset('js/jquery-confirm/jquery.confirm.min.js') }}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

@yield('script')



</head>

<body class="has-detached-left sidebar-detached-hidden">

<!-- Main navbar -->
@include('particals.navbar')
<!-- End Main navbar -->

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
    @include('particals.sidebar')


        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">
            @include('sweet::alert')

            @yield('content')

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>


{{--<script type="text/javascript">--}}
    {{--$(function () {--}}
        {{--$('[data-toggle="tooltip"]').tooltip()--}}
    {{--})--}}
{{--</script>--}}




<!-- confirm -->
<script type="text/javascript">
    $(document).on('click', '.destroy', function () {
        var route = $(this).data('route');
        var token = $(this).data('token');
        $.confirm({
            icon: 'glyphicon glyphicon-floppy-remove',
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false,
            autoClose: 'cancel|6000',
            confirm: function () {
                $.ajax({
                    url: route,
                    type: 'get',
                    data: {_method: 'delete', _token: token},
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        $("#" + data).parents("tr").remove();

                        swal("Deleted!", "Your imaginary file has been deleted.", "success");
                    }

                });
            },
        });
    });
</script>


{{--<script type="text/javascript">--}}

    {{--feedbackContent.prototype.submitFeedback = function () {--}}
        {{--this.canDraw = false;--}}
        {{--if ($('#fb-overview-note').val().length <= 0) {--}}
            {{--$('#fb-overview-note').addClass('fb-description-error');--}}
            {{--return;--}}
        {{--}--}}

        {{--$.ajax({--}}
            {{--url: '{{ url('/feedback-send') }}',--}}
            {{--dataType: 'json',--}}
            {{--type: 'post',--}}
            {{--data: { feedback: { browserInfo: JSON.stringify(this.browserInfo), note: $('#fb-overview-note').val() } },--}}
            {{--success: function () {--}}
                {{--//console.log(data);--}}
                {{--$('#fb-overview').hide();--}}
                {{--$('#fb-submit-success').fadeIn();--}}
            {{--},--}}
            {{--error: function () {--}}
                {{--// alert(url);--}}
                {{--$('#fb-overview').hide();--}}
                {{--$('#fb-submit-error').fadeIn();--}}
            {{--}--}}
        {{--});--}}
    {{--};--}}
{{--</script>--}}

<script type="text/javascript" src="{{  asset('js/script-2.js')}}"></script>
<script src="{{ asset('messages.js')}}" type="text/javascript"></script>

<script>
    Lang.setLocale("{{ app()->getLocale() }}");
</script>

@yield('script2')




</body>
</html>
