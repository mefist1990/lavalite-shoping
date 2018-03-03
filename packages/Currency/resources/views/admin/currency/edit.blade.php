    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#currency" data-toggle="tab">{!! trans('currency::currency.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#currency-currency-edit'  data-load-to='#currency-currency-entry' data-datatable='#currency-currency-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#currency-currency-entry' data-href='{{trans_url('admin/currency/currency')}}/{{$currency->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('currency-currency-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(URL::to('admin/currency/currency/'. $currency->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="currency">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('currency::currency.name') !!} [{!!$currency->title!!}] </div>
                @include('currency::admin.currency.partial.entry')
            </div>
        </div>
        {!!Form::close()!!}
    </div>