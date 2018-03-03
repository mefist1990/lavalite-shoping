            <div class='row'>
                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> required()
                       -> label(trans('filter::filter_group.label.name'))
                       -> placeholder(trans('filter::filter_group.placeholder.name'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::number('order')
                       -> min(0)
                       -> label(trans('filter::filter_group.label.order'))
                       -> placeholder(trans('filter::filter_group.placeholder.order'))!!}
                </div>
            </div>