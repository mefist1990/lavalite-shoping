@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('blog::blog.name') !!} <small> {!! trans('app.manage') !!} {!! trans('blog::blog.names') !!}</small>
@stop

@section('title')
{!! trans('blog::blog.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('app.home') !!} </a></li>
    <li class="active">{!! trans('blog::blog.names') !!}</li>
</ol>
@stop

@section('entry')
<div id='blog-blog-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="blog-blog-list" class="table table-striped data-table">
    <thead class="list_head">
        <th>{!! trans('blog::blog.label.category_id')!!}</th>
                    <th>{!! trans('blog::blog.label.title')!!}</th>
                    <th>{!! trans('blog::blog.label.status')!!}</th>
                    <th>{!! trans('blog::blog.label.created_at')!!}</th>
    </thead>
    <thead  class="search_bar">
        <th>{!! Form::select('search[category_id]')->options([''=>'All']+Blog::categories())->raw()!!}</th>
                    <th>{!! Form::text('search[title]')->raw()!!}</th>
                    <th>{!! Form::select('search[status]')->options([''=>'All']+trans('blog::blog.options.status'))->raw()!!}</th>
                    <th>{!! Form::date('search[created_at]')->id('created_at')->raw()!!}</th>
    </thead>
</table>
@stop

@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    app.load('#blog-blog-entry', '{!!trans_url('admin/blog/blog/0')!!}');
    oTable = $('#blog-blog-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/blog/blog') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#blog-blog-list .search_bar input, #blog-blog-list .search_bar select').each(
                function(){
                    aoData.push( { 'name' : $(this).attr('name'), 'value' : $(this).val() } );
                }
            );
            app.dataTable(aoData);
            $.ajax({
                'dataType'  : 'json',
                'data'      : aoData,
                'type'      : 'GET',
                'url'       : sSource,
                'success'   : fnCallback
            });
        },

        "columns": [
            {data :'category_id'},
                    {data :'title'},
                {data :'status'},
                {data :'created_at'},
        ],
        "pageLength": 25
    });

    $('#blog-blog-list tbody').on( 'click', 'tr', function () {

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var d = $('#blog-blog-list').DataTable().row( this ).data();

        $('#blog-blog-entry').load('{!!trans_url('admin/blog/blog')!!}' + '/' + d.id);
    });

    $("#blog-blog-list .search_bar input, #blog-blog-list .search_bar select").on('keyup select', function (e) {
        e.preventDefault();
        console.log(e.keyCode);
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });
    $("#blog-blog-list .search_bar select,#blog-blog-list .search_bar #created_at").change(function (e) {
        e.preventDefault();
            oTable.api().draw();
        
    });
});
</script>
@stop

@section('style')
@stop

