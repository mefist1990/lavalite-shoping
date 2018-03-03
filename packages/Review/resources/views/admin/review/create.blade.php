    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Review</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#review-review-create'  data-load-to='#review-review-entry' data-datatable='#review-review-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#review-review-entry' data-href='{{trans_url('admin/review/review/0')}}'><i class="fa fa-times-circle"></i> {{ trans('app.close') }}</button>
            </div>
        </ul>
        <div class="tab-content clearfix">
            {!!Form::vertical_open()
            ->id('review-review-create')
            ->method('POST')
            ->files('true')
            ->action(URL::to('admin/review/review'))!!}
            <div class="tab-pane active" id="details">
                <div class="tab-pan-title">  {{ trans('app.new') }}  [{!! trans('review::review.name') !!}] </div>
                @include('review::admin.review.partial.entry')
            </div>
            {!! Form::close() !!}
        </div>
    </div>