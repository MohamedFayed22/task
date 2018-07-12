<div id="ajax-messages"></div>

<div id="notification_success" class="alert alert-success alert-styled-left" style="display: none" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
    <strong>{{ __('pages.success') }}: </strong><span class="alert-msg"></span>
</div>


@if(session()->has('error'))
    <div class="alert alert-danger alert-styled-left" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
        <strong>{{ __('pages.danger') }}: </strong>{{ session()->get('error')  }}
    </div>

@endif

@if(session()->has('success'))
    <div class="alert alert-success alert-styled-left" role="alert">
        <button class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
        <strong>{{ __('pages.success') }}: </strong>{{ session()->get('success')  }}
    </div>
@endif