            <div class='row disabled'>
                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> label(trans('newsletter::newsletter.label.name'))
                       -> placeholder(trans('newsletter::newsletter.placeholder.name'))
                       -> required()!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('email')
                       -> label(trans('newsletter::newsletter.label.email'))
                       -> placeholder(trans('newsletter::newsletter.placeholder.email'))
                       -> required()!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('phone')
                       -> label(trans('newsletter::newsletter.label.phone'))
                       -> placeholder(trans('newsletter::newsletter.placeholder.phone'))
                       -> required()!!}
                </div>
            </div>