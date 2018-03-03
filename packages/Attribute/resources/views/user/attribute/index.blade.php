<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header with-sub" data-background-color="red">
                        <div class="row">
                            <div class="col-sm-8 title-main">
                                <i class="pe-7s-display2"></i>
                                <h4 class="title">{!! trans('attribute::attribute.title.user') !!}</h4>
                                <p class="sub-title">{!! trans('attribute::attribute.title.sub.user') !!}</p>
                            </div>
                            <div class="col-sm-4">
                                <div class="header-form">
                                    {!!Form::open()
                                   ->method('GET')
                                   ->class('form pn')
                                   ->action(trans_url(get_guard('url').'/attribute/attribute'))!!}
                                    <div class="form-group form-white mn">
                                      {!!Form::text('search')->type('text')->placeholder('Search')->raw()!!}
                                    </div>
                                    <button type="submit" class="btn btn-icon btn-round btn-white btn-raised search-btn"><i class="fa fa-search"></i></button>
                                    {!! Form::close()!!}
                                    <a href="{!!trans_url(get_guard('url').'/attribute/attribute/create')!!}" rel="tooltip" class="btn btn-white btn-round btn-simple btn-icon pull-right add-new" data-original-title="" title="">
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
                                    <th>{!! trans('attribute::attribute.label.group_id')!!}</th>
                    <th>{!! trans('attribute::attribute.label.name')!!}</th>
                    <th>{!! trans('attribute::attribute.label.order')!!}</th>
                    <th>{!! trans('attribute::attribute.label.status')!!}</th>
                    <th>{!! trans('attribute::attribute.label.created_at')!!}</th>
                    <th>{!! trans('attribute::attribute.label.updated_at')!!}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($attributes as $attribute)
                                <tr>
                                    <td>
                                        <div class="img-container">
                                            <a href="{{trans_url('attribute')}}/{{$attribute->getPublickey()}}">
                                              <img alt="" class="img-responsive" src="{!!url($attribute->defaultImage('sm','images'))!!}">
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ $attribute->group_id }}</td>
                    <td>{{ $attribute->name }}</td>
                    <td>{{ $attribute->order }}</td>
                                    <td class="td-actions">
                                        <a href="{{trans_url('attribute')}}/{!!$attribute->getRouteKey()!!}" rel="tooltip" data-toggle="tooltip" data-placement="top" title="View Attribute" class="btn btn-info btn-simple">
                                            <i class="material-icons">panorama</i>
                                        </a>
                                        <a href="{!! trans_url(get_guard('url').'/attribute/attribute') !!}/{!! $attribute->getRouteKey() !!}/edit" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit Attribute" class="btn btn-success btn-simple">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a rel="tooltip" data-toggle="tooltip" data-placement="top" title="Remove Attribute" class="btn btn-danger btn-simple" data-action="DELETE" data-href="{!! trans_url(get_guard('url').'/attribute/attribute') !!}/{!! $attribute->getRouteKey() !!}" data-remove="{!! $attribute->getRouteKey() !!}">
                                            <i class="material-icons">close</i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td><h4>No attributes found.</h4></td>
                                </tr>
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="footer">
                        {{$attributes->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>