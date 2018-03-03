    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('attribute::attribute_group.name') !!}</a></li>
            <div class="box-tools pull-right">
                @include('attribute::admin.attribute_group.partial.workflow')
                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#attribute-attribute_group-entry' data-href='{{trans_url('admin/attribute/attribute_group/create')}}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }}</button>
                @if($attribute_group->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#attribute-attribute_group-entry' data-href='{{ trans_url('/admin/attribute/attribute_group') }}/{{$attribute_group->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#attribute-attribute_group-entry' data-datatable='#attribute-attribute_group-list' data-href='{{ trans_url('/admin/attribute/attribute_group') }}/{{$attribute_group->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('attribute-attribute_group-show')
        ->method('POST')
        ->files('true')
        ->action(URL::to('admin/attribute/attribute_group'))!!}
            <div class="tab-content clearfix">
                <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('attribute::attribute_group.name') !!}  [{!! $attribute_group->name !!}] </div>
                <div class="tab-pane active" id="details">
                    @include('attribute::admin.attribute_group.partial.entry')
                </div>
            </div>
        {!! Form::close() !!}
    </div>