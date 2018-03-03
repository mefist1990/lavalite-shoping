<div class="container">
    <h1> Categories</h1>

    <div class="row">
        <div class="col-md-8">
            @forelse($categories as $category)
            <div class="card-box">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-dark  header-title m-t-0"> {!! $category['name'] !!} </h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ trans_url('category') }}/{!! $category->getPublicKey() !!}" class="btn btn-default pull-right"> {{ trans('app.details')  }}</a>
                    </div>
                </div>
                <hr/>

                <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="parent_id">
                    {!! trans('category::category.label.parent_id') !!}
                </label><br />
                    {!! $category['parent_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="name">
                    {!! trans('category::category.label.name') !!}
                </label><br />
                    {!! $category['name'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="status">
                    {!! trans('category::category.label.status') !!}
                </label><br />
                    {!! $category['status'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="meta_title">
                    {!! trans('category::category.label.meta_title') !!}
                </label><br />
                    {!! $category['meta_title'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="meta_description">
                    {!! trans('category::category.label.meta_description') !!}
                </label><br />
                    {!! $category['meta_description'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="meta_keyword">
                    {!! trans('category::category.label.meta_keyword') !!}
                </label><br />
                    {!! $category['meta_keyword'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="image">
                    {!! trans('category::category.label.image') !!}
                </label><br />
                    {!! $category['image'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="top">
                    {!! trans('category::category.label.top') !!}
                </label><br />
                    {!! $category['top'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="order">
                    {!! trans('category::category.label.order') !!}
                </label><br />
                    {!! $category['order'] !!}
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
            {{$categories->render()}}
        </div>
        <div class="col-md-4">
            @include('category::public.category.aside')
        </div>
    </div>
</div>