    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Filter</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#filter-filter-create'  data-load-to='#filter-filter-entry' data-datatable='#filter-filter-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#filter-filter-entry' data-href='{{trans_url('admin/filter/filter/0')}}'><i class="fa fa-times-circle"></i> {{ trans('app.close') }}</button>
            </div>
        </ul>
        <div class="tab-content clearfix">
            {!!Form::vertical_open()
            ->id('filter-filter-create')
            ->method('POST')
            ->files('true')
            ->action(URL::to('admin/filter/filter'))!!}
            <div class="tab-pane active" id="details">
                <div class="tab-pan-title">  {{ trans('app.new') }}  [{!! trans('filter::filter.name') !!}] </div>
                @include('filter::admin.filter.partial.entry')
            </div>
            {!! Form::close() !!}
        </div>
    </div>