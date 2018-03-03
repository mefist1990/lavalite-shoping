    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#returns" data-toggle="tab">{!! trans('returns::returns.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#returns-returns-edit'  data-load-to='#returns-returns-entry' data-datatable='#returns-returns-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#returns-returns-entry' data-href="{{trans_url('admin/returns/returns/')}}/{{$returns->getRouteKey()}}"><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('returns-returns-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(URL::to('admin/returns/returns/'. $returns->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="returns">
                <!-- <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('returns::returns.name') !!} [{!!$returns->name!!}] </div> -->
                @include('returns::admin.returns.partial.entry')
            </div>
        </div>
        {!!Form::close()!!}
    </div>