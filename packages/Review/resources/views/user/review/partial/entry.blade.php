<div class='col-md-4 col-sm-6'>
                    {!! Form::select('product_id')
                    -> options(trans('review::review.options.product_id'))
                    -> label(trans('review::review.label.product_id'))
                    -> placeholder(trans('review::review.placeholder.product_id'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('description')
                       -> label(trans('review::review.label.description'))
                       -> placeholder(trans('review::review.placeholder.description'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('status')
                    -> options(trans('review::review.options.status'))
                    -> label(trans('review::review.label.status'))
                    -> placeholder(trans('review::review.placeholder.status'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('score')
                       -> label(trans('review::review.label.score'))
                       -> placeholder(trans('review::review.placeholder.score'))!!}
                </div>

{!!   Form::actions()
->large_primary_submit('Submit')
->large_inverse_reset('Reset')
!!}