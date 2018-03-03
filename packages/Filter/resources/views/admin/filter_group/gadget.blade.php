@forelse($filter_group as $key => $val)
<div class="filter_group-gadget-box">
    <p>{!!@$val->name!!}</p>
    <p class="text-muted"><small><i class="ion ion-android-person"></i> {!!@$val->user->name!!} at {!! format_date($val->created_at)!!}</small></p>
</div>
@empty
<div class="filter_group-gadget-box">
    <p>No FilterGroup</p>
</div>
@endif