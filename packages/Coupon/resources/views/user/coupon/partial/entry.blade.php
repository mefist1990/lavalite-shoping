<div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> label(trans('coupon::coupon.label.name'))
                       -> placeholder(trans('coupon::coupon.placeholder.name'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::textarea ('description')
                    -> label(trans('coupon::coupon.label.description'))
                    -> placeholder(trans('coupon::coupon.placeholder.description'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('code')
                       -> label(trans('coupon::coupon.label.code'))
                       -> placeholder(trans('coupon::coupon.placeholder.code'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('type')
                    -> options(trans('coupon::coupon.options.type'))
                    -> label(trans('coupon::coupon.label.type'))
                    -> placeholder(trans('coupon::coupon.placeholder.type'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('discount')
                       -> label(trans('coupon::coupon.label.discount'))
                       -> placeholder(trans('coupon::coupon.placeholder.discount'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                   {!! Form::inline_radios('logged')
                   -> radios(trans('coupon::coupon.options.logged'))
                   -> label(trans('coupon::coupon.label.logged'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                   {!! Form::inline_radios('shipping')
                   -> radios(trans('coupon::coupon.options.shipping'))
                   -> label(trans('coupon::coupon.label.shipping'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('total')
                       -> label(trans('coupon::coupon.label.total'))
                       -> placeholder(trans('coupon::coupon.placeholder.total'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('start_date')
                       -> label(trans('coupon::coupon.label.start_date'))
                       -> placeholder(trans('coupon::coupon.placeholder.start_date'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('end_date')
                       -> label(trans('coupon::coupon.label.end_date'))
                       -> placeholder(trans('coupon::coupon.placeholder.end_date'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('uses_total')
                       -> label(trans('coupon::coupon.label.uses_total'))
                       -> placeholder(trans('coupon::coupon.placeholder.uses_total'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('uses_customer')
                       -> label(trans('coupon::coupon.label.uses_customer'))
                       -> placeholder(trans('coupon::coupon.placeholder.uses_customer'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('status')
                       -> label(trans('coupon::coupon.label.status'))
                       -> placeholder(trans('coupon::coupon.placeholder.status'))!!}
                </div>

{!!   Form::actions()
->large_primary_submit('Submit')
->large_inverse_reset('Reset')
!!}