    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('newsletter::newsletter.name') !!}</a></li>
            <div class="box-tools pull-right">
                @include('newsletter::admin.newsletter.partial.workflow')
               <!--  <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#newsletter-newsletter-entry' data-href='{{trans_url('admin/newsletter/newsletter/create')}}'><i class="fa fa-times-circle"></i> {{ trans('app.new') }}</button> -->
                @if($newsletter->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#newsletter-newsletter-entry' data-href='{{ trans_url('/admin/newsletter/newsletter') }}/{{$newsletter->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#newsletter-newsletter-entry' data-datatable='#newsletter-newsletter-list' data-href='{{ trans_url('/admin/newsletter/newsletter') }}/{{$newsletter->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('newsletter-newsletter-show')
        ->method('POST')
        ->files('true')
        ->action(URL::to('admin/newsletter/newsletter'))!!}
            <div class="tab-content clearfix">
                <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('newsletter::newsletter.name') !!}  [{!! $newsletter->name !!}] </div>
                <div class="tab-pane active" id="details">
                    @include('newsletter::admin.newsletter.partial.entry')
                </div>
            </div>
        {!! Form::close() !!}
    </div>