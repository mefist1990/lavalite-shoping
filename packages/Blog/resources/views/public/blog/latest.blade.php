@forelse($blogs as $key=>$blog)
<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
    <div class="post-card-item">
        <div class="item-thumb">
            <a href="{!!url('blogs/'.$blog['slug'])!!}">
                <img src="{!!url($blog->defaultImage('lg','images'))!!}" alt="" class="img-responsive">
            </a>
        </div>
        <div class="post-card-body">
            <div class="post-card-description">
                <ul class="list-inline">
                    <li><i class="fa fa-calendar"></i> {!!format_date($blog->posted_on)!!} </li>
                    <li><i class="fa fa-eye"></i> <a href="{!!url('blogs/'.$blog['slug'])!!}" rel="category tag">{!!@$blog->viewcount!!}</a></li>
                </ul>
                <h3><a href="{!!url('blogs/'.$blog['slug'])!!}">{!!@$blog->title!!}</a></h3>
                <p>{!!strip_tags(substr(@$blog->details,0,90))!!}</p>
            </div>
        </div>
    </div>
</div>
@empty
@endif