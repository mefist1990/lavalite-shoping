<div class='col-md-4 col-sm-6'>
                       {!! Form::numeric('order_id')
                       -> label(trans('returns::returns.label.order_id'))
                       -> placeholder(trans('returns::returns.placeholder.order_id'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('product_id')
                    -> options(trans('returns::returns.options.product_id'))
                    -> label(trans('returns::returns.label.product_id'))
                    -> placeholder(trans('returns::returns.placeholder.product_id'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('customer_id')
                    -> options(trans('returns::returns.options.customer_id'))
                    -> label(trans('returns::returns.label.customer_id'))
                    -> placeholder(trans('returns::returns.placeholder.customer_id'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('return_reason_id')
                    -> options(trans('returns::returns.options.return_reason_id'))
                    -> label(trans('returns::returns.label.return_reason_id'))
                    -> placeholder(trans('returns::returns.placeholder.return_reason_id'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('return_action_id')
                    -> options(trans('returns::returns.options.return_action_id'))
                    -> label(trans('returns::returns.label.return_action_id'))
                    -> placeholder(trans('returns::returns.placeholder.return_action_id'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::textarea ('comment')
                    -> label(trans('returns::returns.label.comment'))
                    -> placeholder(trans('returns::returns.placeholder.comment'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::datetime('date_ordered')
                       -> label(trans('returns::returns.label.date_ordered'))
                       -> placeholder(trans('returns::returns.placeholder.date_ordered'))!!}
                </div>

{!!   Form::actions()
->large_primary_submit('Submit')
->large_inverse_reset('Reset')
!!}