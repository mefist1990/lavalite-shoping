<div class="tab-pane active" id="details">
   <div class="tab-pan-title">  @if(empty($category->id)) {{ trans('app.new') }}  [{!! trans('category::category.name') !!}] @else {!! trans('category::category.name') !!} [{!!$category->name!!}] @endif </div> 
   
        <div class='col-md-4 col-sm-6'>
            {!! Form::select('parent_id')
            -> options(Category::parentNode())
            -> label(trans('category::category.label.parent_id'))
            -> placeholder(trans('category::category.placeholder.parent_id'))
            -> required() !!}
       </div>

        <div class='col-md-4 col-sm-6'>
               {!! Form::text('name')
               -> label(trans('category::category.label.name'))
               -> placeholder(trans('category::category.placeholder.name'))
               -> required()!!}
        </div>

        <div class='col-md-4 col-sm-6'>
            {!! Form::select('status')
            -> options(trans('category::category.options.status'))
            -> label(trans('category::category.label.status'))
            -> placeholder(trans('category::category.placeholder.status'))
            -> required()!!}
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

        <!-- <div class='col-md-12 col-sm-12'>
            <div class="form-group">
                <label for="image" class="control-label col-lg-12 col-sm-12 text-left"> {{trans('category::category.label.image') }}
                </label>
                <div class='col-lg-3 col-sm-12'>
                    {!!$category->fileUpload('image')!!}
                </div>
                <div class='col-lg-7 col-sm-12'>
                {!! $category->fileEdit('image')!!}
                {!! $category->fileShow('image')!!}
                </div>

                {!!Form::hidden('upload_folder')!!}
            </div>
        </div> -->

        <div class='col-md-4 col-sm-6'>
               {!! Form::number('order')
               -> label(trans('category::category.label.order'))
               -> placeholder(trans('category::category.placeholder.order'))!!}
        </div>

        <div class='col-md-4 col-sm-6'>
               {!! Form::number('icon')
               -> label(trans('category::category.label.icon'))
               -> placeholder(trans('category::category.placeholder.icon'))!!}
        </div>
        
        <div class='col-md-4 col-sm-6'>
                  {!!Form::hidden('top')->forcevalue('0')!!}
                 {!! Form::checkbox('top')->style('margin-left:15px')->inline()->removeclass('checkbox')
                 ->forcevalue('1')
                 -> label(trans('category::category.label.top'))
                 !!}
        </div>

        
   
</div>

