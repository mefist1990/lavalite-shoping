<div class='col-md-4 col-sm-6'>
                       {!! Form::text('return_reason_id')
                       -> label(trans('returns::return_reason.label.return_reason_id'))
                       -> placeholder(trans('returns::return_reason.placeholder.return_reason_id'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('language_id')
                       -> label(trans('returns::return_reason.label.language_id'))
                       -> placeholder(trans('returns::return_reason.placeholder.language_id'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> label(trans('returns::return_reason.label.name'))
                       -> placeholder(trans('returns::return_reason.placeholder.name'))!!}
                </div>

{!!   Form::actions()
->large_primary_submit('Submit')
->large_inverse_reset('Reset')
!!}