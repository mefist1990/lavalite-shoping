<div class="container">
    <h1> Reviews</h1>

    <div class="row">
        <div class="col-md-8">
            @forelse($reviews as $review)
            <div class="card-box">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-dark  header-title m-t-0"> {!! $review['name'] !!} </h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ trans_url('review') }}/{!! $review->getPublicKey() !!}" class="btn btn-default pull-right"> {{ trans('app.details')  }}</a>
                    </div>
                </div>
                <hr/>

                <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="product_id">
                    {!! trans('review::review.label.product_id') !!}
                </label><br />
                    {!! $review['product_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="description">
                    {!! trans('review::review.label.description') !!}
                </label><br />
                    {!! $review['description'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="status">
                    {!! trans('review::review.label.status') !!}
                </label><br />
                    {!! $review['status'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="score">
                    {!! trans('review::review.label.score') !!}
                </label><br />
                    {!! $review['score'] !!}
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
            {{$reviews->render()}}
        </div>
        <div class="col-md-4">
            @include('review::public.review.aside')
        </div>
    </div>
</div>