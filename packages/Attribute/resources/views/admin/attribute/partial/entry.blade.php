            <div class='row disabled'>
                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('group_id')
                    -> options(Attribute::groups())
                    -> required()
                    -> label(trans('attribute::attribute.label.group_id'))
                    -> placeholder(trans('attribute::attribute.placeholder.group_id'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> required()
                       -> label(trans('attribute::attribute.label.name'))
                       -> placeholder(trans('attribute::attribute.placeholder.name'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::number('order')
                       -> label(trans('attribute::attribute.label.order'))
                       -> placeholder(trans('attribute::attribute.placeholder.order'))!!}
                </div>
            </div>