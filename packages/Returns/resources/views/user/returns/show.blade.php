<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header with-sub" data-background-color="red">
                        <div class="row">
                            <div class="col-sm-11 title-main">
                                <i class="pe-7s-display2"></i>
                                <h4 class="title">Return Information</h4>
                            </div>
                            <div class="col-sm-1">
                                <a href="{{trans_url(get_guard('url').'/returns/returns')}}" rel="tooltip" class="btn btn-white btn-round btn-simple btn-icon pull-right add-new" data-original-title="" title="">
                                        <i class="fa fa-chevron-left"></i>
                                </a>
                            </div>
                            
                        </div>
                    </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-md-12">
                        <h4 class="text-bold  header-title m-t-0" style="font-weight:500;">Return Information <span class="pull-right">Return Status : {{ @$returns->status }}</span></h4>
                    </div>

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

                    <div class="col-md-6">
                        <h4 class="text-bold  header-title m-t-0" style="font-weight:500;">Product Information</h4>
                    </div>

                    <table class="table table-bordered" >
                            <tr>                        
                                <th width="40%">Product Name</th>
                                <th width="30%">Model</th>
                                <th>Quantity</th>
                            </tr>
                            <tr>
                                <td>{{ @$returns->product }}</td>
                                <td>{{ @$returns->model }}</td>
                                <td>{{ @$returns->quantity }}</td>                        
                            </tr> 
                    </table>

                    <div class="col-md-6">
                        <h4 class="text-bold  header-title m-t-0" style="font-weight:500;">Reason for Return</h4>
                    </div>

                    <table class="table table-bordered" >
                            <tr>                        
                                <th width="40%">Reason</th>
                                <th width="30%">Opened</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>{{ @$returns->reasons->name }}</td>
                                <td>{{ @$returns->opened }}</td>
                                <td>{{ @$returns->return_action }}</td>                        
                            </tr> 
                    </table>


                   
                </div>
                    <div class="footer">
                        <a href="{{ trans_url(get_guard('url').'/returns/returns') }}" class="btn-danger btn-raised btn btn-sm">Back</a>
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