@include('public::notifications')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4 class="text-dark  header-title m-t-0"> Details of {!! $attribute['name'] !!} </h4>
        </div>
        <div class="col-md-6">
            <div class='pull-right'>
                <a href="{{ trans_url('/user/attribute/attribute') }}" class="btn btn-default"> {{ trans('app.back')  }}</a>
                <a href="{{ trans_url('/user/attribute/attribute') }}/{{ attribute->getRouteKey() }}/edit" class="btn btn-success"> {{ trans('app.edit')  }}</a>
                <a href="{{ trans_url('/user/attribute/attribute') }}/{{ attribute->getRouteKey() }}/copy" class="btn btn-warning"> {{ trans('app.copy')  }}</a>
                <a href="{{ trans_url('/user/attribute/attribute') }}/{{ attribute->getRouteKey() }}/delete" class="btn btn-danger"> {{ trans('app.delete')  }}</a>
            </div>
        </div>
    </div>
    <p class="text-muted m-b-25 font-13">
        Your awesome text goes here.
    </p>
    <hr/>

    <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="group_id">
                    {!! trans('attribute::attribute.label.group_id') !!}
                </label><br />
                    {!! $attribute['group_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="name">
                    {!! trans('attribute::attribute.label.name') !!}
                </label><br />
                    {!! $attribute['name'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="order">
                    {!! trans('attribute::attribute.label.order') !!}
                </label><br />
                    {!! $attribute['order'] !!}
            </div>
        </div>
    </div>
</div>