@forelse($cart as $key => $val)
<div class="cart-gadget-box">
    <p>{!!@$val->name!!}</p>
    <p class="text-muted"><small><i class="ion ion-android-person"></i> {!!@$val->user->name!!} at {!! format_date($val->created_at)!!}</small></p>
</div>
@empty
<div class="cart-gadget-box">
    <p>No Cart</p>
</div>
@endif