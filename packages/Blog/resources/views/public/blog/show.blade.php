  <section class="blog-section single-post bg-grey">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="row">
                             <div class="col-md-12">
                                <div class="blog-article">
                                    <div class="page-title">
                                        <h2>{!!@$blog['title']!!}</h2>
                                        <ul class="author-meta">
                                            <li class="name">
                                                <a><img src="{!!url(@$blog['user']->defaultImage('sm','photo'))!!}" alt="Auther Image" class="meta-image" height="40" width="40"></a>
                                                by <a>{!!@$blog['user']['name']!!}</a>
                                            </li>
                                            <li><i class="fa fa-calendar"></i> {!!format_date(@$blog['posted_on'])!!} </li>
                                            <!-- <li><i class="fa fa-bookmark-o"></i> <a  rel="category tag"></a></li> -->
                                            <li><i class="fa fa-eye"></i> {!!@$blog['viewcount']!!}</li>
                                        </ul>
                                    </div>
                                    <div class="article-media">
                                        <img src="{!!url(@$blog->defaultImage('xl','images'))!!}" class="img-responsive" alt="">
                                    </div>
                                    <div class="article-detail description">
                                        <p>{!!@$blog['details']!!}</p>
                                    </div>

                                

                                    <div class="next-prev-block next-prev-blog blog-section clearfix">
                                       @if(!empty($prev))
                                        <div class="prev-box pull-left">
                                            <div class="media">
                                                    <div class="media-left">
                                                        <a href="{!!url('blogs/'.$prev['slug'])!!}"><i class="fa fa-arrow-circle-left"></i></a>
                                                    </div>
                                                    <div class="media-body media-middle">
                                                        <h3 class="media-heading"><a href="{!!url('blogs/'.$prev['slug'])!!}"> Previous post</a></h3>
                                                        <h4><a href="{!!url('blogs/'.$prev['slug'])!!}">{!!$prev['title']!!}</a></h4>
                                                    </div>
                                                </div>                                             
                                        </div>
                                        @endif
                                         @if(!empty($next))
                                            <div class="next-box pull-right">
                                                <div class="media">                                                  
                                                    <div class="media-body media-middle text-right">
                                                        <h3 class="media-heading"><a href="{!!url('blogs/'.$next['slug'])!!}">Next post</a></h3>
                                                        <h4><a href="{!!url('blogs/'.$next['slug'])!!}">{!!$next['title']!!}</a></h4>
                                                    </div>                                                  
                                                    
                                                    <div class="media-right">
                                                        <a href="{!!url('blogs/'.$next['slug'])!!}"><i class="fa fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                   <!--  <div class="post-comment">
                                       <h3>Post your Comments </h3>
                                       {!!Form::vertical_open()->method('POST')->action('contacts/sendMail')->class('mt30')!!}
                                           {!!Form::textarea('message','')->rows(5)->required()->placeholder("Your Comments...")!!}
                                           <div class="row">
                                               <div class="col-sm-6">
                                                   {!!Form::text('name','')->required()->placeholder("Your Name...")!!}
                                                   {!!Form::email('email','')->required()->placeholder("Your Email...")!!}
                                               </div>
                                           </div>
                                          
                                           <div class="form-group">
                                               <button type="submit" class="btn btn-primary">Submit</button>
                                           </div>
                                       {!!Form::close()!!}
                                   </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <div class="widget">
                                <h3 class="widget-title">
                                    Search
                                </h3>
                                {!!Form::open()->method('GET')->action('blogs')!!}
                                <div class="input-group">
                                      <input type="text" name="search" class="form-control" placeholder="Search for...">
                                      <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">Go!</button>
                                      </span>
                                </div>
                                {!!Form::close()!!}
                            </div>
                            <div class="widget">
                                <h3 class="widget-title">
                                    Categories
                                </h3>
                                <ul class="categories">
                                    {!!Blog::categoryList()!!}
                                </ul>
                            </div>

                            <div class="widget">
                               {!!Blog::latest('recent',3)!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>