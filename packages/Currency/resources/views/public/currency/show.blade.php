<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-dark  header-title m-t-0"> {!! $currency['name'] !!} </h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ trans_url('currencies') }}" class="btn btn-default pull-right"> app.back</a>
                    </div>
                </div>
                <hr/>

                <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="title">
                    {!! trans('currency::currency.label.title') !!}
                </label><br />
                    {!! $currency['title'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="code">
                    {!! trans('currency::currency.label.code') !!}
                </label><br />
                    {!! $currency['code'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="symbol_left">
                    {!! trans('currency::currency.label.symbol_left') !!}
                </label><br />
                    {!! $currency['symbol_left'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="symbol_right">
                    {!! trans('currency::currency.label.symbol_right') !!}
                </label><br />
                    {!! $currency['symbol_right'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="decimal_place">
                    {!! trans('currency::currency.label.decimal_place') !!}
                </label><br />
                    {!! $currency['decimal_place'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="value">
                    {!! trans('currency::currency.label.value') !!}
                </label><br />
                    {!! $currency['value'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="status">
                    {!! trans('currency::currency.label.status') !!}
                </label><br />
                    {!! $currency['status'] !!}
            </div>
        </div>
    </div>
            </div>  
        </div>  
        <div class="col-md-4">
            @include('currency::public.currency.aside')
        </div>

    </div>
</div>