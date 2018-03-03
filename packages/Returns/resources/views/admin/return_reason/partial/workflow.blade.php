    @if(property_exists('workflow', $return_reason))
        @if($return_reason->hasStep('complete'))
            <button type="button" class="btn bg-orange btn-sm" data-action='WORKFLOW' data-method="PUT" data-load-to='#news-news-entry' data-href="{{trans_url('admin/news/news/workflow/'. $return_reason->getRouteKey() .'/complete')}}" data-value="No" data-datatable='#news-news-list'><i class="fa fa-check"></i> Complete</button>
        @endif

        @if($return_reason->hasStep('verify'))
            <button type="button" class="btn bg-olive btn-sm" data-action='WORKFLOW' data-method="PUT" data-load-to='#news-news-entry' data-href="{{trans_url('admin/news/news/workflow/'. $return_reason->getRouteKey() .'/verify')}}" data-value="Yes" data-datatable='#news-news-list'><i class="fa fa-check"></i> Verify</button>
        @endif

        @if($return_reason->hasStep('approve'))
            <button type="button" class="btn bg-aqua btn-sm" data-action='WORKFLOW' data-method="PUT" data-load-to='#news-news-entry' data-href="{{trans_url('admin/news/news/workflow/'. $return_reason->getRouteKey() .'/approve')}}" data-value="Yes" data-datatable='#news-news-list'><i class="fa fa-check"></i> Approve</button>
        @endif

        @if($return_reason->hasStep('publish'))
            <button type="button" class="btn bg-purple btn-sm" data-action='WORKFLOW' data-method="PUT" data-load-to='#news-news-entry' data-href="{{trans_url('admin/news/news/workflow/'. $return_reason->getRouteKey() .'/publish')}}" data-value="Yes" data-datatable='#news-news-list'><i class="fa fa-check"></i> Publish</button>
        @endif

        @if($return_reason->hasStep('unpublish'))
            <button type="button" class="btn bg-maroon btn-sm" data-action='WORKFLOW' data-method="PUT" data-load-to='#news-news-entry' data-href="{{trans_url('admin/news/news/workflow/'. $return_reason->getRouteKey() .'/unpublish')}}" data-value="Yes" data-datatable='#news-news-list'><i class="fa fa-times-circle"></i> Unpublish</button>
        @endif

        @if($return_reason->hasStep('archive'))
            <button type="button" class="btn bg-navy btn-sm" data-action='WORKFLOW' data-method="PUT" data-load-to='#news-news-entry' data-href="{{trans_url('admin/news/news/workflow/'. $return_reason->getRouteKey() .'/archive')}}" data-value="Yes" data-datatable='#news-news-list'><i class="fa fa-file-archive-o "></i> Archive</button>
        @endif
    @endif
