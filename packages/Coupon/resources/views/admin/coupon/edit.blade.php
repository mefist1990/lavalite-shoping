    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Coupon</a></li>
            <li ><a href="#links" data-toggle="tab">Links</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#coupon-coupon-edit'  data-load-to='#coupon-coupon-entry' data-datatable='#coupon-coupon-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#coupon-coupon-entry' data-href='{{trans_url('admin/coupon/coupon')}}/{{$coupon->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('coupon-coupon-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(URL::to('admin/coupon/coupon/'. $coupon->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <!-- <div class="tab-pane active" id="coupon">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('coupon::coupon.name') !!} [{!!$coupon->name!!}] </div> -->
                @include('coupon::admin.coupon.partial.entry')
            <!-- </div> -->
        </div>
        {!!Form::close()!!}
    </div>