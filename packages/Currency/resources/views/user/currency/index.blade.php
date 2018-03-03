<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header with-sub" data-background-color="red">
                        <div class="row">
                            <div class="col-sm-8 title-main">
                                <i class="pe-7s-display2"></i>
                                <h4 class="title">{!! trans('currency::currency.title.user') !!}</h4>
                                <p class="sub-title">{!! trans('currency::currency.title.sub.user') !!}</p>
                            </div>
                            <div class="col-sm-4">
                                <div class="header-form">
                                    {!!Form::open()
                                   ->method('GET')
                                   ->class('form pn')
                                   ->action(trans_url(get_guard('url').'/currency/currency'))!!}
                                    <div class="form-group form-white mn">
                                      {!!Form::text('search')->type('text')->placeholder('Search')->raw()!!}
                                    </div>
                                    <button type="submit" class="btn btn-icon btn-round btn-white btn-raised search-btn"><i class="fa fa-search"></i></button>
                                    {!! Form::close()!!}
                                    <a href="{!!trans_url(get_guard('url').'/currency/currency/create')!!}" rel="tooltip" class="btn btn-white btn-round btn-simple btn-icon pull-right add-new" data-original-title="" title="">
                                        <i class="fa fa-plus-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content table-responsive table-full-width">
                        @include('public::notifications')
                        <table class="table table-bigboy">
                            <thead>
                                <tr>
                                    <th class="text-center">Image</th>
                                    <th>{!! trans('currency::currency.label.title')!!}</th>
                    <th>{!! trans('currency::currency.label.code')!!}</th>
                    <th>{!! trans('currency::currency.label.status')!!}</th>
                    <th>{!! trans('currency::currency.label.status')!!}</th>
                    <th>{!! trans('currency::currency.label.created_at')!!}</th>
                    <th>{!! trans('currency::currency.label.updated_at')!!}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($currencies as $currency)
                                <tr>
                                    <td>
                                        <div class="img-container">
                                            <a href="{{trans_url('currency')}}/{{$currency->getPublickey()}}">
                                              <img alt="" class="img-responsive" src="{!!url($currency->defaultImage('sm','images'))!!}">
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ $currency->title }}</td>
                    <td>{{ $currency->code }}</td>
                    <td>{{ $currency->status }}</td>
                                    <td class="td-actions">
                                        <a href="{{trans_url('currency')}}/{!!$currency->getRouteKey()!!}" rel="tooltip" data-toggle="tooltip" data-placement="top" title="View Currency" class="btn btn-info btn-simple">
                                            <i class="material-icons">panorama</i>
                                        </a>
                                        <a href="{!! trans_url(get_guard('url').'/currency/currency') !!}/{!! $currency->getRouteKey() !!}/edit" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit Currency" class="btn btn-success btn-simple">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a rel="tooltip" data-toggle="tooltip" data-placement="top" title="Remove Currency" class="btn btn-danger btn-simple" data-action="DELETE" data-href="{!! trans_url(get_guard('url').'/currency/currency') !!}/{!! $currency->getRouteKey() !!}" data-remove="{!! $currency->getRouteKey() !!}">
                                            <i class="material-icons">close</i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td><h4>No currencies found.</h4></td>
                                </tr>
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="footer">
                        {{$currencies->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>