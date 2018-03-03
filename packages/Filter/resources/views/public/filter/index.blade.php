<div class="container">
    <h1> Filters</h1>

    <div class="row">
        <div class="col-md-8">
            @forelse($filters as $filter)
            <div class="card-box">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-dark  header-title m-t-0"> {!! $filter['name'] !!} </h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ trans_url('filter') }}/{!! $filter->getPublicKey() !!}" class="btn btn-default pull-right"> {{ trans('app.details')  }}</a>
                    </div>
                </div>
                <hr/>

                <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="name">
                    {!! trans('filter::filter.label.name') !!}
                </label><br />
                    {!! $filter['name'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="order">
                    {!! trans('filter::filter.label.order') !!}
                </label><br />
                    {!! $filter['order'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="filter_id">
                    {!! trans('filter::filter.label.filter_id') !!}
                </label><br />
                    {!! $filter['filter_id'] !!}
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
            {{$filters->render()}}
        </div>
        <div class="col-md-4">
            @include('filter::public.filter.aside')
        </div>
    </div>
</div>