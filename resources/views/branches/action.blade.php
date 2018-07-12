

<ul class="icons-list">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="icon-menu9"></i>
        </a>

        <ul class="dropdown-menu dropdown-menu-right">
            <li >
                <a href="{{ url('companies/edit/'.$id) }}"><i class="icon-pencil5"></i> {{ __('pages.edit') }}</a>
            </li>
            <li>
                <a class="destroy" id="{{$id}}" data-token="{{ csrf_token() }}" data-route="{{ route('destroycompany', $id) }}"  type="button"  title="حذف"><i class="icon-bin"></i>{{__('pages.delete')}} </a>
            </li>

        </ul>

    </li>
</ul>

