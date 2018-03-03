            
                <div class='col-md-4 col-sm-6'>
                       {!! Form::select('category_id')
                       -> options(@Blog::categories())
                       -> required()
                       -> label(trans('blog::blog.label.category_id'))
                       -> placeholder(trans('blog::blog.placeholder.category_id'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('title')
                       -> required()                       
                       -> label(trans('blog::blog.label.title'))
                       -> placeholder(trans('blog::blog.placeholder.title'))!!}
                </div>
                  <div class='col-md-4 col-sm-6'>
                       {!! Form::number('viewcount')
                       -> label(trans('blog::blog.label.viewcount'))
                       -> placeholder(trans('blog::blog.placeholder.viewcount'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::select('status')
                       -> options(trans('blog::blog.options.status'))
                       -> label(trans('blog::blog.label.status'))
                       -> placeholder(trans('blog::blog.placeholder.status'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::date('posted_on')
                       -> label(trans('blog::blog.label.posted_on'))
                       -> placeholder(trans('blog::blog.placeholder.posted_on'))!!}
                </div>
           

                <div class='col-md-12'>
                       {!! Form::textArea('details')
                       -> class('html-editor')
                       -> required()
                       -> label(trans('blog::blog.label.details'))
                       -> placeholder(trans('blog::blog.placeholder.details'))!!}
                </div>
            

              