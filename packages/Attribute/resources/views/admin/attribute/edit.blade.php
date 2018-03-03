    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#attribute" data-toggle="tab">{!! trans('attribute::attribute.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#attribute-attribute-edit'  data-load-to='#attribute-attribute-entry' data-datatable='#attribute-attribute-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#attribute-attribute-entry' data-href='{{trans_url('admin/attribute/attribute')}}/{{$attribute->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('attribute-attribute-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(URL::to('admin/attribute/attribute/'. $attribute->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="attribute">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('attribute::attribute.name') !!} [{!!$attribute->name!!}] </div>
                @include('attribute::admin.attribute.partial.entry')
            </div>
        </div>
        {!!Form::close()!!}
    </div>