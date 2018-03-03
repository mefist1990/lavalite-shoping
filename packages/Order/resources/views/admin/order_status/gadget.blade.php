@forelse($order_status as $key => $val)
<div class="order_status-gadget-box">
    <p>{!!@$val->name!!}</p>
    <p class="text-muted"><small><i class="ion ion-android-person"></i> {!!@$val->user->name!!} at {!! format_date($val->created_at)!!}</small></p>
</div>
@empty
<div class="order_status-gadget-box">
    <p>No OrderStatus</p>
</div>
@endif