<div class='col-md-4 col-sm-6'>
       {!! Form::text('name')
       -> label(trans('product::product.label.name'))
       -> addGroupClass('label-floating')
       -> required()!!}
</div>

<div class='col-md-4 col-sm-6'>
       {!! Form::text('meta_title')
       -> label(trans('product::product.label.meta_title'))
       -> addGroupClass('label-floating')!!}
</div>

<div class='col-md-4 col-sm-6'>
       {!! Form::text('model')
       -> label(trans('product::product.label.model'))
       -> addGroupClass('label-floating')
       -> required()!!}
</div>

<div class='col-md-12'>
     {!! Form::textArea('meta_description')
     -> addGroupClass('label-floating')
     -> addClass('html-editor')
     -> label(trans('product::product.label.meta_description'))
     !!}
</div>

<div class='col-md-12'>
     {!! Form::textArea('description')
     -> addGroupClass('label-floating')
     -> addClass('html-editor')
     -> label(trans('product::product.label.description'))
     !!}
</div>

<div class='col-md-4 col-sm-6'>
    {!! Form::text('meta_keyword')
    -> label(trans('product::product.label.meta_keyword'))
    -> addGroupClass('label-floating')!!}
</div>

<div class='col-md-4 col-sm-6'>
       {!! Form::text('price')
       -> label(trans('product::product.label.price'))
       -> addGroupClass('label-floating')
       -> required()!!}
</div>

<div class='col-md-4 col-sm-6'>
       {!! Form::numeric('quantity')
       -> label(trans('product::product.label.quantity'))
       -> addGroupClass('label-floating')!!}
</div>

<div class='col-md-4 col-sm-6'>
       {!! Form::text('sku')
       -> label(trans('product::product.label.sku'))
       -> addGroupClass('label-floating')!!}
</div>

<div class='col-md-4 col-sm-6'>
       {!! Form::text('upc')
       -> label(trans('product::product.label.upc'))
       -> addGroupClass('label-floating')!!}
</div>

<div class='col-md-4 col-sm-6'>
       {!! Form::text('ean')
       -> label(trans('product::product.label.ean'))
       -> addGroupClass('label-floating')!!}
</div>

<div class='col-md-4 col-sm-6'>
       {!! Form::text('jan')
       -> label(trans('product::product.label.jan'))
       -> addGroupClass('label-floating')!!}
</div>

<div class='col-md-4 col-sm-6'>
       {!! Form::text('isbn')
       -> label(trans('product::product.label.isbn'))
          -> addGroupClass('label-floating')!!}
</div>

<div class='col-md-4 col-sm-6'>
       {!! Form::text('mpn')
       -> label(trans('product::product.label.mpn'))
       -> addGroupClass('label-floating')!!}
</div>

<div class='col-md-12 col-sm-12'>
      <label>Images</label>
     <div class="clear-fix" >
      {!!@$product->fileUpload('images')!!} 

      {!!@$product->fileEdit('images')!!}
      </div>
</div>

<div class='col-md-4 col-sm-6'>
    {!! Form::select('status')
    -> options(trans('product::product.options.status'))
    -> label(trans('product::product.label.status'))
    -> addGroupClass('label-floating')
    -> dataStyle('select-with-transition')
    -> dataSize('7')
    -> addClass('selectpicker')
    -> required()!!}
</div>

<div class='col-md-4 col-sm-6'>
    {!! Form::select('related_products')
    -> options(array())
    -> label(trans('product::product.label.related_products'))
    -> addGroupClass('label-floating')
    -> dataStyle('select-with-transition')
    -> dataSize('7')
    -> addClass('selectpicker')!!}
</div>

<div class='col-md-4 col-sm-6'>
    {!! Form::select('tax_class')
    -> options(trans('product::product.options.tax_class'))
    -> label(trans('product::product.label.tax_class'))
    -> addGroupClass('label-floating')
    -> dataStyle('select-with-transition')
    -> dataSize('7')
    -> addClass('selectpicker')!!}
