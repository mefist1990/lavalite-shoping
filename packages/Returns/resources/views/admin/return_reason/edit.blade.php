    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#return_reason" data-toggle="tab">{!! trans('returns::return_reason.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#returns-return_reason-edit'  data-load-to='#returns-return_reason-entry' data-datatable='#returns-return_reason-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#returns-return_reason-entry' data-href='{{trans_url('admin/returns/return_reason')}}/{{$return_reason->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('returns-return_reason-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(URL::to('admin/returns/return_reason/'. $return_reason->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="return_reason">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('returns::return_reason.name') !!} [{!!$return_reason->name!!}] </div>
                @include('returns::admin.return_reason.partial.entry')
            </div>
        </div>
        {!!Form::close()!!}
    </div>