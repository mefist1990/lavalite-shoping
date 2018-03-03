<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-dark  header-title m-t-0"> {!! $order_history['name'] !!} </h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ trans_url('orders') }}" class="btn btn-default pull-right"> app.back</a>
                    </div>
                </div>
                <hr/>

                <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="order_id">
                    {!! trans('order::order_history.label.order_id') !!}
                </label><br />
                    {!! $order_history['order_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="order_status_id">
                    {!! trans('order::order_history.label.order_status_id') !!}
                </label><br />
                    {!! $order_history['order_status_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="notify">
                    {!! trans('order::order_history.label.notify') !!}
                </label><br />
                    {!! $order_history['notify'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="comment">
                    {!! trans('order::order_history.label.comment') !!}
                </label><br />
                    {!! $order_history['comment'] !!}
            </div>
        </div>
    </div>
            </div>  
        </div>  
        <div class="col-md-4">
            @include('order::public.order_history.aside')
        </div>

    </div>
</div>