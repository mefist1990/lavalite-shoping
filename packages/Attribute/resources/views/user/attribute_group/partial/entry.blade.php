<div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> label(trans('attribute::attribute_group.label.name'))
                       -> placeholder(trans('attribute::attribute_group.placeholder.name'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::numeric('order')
                       -> label(trans('attribute::attribute_group.label.order'))
                       -> placeholder(trans('attribute::attribute_group.placeholder.order'))!!}
                </div>

{!!   Form::actions()
->large_primary_submit('Submit')
->large_inverse_reset('Reset')
!!}