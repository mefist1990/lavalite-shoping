<div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> label(trans('filter::filter.label.name'))
                       -> placeholder(trans('filter::filter.placeholder.name'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::numeric('order')
                       -> label(trans('filter::filter.label.order'))
                       -> placeholder(trans('filter::filter.placeholder.order'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('filter_id')
                    -> options(trans('filter::filter.options.filter_id'))
                    -> label(trans('filter::filter.label.filter_id'))
                    -> placeholder(trans('filter::filter.placeholder.filter_id'))!!}
               </div>

{!!   Form::actions()
->large_primary_submit('Submit')
->large_inverse_reset('Reset')
!!}