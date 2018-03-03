<div class="container">
    <h1> Newsletters</h1>

    <div class="row">
        <div class="col-md-8">
            @forelse($newsletters as $newsletter)
            <div class="card-box">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-dark  header-title m-t-0"> {!! $newsletter['name'] !!} </h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ trans_url('newsletter') }}/{!! $newsletter->getPublicKey() !!}" class="btn btn-default pull-right"> {{ trans('app.details')  }}</a>
                    </div>
                </div>
                <hr/>

                <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="name">
                    {!! trans('newsletter::newsletter.label.name') !!}
                </label><br />
                    {!! $newsletter['name'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="email">
                    {!! trans('newsletter::newsletter.label.email') !!}
                </label><br />
                    {!! $newsletter['email'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="phone">
                    {!! trans('newsletter::newsletter.label.phone') !!}
                </label><br />
                    {!! $newsletter['phone'] !!}
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
            {{$newsletters->render()}}
        </div>
        <div class="col-md-4">
            @include('newsletter::public.newsletter.aside')
        </div>
    </div>
</div>