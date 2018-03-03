    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Newsletter</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#newsletter-newsletter-create'  data-load-to='#newsletter-newsletter-entry' data-datatable='#newsletter-newsletter-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#newsletter-newsletter-entry' data-href='{{trans_url('admin/newsletter/newsletter/0')}}'><i class="fa fa-times-circle"></i> {{ trans('app.close') }}</button>
            </div>
        </ul>
        <div class="tab-content clearfix">
            {!!Form::vertical_open()
            ->id('newsletter-newsletter-create')
            ->method('POST')
            ->files('true')
            ->action(URL::to('admin/newsletter/newsletter'))!!}
            <div class="tab-pane active" id="details">
                <div class="tab-pan-title">  {{ trans('app.new') }}  [{!! trans('newsletter::newsletter.name') !!}] </div>
                @include('newsletter::admin.newsletter.partial.entry')
            </div>
            {!! Form::close() !!}
        </div>
    </div>