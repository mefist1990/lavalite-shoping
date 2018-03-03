    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#filter_group" data-toggle="tab">Filter Group</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#filter-filter_group-edit'  data-load-to='#filter-filter_group-entry' data-datatable='#filter-filter_group-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#filter-filter_group-entry' data-href='{{trans_url('admin/filter/filter_group')}}/{{$filter_group->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('filter-filter_group-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(URL::to('admin/filter/filter_group/'. $filter_group->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="filter_group">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('filter::filter_group.name') !!} [{!!$filter_group->name!!}] </div>
                @include('filter::admin.filter_group.partial.entry')
            </div>
        </div>
        {!!Form::close()!!}
    </div>