<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-dark  header-title m-t-0"> {!! $cart['name'] !!} </h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ trans_url('carts') }}" class="btn btn-default pull-right"> app.back</a>
                    </div>
                </div>
                <hr/>

                <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="identifier">
                    {!! trans('cart::cart.label.identifier') !!}
                </label><br />
                    {!! $cart['identifier'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="instance">
                    {!! trans('cart::cart.label.instance') !!}
                </label><br />
                    {!! $cart['instance'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="content">
                    {!! trans('cart::cart.label.content') !!}
                </label><br />
                    {!! $cart['content'] !!}
            </div>
        </div>
    </div>
            </div>  
        </div>  
        <div class="col-md-4">
            @include('cart::public.cart.aside')
        </div>

    </div>
</div>