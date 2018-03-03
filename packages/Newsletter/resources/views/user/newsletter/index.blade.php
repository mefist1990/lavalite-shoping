<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header with-sub" data-background-color="red">
                        <div class="row">
                            <div class="col-sm-8 title-main">
                                <i class="pe-7s-display2"></i>
                                <h4 class="title">{!! trans('newsletter::newsletter.title.user') !!}</h4>
                                <p class="sub-title">{!! trans('newsletter::newsletter.title.sub.user') !!}</p>
                            </div>
                            <div class="col-sm-4">
                                <div class="header-form">
                                    {!!Form::open()
                                   ->method('GET')
                                   ->class('form pn')
                                   ->action(trans_url(get_guard('url').'/newsletter/newsletter'))!!}
                                    <div class="form-group form-white mn">
                                      {!!Form::text('search')->type('text')->placeholder('Search')->raw()!!}
                                    </div>
                                    <button type="submit" class="btn btn-icon btn-round btn-white btn-raised search-btn"><i class="fa fa-search"></i></button>
                                    {!! Form::close()!!}
                                    <a href="{!!trans_url(get_guard('url').'/newsletter/newsletter/create')!!}" rel="tooltip" class="btn btn-white btn-round btn-simple btn-icon pull-right add-new" data-original-title="" title="">
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
                                    <th>{!! trans('newsletter::newsletter.label.name')!!}</th>
                    <th>{!! trans('newsletter::newsletter.label.email')!!}</th>
                    <th>{!! trans('newsletter::newsletter.label.phone')!!}</th>
                    <th>{!! trans('newsletter::newsletter.label.status')!!}</th>
                    <th>{!! trans('newsletter::newsletter.label.created_at')!!}</th>
                    <th>{!! trans('newsletter::newsletter.label.updated_at')!!}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($newsletters as $newsletter)
                                <tr>
                                    <td>
                                        <div class="img-container">
                                            <a href="{{trans_url('newsletter')}}/{{$newsletter->getPublickey()}}">
                                              <img alt="" class="img-responsive" src="{!!url($newsletter->defaultImage('sm','images'))!!}">
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ $newsletter->name }}</td>
                    <td>{{ $newsletter->email }}</td>
                    <td>{{ $newsletter->phone }}</td>
                                    <td class="td-actions">
                                        <a href="{{trans_url('newsletter')}}/{!!$newsletter->getRouteKey()!!}" rel="tooltip" data-toggle="tooltip" data-placement="top" title="View Newsletter" class="btn btn-info btn-simple">
                                            <i class="material-icons">panorama</i>
                                        </a>
                                        <a href="{!! trans_url(get_guard('url').'/newsletter/newsletter') !!}/{!! $newsletter->getRouteKey() !!}/edit" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit Newsletter" class="btn btn-success btn-simple">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a rel="tooltip" data-toggle="tooltip" data-placement="top" title="Remove Newsletter" class="btn btn-danger btn-simple" data-action="DELETE" data-href="{!! trans_url(get_guard('url').'/newsletter/newsletter') !!}/{!! $newsletter->getRouteKey() !!}" data-remove="{!! $newsletter->getRouteKey() !!}">
                                            <i class="material-icons">close</i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td><h4>No newsletters found.</h4></td>
                                </tr>
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="footer">
                        {{$newsletters->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>