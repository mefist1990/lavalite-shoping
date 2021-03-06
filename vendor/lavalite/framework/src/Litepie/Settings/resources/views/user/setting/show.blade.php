@include('public::notifications')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4 class="text-dark  header-title m-t-0"> Details of {!! $setting['name'] !!} </h4>
        </div>
        <div class="col-md-6">
            <div class='pull-right'>
                <a href="{{ trans_url('/user/settings/setting') }}" class="btn btn-default"> {{ trans('app.back')  }}</a>
                <a href="{{ trans_url('/user/settings/setting') }}/{{ setting->getRouteKey() }}/edit" class="btn btn-success"> {{ trans('app.edit')  }}</a>
                <a href="{{ trans_url('/user/settings/setting') }}/{{ setting->getRouteKey() }}/copy" class="btn btn-warning"> {{ trans('app.copy')  }}</a>
                <a href="{{ trans_url('/user/settings/setting') }}/{{ setting->getRouteKey() }}/delete" class="btn btn-danger"> {{ trans('app.delete')  }}</a>
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
                <label for="skey">
                    {!! trans('settings::setting.label.skey') !!}
                </label><br />
                    {!! $setting['skey'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="name">
                    {!! trans('settings::setting.label.name') !!}
                </label><br />
                    {!! $setting['name'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="value">
                    {!! trans('settings::setting.label.value') !!}
                </label><br />
                    {!! $setting['value'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="type">
                    {!! trans('settings::setting.label.type') !!}
                </label><br />
                    {!! $setting['type'] !!}
            </div>
        </div>
    </div>
</div>