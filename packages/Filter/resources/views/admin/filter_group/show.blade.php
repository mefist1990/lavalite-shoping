    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('filter::filter_group.name') !!}</a></li>
            <div class="box-tools pull-right">
                @include('filter::admin.filter_group.partial.workflow')
                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#filter-filter_group-entry' data-href='{{trans_url('admin/filter/filter_group/create')}}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }}</button>
                @if($filter_group->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#filter-filter_group-entry' data-href='{{ trans_url('/admin/filter/filter_group') }}/{{$filter_group->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#filter-filter_group-entry' data-datatable='#filter-filter_group-list' data-href='{{ trans_url('/admin/filter/filter_group') }}/{{$filter_group->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('filter-filter_group-show')
        ->method('POST')
        ->files('true')
        ->action(URL::to('admin/filter/filter_group'))!!}
            <div class="tab-content clearfix disabled">
                <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('filter::filter_group.name') !!}  [{!! $filter_group->name !!}] </div>
                <div class="tab-pane active" id="details">
                    @include('filter::admin.filter_group.partial.entry')
                </div>
            </div>
        {!! Form::close() !!}
    </div>