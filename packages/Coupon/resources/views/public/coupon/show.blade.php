<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-dark  header-title m-t-0"> {!! $coupon['name'] !!} </h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ trans_url('coupons') }}" class="btn btn-default pull-right"> app.back</a>
                    </div>
                </div>
                <hr/>

                <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="name">
                    {!! trans('coupon::coupon.label.name') !!}
                </label><br />
                    {!! $coupon['name'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="description">
                    {!! trans('coupon::coupon.label.description') !!}
                </label><br />
                    {!! $coupon['description'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="code">
                    {!! trans('coupon::coupon.label.code') !!}
                </label><br />
                    {!! $coupon['code'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="type">
                    {!! trans('coupon::coupon.label.type') !!}
                </label><br />
                    {!! $coupon['type'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="discount">
                    {!! trans('coupon::coupon.label.discount') !!}
                </label><br />
                    {!! $coupon['discount'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="logged">
                    {!! trans('coupon::coupon.label.logged') !!}
                </label><br />
                    {!! $coupon['logged'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="shipping">
                    {!! trans('coupon::coupon.label.shipping') !!}
                </label><br />
                    {!! $coupon['shipping'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="total">
                    {!! trans('coupon::coupon.label.total') !!}
                </label><br />
                    {!! $coupon['total'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="start_date">
                    {!! trans('coupon::coupon.label.start_date') !!}
                </label><br />
                    {!! $coupon['start_date'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="end_date">
                    {!! trans('coupon::coupon.label.end_date') !!}
                </label><br />
                    {!! $coupon['end_date'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="uses_total">
                    {!! trans('coupon::coupon.label.uses_total') !!}
                </label><br />
                    {!! $coupon['uses_total'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="uses_customer">
                    {!! trans('coupon::coupon.label.uses_customer') !!}
                </label><br />
                    {!! $coupon['uses_customer'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="status">
                    {!! trans('coupon::coupon.label.status') !!}
                </label><br />
                    {!! $coupon['status'] !!}
            </div>
        </div>
    </div>
            </div>  
        </div>  
        <div class="col-md-4">
            @include('coupon::public.coupon.aside')
        </div>

    </div>
</div>