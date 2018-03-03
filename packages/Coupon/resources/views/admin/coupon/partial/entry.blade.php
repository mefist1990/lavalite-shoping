<div class="tab-pane active" id="details">
       <div class="tab-pan-title">  @if(empty($coupon->id)) {{ trans('app.new') }}  [{!! trans('coupon::coupon.name') !!}] @else {!! trans('coupon::coupon.name') !!} [{!!$coupon->name!!}] @endif </div>  
            <div class='row'>
                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> label(trans('coupon::coupon.label.name'))
                       -> placeholder(trans('coupon::coupon.placeholder.name'))
                       -> required()!!}
                </div>
                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('code')
                       -> label(trans('coupon::coupon.label.code'))
                       -> placeholder(trans('coupon::coupon.placeholder.code'))
                       -> required()!!}
                </div>

                 <div class='col-md-4 col-sm-6'>
                       {!! Form::text('total')
                       -> label(trans('coupon::coupon.label.total'))
                       -> placeholder(trans('coupon::coupon.placeholder.total'))
                       -> required()!!}
                </div>


                

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('type')
                    -> options(trans('coupon::coupon.options.type'))
                    -> label(trans('coupon::coupon.label.type'))
                    -> placeholder(trans('coupon::coupon.placeholder.type'))
                    -> required()!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('discount')
                       -> label(trans('coupon::coupon.label.discount'))
                       -> placeholder(trans('coupon::coupon.placeholder.discount'))
                       -> required()!!}
                </div>

                <div class='col-md-4 col-sm-6' style="min-height: 69px;">
                <div class='col-md-12 col-sm-12' style="padding-left: 0px;">
                <label>Customer Login</label>
                </div>
                <div class='col-md-12 col-sm-12' style="padding-left: 0px;">
                   {!! Form::inline_radios('logged')
                   -> radios(trans('coupon::coupon.options.logged'))
                   -> label(trans('coupon::coupon.label.logged'))->raw()!!}
                   </div>
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('start_date')
                       -> label(trans('coupon::coupon.label.start_date'))
                       -> addClass('pickdate')
                       -> placeholder(trans('coupon::coupon.placeholder.start_date'))
                       -> required()!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('end_date')
                       -> label(trans('coupon::coupon.label.end_date'))
                       -> addClass('pickdate')
                       -> placeholder(trans('coupon::coupon.placeholder.end_date'))
                       -> required()!!}
                </div>
                <div class='col-md-4 col-sm-6' style="min-height: 69px;">
                <div class='col-md-12 col-sm-12' style="padding-left: 0px;">
                  <label>Free Shipping</label>
                </div>
                <div class='col-md-12 col-sm-12' style="padding-left: 0px;">
                   {!! Form::inline_radios('shipping')
                   -> radios(trans('coupon::coupon.options.shipping'))
                   -> label(trans('coupon::coupon.label.shipping'))->raw()!!}
                </div>
                </div>

                <div class='col-md-4 col-sm-6'>
                  <div class='col-md-12 col-sm-12' style="padding-left: 0px;">
                    <label> Uses Per Coupon</label>&nbsp;<i title="The maximum number of times the coupon can be used by any customer. Leave blank for unlimited" class="fa fa-question-circle" aria-hidden="true" style="color:#22A7F0"></i>
                  </div>
                  <div class='col-md-12 col-sm-12' style="padding-left: 0px;">
                      {!! Form::text('uses_total')
                      -> label(trans('coupon::coupon.label.uses_total'))
                      -> placeholder(trans('coupon::coupon.placeholder.uses_total'))->raw()!!}
                  </div>
                </div>

                <div class='col-md-4 col-sm-6'>
                  <div class='col-md-12 col-sm-12' style="padding-left: 0px;">
                    <label>Uses Per Customer</label>&nbsp;<i title="The maximum number of times the coupon can be used by a single customer. Leave blank for unlimited" class="fa fa-question-circle" aria-hidden="true" style="color:#22A7F0"></i>
                  </div>
                  <div class='col-md-12 col-sm-12' style="padding-left: 0px;">
                       {!! Form::text('uses_customer')
                       -> label(trans('coupon::coupon.label.uses_customer'))
                       -> placeholder(trans('coupon::coupon.placeholder.uses_customer'))->raw()!!}
                  </div>
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::select('status')
                       -> options(trans('coupon::coupon.options.status'))
                       -> label(trans('coupon::coupon.label.status'))
                       -> placeholder(trans('coupon::coupon.placeholder.status'))!!}
                </div>

                <div class='col-md-8 col-sm-8'>
                    {!! Form::textarea ('description')
                    ->rows(8)
                    -> label(trans('coupon::coupon.label.description'))
                    -> placeholder(trans('coupon::coupon.placeholder.description'))!!}
                </div>
            </div>
