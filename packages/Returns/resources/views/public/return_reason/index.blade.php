<div class="container">
    <h1> ReturnReasons</h1>

    <div class="row">
        <div class="col-md-8">
            @forelse($return_reasons as $return_reason)
            <div class="card-box">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-dark  header-title m-t-0"> {!! $return_reason['name'] !!} </h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ trans_url('returns') }}/{!! $return_reason->getPublicKey() !!}" class="btn btn-default pull-right"> {{ trans('app.details')  }}</a>
                    </div>
                </div>
                <hr/>

                <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="return_reason_id">
                    {!! trans('returns::return_reason.label.return_reason_id') !!}
                </label><br />
                    {!! $return_reason['return_reason_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="language_id">
                    {!! trans('returns::return_reason.label.language_id') !!}
                </label><br />
                    {!! $return_reason['language_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="name">
                    {!! trans('returns::return_reason.label.name') !!}
                </label><br />
                    {!! $return_reason['name'] !!}
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
            {{$returns->render()}}
        </div>
        <div class="col-md-4">
            @include('returns::public.return_reason.aside')
        </div>
    </div>
</div>