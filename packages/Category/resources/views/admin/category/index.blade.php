@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('category::category.name') !!} <small> {!! trans('app.manage') !!} {!! trans('category::category.names') !!}</small>
@stop

@section('title')
{!! trans('category::category.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('app.home') !!} </a></li>
    <li class="active">{!! trans('category::category.names') !!}</li>
</ol>
@stop

@section('entry')
<div id='category-category-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="category-category-list" class="table table-striped data-table">
    <thead class="list_head">
        <th>{!! trans('category::category.label.parent_id')!!}</th>
                    <th>{!! trans('category::category.label.name')!!}</th>
                    <th>{!! trans('category::category.label.order')!!}</th>
                    <th>{!! trans('category::category.label.status')!!}</th>
                    <th>{!! trans('category::category.label.created_at')!!}</th>
                    <th>{!! trans('category::category.label.updated_at')!!}</th>
    </thead>
    <thead  class="search_bar">
                    <th>{!! Form::select('search[parent_id]')->options([''=>'All']+Category::parentNode())->raw()!!}</th>
                    <th>{!! Form::text('search[name]')->raw()!!}</th>
                    <th>{!! Form::number('search[order]')->raw()!!}</th>
                    <th>{!! Form::select('search[status]')->options([''=>'All']+trans('category::category.options.status'))->raw()!!}</th>
                    <th>{!! Form::date('search[created_at]')->addClass('datepick')->raw()!!}</th>
                    <th>{!! Form::date('search[updated_at]')->addClass('datepick')->raw()!!}</th>
    </thead>
</table>
@stop

@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    app.load('#category-category-entry', '{!!trans_url('admin/category/category/0')!!}');
    oTable = $('#category-category-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/category/category') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#category-category-list .search_bar input, #category-category-list .search_bar select').each(
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
            {data :'parent_id'},
            {data :'name'},
            {data :'order'},
            {data :'status'},
            {data :'created_at'},
            {data :'updated_at'},
        ],
        "pageLength": 25
    });

    $('#category-category-list tbody').on( 'click', 'tr', function () {

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var d = $('#category-category-list').DataTable().row( this ).data();

        $('#category-category-entry').load('{!!trans_url('admin/category/category')!!}' + '/' + d.id);
    });

    $("#category-category-list .search_bar input, #category-category-list .search_bar select").on('keyup select', function (e) {
        e.preventDefault();
        console.log(e.keyCode);
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });

    $("#category-category-list .search_bar select,.datepick").on('change', function (e) {
        e.preventDefault();
        oTable.api().draw();
    });
});
</script>
@stop

@section('style')
@stop

