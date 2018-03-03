<div class="tab-pane active" id="details">

<div class="tab-pan-title">  @if(empty($returns->id)) {{ trans('app.new') }}  [{!! trans('returns::returns.name') !!}] @else {!! trans('returns::returns.name') !!} [RE-{!!$returns->id!!}] @endif </div>
  <div class='row'>
    <div class="col-sm-12 col-md-12">
        <h4 class="text-dark  header-title m-t-10">Return Details</h4>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <table class="table table-bordered table-hover">
            
                <tr>
                    <th>Return ID</th>
                    <td>RE-{{ @$returns->id }}</td> 
                    <th>Return Date</th>
                    <td>{{ format_date(@$returns->created_at) }}</td>                       
                </tr>
                
                <tr>
                    <th>Order ID</th>
                    <td>OR-{{ @$returns->order_id }}</td>
                    <th>Order Date</th>                        
                    <td>{{ format_date(@$returns->orders->created_at) }}</td>
                </tr>
                
        </table>
    </div>

    <div class="col-sm-12 col-md-12">
        <h4 class="text-dark  header-title m-t-10">Product Information</h4>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <table class="table table-striped  data-table">
            <thead  class="list_head">
                <tr>                        
                    <th width="40%">Product Name</th>
                    <th width="30%">Model</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ @$returns->product }}</td>
                    <td>{{ @$returns->model }}</td>
                    <td>{{ @$returns->quantity }}</td>                        
                </tr> 
            </tbody>
        </table>
    </div>

    <div class="col-sm-12 col-md-12">
        <h4 class="text-dark  header-title m-t-10">Reason for Return</h4>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <table class="table table-striped  data-table">
            <thead  class="list_head">
                <tr>                        
                    <th width="40%">Reason</th>
                    <th width="30%">Opened</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ @$returns->reasons->name }}</td>
                    <td>{{ @$returns->opened }}</td>
                    <td>{{ @$returns->return_action }}</td>                         
                </tr> 
            </tbody>
        </table>
    </div>

    <!-- <div class='col-md-4 col-sm-6'>
           {!! Form::numeric('order_id')
           -> label(trans('returns::returns.label.order_id'))
           -> placeholder(trans('returns::returns.placeholder.order_id'))!!}
    </div>

    <div class='col-md-4 col-sm-6'>
        {!! Form::text('product')
        -> label(trans('returns::returns.label.product_id'))
        -> placeholder(trans('returns::returns.placeholder.product_id'))!!}
   </div>

    <div class='col-md-4 col-sm-6'>
        {!! Form::text('temp') 
        -> value($returns->client->name)
        -> label(trans('returns::returns.label.customer_id'))
        -> placeholder(trans('returns::returns.placeholder.customer_id'))!!}
   </div>

    <div class='col-md-4 col-sm-6'>
        {!! Form::select('return_reason_id')
        -> options(Returns::reasons())
        -> label(trans('returns::returns.label.return_reason_id'))
        -> placeholder(trans('returns::returns.placeholder.return_reason_id'))!!}
   </div>

    <div class='col-md-4 col-sm-6'>
           {!! Form::date('date_ordered')
           -> label(trans('returns::returns.label.date_ordered'))
           -> placeholder(trans('returns::returns.placeholder.date_ordered'))!!}
    </div>
    
    <div class='col-md-4 col-sm-6'>
        {!! Form::textarea ('comment')
        -> label(trans('returns::returns.label.comment'))
        -> placeholder(trans('returns::returns.placeholder.comment'))!!}
    </div> -->

    
    </div>
</div>