
@extends('layouts.app')




@section('content')

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">{{__('companies')}} </span></h4>
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
                <li><a href="{{ url('/') }}"><i class="icon-home2 position-left"></i> {{__('pages.home')}}</a></li>
                <li><a href="{{ url('/companies') }}">{{__('pages.companies')}}</a></li>
                <li class="active">{{__('pages.editcompanies')}}</li>

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


        @if(session()->has('error'))
            <div class="alert alert-danger alert-styled-left" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                <strong>Danger: </strong>{{ session()->get('error')  }}
            </div>

        @endif

        @if(session()->has('success'))
            <div class="alert alert-success alert-styled-left" role="alert">
                <button class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                <strong>Success: </strong>{{ session()->get('success')  }}
            </div>
        @endif

        @include('companies.forms')

    </div>

@endsection

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>



<script>
    $(document).ready(function(){
        //group add limit
        var maxGroup = 10;

        //add more fields group
        // $(".addMore").click(function(){
        //     if($('body').find('.fieldGroup').length < maxGroup){
        //         var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
        //         $('body').find('.fieldGroup:last').after(fieldHTML);
        //     }else{
        //         alert('Maximum '+maxGroup+' groups are allowed.');
        //     }
        // });
        //
        // //remove fields group
        // $("body").on("click",".remove",function(){
        //     $(this).parents(".fieldGroup").remove();
        // });




    });




</script>


