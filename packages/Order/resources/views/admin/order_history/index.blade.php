@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('order::order_history.name') !!} <small> {!! trans('app.manage') !!} {!! trans('order::order_history.names') !!}</small>
@stop

@section('title')
{!! trans('order::order_history.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('app.home') !!} </a></li>
    <li class="active">{!! trans('order::order_history.names') !!}</li>
</ol>
@stop

@section('entry')
<div id='order-order_history-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="order-order_history-list" class="table table-striped data-table">
    <thead class="list_head">
        <th>{!! trans('order::order_history.label.order_id')!!}</th>
                    <th>{!! trans('order::order_history.label.order_status_id')!!}</th>
                    <th>{!! trans('order::order_history.label.status')!!}</th>
                    <th>{!! trans('order::order_history.label.created_at')!!}</th>
                    <th>{!! trans('order::order_history.label.updated_at')!!}</th>
    </thead>
    <thead  class="search_bar">
        <th>{!! Form::text('search[order_id]')->raw()!!}</th>
                    <th>{!! Form::text('search[order_status_id]')->raw()!!}</th>
                    <th>{!! Form::text('date[status]')->raw()!!}</th>
                    <th>{!! Form::date('search[created_at]')->addClass('datepick')->raw()!!}</th>
                    <th>{!! Form::date('search[updated_at]')->addClass('datepick')->raw()!!}</th>
    </thead>
</table>
@stop

@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    app.load('#order-order_history-entry', '{!!trans_url('admin/order/order_history/0')!!}');
    oTable = $('#order-order_history-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/order/order_history') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#order-order_history-list .search_bar input, #order-order_history-list .search_bar select').each(
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
            {data :'order_id'},
                    {data :'order_status_id'},
                        {data :'status'},
            {data :'created_at'},
            {data :'updated_at'},
        ],
        "pageLength": 25
    });

    $('#order-order_history-list tbody').on( 'click', 'tr', function () {

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var d = $('#order-order_history-list').DataTable().row( this ).data();

        $('#order-order_history-entry').load('{!!trans_url('admin/order/order_history')!!}' + '/' + d.id);
    });

    $("#order-order_history-list .search_bar input, #order-order_history-list .search_bar select").on('keyup select', function (e) {
        e.preventDefault();
        console.log(e.keyCode);
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });
});
</script>
@stop

@section('style')
@stop

