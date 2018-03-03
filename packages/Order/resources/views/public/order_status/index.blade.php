<!-- <div class="container">
    <h1> OrderStatuses</h1>

    <div class="row">
        <div class="col-md-8">
            @forelse($order_statuses as $order_status)
            <div class="card-box">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-dark  header-title m-t-0"> {!! $order_status['name'] !!} </h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ trans_url('order') }}/{!! $order_status->getPublicKey() !!}" class="btn btn-default pull-right"> {{ trans('app.details')  }}</a>
                    </div>
                </div>
                <hr/>

                <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="name">
                    {!! trans('order::order_status.label.name') !!}
                </label><br />
                    {!! $order_status['name'] !!}
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
            {{$orders->render()}}
        </div>
        <div class="col-md-4">
            @include('order::public.order_status.aside')
        </div>
    </div>
</div> -->