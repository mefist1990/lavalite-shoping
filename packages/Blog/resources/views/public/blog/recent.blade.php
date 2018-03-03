 <h3 class="widget-title">Recent Posts</h3>
     <ul class="recent-come">
        @forelse($blogs as $key => $blog) 
            <li>

                        <div class="img-post"> <a href="{!!url('blogs/'.$blog->slug)!!}"> <img src="{!!url($blog->defaultImage('xs','images'))!!}" alt=""> </a></div>
                        <div class="text-post"> <a href="{!!url('blogs/'.$blog->slug)!!}">{!!$blog['title']!!}</a> <span><i class="fa fa-user"></i> {!!@$blog['user']['name']!!}</span> </div>
            </li>
        @empty
        @endif
    </ul>