            <div class='row'>
               <div class='col-md-4 col-sm-6'>
                    {!! Form::select('filter_id')
                    -> options(Filter::groups())
                    -> required()
                    -> label(trans('filter::filter.label.filter_id'))
                    -> placeholder(trans('filter::filter.placeholder.filter_id'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> required()
                       -> label(trans('filter::filter.label.name'))
                       -> placeholder(trans('filter::filter.placeholder.name'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::number('order')
                       -> label(trans('filter::filter.label.order'))
                       -> placeholder(trans('filter::filter.placeholder.order'))!!}
                </div>

                
            </div>