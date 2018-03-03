<div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> label(trans('filter::filter_group.label.name'))
                       -> placeholder(trans('filter::filter_group.placeholder.name'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::numeric('order')
                       -> label(trans('filter::filter_group.label.order'))
                       -> placeholder(trans('filter::filter_group.placeholder.order'))!!}
                </div>

{!!   Form::actions()
->large_primary_submit('Submit')
->large_inverse_reset('Reset')
!!}