@section('script2')



    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js')}}"></script>
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js')}}"></script>

    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js')}}"></script>
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/plugins/tables/datatables/extensions/buttons.min.js')}}"></script>
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/pages/datatables_extension_buttons_html5.js')}}"></script>

    <script type="text/javascript" src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.7/js/dataTables.checkboxes.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script>


    {{--<script type="text/javascript">--}}





    {{--// users dataTables--}}
    {{--var users_current_permision = {};--}}
    {{--var user_table = $('#usersDataTable').DataTable({--}}
    {{--"ajax": "{{ url('geofences/userDataTablesRenders') }}/{{$geofences->id}}",--}}
    {{--'serverSide': true,--}}
    {{--"processing":true,--}}
    {{--"select": {--}}
    {{--style: 'single'--}}
    {{--},--}}
    {{--"drawCallback": function () {--}}
    {{--desabledCheckBoxUsers();--}}
    {{--users_current_permision = RetriveUsersCurrentPermissions();--}}
    {{--},--}}
    {{--"language": {--}}
    {{--"url": "{{ asset(app()->getLocale().'-datatable.json')  }}"--}}
    {{--},--}}
    {{--"columns": [--}}
    {{--{data: 'id'},--}}
    {{--{data: 'name' ,orderable:false},--}}
    {{--{data: 'update' , searchable: false , orderable:false , className:'text-center'},--}}
    {{--{data: 'delete' , searchable: false , orderable:false , className:'text-center'},--}}
    {{--{data: 'action' , searchable: false , orderable:false , className:'text-center'}--}}
    {{--]--}}
    {{--});--}}
    {{--var users_permissions = {};--}}
    {{--user_table.on('user-select', function (e, dt, type, cell, originalEvent) {--}}
    {{--if ($(cell.node()).parent().hasClass('selected')) {--}}
    {{--e.preventDefault();--}}
    {{--}--}}
    {{--}).on( 'deselect', function ( e, dt, type, indexes ) {--}}

    {{--var user = user_table.cell({ row: indexes, column: 1 }).node();--}}
    {{--var update = user_table.cell({ row: indexes, column: 2 }).node();--}}
    {{--var destroy = user_table.cell({ row: indexes, column: 3 }).node();--}}
    {{--var action = user_table.cell({ row: indexes, column: 4 }).node();--}}

    {{--users_permissions.user = $('input', user).attr('data-index');--}}
    {{--users_permissions.url = $('input', user).attr('data-url');--}}
    {{--users_permissions.show = $('input', user).is(":checked") ? '1' : '0';--}}
    {{--users_permissions.edituser = $('input', user).attr('data-user');--}}
    {{--users_permissions.update = $('input', update).is(":checked") ? '1' : '0';--}}
    {{--users_permissions.delete = $('input', destroy).is(":checked") ? '1' : '0';--}}

    {{--var btn = $('.btn-user-status' ,action).attr('data-changed');--}}
    {{--if(btn == 1){--}}
    {{--deselectedRowAjx(users_permissions);--}}
    {{--$('.btn-user-status' ,action).attr('data-changed',3);--}}
    {{--$('.btn-user-status' ,action).addClass('activee');--}}
    {{--$('.btn-user-status' ,action).prop('disabled', true);--}}
    {{--$('.btn-user-status' ,action).text(Lang.get('pages.saved'));--}}

    {{--// RetriveUsersCurrentPermissions();--}}


    {{--usersCurrentPermissions[$('input', user).attr('data-index')] = {--}}
    {{--'show': $('input', user).is(":checked") ? '1' : '0' ,--}}
    {{--'update': $('input', update).is(":checked") ? '1' : '0' ,--}}
    {{--'delete': $('input', destroy).is(":checked") ? '1' : '0'--}}
    {{--};--}}
    {{--}--}}

    {{--} );--}}

    {{--var usersCurrentPermissions = {};--}}

    {{--function  RetriveUsersCurrentPermissions() {--}}

    {{--usersCurrentPermissions = {};--}}
    {{--user_table.rows().every( function ( rowIdx, tableLoop, rowLoop ) {--}}

    {{--var user = user_table.cell({ row: rowIdx, column: 1 }).node();--}}
    {{--var update = user_table.cell({ row: rowIdx, column: 2 }).node();--}}
    {{--var destroy = user_table.cell({ row: rowIdx, column: 3 }).node();--}}


    {{--var user_id = $('input', user).attr('data-index');--}}
    {{--usersCurrentPermissions[user_id] = {--}}
    {{--'show': $('input', user).is(":checked") ? '1' : '0' ,--}}
    {{--'update': $('input', update).is(":checked") ? '1' : '0' ,--}}
    {{--'delete': $('input', destroy).is(":checked") ? '1' : '0'--}}
    {{--};--}}

    {{--});--}}

    {{--return usersCurrentPermissions;--}}
    {{--}--}}

    {{--function desabledCheckBoxUsers() {--}}

    {{--setTimeout(function(){--}}



    {{--$(".show-user-checkbox").each(function(i, obj) {--}}

    {{--var index = $(this).attr('data-index');--}}

    {{--if ($(this).is(':checked')){--}}

    {{--$(".update-user-checkbox[data-index='"+index+"']").prop('disabled',false);--}}
    {{--$(".delete-user-checkbox[data-index='"+index+"']").prop('disabled',false);--}}
    {{--}else{--}}
    {{--$(".update-user-checkbox[data-index='"+index+"']").prop('disabled',true);--}}
    {{--$(".delete-user-checkbox[data-index='"+index+"']").prop('disabled',true);--}}
    {{--}--}}
    {{--});--}}

    {{--} , 10);--}}
    {{--}--}}

    {{--$('.table').on('change','.usersDetectChanges' , function () {--}}

    {{--var user_index = $(this).attr('data-index'); // user id--}}
    {{--var row = $(this).parents('tr');--}}
    {{--var show = (row.find('.show-user-checkbox').is(':checked') ? '1' : '0');--}}
    {{--var update = (row.find('.update-user-checkbox').is(':checked') ? '1' : '0');--}}
    {{--var delet = (row.find('.delete-user-checkbox').is(':checked') ? '1' : '0');--}}
    {{--var oneRowPermission = usersCurrentPermissions[user_index];--}}


    {{--if(oneRowPermission['show'] != show ||--}}
    {{--oneRowPermission['update'] != update ||--}}
    {{--oneRowPermission['delete'] != delet)--}}
    {{--{--}}
    {{--$(this).parents('tr').find('.btn-user-status').text(Lang.get('pages.changed'));--}}
    {{--$(this).parents('tr').find('.btn-user-status').attr('data-changed','1');--}}
    {{--$(this).parents('tr').find('.btn-user-status').addClass('changed');--}}
    {{--$(this).parents('tr').find('.btn-user-status').removeClass('disableed');--}}
    {{--$(this).parents('tr').find('.btn-user-status').removeClass('activee');--}}
    {{--$(this).parents('tr').find('.btn-user-status').prop('disabled', false);--}}


    {{--}--}}
    {{--else--}}
    {{--{--}}
    {{--$(this).parents('tr').find('.btn-user-status').addClass('disableed');--}}
    {{--$(this).parents('tr').find('.btn-user-status').prop('disabled', true);--}}
    {{--$(this).parents('tr').find('.btn-user-status').attr('data-changed','0');--}}

    {{--$(this).parents('tr').find('.btn-user-status').text(Lang.get('pages.current'));--}}
    {{--}--}}

    {{--});--}}


    {{--$('.table').on('click' , '.changed' , function () {--}}
    {{--user_table.rows('.selected').deselect();--}}
    {{--});--}}

    {{--// end users dataTable--}}







    {{--</script>--}}

@endsection