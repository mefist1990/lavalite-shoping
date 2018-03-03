    @if(property_exists('workflow', $review))
        @if($review->hasStep('complete'))
            <button type="button" class="btn bg-orange btn-sm" data-action='WORKFLOW' data-method="PUT" data-load-to='#news-news-entry' data-href="{{trans_url('admin/news/news/workflow/'. $review->getRouteKey() .'/complete')}}" data-value="No" data-datatable='#news-news-list'><i class="fa fa-check"></i> Complete</button>
        @endif

        @if($review->hasStep('verify'))
            <button type="button" class="btn bg-olive btn-sm" data-action='WORKFLOW' data-method="PUT" data-load-to='#news-news-entry' data-href="{{trans_url('admin/news/news/workflow/'. $review->getRouteKey() .'/verify')}}" data-value="Yes" data-datatable='#news-news-list'><i class="fa fa-check"></i> Verify</button>
        @endif

        @if($review->hasStep('approve'))
            <button type="button" class="btn bg-aqua btn-sm" data-action='WORKFLOW' data-method="PUT" data-load-to='#news-news-entry' data-href="{{trans_url('admin/news/news/workflow/'. $review->getRouteKey() .'/approve')}}" data-value="Yes" data-datatable='#news-news-list'><i class="fa fa-check"></i> Approve</button>
        @endif

        @if($review->hasStep('publish'))
            <button type="button" class="btn bg-purple btn-sm" data-action='WORKFLOW' data-method="PUT" data-load-to='#news-news-entry' data-href="{{trans_url('admin/news/news/workflow/'. $review->getRouteKey() .'/publish')}}" data-value="Yes" data-datatable='#news-news-list'><i class="fa fa-check"></i> Publish</button>
        @endif

        @if($review->hasStep('unpublish'))
            <button type="button" class="btn bg-maroon btn-sm" data-action='WORKFLOW' data-method="PUT" data-load-to='#news-news-entry' data-href="{{trans_url('admin/news/news/workflow/'. $review->getRouteKey() .'/unpublish')}}" data-value="Yes" data-datatable='#news-news-list'><i class="fa fa-times-circle"></i> Unpublish</button>
        @endif

        @if($review->hasStep('archive'))
            <button type="button" class="btn bg-navy btn-sm" data-action='WORKFLOW' data-method="PUT" data-load-to='#news-news-entry' data-href="{{trans_url('admin/news/news/workflow/'. $review->getRouteKey() .'/archive')}}" data-value="Yes" data-datatable='#news-news-list'><i class="fa fa-file-archive-o "></i> Archive</button>
        @endif
    @endif
