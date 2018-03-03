            <div class='row disabled'>
                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('title')
                       -> label(trans('currency::currency.label.title'))
                       -> placeholder(trans('currency::currency.placeholder.title'))
                       -> required()!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('code')
                       -> label(trans('currency::currency.label.code'))
                       -> placeholder(trans('currency::currency.placeholder.code'))
                       -> required()!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('symbol_left')
                       -> label(trans('currency::currency.label.symbol_left'))
                       -> placeholder(trans('currency::currency.placeholder.symbol_left'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('symbol_right')
                       -> label(trans('currency::currency.label.symbol_right'))
                       -> placeholder(trans('currency::currency.placeholder.symbol_right'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('decimal_place')
                       -> label(trans('currency::currency.label.decimal_place'))
                       -> placeholder(trans('currency::currency.placeholder.decimal_place'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('value')
                       -> label(trans('currency::currency.label.value'))
                       -> placeholder(trans('currency::currency.placeholder.value'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('status')
                    -> options(trans('currency::currency.options.status'))
                    -> label(trans('currency::currency.label.status'))
                    -> placeholder(trans('currency::currency.placeholder.status'))!!}
               </div>
            </div>