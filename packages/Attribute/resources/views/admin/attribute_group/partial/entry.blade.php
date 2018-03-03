            <div class='row disabled'>
                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> required()
                       -> label(trans('attribute::attribute_group.label.name'))
                       -> placeholder(trans('attribute::attribute_group.placeholder.name'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::number('order')
                       -> label(trans('attribute::attribute_group.label.order'))
                       -> placeholder(trans('attribute::attribute_group.placeholder.order'))!!}
                </div>
            </div>