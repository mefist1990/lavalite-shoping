<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header with-sub" data-background-color="red">
                        <div class="row">
                            <div class="col-sm-11 title-main">
                                <i class="pe-7s-display2"></i>
                                <h4 class="title">Order Information</h4>
                            </div>
                            <div class="col-sm-1">
                                <a href="{{trans_url(get_guard('url').'/order/order')}}" rel="tooltip" class="btn btn-white btn-round btn-simple btn-icon pull-right add-new" data-original-title="" title="">
                                        <i class="fa fa-chevron-left"></i>
                                </a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="col-md-12">
                        <h4 class="text-bold  header-title m-t-0" style="font-weight:500;">Order Information <span class="pull-right">Order Status : {{ @$order->status->name }}</span></h4>
                        </div>

                        <table class="table table-bordered table-hover">
                            
                                <tr>
                                    <th>Ref. No</th>
                                    <td>OR-{{ $order->id }}</td> 
                                    <th>Date Added</th>
                                    <td>{{ format_date($order->created_at) }}</td>                       
                                </tr>
                                
                                <tr>
                                    <th>Payment Method</th>
                                    <td>{{ $order->payment_method }}</td>
                                    <th>Shipping Method</th>                        
                                    <td>{{ $order->shipping_method }}</td>
                                </tr>
                                
                        </table>



                        <?php 
                        $payment =  explode(',',$order->payment_address);
                        $shipping =  explode(',',$order->shipping_address);
                        ?> 


                            <table class="table table-bordered" >
                                    <tr>
                                        <th>Payment Address</th>
                                        <th>Shipping Address</th>                        
                                    </tr>
                                    <tr>
                                        <td>
                                           @foreach ($payment as $item)
                                                {{$item}}<br>
                                           @endforeach
                                        </td>
                                        <td>                            
                                        @foreach ($shipping as $item)
                                            {{$item}}<br> 
                                         @endforeach                              
                                        </td>
                                    </tr>
                            </table>



                        <table class="table table-bordered" >
                                <tr>
                                    <th>Product Name</th>
                                    <th>Model</th> 
                                    <th class="text-right">Quantity</th>
                                    <th class="text-right">Price</th> 
                                    <th class="text-right">Total</th>  
                                    <th>&nbsp;</th>                    
                                </tr>
                              @forelse(@$order->products as $key => $val) 
                                <tr>
                                    <th>{!!$val->name!!}</th>
                                    <td>{!!$val->model!!}</td>
                                    <td class="text-right">{!!$val->pivot->quantity!!}</td>
                                    <td class="text-right">${!!@number_format($val->price,2)!!} USD</td>                        
                                    <td class="text-right">${!!@number_format($val->pivot->quantity*$val->price,2)!!} USD</td>
                                    <?php
                                        $order_id=$val->pivot->order_id;
                                    ?>
                                    <td class="td-actions">
                                        <a id="id-{!!$val->id!!}" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Return" class="btn btn-raised btn-danger btn-fab-mini return-order">
                                        <i class="fa fa-reply"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                @endif
                                <tr>
                                    <th colspan="4" class="text-right">Subtotal</th>
                                    <td class="text-right">${!!$order->subtotal!!} USD</td>
                                    <td></td>
                                </tr>
                                @if($order->coupon_id!=NULL)
                                <tr>
                                    @if($order->coupon->type=='Percentage')
                                    <th class="text-right"  colspan="4">Discount %</th>
                                    <td class="text-right">{!!@number_format($order->coupon->discount)!!}</td>
                                    @else
                                    <th class="text-right"  colspan="4">Discount</th>
                                    <td class="text-right">${!!@number_format($order->coupon->discount,2)!!} USD</td>
                                    @endif
                                    
                                    <td></td>
                                </tr>
                                @endif
                                <tr>
                                   <th colspan="4" class="text-right">Total</th>
                                    <td class="text-right">${!!$order->total!!} USD</td> 
                                    <td></td>
                                </tr>
                                
                                
                        </table>
                        
                    </div>
                    <div class="footer">
                        <a href="{{ trans_url(get_guard('url').'/order/order') }}" class="btn-danger btn-raised btn btn-sm">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style type="text/css">
    .table-bordered {
    border: 1px solid #ddd;
}
</style>

<script type="text/javascript">
    $(document).on("click", ".return-order", function(e) {
            var str = $(this).attr("id");
            var arr = str.split("-");
            var product_id = arr[1];
            var order_id = '{!!$order_id!!}';

             
                
                $.ajax( {
                    url: "{{url('client/returns/returns/check/order')}}",
                    type: 'GET',
                    data: {product_id:product_id,order_id:order_id},
                    success:function(data, textStatus, jqXHR)
                    { 
                        if (data > 0) {
                          toastr.error('This product is already returned.', 'Error');
                          return false;
                        }
                        else {
                            window.location.href = "{{url('client/returns/returns/add')}}/"+product_id+"/{{$order_id}}";
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                    }
                });
             

          });
</script>