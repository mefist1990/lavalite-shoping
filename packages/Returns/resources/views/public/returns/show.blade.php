<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-dark  header-title m-t-0"> {!! $returns['name'] !!} </h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ trans_url('returns') }}" class="btn btn-default pull-right"> app.back</a>
                    </div>
                </div>
                <hr/>

                <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="return_id">
                    {!! trans('returns::returns.label.return_id') !!}
                </label><br />
                    {!! $returns['return_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="order_id">
                    {!! trans('returns::returns.label.order_id') !!}
                </label><br />
                    {!! $returns['order_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="product_id">
                    {!! trans('returns::returns.label.product_id') !!}
                </label><br />
                    {!! $returns['product_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="customer_id">
                    {!! trans('returns::returns.label.customer_id') !!}
                </label><br />
                    {!! $returns['customer_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="return_reason_id">
                    {!! trans('returns::returns.label.return_reason_id') !!}
                </label><br />
                    {!! $returns['return_reason_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="return_action_id">
                    {!! trans('returns::returns.label.return_action_id') !!}
                </label><br />
                    {!! $returns['return_action_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="return_status_id">
                    {!! trans('returns::returns.label.return_status_id') !!}
                </label><br />
                    {!! $returns['return_status_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="comment">
                    {!! trans('returns::returns.label.comment') !!}
                </label><br />
                    {!! $returns['comment'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="date_ordered">
                    {!! trans('returns::returns.label.date_ordered') !!}
                </label><br />
                    {!! $returns['date_ordered'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="date_added">
                    {!! trans('returns::returns.label.date_added') !!}
                </label><br />
                    {!! $returns['date_added'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="date_modified">
                    {!! trans('returns::returns.label.date_modified') !!}
                </label><br />
                    {!! $returns['date_modified'] !!}
            </div>
        </div>
    </div>
            </div>  
        </div>  
        <div class="col-md-4">
            @include('returns::public.returns.aside')
        </div>

    </div>
</div>