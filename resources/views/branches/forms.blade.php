

@if(isset($companies))

    {!! Form::model($companies,['route'=>['postupdatecompany',$companies->id],'method'=>'post','role'=>'form','class'=>'form-horizontal']) !!}


@else

    {!! Form::open(['route'=>'postaddcompany' ,'role'=>'form','class'=>'form-horizontal']) !!}


@endif




<div class="panel panel-flat">
    <div class="panel-heading">
        <h6 class="panel-title">{{ __('pages.companies') }}</h6>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

    <div class="panel-body">
        <div class="tabbable nav-tabs-vertical nav-tabs-left">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active"><a href="#css-animate-tab1" data-toggle="tab">{{ __('pages.Data') }}</a></li>
                <li><a href="#css-animate-tab2" data-toggle="tab">{{ __('pages.emails') }}</a></li>

            </ul>

            <div class="tab-content">
                <div class="tab-pane animated bounceIn active" id="css-animate-tab1">

                    <div class="form-group">
                        <label class="col-lg-2 control-label">{{__('pages.name')}}</label>
                        <div class="col-lg-10">
                            <input type="text" name="name" value="{{ isset($companies) ? $companies->name : '' }}" class="form-control" placeholder="{{__('pages.name')}}">
                            <div class="error">{{ $errors->first('name') }}</div>

                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-lg-2 control-label">{{__('pages.phone')}}</label>
                        <div class="col-lg-10">
                            <input type="text" name="phone" value="{{ isset($companies) ? $companies->phone : '' }}" class="form-control" placeholder="{{__('pages.phone')}}">
                            <div class="error">{{ $errors->first('phone') }}</div>

                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-lg-2 control-label">{{__('pages.field')}}</label>
                        <div class="col-lg-10">
                            <input type="text" name="field" value="{{ isset($companies) ? $companies->field : '' }}" class="form-control" placeholder="{{__('pages.field')}}">
                            <div class="error">{{ $errors->first('field') }}</div>

                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-lg-2 control-label">{{__('pages.field')}}</label>
                        <div class="col-lg-10">
                            <input type="date" name="visites_date" value="{{ isset($companies) ? $companies->visites_date : '' }}" class="form-control" placeholder="{{__('pages.visites_date')}}">
                            <div class="error">{{ $errors->first('visites_date') }}</div>

                        </div>
                    </div>




                    <div class="form-group">
                        <label class="col-lg-2 control-label">{{__('pages.address')}}</label>
                        <div class="col-lg-10">
                            <input type="text" name="address" value="{{ isset($companies) ? $companies->address : '' }}" class="form-control" placeholder="{{__('pages.address')}}">
                            <div class="error">{{ $errors->first('address') }}</div>

                        </div>
                    </div>




                    <div class="form-group">
                        <label class="col-lg-2 control-label">Select your state:</label>
                        <div class="col-lg-10">

                            {!! Form::select('country_id', $country, null,  ['class'=>'select','data-placeholder'=>'choose Country']) !!}
                            <div class="error">{{ $errors->first('country_id') }}</div>

                        </div>
                    </div>


                </div>






                <div class="tab-pane animated fadeInUp" id="css-animate-tab2">

                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">{{ __('pages.emails') }}</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>

                                </ul>


                            </div>
                        </div>


                        <div class="panel-body attr">

                            @if(isset($companies))


                                <?php $i=0; ?>

                                @forelse($emails as  $value)

                                    <div class="fieldGroup">

                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    <input type="email" name="email[]"  value="{{ $value }}"  class="form-control form-data-input">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <a href="#" class="label label-danger remove" style=" padding: 3px;">{{ __('pages.minus-more') }} <i class="fa fa-minus-circle" style="font-size:13px"></i></a>
                                            @if ($i == 0)
                                                <a href="#" class="label label-success addMoreAttribute" style=" padding: 3px;"> {{ __('pages.add-more') }} <i class="fa fa-plus-circle" style="font-size:13px"></i></a>
                                            @endif

                                        </div>


                                    </div>

                                    <?php $i++; ?>
                                @empty
                                    <div class="fieldGroup">

                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    <input type="email" name="email[]" placeholder="{{ __('pages.email') }}:"  class="form-control form-data-input">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <a href="#" class="label label-danger remove" style=" padding: 3px;">{{ __('pages.minus-more') }} <i class="fa fa-minus-circle" style="font-size:13px"></i></a>
                                            <a href="#" class="label label-success addMoreAttribute" style=" padding: 3px;"> {{ __('pages.add-more') }} <i class="fa fa-plus-circle" style="font-size:13px"></i></a>
                                        </div>


                                    </div>
                                @endforelse



                            @else

                                <div class="fieldGroup">

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <input type="email" name="email[]" placeholder="{{ __('pages.email') }}:"  class="form-control form-data-input">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <a href="#" class="label label-success addMoreAttribute" style=" padding: 3px;"> {{ __('pages.add-more') }} <i class="fa fa-plus-circle" style="font-size:13px"></i></a>
                                    </div>


                                </div>

                            @endif

                        </div>

                    </div>

                </div>


            </div>


        </div>



        <div class="text-right">
            <button type="submit" class="btn btn-primary">{{__('pages.save')}} <i
                        class="icon-arrow-right14 position-right"></i></button>
        </div>

    </div>
</div>




{!! Form::close() !!}





<div class="fieldGroupCopy" style="display: none;">
    <div class="col-md-10">
        <div class="form-group">
            <div class="col-lg-12">
                <input type="email" name="email[]" placeholder="{{ __('pages.email') }}:"  class="form-control form-data-input">
            </div>
        </div>
    </div>



    <div class="col-md-2">
        <a href="#" class="label label-danger remove" style=" padding: 3px;">{{ __('pages.minus-more') }} <i class="fa fa-minus-circle" style="font-size:13px"></i></a>
    </div>

</div>


@if(isset($group))

@section('script2')


    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js')}}"></script>
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js')}}"></script>
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js')}}"></script>
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/plugins/tables/datatables/extensions/buttons.min.js')}}"></script>
    <script type="text/javascript" src="{{  asset('assets_'.direction().'/assets/js/pages/datatables_extension_buttons_html5.js')}}"></script>

    <script type="text/javascript"
            src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.7/js/dataTables.checkboxes.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script>





@endsection

@endif



