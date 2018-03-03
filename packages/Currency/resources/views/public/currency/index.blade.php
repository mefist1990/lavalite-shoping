<div class="container">
    <h1> Currencies</h1>

    <div class="row">
        <div class="col-md-8">
            @forelse($currencies as $currency)
            <div class="card-box">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-dark  header-title m-t-0"> {!! $currency['name'] !!} </h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ trans_url('currency') }}/{!! $currency->getPublicKey() !!}" class="btn btn-default pull-right"> {{ trans('app.details')  }}</a>
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
            @empty
            <div class="card-box">
                <p class="text-muted m-b-25 font-13">
                    Your search for <b>'{{Request::get('search')}}'</b> returned empty result.
                </p>
            </div>
            @endif
            {{$currencies->render()}}
        </div>
        <div class="col-md-4">
            @include('currency::public.currency.aside')
        </div>
    </div>
</div>