</div>

<div class='col-md-4 col-sm-6'>
    {!! Form::select('substract_stock')
    -> options(trans('product::product.options.substract_stock'))
    -> label(trans('product::product.label.substract_stock'))
    -> addGroupClass('label-floating')
    -> dataStyle('select-with-transition')
    -> dataSize('7')
    -> addClass('selectpicker')!!}
</div>

<div class='col-md-4 col-sm-6'>
    {!! Form::select('outofstock_status')
    -> options(trans('product::product.options.outofstock_status'))
    -> label(trans('product::product.label.outofstock_status'))
    -> addGroupClass('label-floating')
    -> dataStyle('select-with-transition')
    -> dataSize('7')
    -> addClass('selectpicker')!!}
</div>


<div class='col-md-4 col-sm-6'>
    {!! Form::select('weight_class')
    -> options(trans('product::product.options.weight_class'))
    -> label(trans('product::product.label.weight_class'))
    -> addGroupClass('label-floating')
    -> dataStyle('select-with-transition')
    -> dataSize('7')
    -> addClass('selectpicker')!!}
</div>

<div class='col-md-4 col-sm-6'>
    {!! Form::select('length_class')
    -> options(trans('product::product.options.length_class'))
    -> label(trans('product::product.label.length_class'))
    -> addGroupClass('label-floating')
    -> dataStyle('select-with-transition')
    -> dataSize('7')
    -> addClass('selectpicker')!!}
</div>

<div class='col-md-4 col-sm-6'>
    {!! Form::select('attributes')
    -> options(array())
    -> label(trans('product::product.label.attributes'))
    -> addGroupClass('label-floating')
    -> dataStyle('select-with-transition')
    -> dataSize('7')
    -> addClass('selectpicker')!!}
</div>

<div class='col-md-4 col-sm-6'>
    {!! Form::select('discounts')
    -> options(array())
    -> label(trans('product::product.label.discounts'))
    -> addGroupClass('label-floating')
    -> dataStyle('select-with-transition')
    -> dataSize('7')
    -> addClass('selectpicker')!!}
</div>

<div class='col-md-4 col-sm-6'>
       {!! Form::text('return_policy')
       -> label(trans('product::product.label.return_policy'))
       -> addGroupClass('label-floating')!!}
</div>

<div class='col-md-4 col-sm-6'>
       {!! Form::text('download')
       -> label(trans('product::product.label.download'))
       -> addGroupClass('label-floating')!!}
</div>

<div class='col-md-4 col-sm-6'>
       {!! Form::text('tags')
       -> label(trans('product::product.label.tags'))
       -> addGroupClass('label-floating')!!}
</div>

<div class='col-md-4 col-sm-6'>
       {!! Form::text('location')
       -> label(trans('product::product.label.location'))
       -> addGroupClass('label-floating')!!}
</div>

<div class='col-md-4 col-sm-6'>
       {!! Form::text('seo_keyword')
       -> label(trans('product::product.label.seo_keyword'))
       -> addGroupClass('label-floating')!!}
</div>

<div class='col-md-4 col-sm-6'>
       {!! Form::numeric('order')
       -> label(trans('product::product.label.order'))
       -> addGroupClass('label-floating')!!}
</div>

<div class='col-md-4 col-sm-6'>
       {!! Form::text('dimensions')
       -> label(trans('product::product.label.dimensions'))
       -> addGroupClass('label-floating')!!}
</div>

<!-- <div class='col-md-4 col-sm-6'>
       {!! Form::date('date_available')
       -> label(trans('product::product.label.date_available'))
       -> addGroupClass('label-floating')!!}
</div> -->

<div class='col-md-4 col-sm-6'>
       {!! Form::text('manufacturer')
       -> label(trans('product::product.label.manufacturer'))
       -> addGroupClass('label-floating')!!}
</div>

