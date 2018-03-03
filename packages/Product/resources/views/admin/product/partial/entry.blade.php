<div class="tab-pane active" id="details">
       <div class="tab-pan-title">  @if(empty($product->id)) {{ trans('app.new') }}  [{!! trans('product::product.name') !!}] @else {!! trans('product::product.name') !!} [{!!$product->name!!}] @endif </div> 
                <div class='col-md-4 col-sm-6'>
                     {!! Form::text('name')
                     -> required()
                     -> label(trans('product::product.label.name'))
                     -> placeholder(trans('product::product.placeholder.name'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                   {!! Form::text('meta_title')
                   -> label(trans('product::product.label.meta_title'))
                   -> placeholder(trans('product::product.placeholder.meta_title'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::textarea ('description')
                    -> label(trans('product::product.label.description'))
                    -> placeholder(trans('product::product.placeholder.description'))!!}
                </div>                

                <div class='col-md-4 col-sm-6'>
                    {!! Form::textarea ('meta_description')
                    -> label(trans('product::product.label.meta_description'))
                    -> placeholder(trans('product::product.placeholder.meta_description'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::textarea ('meta_keyword')
                    -> label(trans('product::product.label.meta_keyword'))
                    -> placeholder(trans('product::product.placeholder.meta_keyword'))!!}
                </div>
                <div class='col-md-4 col-sm-6'>
                        {!!Form::hidden('featured')->forcevalue('0')!!}
                         {!! Form::checkbox('featured')->style('margin-left:15px')->inline()->removeclass('checkbox')
                         ->forcevalue('1')
                         -> label(trans('product::product.label.featured'))
                         !!}
                  </div>
                  <div class='col-md-4 col-sm-6'>
                        {!!Form::hidden('premium')->forcevalue('0')!!}
                         {!! Form::checkbox('premium')->style('margin-left:15px')->inline()->removeclass('checkbox')
                         ->forcevalue('1')
                         -> label(trans('product::product.label.premium'))
                         !!}
                  </div>

                
           
</div>

<div class="tab-pane" id="info">
    <div class="row">
        <div class='col-md-4 col-sm-6'>
                       {!! Form::text('model')
                       ->required()
                       -> label(trans('product::product.label.model'))
                       -> placeholder(trans('product::product.placeholder.model'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::number('price')
                       ->required()
                       -> label(trans('product::product.label.price'))
                       -> placeholder(trans('product::product.placeholder.price'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::number('quantity')
                       ->required()
                       -> min(0)
                       -> label(trans('product::product.label.quantity'))
                       -> placeholder(trans('product::product.placeholder.quantity'))!!}
                </div>  

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('sku')
                       -> label(trans('product::product.label.sku'))
                       -> placeholder(trans('product::product.placeholder.sku'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('upc')
                       -> label(trans('product::product.label.upc'))
                       -> placeholder(trans('product::product.placeholder.upc'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('ean')
                       -> label(trans('product::product.label.ean'))
                       -> placeholder(trans('product::product.placeholder.ean'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('jan')
                       -> label(trans('product::product.label.jan'))
                       -> placeholder(trans('product::product.placeholder.jan'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('isbn')
                       -> label(trans('product::product.label.isbn'))
                       -> placeholder(trans('product::product.placeholder.isbn'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('mpn')
                       -> label(trans('product::product.label.mpn'))
                       -> placeholder(trans('product::product.placeholder.mpn'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('status')
                    ->required()
                    -> options(trans('product::product.options.status'))
                    -> label(trans('product::product.label.status'))
                    -> placeholder(trans('product::product.placeholder.status'))!!}
               </div>

               <!--  <div class='col-md-4 col-sm-6'>
                       {!! Form::text('download')
                       -> label(trans('product::product.label.download'))
                       -> placeholder(trans('product::product.placeholder.download'))!!}
                </div> -->

               <!--  <div class='col-md-4 col-sm-6'>
                    {!! Form::text('related_products')
                    -> label(trans('product::product.label.related_products'))
                    -> placeholder(trans('product::product.placeholder.related_products'))!!}
               </div>   --> 
                              

               <!--  <div class='col-md-4 col-sm-6'>
                       {!! Form::text('return_policy')
                       -> label(trans('product::product.label.return_policy'))
                       -> placeholder(trans('product::product.placeholder.return_policy'))!!}
                </div>                

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('tags')
                       -> label(trans('product::product.label.tags'))
                       -> placeholder(trans('product::product.placeholder.tags'))!!}
                </div> -->
              
                

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('location')
                       -> label(trans('product::product.label.location'))
                       -> placeholder(trans('product::product.placeholder.location'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('tax_class')
                   -> options(trans('product::product.options.tax_class'))
                    -> label(trans('product::product.label.tax_class'))
                    -> placeholder(trans('product::product.placeholder.tax_class'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('substract_stock')
                    -> options(trans('product::product.options.substract_stock'))
                    -> label(trans('product::product.label.substract_stock'))
                    -> placeholder(trans('product::product.placeholder.substract_stock'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('outofstock_status')
                    ->required()
                    -> options(trans('product::product.options.outofstock_status'))
                    -> label(trans('product::product.label.outofstock_status'))
                    -> placeholder(trans('product::product.placeholder.outofstock_status'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('seo_keyword')
                       -> label(trans('product::product.label.seo_keyword'))
                       -> placeholder(trans('product::product.placeholder.seo_keyword'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::number('order')
                       -> min(0)
                       -> label(trans('product::product.label.order'))
                       -> placeholder(trans('product::product.placeholder.order'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('dimensions')
                       -> label(trans('product::product.label.dimensions'))
                       -> placeholder(trans('product::product.placeholder.dimensions'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('weight_class')
                    -> options(trans('product::product.options.weight_class'))
                    -> label(trans('product::product.label.weight_class'))
                    -> placeholder(trans('product::product.placeholder.weight_class'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('length_class')
                    -> options(trans('product::product.options.length_class'))
                    -> label(trans('product::product.label.length_class'))
                    -> placeholder(trans('product::product.placeholder.length_class'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::date('date_available')
                       -> label(trans('product::product.label.date_available'))
                       -> placeholder(trans('product::product.placeholder.date_available'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('manufacturer')
                       -> label(trans('product::product.label.manufacturer'))
                       -> placeholder(trans('product::product.placeholder.manufacturer'))!!}
                </div>

                

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('discounts')
                    -> options(array())
                    -> label(trans('product::product.label.discounts'))
                    -> placeholder(trans('product::product.placeholder.discounts'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('special')
                       -> label(trans('product::product.label.special'))
                       -> placeholder(trans('product::product.placeholder.special'))!!}
                </div>

                
     </div>
</div>

<div class="tab-pane" id="links">
    <div class='col-md-6 col-lg-6'>
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
              <th>List of selected categories</th>
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

</div>



<div class="tab-pane" id="tab-attribute">
 
   
 <div class='row'>
 <div class='col-md-2 col-lg-2'>
    <label for="agency_fee" class="control-label col-lg-3 col-md-3 col-sm-3" style="padding-left: 20px;"> 
      Group
      </label>
    <div class="col-lg-9 col-md-9 col-sm-9">
    {!! Form::select('group_id')
    -> options(Attribute::groups())
    -> label(trans('product::product.label.attributes'))
    -> placeholder(trans('product::product.placeholder.attributes'))->raw()!!}
    </div>
</div> 

     
   <div class='col-md-4 col-lg-4'>
      <label for="agency_fee" class="control-label col-lg-3 col-md-3 col-sm-3" style="padding-left: 20px;"> 
       Attribute
      </label>
      <div class="col-lg-7 col-md-7 col-sm-7">
          {!! Form::select('temp_attribute')
          -> placeholder(trans('product::product.placeholder.category'))
          -> addGroupClass('form-group-sm')
          -> addClass('js-selectt2')
          -> style('width:250px;')
          -> raw()!!}
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2">
          <button type="button" class="btn btn-primary btn-sm" id="btn-add-product"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add</button>
      </div>                
     
   </div> 
  </div>  
  <br>
  <div class='row ' >

  <div class='col-md-6 col-lg-6'>
  
  
  
    <table id="attribute-attribute-list" class="table table-striped  data-table">
        <thead  class="list_head">
          <tr>
              <th>Attribute</th>
              <th>Group</th>
              <th>&nbsp;</th>       
          </tr>
        </thead>
        <tbody id="list-attributes">
            <?php $counts = 0; ?>
            @forelse(@$product->attributes as $key => $val)
            <?php $counts = ($key > $counts)? $key: $counts; ?>
            <tr id="{!! @$val->getRouteKey() !!}" class="product-edit">

                  <td><input type="hidden" name="attribute[{{$key}}]" class="check_exist" value="{!! @$val->id !!}">{!! @$val->name!!}</td>
                 <td>{{$val->group->name}}</td>
                  <td><div class="form-actions pull-right"><a class="btn-product-remove text-danger"><i class="fa fa-trash"></i></a></div></td>
            </tr>
            @empty
            @endif
            <input type="hidden" name="cccount" value="{{$counts}}">
        </tbody>
    </table>
  
  </div>
 </div>
</div>

<script type="text/javascript">
  $(".js-select2").select2({ 
        ajax: {
          url: "{{ trans_url('admin/category/category/select2') }}",
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

  function formatRepo (repo) {console.log(repo);
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


$("#group_id").change(function() {
  var group=$("#group_id option:selected").val();
  $(".js-selectt2").select2({ 
        ajax: {
          url: "{{ trans_url('admin/attribute/attribute/select2') }}",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            return {
          id:group,
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

  });

  function formatRepo (repo) {
    if (repo.loading) return repo.name;
    var markup = "<div class='select2-result-repository clearfix'>" +
    "<div class='select2-result'><span>"+ repo.name+ "</span></div>";
    return markup;
  }

  function formatRepoSelection (repo) {
    return repo.name;
  }

  $(document).on('click','.btn-product-remove', function(){
    $(this).parent().parent().parent().remove();            
  });

  $('#btn-add-product').click(function(){
      var flag = 0;
      var count = parseInt($("input[name='cccount']").val())+1;
      var obj = $("#temp_attribute").select2("data");
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
      var group=$("#group_id option:selected").text();
      
      
      $('#list-attributes').prepend('<tr id="row-'+count+'"><td><input type="hidden" class="check_exist" name="attribute['+count+']" value="'+id+'"><span style="text-transform:capitalize;"> <b>'+name+'</b> </span></td><td>'+group+'</td><td><div class="form-actions pull-right"><a class="btn-contact-remove text-danger"><i class="fa fa-trash"></i></a></div></td></tr>');

     $("input[name='cccount']").val(count);        
  });


 
</script>