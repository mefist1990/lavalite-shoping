<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-dark  header-title m-t-0"> {!! $contact['name'] !!} </h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ trans_url('contacts') }}" class="btn btn-default pull-right"> app.back</a>
                    </div>
                </div>
                <hr/>

                <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="name">
                    {!! trans('contact::contact.label.name') !!}
                </label><br />
                    {!! $contact['name'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="phone">
                    {!! trans('contact::contact.label.phone') !!}
                </label><br />
                    {!! $contact['phone'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="mobile">
                    {!! trans('contact::contact.label.mobile') !!}
                </label><br />
                    {!! $contact['mobile'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="email">
                    {!! trans('contact::contact.label.email') !!}
                </label><br />
                    {!! $contact['email'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="default">
                    {!! trans('contact::contact.label.default') !!}
                </label><br />
                    {!! $contact['default'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="website">
                    {!! trans('contact::contact.label.website') !!}
                </label><br />
                    {!! $contact['website'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="details">
                    {!! trans('contact::contact.label.details') !!}
                </label><br />
                    {!! $contact['details'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="address_line1">
                    {!! trans('contact::contact.label.address_line1') !!}
                </label><br />
                    {!! $contact['address_line1'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="address_line2">
                    {!! trans('contact::contact.label.address_line2') !!}
                </label><br />
                    {!! $contact['address_line2'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="street">
                    {!! trans('contact::contact.label.street') !!}
                </label><br />
                    {!! $contact['street'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="city">
                    {!! trans('contact::contact.label.city') !!}
                </label><br />
                    {!! $contact['city'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="country">
                    {!! trans('contact::contact.label.country') !!}
                </label><br />
                    {!! $contact['country'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="pin_code">
                    {!! trans('contact::contact.label.pin_code') !!}
                </label><br />
                    {!! $contact['pin_code'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="lat">
                    {!! trans('contact::contact.label.lat') !!}
                </label><br />
                    {!! $contact['lat'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="lng">
                    {!! trans('contact::contact.label.lng') !!}
                </label><br />
                    {!! $contact['lng'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="status">
                    {!! trans('contact::contact.label.status') !!}
                </label><br />
                    {!! $contact['status'] !!}
            </div>
        </div>
    </div>
            </div>  
        </div>  
        <div class="col-md-4">
            @include('contact::public.contact.aside')
        </div>

    </div>
</div>