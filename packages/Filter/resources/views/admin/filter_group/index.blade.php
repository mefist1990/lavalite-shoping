@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('filter::filter_group.name') !!} <small> {!! trans('app.manage') !!} {!! trans('filter::filter_group.names') !!}</small>
@stop

@section('title')
{!! trans('filter::filter_group.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('app.home') !!} </a></li>
    <li class="active">{!! trans('filter::filter_group.names') !!}</li>
</ol>
@stop

@section('entry')
<div id='filter-filter_group-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="filter-filter_group-list" class="table table-striped data-table">
    <thead class="list_head">
        <th>{!! trans('filter::filter_group.label.name')!!}</th>
                    <th>{!! trans('filter::filter_group.label.order')!!}</th>
                    <th>{!! trans('filter::filter_group.label.created_at')!!}</th>
                    <th>{!! trans('filter::filter_group.label.updated_at')!!}</th>
    </thead>
    <thead  class="search_bar">
        <th>{!! Form::text('search[name]')->raw()!!}</th>
                    <th>{!! Form::number('search[order]')->raw()!!}</th>
                    <th>{!! Form::date('search[created_at]')->addClass('datepick')->raw()!!}</th>
                    <th>{!! Form::date('search[updated_at]')->addClass('datepick')->raw()!!}</th>
    </thead>
</table>
@stop

@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    app.load('#filter-filter_group-entry', '{!!trans_url('admin/filter/filter_group/0')!!}');
    oTable = $('#filter-filter_group-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/filter/filter_group') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#filter-filter_group-list .search_bar input, #filter-filter_group-list .search_bar select').each(
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
                    {data :'order'},
            {data :'created_at'},
            {data :'updated_at'},
        ],
        "pageLength": 25
    });

    $('#filter-filter_group-list tbody').on( 'click', 'tr', function () {

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var d = $('#filter-filter_group-list').DataTable().row( this ).data();

        $('#filter-filter_group-entry').load('{!!trans_url('admin/filter/filter_group')!!}' + '/' + d.id);
    });

    $("#filter-filter_group-list .search_bar input, #filter-filter_group-list .search_bar select").on('keyup select', function (e) {
        e.preventDefault();
        console.log(e.keyCode);
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });

    $("#filter-filter_group-list .search_bar select,.datepick").on('change', function (e) {
        e.preventDefault();
        oTable.api().draw();
    });
});
</script>
@stop

@section('style')
@stop

