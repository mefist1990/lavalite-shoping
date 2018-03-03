@forelse($return_reason as $key => $val)
<div class="return_reason-gadget-box">
    <p>{!!@$val->name!!}</p>
    <p class="text-muted"><small><i class="ion ion-android-person"></i> {!!@$val->user->name!!} at {!! format_date($val->created_at)!!}</small></p>
</div>
@empty
<div class="return_reason-gadget-box">
    <p>No ReturnReason</p>
</div>
@endif