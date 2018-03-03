<div class="container">
    <h1> AttributeGroups</h1>

    <div class="row">
        <div class="col-md-8">
            @forelse($attribute_groups as $attribute_group)
            <div class="card-box">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-dark  header-title m-t-0"> {!! $attribute_group['name'] !!} </h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ trans_url('attribute') }}/{!! $attribute_group->getPublicKey() !!}" class="btn btn-default pull-right"> {{ trans('app.details')  }}</a>
                    </div>
                </div>
                <hr/>

                <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="name">
                    {!! trans('attribute::attribute_group.label.name') !!}
                </label><br />
                    {!! $attribute_group['name'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="order">
                    {!! trans('attribute::attribute_group.label.order') !!}
                </label><br />
                    {!! $attribute_group['order'] !!}
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
            {{$attributes->render()}}
        </div>
        <div class="col-md-4">
            @include('attribute::public.attribute_group.aside')
        </div>
    </div>
</div>