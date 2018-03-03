    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
            <!-- <li ><a href="#product" data-toggle="tab">Products</a></li> -->
            <!-- <li ><a href="#payment" data-toggle="tab">Payment Details</a></li>
            <li ><a href="#shipping" data-toggle="tab">Shipping Details</a></li> -->
            <!-- <li ><a href="#totals" data-toggle="tab">Totals</a></li> -->
            <li ><a href="#ordhistory"  data-toggle="tab">Order History</a></li>
            <div class="box-tools pull-right">
                @include('order::admin.order.partial.workflow')
                @if($order->id )
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" href="#popup-history" id="history"><i class="fa fa-plus-circle"></i> Add History</button>            
                @endif
                <!-- <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#order-order-entry' data-href='{{trans_url('admin/order/order/create')}}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }}</button> -->
                @if($order->id )
                <!-- <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#order-order-entry' data-href='{{ trans_url('/admin/order/order') }}/{{$order->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button> -->
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#order-order-entry' data-datatable='#order-order-list' data-href='{{ trans_url('/admin/order/order') }}/{{$order->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('order-order-show')
        ->method('POST')
        ->files('true')
        ->action(URL::to('admin/order/order'))!!}
            <div class="tab-content clearfix">
                <!-- <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('order::order.name') !!}  [{!! $order->name !!}] </div>
                <div class="tab-pane active" id="details"> -->
                    @include('order::admin.order.partial.entry')
                <!-- </div> -->
            </div>
        {!! Form::close() !!}
    </div>


    <div class="modal fade" id="popup-history" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Add History</h4>
            </div>
            <div class="modal-body">
            {!!Form::vertical_open()->id('history-form')!!}
                <div class="tab-content">
                    <div class="tab-pane active clearfix" style=" padding: 10px;">
                            {!!Form::hidden('order_id')->value($order->id)!!}

                            {!! Form::select('order_status_id')
                            -> options(Order::statuses())
                            -> label(trans('order::order_history.label.order_status_id'))
                            -> placeholder(trans('order::order_history.placeholder.order_status_id'))
                            -> required()!!}

                            {!!Form::hidden('notify')->forcevalue('0')!!}
                             {!! Form::checkbox('notify')->style('margin-left:15px')->inline()->removeclass('checkbox')
                             ->forcevalue('1')
                             -> label(trans('order::order_history.label.notify'))
                             !!}

                            {!! Form::textarea ('comment')
                            -> label(trans('order::order_history.label.comment'))
                            -> placeholder(trans('order::order_history.placeholder.comment'))
                            -> required()
                            -> rows(5)!!}                      

                    </div>
                </div>
            {!! Form::close() !!}
            </div>    
            <div class="modal-footer ">
              <a type="button" class="btn btn-danger pull-right btn-sm m-l-5" data-dismiss="modal"><i class="fa fa-times-circle"></i>&nbsp;&nbsp;Cancel</a>
              <button type="button" id="history-save" class="btn btn-primary btn-sm" id="btn-block"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add</button>
            </div>
        </div>          
      </div>
    </div>

<script type="text/javascript">
    $("#ordhistory").load("{{ trans_url('admin/order/order_history/list/') }}/{{Crypt::encrypt($order->id)}}");

    $(document).on("click", "#history-save", function(e) {

        var form = $('#history-form');


        if(form.valid() == false) 
        {
        toastr.error('Please enter valid information.', 'Error');
        return false;
        }

        var formData = new FormData();
        params   = form.serializeArray();

        $.each(params, function(i, val) {
            formData.append(val.name, val.value);
        });        

        $.ajax( {
            url: "{{URL::to('admin/order/order_history')}}",
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            dataType: 'json',
            success:function(data, textStatus, jqXHR)
            {
                $("#ordhistory").load("{{ trans_url('admin/order/order_history/list/') }}/{{Crypt::encrypt($order->id)}}");
                $('#popup-history').modal('hide');
                setTimeout(function(){
                  window.location.reload(1);
                  }, 1000);
            }
        });      
            
            
    });

        
</script>