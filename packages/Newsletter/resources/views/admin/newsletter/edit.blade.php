    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#newsletter" data-toggle="tab">{!! trans('newsletter::newsletter.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#newsletter-newsletter-edit'  data-load-to='#newsletter-newsletter-entry' data-datatable='#newsletter-newsletter-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#newsletter-newsletter-entry' data-href='{{trans_url('admin/newsletter/newsletter')}}/{{$newsletter->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('newsletter-newsletter-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(URL::to('admin/newsletter/newsletter/'. $newsletter->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="newsletter">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('newsletter::newsletter.name') !!} [{!!$newsletter->name!!}] </div>
                @include('newsletter::admin.newsletter.partial.entry')
            </div>
        </div>
        {!!Form::close()!!}
    </div>