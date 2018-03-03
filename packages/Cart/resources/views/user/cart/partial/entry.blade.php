<div class='col-md-4 col-sm-6'>
                       {!! Form::text('identifier')
                       -> label(trans('cart::cart.label.identifier'))
                       -> placeholder(trans('cart::cart.placeholder.identifier'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('instance')
                       -> label(trans('cart::cart.label.instance'))
                       -> placeholder(trans('cart::cart.placeholder.instance'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('content')
                       -> label(trans('cart::cart.label.content'))
                       -> placeholder(trans('cart::cart.placeholder.content'))!!}
                </div>

{!!   Form::actions()
->large_primary_submit('Submit')
->large_inverse_reset('Reset')
!!}