@extends('layouts.app')
@section('title')
    {{__('branches')}}
@endsection

@section('style')
    <style> .table th {text-align: center;}
        .table td {text-align: center;}
        @media only screen and (max-width: 500px) {
            .dt-button {
                width: 100px;
            }
        }
    </style>
@endsection

@section('content')


    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">{{ __('pages.branches') }}</span> - {{__('pages.Show-all')}}</h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                    <a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                    <a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-component">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="icon-home2 position-left"></i> {{ __('pages.home') }}</a></li>
                <li class="active">{{ __('branches') }}</li>
            </ul>

            <ul class="breadcrumb-elements">
                <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-gear position-left"></i>
                        Settings
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                        <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                        <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

    @include('particals.messages')

    <!-- Column selectors -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">{{ __('pages.branches') }}</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                {!! $dataTable->table(['class' => 'table table-delete-action datatable-button-html5-columns' , 'width' => '100%'],true) !!}

            </div>



        </div>
        <!-- /column selectors -->



        <!-- Footer -->
    @include('particals.footer')
    <!-- /footer -->

    </div>
    <!-- /content area -->




@endsection



@section('script2')


    <script type="text/javascript" src="{{ asset('assets_'.direction().'/assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets_'.direction().'/assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets_'.direction().'/assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets_'.direction().'/assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets_'.direction().'/assets/js/plugins/tables/datatables/extensions/buttons.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets_'.direction().'/assets/js/pages/datatables_extension_buttons_html5.js')}}"></script>
    <script src="{{ asset('/vendor/datatables/buttons.server-side.js') }}"></script>
    {!! $dataTable->scripts() !!}
@endsection



