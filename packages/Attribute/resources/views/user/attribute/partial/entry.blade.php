<div class='col-md-4 col-sm-6'>
                    {!! Form::select('group_id')
                    -> options(trans('attribute::attribute.options.group_id'))
                    -> label(trans('attribute::attribute.label.group_id'))
                    -> placeholder(trans('attribute::attribute.placeholder.group_id'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> label(trans('attribute::attribute.label.name'))
                       -> placeholder(trans('attribute::attribute.placeholder.name'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('order')
                       -> label(trans('attribute::attribute.label.order'))
                       -> placeholder(trans('attribute::attribute.placeholder.order'))!!}
                </div>

{!!   Form::actions()
->large_primary_submit('Submit')
->large_inverse_reset('Reset')
!!}