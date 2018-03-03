@forelse($order_history as $key => $val)
<div class="order_history-gadget-box">
    <p>{!!@$val->name!!}</p>
    <p class="text-muted"><small><i class="ion ion-android-person"></i> {!!@$val->user->name!!} at {!! format_date($val->created_at)!!}</small></p>
</div>
@empty
<div class="order_history-gadget-box">
    <p>No OrderHistory</p>
</div>
@endif