<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header with-sub" data-background-color="red">
                        <div class="row">
                            <div class="col-sm-11 title-main">
                                <i class="pe-7s-display2"></i>
                                <h4 class="title">Return Product</h4>
                            </div>
                            <div class="col-sm-1">
                                <a href="{{trans_url(get_guard('url').'/order/order')}}" rel="tooltip" class="btn btn-white btn-round btn-simple btn-icon pull-right add-new" data-original-title="" title="">
                                        <i class="fa fa-chevron-left"></i>
                                </a>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h4 class="text-bold  header-title m-t-0" style="font-weight:500;">Order Information</h4>
                    </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        
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

                        <div class="col-md-6">
                            <h4 class="text-bold  header-title m-t-0" style="font-weight:500;">Product Information</h4>
                        </div>

                            <table class="table table-bordered table-hover">
                            
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>                      
                                </tr>
                                
                                @forelse(@$order->products as $key => $val) 
                                <tr>
                                <?php if($val->pivot->product_id==$product_id)
                                {
                                    $product_name=$val->name;
                                    $model=$val->model;
                                    $qty=$val->pivot->quantity;
                                    echo "<td>PR-".$val->pivot->product_id."</td>";
                                    echo "<td>".$val->name."</td>";
                                    echo "<td>".$val->pivot->quantity."</td>";
                                }
                                ?>
                                </tr>
                                @empty
                                @endif
                                
                        </table>
                        {!!Form::vertical_open()
                        ->id('create-returns-returns')
                        ->method('POST')
                        ->files('true')
                        ->class('dashboard-form')
                        ->action(trans_url(get_guard('url').'/returns/returns'))!!}

                        <div class="col-md-6">
                            <h4 class="text-bold  header-title m-t-0" style="font-weight:500;">Return Details</h4>
                        </div>
                        <table class="table table-stripped ">
                                <tr>
                                    <th class="text-right" width="30%">Product</th>
                                    <td>
                                       {!! Form::text('product')
                                        -> addGroupClass('label-floating')
                                        -> readonly()
                                        -> value($product_name)->raw()!!}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-right" width="30%">Model</th>
                                    <td>
                                       {!! Form::text('model')
                                        -> addGroupClass('label-floating')
                                        -> readonly()
                                        -> value($model)->raw()!!}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-right" width="30%">Quantity</th>
                                    <td>
                                       {!! Form::text('quantity')
                                        -> addGroupClass('label-floating')
                                        -> readonly()
                                        -> value($qty)->raw()!!}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-right" width="30%">Reason for Return</th>
                                    <td>
                                       {!! Form::select('return_reason_id')
                                        -> addGroupClass('label-floating')
                                        -> options(Returns::reasons())
                                        -> placeholder(trans('returns::returns.placeholder.return_reason_id'))->raw()!!}
                                    </td>
                                </tr>
                                <tr>
                                    
                                    <th class="text-right" width="30%">Opened</th>
                                    <td>
                                       {!! Form::inline_radios('opened')
                                       -> addGroupClass('label-floating')
                                       -> radios(trans('returns::returns.options.opened'))->raw()!!}
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <th class="text-right" width="30%">Comment</th>
                                    <td>
                                       {!! Form::textarea('comment')
                                       -> id('return-comment')
                                       -> addGroupClass('label-floating')
                                       -> raw()!!}
                                    </td>                       
                                </tr>

                                {!!Form::hidden('product_id')->value($product_id)!!}
                                {!!Form::hidden('order_id')->value($order->id)!!}
                                {!!Form::hidden('user_id')->value($order->user_id)!!}
                                {!!Form::hidden('date_ordered')->value($order->created_at)!!}

                            
                        </table>

                             
                            
                        </div>        
                                <div class="footer">      
                                        <button class="btn-primary btn-raised btn btn-sm">Confirm</button>
                                         <a href="{{ trans_url(get_guard('url').'/order/order') }}" class="btn-danger btn-raised btn btn-sm">Cancel</a>
                                    
                                </div>
                    {!! Form::close() !!}  
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