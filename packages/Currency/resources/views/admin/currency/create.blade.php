    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Currency</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#currency-currency-create'  data-load-to='#currency-currency-entry' data-datatable='#currency-currency-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#currency-currency-entry' data-href='{{trans_url('admin/currency/currency/0')}}'><i class="fa fa-times-circle"></i> {{ trans('app.close') }}</button>
            </div>
        </ul>
        <div class="tab-content clearfix">
            {!!Form::vertical_open()
            ->id('currency-currency-create')
            ->method('POST')
            ->files('true')
            ->action(URL::to('admin/currency/currency'))!!}
            <div class="tab-pane active" id="details">
                <div class="tab-pan-title">  {{ trans('app.new') }}  [{!! trans('currency::currency.name') !!}] </div>
                @include('currency::admin.currency.partial.entry')
            </div>
            {!! Form::close() !!}
        </div>
    </div>