</div>

<div class="tab-pane" id="links">
    <div class='col-md-6 col-lg-6'>
    <div class="form-group form-group-sm">
      <label for="agency_fee" class="control-label col-lg-2 col-md-2 col-sm-4" style="padding-left: 20px;"> 
       Category
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
     <!--  <div class="col-lg-4 col-md-4 col-sm-3">
          <p style="color:red;"><sup>*</sup> Add minimum one category to list</p>
      </div> -->
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
            @forelse($coupon->categories as $key => $val)
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



   <div class='col-md-6 col-lg-6'>
    <div class="form-group form-group-sm">
      <label for="agency_fee" class="control-label col-lg-2 col-md-2 col-sm-4" style="padding-left: 20px;"> 
       Product
      </label>
      <div class="col-lg-4 col-md-4 col-sm-5">
        <div class="input-group">
          {!! Form::select('temp_product')
          -> placeholder(trans('product::product.placeholder.category'))
          -> addGroupClass('form-group-sm')
          -> addClass('js-selectt2')
          -> style('width:250px;')
          -> raw()!!}
        </div>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-3">
          <button type="button" class="btn btn-primary btn-sm" id="btn-add-product"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add</button>
      </div>                
     <!--  <div class="col-lg-4 col-md-4 col-sm-3">
          <p style="color:red;"><sup>*</sup> Add minimum one category to list</p>
      </div> -->
    </div>
    <div style="margin-top:50px;">
    <table id="product-product-list" class="table table-striped  data-table">
        <thead  class="list_head">
          <tr>
              <th>List of selected products</th>
              <th>&nbsp;</th>       
          </tr>
        </thead>
        <tbody id="list-products">
            <?php $counts = 0; ?>
            @forelse($coupon->products as $key => $val)
            <?php $count = ($key > $count)? $key: $count; ?>
            <tr id="{!! @$val->getRouteKey() !!}" class="product-edit">
                  <td><input type="hidden" name="product[{{$key}}]" class="check_exist" value="{!! @$val->id !!}">{!! @$val->name !!}</td>
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



  $(".js-selectt2").select2({ 
        ajax: {
          url: "{{ trans_url('admin/product/product/select2') }}",
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
      var obj = $("#temp_product").select2("data");
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
     
      
      
      $('#list-products').prepend('<tr id="row-'+count+'"><td><input type="hidden" class="check_exist" name="product['+count+']" value="'+id+'"><span style="text-transform:capitalize;"> <b>'+name+'</b> </span></td><td><div class="form-actions pull-right"><a class="btn-contact-remove text-danger"><i class="fa fa-trash"></i></a></div></td></tr>');

     $("input[name='cccount']").val(count);        
  });



  $('#code').change( function(){
      var form = $('#coupon-coupon-create');

      if($("#code").val() != '') {
          var formData = new Array();
          formData.push($("#code").val());
          $.ajax( {
              url: "{{url('admin/coupon/coupon/check/code')}}",
              type: 'GET',
              data: {formData},
              success:function(data, textStatus, jqXHR)
              { 
                  if (data > 0) {
                    $("#code").val('');
                    $("#code").css('border','1px solid red');
                    toastr.error('This code already exist.', 'Error');
                    return false;
                  }
              },
              error: function(jqXHR, textStatus, errorThrown)
              {
              }
          });
      }

    });

</script>