@forelse($attribute_group as $key => $val)
<div class="attribute_group-gadget-box">
    <p>{!!@$val->name!!}</p>
    <p class="text-muted"><small><i class="ion ion-android-person"></i> {!!@$val->user->name!!} at {!! format_date($val->created_at)!!}</small></p>
</div>
@empty
<div class="attribute_group-gadget-box">
    <p>No AttributeGroup</p>
</div>
@endif