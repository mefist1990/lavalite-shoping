    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Coupon</a></li>
            <li ><a href="#links" data-toggle="tab">Links</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#coupon-coupon-create'  data-load-to='#coupon-coupon-entry' data-datatable='#coupon-coupon-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#coupon-coupon-entry' data-href='{{trans_url('admin/coupon/coupon/0')}}'><i class="fa fa-times-circle"></i> {{ trans('app.close') }}</button>
            </div>
        </ul>
        <div class="tab-content clearfix">
            {!!Form::vertical_open()
            ->id('coupon-coupon-create')
            ->method('POST')
            ->files('true')
            ->action(URL::to('admin/coupon/coupon'))!!}
            <div class="tab-content clearfix">
            <!-- <div class="tab-pane active" id="details">
                <div class="tab-pan-title">  {{ trans('app.new') }}  [{!! trans('coupon::coupon.name') !!}] </div> -->
                @include('coupon::admin.coupon.partial.entry')
            <!-- </div> -->
            </div>
            {!! Form::close() !!}
        </div>
    </div>