    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Coupon</a></li>
            <li ><a href="#links" data-toggle="tab">Links</a></li>
            <div class="box-tools pull-right">
                @include('coupon::admin.coupon.partial.workflow')
                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#coupon-coupon-entry' data-href='{{trans_url('admin/coupon/coupon/create')}}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }}</button>
                @if($coupon->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#coupon-coupon-entry' data-href='{{ trans_url('/admin/coupon/coupon') }}/{{$coupon->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#coupon-coupon-entry' data-datatable='#coupon-coupon-list' data-href='{{ trans_url('/admin/coupon/coupon') }}/{{$coupon->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('coupon-coupon-show')
        ->method('POST')
        ->files('true')
        ->action(URL::to('admin/coupon/coupon'))!!}
            <div class="tab-content clearfix disabled">
               <!--  <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('coupon::coupon.name') !!}  [{!! $coupon->name !!}] </div>
                <div class="tab-pane active" id="details"> -->
                    @include('coupon::admin.coupon.partial.entry')
                <!-- </div> -->
            </div>
        {!! Form::close() !!}
    </div>