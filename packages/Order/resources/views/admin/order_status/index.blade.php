@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('order::order_status.name') !!} <small> {!! trans('app.manage') !!} {!! trans('order::order_status.names') !!}</small>
@stop

@section('title')
{!! trans('order::order_status.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('app.home') !!} </a></li>
    <li class="active">{!! trans('order::order_status.names') !!}</li>
</ol>
@stop

@section('entry')
<div id='order-order_status-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="order-order_status-list" class="table table-striped data-table">
    <thead class="list_head">
        <th>{!! trans('order::order_status.label.name')!!}</th>
                    <th>{!! trans('order::order_status.label.created_at')!!}</th>
                    <th>{!! trans('order::order_status.label.updated_at')!!}</th>
    </thead>
    <thead  class="search_bar">
        <th>{!! Form::text('search[name]')->raw()!!}</th>
                    <th>{!! Form::date('search[created_at]')->addClass('datepick')->raw()!!}</th>
                    <th>{!! Form::date('search[updated_at]')->addClass('datepick')->raw()!!}</th>
    </thead>
</table>
@stop

@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    app.load('#order-order_status-entry', '{!!trans_url('admin/order/order_status/0')!!}');
    oTable = $('#order-order_status-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/order/order_status') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#order-order_status-list .search_bar input, #order-order_status-list .search_bar select').each(
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
            {data :'created_at'},
            {data :'updated_at'},
        ],
        "pageLength": 25
    });

    $('#order-order_status-list tbody').on( 'click', 'tr', function () {

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var d = $('#order-order_status-list').DataTable().row( this ).data();

        $('#order-order_status-entry').load('{!!trans_url('admin/order/order_status')!!}' + '/' + d.id);
    });

    $("#order-order_status-list .search_bar input, #order-order_status-list .search_bar select").on('keyup select', function (e) {
        e.preventDefault();
        console.log(e.keyCode);
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });

    $("#order-order_status-list .search_bar select,.datepick").on('change', function (e) {
        e.preventDefault();
        oTable.api().draw();
    });
});
</script>
@stop

@section('style')
@stop

