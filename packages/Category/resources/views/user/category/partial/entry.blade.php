<div class='col-md-4 col-sm-6'>
                    {!! Form::select('parent_id')
                    -> options(trans('category::category.options.parent_id'))
                    -> label(trans('category::category.label.parent_id'))
                    -> placeholder(trans('category::category.placeholder.parent_id'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> label(trans('category::category.label.name'))
                       -> placeholder(trans('category::category.placeholder.name'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('status')
                    -> options(trans('category::category.options.status'))
                    -> label(trans('category::category.label.status'))
                    -> placeholder(trans('category::category.placeholder.status'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('meta_title')
                       -> label(trans('category::category.label.meta_title'))
                       -> placeholder(trans('category::category.placeholder.meta_title'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::textarea ('meta_description')
                    -> label(trans('category::category.label.meta_description'))
                    -> placeholder(trans('category::category.placeholder.meta_description'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::textarea ('meta_keyword')
                    -> label(trans('category::category.label.meta_keyword'))
                    -> placeholder(trans('category::category.placeholder.meta_keyword'))!!}
                </div>

                <div class='col-md-12 col-sm-12'>
                    <div class="form-group">
                        <label for="image" class="control-label col-lg-12 col-sm-12 text-left"> {{trans('category::category.label.image') }}
                        </label>
                        <div class='col-lg-3 col-sm-12'>
                            {!! $category->fileUpload('image')
                            ->mime(config('filer.image_extensions'))!!}
                        </div>
                        <div class='col-lg-7 col-sm-12'>
                        {!! $category->fileEdit('image')!!}
                        </div>
                    </div>
                </div>
                <div class='col-md-4 col-sm-6'>
                   {!! Form::inline_checkboxes('top[]')
                   -> checkboxes(trans('category::category.options.top'))
                   -> label(trans('category::category.label.top'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::numeric('order')
                       -> label(trans('category::category.label.order'))
                       -> placeholder(trans('category::category.placeholder.order'))!!}
                </div>

{!!   Form::actions()
->large_primary_submit('Submit')
->large_inverse_reset('Reset')
!!}