<div class='col-md-4 col-sm-6'>
       {!! Form::text('special')
       -> label(trans('product::product.label.special'))
       -> addGroupClass('label-floating')!!}
</div>

    <div class='col-md-12 col-lg-12'>
    <div class="form-group form-group-sm">
      <label for="agency_fee" class="control-label col-lg-2 col-md-2 col-sm-4" style="padding-left: 20px;"> 
       Category<sup>*</sup>
      </label>
      <div class="col-lg-4 col-md-4 col-sm-5">
        <div class="input-group">
          {!! Form::select('temp_category')
          -> placeholder(trans('product::product.placeholder.category'))
          -> addGroupClass('form-group-sm')
          -> addClass('js-select2')
          -> style('width:250px;')
          -> raw()!!}
        </div>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3">
          <button type="button" class="btn btn-primary btn-sm" id="btn-add-contact"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add</button>
      </div>                
      <div class="col-lg-4 col-md-4 col-sm-3">
          <p style="color:red;"><sup>*</sup> Add minimum one category to list</p>
      </div>
    </div>
 
  <div style="margin-top:50px;">
    <table id="activity-activity-list" class="table table-striped  data-table">
        <thead  class="list_head">
          <tr>
              <th>Name</th>
              <th>&nbsp;</th>       
          </tr>
        </thead>
        <tbody id="list-contacts">
            <?php $count = 0; ?>
            @forelse($product->categories as $key => $val)
            <?php $count = ($key > $count)? $key: $count; ?>
            <tr id="{!! @$val->getRouteKey() !!}" class="activity-edit">
                  <td><input type="hidden" name="category[{{$key}}]" class="check_exist" value="{!! @$val->id !!}">{!! @$val->name !!}</td>
                  <td><div class="form-actions pull-right"><a class="btn-contact-remove text-danger"><i class="fa fa-trash"></i></a></div></td>
            </tr>
            @empty
            @endif
            <input type="hidden" name="ccount" value="{{$count}}">
        </tbody>
    </table>
  </div> 
  </div>

  <script type="text/javascript">
  $(".js-select2").select2({ 
        ajax: {
          url: "{{ trans_url('public/category/category/select2') }}",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {

        params.page = params.page || 1;
        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      },
      cache: true
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work    
    minimumInputLength: 1,
    templateResult: formatRepo, // omitted for brevity, see the source of this page
    templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
  });

  function formatRepo (repo) {
    if (repo.loading) return repo.name;
    var markup = "<div class='select2-result-repository clearfix'>" +
    "<div class='select2-result'><span>"+ repo.path_name+ "</span></div>";
    return markup;
  }

  function formatRepoSelection (repo) {
    return repo.name;
  }



  $(document).on('click','.btn-contact-remove', function(){
    $(this).parent().parent().parent().remove();            
  });

  $('#btn-add-contact').click(function(){
      var flag = 0;
      var count = parseInt($("input[name='ccount']").val())+1;
      var obj = $("#temp_category").select2("data");
      if(obj[0].id == null || obj[0].id == '') {
          toastr.error('Please select a category.', 'Error');
          return false;
      }
      $(".check_exist").each(function( key, value ) {
        if($(this).val() == obj[0].id) {
            flag = 1; return false;
        }
      });
      if(flag == 1) {
            toastr.error('This category already added.', 'Error');
            return false;
      }
      console.log(obj[0]);

      var id    = obj[0].id;
      var name  = obj[0].name;
     
      
      
      $('#list-contacts').prepend('<tr id="row-'+count+'"><td><input type="hidden" class="check_exist" name="category['+count+']" value="'+id+'"><span style="text-transform:capitalize;"> <b>'+name+'</b> </span></td><td><div class="form-actions pull-right"><a class="btn-contact-remove text-danger"><i class="fa fa-trash"></i></a></div></td></tr>');

     $("input[name='ccount']").val(count);        
  });


 
</script>