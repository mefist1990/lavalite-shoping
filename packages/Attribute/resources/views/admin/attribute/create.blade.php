    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Attribute</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#attribute-attribute-create'  data-load-to='#attribute-attribute-entry' data-datatable='#attribute-attribute-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#attribute-attribute-entry' data-href='{{trans_url('admin/attribute/attribute/0')}}'><i class="fa fa-times-circle"></i> {{ trans('app.close') }}</button>
            </div>
        </ul>
        <div class="tab-content clearfix">
            {!!Form::vertical_open()
            ->id('attribute-attribute-create')
            ->method('POST')
            ->files('true')
            ->action(URL::to('admin/attribute/attribute'))!!}
            <div class="tab-pane active" id="details">
                <div class="tab-pan-title">  {{ trans('app.new') }}  [{!! trans('attribute::attribute.name') !!}] </div>
                @include('attribute::admin.attribute.partial.entry')
            </div>
            {!! Form::close() !!}
        </div>
    </div>