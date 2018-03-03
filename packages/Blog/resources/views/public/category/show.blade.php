 <section class="blog-section bg-grey">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="row">
                            @forelse($blogs as $key=>$blog)
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <div class="post-card-item">
                                        <div class="item-thumb">
                                            <a href="{!!url('blogs/'.$blog->slug)!!}">
                                                <img src="{!!url($blog->defaultImage('lg','images'))!!}" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="post-card-body">
                                            <div class="post-card-description">
                                                <ul class="list-inline">
                                                    <li><i class="fa fa-user"></i> {!!@$blog['user']['name']!!} </li>
                                                    <li><i class="fa fa-calendar"></i>{!!format_date(@$blog->posted_on)!!} </li>
                                                    <li><i class="fa fa-comments-o"></i> <a href="{!!url('blogs/'.$blog->slug)!!}" rel="comments">{!!@$blog['viewcount']!!}</a></li>
                                                </ul>
                                                <h3><a href="{!!url('blogs/'.$blog->slug)!!}">{!!@$blog['title']!!}</a></h3>
                                                <p>{!!strip_tags(substr(@$blog['details'],0,90))!!}..</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            <p>No Items Found.</p>
                            @endif
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pagination">
                                    {!!@$blogs->links()!!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <div class="widget">
                                <h3>
                                    Search
                                </h3>
                                {!!Form::open()->method('GET')->action('blogs')!!}
                                <div class="input-group">
                                        
                                        <input type="text" class="form-control" name="search[q]" placeholder="Search for...">
                                            <span class="input-group-btn">
                                                 <button class="btn btn-primary" type="submit">Go!</button>
                                            </span>
                                        
                                </div>
                                {!!Form::close()!!}
                            </div>
                            <div class="widget">
                                <h3>
                                    Topics
                                </h3>
                                <ul class="categories">
                                  {!!Blog::categoryList()!!}
                                </ul>
                            </div>

                            <div class="widget"><img src="{!!url('img/adv.jpg')!!}" alt="" class="img-responsive center-block"></div>

                            <div class="widget">
                               {!!Blog::latest('recent',3)!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>