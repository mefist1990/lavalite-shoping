@forelse($newsletter as $key => $val)
<div class="newsletter-gadget-box">
    <p>{!!@$val->name!!}</p>
    <p class="text-muted"><small><i class="ion ion-android-person"></i> {!!@$val->user->name!!} at {!! format_date($val->created_at)!!}</small></p>
</div>
@empty
<div class="newsletter-gadget-box">
    <p>No Newsletter</p>
</div>
@endif