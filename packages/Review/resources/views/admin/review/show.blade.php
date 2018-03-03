    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('review::review.name') !!}</a></li>
            <div class="box-tools pull-right">
               <!--  @include('review::admin.review.partial.workflow') -->
                @if($review->status=="Published" )  
                    <button type="button" class="btn btn-warning btn-sm" data-action="CHANGE" data-value="Draft" data-field="status"data-load-to='#review-review-entry' data-href='{{ trans_url('/admin/review/review/status') }}/{{$review->getRouteKey()}}'><i class="fa fa-ban"></i> Draft </button>
                @else
                    <button type="button" class="btn btn-info btn-sm" data-action="CHANGE" data-value="Published" data-field="status" data-load-to='#review-review-entry' data-href='{{ trans_url('/admin/review/review/status') }}/{{$review->getRouteKey()}}'><i class="fa fa-check-circle-o"></i> Publish</button>
                @endif
               <!--  <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#review-review-entry' data-href='{{trans_url('admin/review/review/create')}}'><i class="fa fa-times-circle"></i> {{ trans('app.new') }}</button>
                @if($review->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#review-review-entry' data-href='{{ trans_url('/admin/review/review') }}/{{$review->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button> -->
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#review-review-entry' data-datatable='#review-review-list' data-href='{{ trans_url('/admin/review/review') }}/{{$review->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('review-review-show')
        ->method('POST')
        ->files('true')
        ->action(URL::to('admin/review/review'))!!}
            <div class="tab-content clearfix disabled">
                <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('review::review.name') !!}  [{!!substr(@$review->description,0,50)!!}...] </div>
                <div class="tab-pane active" id="details">
                    @include('review::admin.review.partial.entry')
                </div>
            </div>
        {!! Form::close() !!}
    </div>