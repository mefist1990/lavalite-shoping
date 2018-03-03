<table class="table table-bigboy">
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Status</th>
            <th>Total</th>
            <th>Date Added</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($order as $key => $val)
        <tr>
            <td>OR-{{ $val->id}}</td>
            <td>{{@$val->client->name}}</td>
            <td>{{ @$val->status->name }}</td>
            <td>{{ $val->total }}</td>
            <td>{{ format_date($val->created_at) }}</td>
            <td class="td-actions">
                <a href="{{trans_url('admin/order/order?id=')}}{!!$val->getRouteKey()!!}" rel="tooltip" data-toggle="tooltip" data-placement="top" title="View Order" class="btn btn-info btn-sm">
                    <i class="fa fa-eye"></i>
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td><h4>No Orders.</h4></td>
        </tr>
        @endif
        
    </tbody>
</table>
