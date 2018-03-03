    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('returns::return_reason.name') !!}</a></li>
            <div class="box-tools pull-right">
                @include('returns::admin.return_reason.partial.workflow')
                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#returns-return_reason-entry' data-href='{{trans_url('admin/returns/return_reason/create')}}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }}</button>
                @if($return_reason->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#returns-return_reason-entry' data-href='{{ trans_url('/admin/returns/return_reason') }}/{{$return_reason->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#returns-return_reason-entry' data-datatable='#returns-return_reason-list' data-href='{{ trans_url('/admin/returns/return_reason') }}/{{$return_reason->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('returns-return_reason-show')
        ->method('POST')
        ->files('true')
        ->action(URL::to('admin/returns/return_reason'))!!}
            <div class="tab-content clearfix disabled">
                <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('returns::return_reason.name') !!}  [{!! $return_reason->name !!}] </div>
                <div class="tab-pane active" id="details">
                    @include('returns::admin.return_reason.partial.entry')
                </div>
            </div>
        {!! Form::close() !!}
    </div>