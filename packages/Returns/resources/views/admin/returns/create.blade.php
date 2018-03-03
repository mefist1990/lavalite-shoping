    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Returns</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#returns-returns-create'  data-load-to='#returns-returns-entry' data-datatable='#returns-returns-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#returns-returns-entry' data-href='{{trans_url('admin/returns/returns/0')}}'><i class="fa fa-times-circle"></i> {{ trans('app.close') }}</button>
            </div>
        </ul>
        <div class="tab-content clearfix">
            {!!Form::vertical_open()
            ->id('returns-returns-create')
            ->method('POST')
            ->files('true')
            ->action(URL::to('admin/returns/returns'))!!}
            <div class="tab-pane active" id="details">
                <!-- <div class="tab-pan-title">  {{ trans('app.new') }}  [{!! trans('returns::returns.name') !!}] </div> -->
                @include('returns::admin.returns.partial.entry')
            </div>
            {!! Form::close() !!}
        </div>
    </div>