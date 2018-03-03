    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">ReturnReason</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#returns-return_reason-create'  data-load-to='#returns-return_reason-entry' data-datatable='#returns-return_reason-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#returns-return_reason-entry' data-href='{{trans_url('admin/returns/return_reason/0')}}'><i class="fa fa-times-circle"></i> {{ trans('app.close') }}</button>
            </div>
        </ul>
        <div class="tab-content clearfix">
            {!!Form::vertical_open()
            ->id('returns-return_reason-create')
            ->method('POST')
            ->files('true')
            ->action(URL::to('admin/returns/return_reason'))!!}
            <div class="tab-pane active" id="details">
                <div class="tab-pan-title">  {{ trans('app.new') }}  [{!! trans('returns::return_reason.name') !!}] </div>
                @include('returns::admin.return_reason.partial.entry')
            </div>
            {!! Form::close() !!}
        </div>
    </div>