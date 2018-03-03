<div class="container">
    <h1> FilterGroups</h1>

    <div class="row">
        <div class="col-md-8">
            @forelse($filter_groups as $filter_group)
            <div class="card-box">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-dark  header-title m-t-0"> {!! $filter_group['name'] !!} </h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ trans_url('filter') }}/{!! $filter_group->getPublicKey() !!}" class="btn btn-default pull-right"> {{ trans('app.details')  }}</a>
                    </div>
                </div>
                <hr/>

                <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="name">
                    {!! trans('filter::filter_group.label.name') !!}
                </label><br />
                    {!! $filter_group['name'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="order">
                    {!! trans('filter::filter_group.label.order') !!}
                </label><br />
                    {!! $filter_group['order'] !!}
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
            @include('filter::public.filter_group.aside')
        </div>
    </div>
</div>