<div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> label(trans('newsletter::newsletter.label.name'))
                       -> placeholder(trans('newsletter::newsletter.placeholder.name'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('email')
                       -> label(trans('newsletter::newsletter.label.email'))
                       -> placeholder(trans('newsletter::newsletter.placeholder.email'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('phone')
                       -> label(trans('newsletter::newsletter.label.phone'))
                       -> placeholder(trans('newsletter::newsletter.placeholder.phone'))!!}
                </div>

{!!   Form::actions()
->large_primary_submit('Submit')
->large_inverse_reset('Reset')
!!}