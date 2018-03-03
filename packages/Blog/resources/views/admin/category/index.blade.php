@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('blog::category.name') !!} <small> {!! trans('app.manage') !!} {!! trans('blog::category.names') !!}</small>
@stop

@section('title')
{!! trans('blog::category.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('app.home') !!} </a></li>
    <li class="active">{!! trans('blog::category.names') !!}</li>
</ol>
@stop

@section('entry')
<div id='blog-category-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="blog-category-list" class="table table-striped data-table">
    <thead class="list_head">
        <th>{!! trans('blog::category.label.name')!!}</th>
                    <th>{!! trans('blog::category.label.status')!!}</th>
                    <th>{!! trans('blog::category.label.created_at')!!}</th>
    </thead>
    <thead  class="search_bar">
        <th>{!! Form::text('search[name]')->raw()!!}</th>
                    <th>{!! Form::select('search[status]')->options([''=>'All']+trans('blog::category.options.status'))->raw()!!}</th>
                    <th>{!! Form::date('search[created_at]')->id('created_at')->raw()!!}</th>
    </thead>
</table>
@stop

@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    app.load('#blog-category-entry', '{!!trans_url('admin/blog/category/0')!!}');
    oTable = $('#blog-category-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/blog/category') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#blog-category-list .search_bar input, #blog-category-list .search_bar select').each(
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
            {data :'name'},
           {data :'status'},
            {data :'created_at'},
        ],
        "pageLength": 25
    });

    $('#blog-category-list tbody').on( 'click', 'tr', function () {

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var d = $('#blog-category-list').DataTable().row( this ).data();

        $('#blog-category-entry').load('{!!trans_url('admin/blog/category')!!}' + '/' + d.id);
    });

    $("#blog-category-list .search_bar input, #blog-category-list .search_bar select").on('keyup select', function (e) {
        e.preventDefault();
        console.log(e.keyCode);
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });
    $("#blog-category-list .search_bar select, #blog-category-list .search_bar #created_at").change( function (e) {
       
            oTable.api().draw();
       
    });
});
</script>
@stop

@section('style')
@stop

