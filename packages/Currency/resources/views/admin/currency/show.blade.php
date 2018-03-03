    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('currency::currency.name') !!}</a></li>
            <div class="box-tools pull-right">
                @include('currency::admin.currency.partial.workflow')
                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#currency-currency-entry' data-href='{{trans_url('admin/currency/currency/create')}}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }}</button>
                @if($currency->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#currency-currency-entry' data-href='{{ trans_url('/admin/currency/currency') }}/{{$currency->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#currency-currency-entry' data-datatable='#currency-currency-list' data-href='{{ trans_url('/admin/currency/currency') }}/{{$currency->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('currency-currency-show')
        ->method('POST')
        ->files('true')
        ->action(URL::to('admin/currency/currency'))!!}
            <div class="tab-content clearfix">
                <div class="tab-pan-title">   {!! trans('currency::currency.name') !!}  [{!! $currency->title !!}] </div>
                <div class="tab-pane active" id="details">
                    @include('currency::admin.currency.partial.entry')
                </div>
            </div>
        {!! Form::close() !!}
    </div>