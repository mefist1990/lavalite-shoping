<table id="activity-activity-list" class="table table-striped  data-table">
    <thead  class="list_head">
      <tr>
          <th>Date Added</th>
          <th>Status</th>
          <th>Comment</th>      
                    
      </tr>
    </thead>
    <tbody>
  @forelse($order_history as $key => $val)
  <tr id="{!! @$val->getRouteKey() !!}" class="workorder-edit">
        <td>{!! @format_date($val->created_at) !!}</td>
        <td>{!! @$val->status->name !!}</td>
        <td>{!! @$val->comment!!}</td>
       
        
  </tr>
  @empty
  <tr>
        <td colspan="7">No History</td>  
  </tr> 
  @endif
        
    </tbody>
</table>





<style type="text/css">
.header{
        background: #dd4b39;
        color: white;
    }
</style>