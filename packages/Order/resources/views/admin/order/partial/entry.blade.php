<div class="tab-pane active" id="details">
    <div class="tab-pan-title">  @if(empty($order->id)) {{ trans('app.new') }}  [{!! trans('order::order.name') !!}] @else {!! trans('order::order.name') !!} [OD-{!!$order->id!!}] @endif </div>
    <div class='row'>
        <div class="col-sm-12 col-md-12">
            <h4 class="text-dark  header-title m-t-10">Order Details</h4>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <table class="table table-bordered table-hover">
                
                    <tr>
                        <th>Store</th>
                        <td>{{ @$order->store_id }}</td> 
                        <th>Date Added</th>
                        <td>{{ format_date(@$order->created_at) }}</td>                       
                    </tr>
                    
                    <tr>
                        <th>Payment Method</th>
                        <td>{{ @$order->payment_method }}</td>
                        <th>Shipping Method</th>                        
                        <td>{{ @$order->shipping_method }}</td>
                    </tr>
                    
            </table>
          </div>
        <?php 
        $payment =  explode(',',$order->payment_address);
        $shipping =  explode(',',$order->shipping_address);
        ?> 
      <div class="col-sm-12 col-md-12">
            <h4 class="text-dark  header-title m-t-10">Customer Details</h4>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div  style="height:180px; overflow:auto;" >
                <table class="table table-striped  data-table">
                    <thead  class="list_head">
                        <tr>
                            <th>Payment Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                               @foreach ($payment as $items)
                                    {{$items}}<br>
                               @endforeach
                            </td>
                        
                        </tr>
                    </tbody>
                </table>
            </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div  style="height:180px; overflow:auto;" >
                <table class="table table-striped  data-table">
                    <thead  class="list_head">
                        <tr>
                            <th>Shipping Address</th>                        
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            
                            <td>                            
                            @foreach ($shipping as $item)
                                {{$item}}<br> 
                             @endforeach                              
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-sm-12 col-md-12">
            <h4 class="text-dark  header-title m-t-10">Product Details</h4>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table class="table table-striped  data-table" >
                <thead  class="list_head">
                    <tr>
                        <th>Product Name</th>
                        <th>Model</th> 
                        <th class="text-right">Quantity</th>
                        <th class="text-right">Price</th> 
                        <th class="text-right">Total</th>  
                    </tr>
                </thead>
                <tbody> 
                  @forelse(@$order->products as $key => $val) 
                    <tr>
                        <th>{!!$val->name!!}</th>
                        <td>{!!$val->model!!}</td>
                        <td class="text-right">{!!$val->pivot->quantity!!}</td>
                        <td class="text-right">${!!number_format($val->price,2)!!} USD</td>                        
                        <td class="text-right">${!!number_format($val->pivot->quantity*$val->price,2)!!} USD</td>
                    </tr>
                    @empty
                    @endif
                    <tr>
                        <th class="text-right" colspan="4">Subtotal</th>
                        <td class="text-right">${!!$order->subtotal!!} USD</td>
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
                        
                    </tr>
                    @endif
                    <tr>
                       <th class="text-right" colspan="4">Total</th>
                        <td class="text-right">${!!$order->total!!} USD</td> 
                    </tr>
                </tbody>
            </table>
        </div>

        
        
    </div>
</div>


<div class="tab-pane" id="ordhistory">
    <div class="row">

    </div>
</div>