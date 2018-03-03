            <div class='row'>
                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('product_id')
                    -> options(Product::productsList())
                    -> label(trans('review::review.label.product_id'))
                    -> placeholder(trans('review::review.placeholder.product_id'))!!}
               </div>
               
               <div class='col-md-4 col-sm-6'>
                       {!! Form::number('score')
                       -> label(trans('review::review.label.score'))
                       -> placeholder(trans('review::review.placeholder.score'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('Title')
                       -> label(trans('review::review.label.title'))
                       -> placeholder(trans('review::review.placeholder.title'))!!}
                </div>
                
                <div class='col-md-4 col-sm-6'>
                       {!! Form::textarea('description')
                       ->rows(6)
                       -> label(trans('review::review.label.description'))
                       -> placeholder(trans('review::review.placeholder.description'))!!}
                </div>
                

                <!-- <div class='col-md-4 col-sm-6'>
                    {!! Form::select('status')
                    -> options(trans('review::review.options.status'))
                    -> label(trans('review::review.label.status'))
                    -> placeholder(trans('review::review.placeholder.status'))!!}
               </div> -->

                
            </div>