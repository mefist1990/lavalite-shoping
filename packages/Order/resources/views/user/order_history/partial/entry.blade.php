<div class='col-md-4 col-sm-6'>
                       {!! Form::text('order_id')
                       -> label(trans('order::order_history.label.order_id'))
                       -> placeholder(trans('order::order_history.placeholder.order_id'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('order_status_id')
                    -> options(trans('order::order_history.options.order_status_id'))
                    -> label(trans('order::order_history.label.order_status_id'))
                    -> placeholder(trans('order::order_history.placeholder.order_status_id'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                   {!! Form::inline_checkboxes('notify[]')
                   -> checkboxes(trans('order::order_history.options.notify'))
                   -> label(trans('order::order_history.label.notify'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::textarea ('comment')
                    -> label(trans('order::order_history.label.comment'))
                    -> placeholder(trans('order::order_history.placeholder.comment'))!!}
                </div>

{!!   Form::actions()
->large_primary_submit('Submit')
->large_inverse_reset('Reset')
!!}