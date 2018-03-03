    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#review" data-toggle="tab">{!! trans('review::review.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#review-review-edit'  data-load-to='#review-review-entry' data-datatable='#review-review-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#review-review-entry' data-href='{{trans_url('admin/review/review')}}/{{$review->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('review-review-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(URL::to('admin/review/review/'. $review->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="review">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('review::review.name') !!} [{!!substr(@$review->description,0,50)!!}...] </div>
                @include('review::admin.review.partial.entry')
            </div>
        </div>
        {!!Form::close()!!}
    </div>