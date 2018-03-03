@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('order::order.name') !!} <small> {!! trans('app.manage') !!} {!! trans('order::order.names') !!}</small>
@stop

@section('title')
{!! trans('order::order.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('app.home') !!} </a></li>
    <li class="active">{!! trans('order::order.names') !!}</li>
</ol>
@stop

@section('entry')
<div id='order-order-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="order-order-list" class="table table-striped data-table">
    <thead class="list_head">
        <th>{!! trans('order::order.label.customer_id')!!}</th>
                    <th>{!! trans('order::order.label.total')!!}</th>
                    <th>{!! trans('order::order.label.order_status_id')!!}</th>
                    <th>{!! trans('order::order.label.created_at')!!}</th>
                    <th>{!! trans('order::order.label.updated_at')!!}</th>
    </thead>
    <thead  class="search_bar">
        <th>{!! Form::text('search[user_id]')->raw()!!}</th>
                    <th>{!! Form::text('search[total]')->raw()!!}</th>
                    <th>{!! Form::select('search[order_status_id]')->options([''=>'All']+Order::statuses())->raw()!!}</th>
                    <th>{!! Form::date('search[created_at]')->addClass('datepick')->raw()!!}</th>
                    <th>{!! Form::date('search[updated_at]')->addClass('datepick')->raw()!!}</th>
    </thead>
</table>
@stop

@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    @if(Request::input('id'))
        app.load('#order-order-entry', '{!!trans_url('admin/order/order')!!}/{!!Request::input('id')!!}');
    @else 
    app.load('#order-order-entry', '{!!trans_url('admin/order/order/0')!!}');
    @endif


    oTable = $('#order-order-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/order/order') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#order-order-list .search_bar input, #order-order-list .search_bar select').each(
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
            {data :'user_id'},
            {data :'total'},
                    {data :'order_status_id'},
            {data :'created_at'},
            {data :'updated_at'},
        ],
        "pageLength": 25,
        "order": [[ 3, "desc" ]],
    });

    $('#order-order-list tbody').on( 'click', 'tr', function () {

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var d = $('#order-order-list').DataTable().row( this ).data();

        $('#order-order-entry').load('{!!trans_url('admin/order/order')!!}' + '/' + d.id);
    });

    $("#order-order-list .search_bar input, #order-order-list .search_bar select").on('keyup select', function (e) {
        e.preventDefault();
        console.log(e.keyCode);
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });

    $("#order-order-list .search_bar select,.datepick").on('change', function (e) {
        e.preventDefault();
        oTable.api().draw();
    });
});
</script>
@stop

@section('style')
@stop

