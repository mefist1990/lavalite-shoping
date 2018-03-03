    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('attribute::attribute.name') !!}</a></li>
            <div class="box-tools pull-right">
                @include('attribute::admin.attribute.partial.workflow')
                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#attribute-attribute-entry' data-href='{{trans_url('admin/attribute/attribute/create')}}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }}</button>
                @if($attribute->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#attribute-attribute-entry' data-href='{{ trans_url('/admin/attribute/attribute') }}/{{$attribute->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#attribute-attribute-entry' data-datatable='#attribute-attribute-list' data-href='{{ trans_url('/admin/attribute/attribute') }}/{{$attribute->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('attribute-attribute-show')
        ->method('POST')
        ->files('true')
        ->action(URL::to('admin/attribute/attribute'))!!}
            <div class="tab-content clearfix">
                <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('attribute::attribute.name') !!}  [{!! $attribute->name !!}] </div>
                <div class="tab-pane active" id="details">
                    @include('attribute::admin.attribute.partial.entry')
                </div>
            </div>
        {!! Form::close() !!}
    </div>