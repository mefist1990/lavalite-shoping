<div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> label(trans('order::order_status.label.name'))
                       -> placeholder(trans('order::order_status.placeholder.name'))!!}
                </div>

{!!   Form::actions()
->large_primary_submit('Submit')
->large_inverse_reset('Reset')
!!}