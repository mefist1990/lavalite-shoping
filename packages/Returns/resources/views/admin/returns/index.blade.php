@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('returns::returns.name') !!} <small> {!! trans('app.manage') !!} {!! trans('returns::returns.names') !!}</small>
@stop

@section('title')
{!! trans('returns::returns.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('app.home') !!} </a></li>
    <li class="active">{!! trans('returns::returns.names') !!}</li>
</ol>
@stop

@section('entry')
<div id='returns-returns-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="returns-returns-list" class="table table-striped data-table">
    <thead class="list_head">
        <th>{!! trans('returns::returns.label.order_id')!!}</th>
                    <th>{!! trans('returns::returns.label.customer_id')!!}</th>
                    <th>{!! trans('returns::returns.label.product_id')!!}</th>
                    <th>{!! trans('returns::returns.label.return_reason_id')!!}</th>
                    <th>{!! trans('returns::returns.label.status')!!}</th>
                    <th>{!! trans('returns::returns.label.created_at')!!}</th>
                    <th>{!! trans('returns::returns.label.updated_at')!!}</th>
    </thead>
    <thead  class="search_bar">
        <th>{!! Form::text('search[order_id]')->raw()!!}</th>
                    <th>{!! Form::text('search[user_id]')->raw()!!}</th>
                    <th>{!! Form::text('search[product]')->raw()!!}</th>
                    <th>{!! Form::select('search[return_reason_id]')->options([''=>'All']+Returns::reasons())->raw()!!}</th>
                    <th>{!! Form::select('search[status]')->options([''=>'All']+ trans('returns::returns.options.status'))->raw()!!}</th>            
                    <th>{!! Form::date('search[created_at]')->addClass('datepick')->raw()!!}</th>
                    <th>{!! Form::date('search[updated_at]')->addClass('datepick')->raw()!!}</th>
    </thead>
</table>
@stop

@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    app.load('#returns-returns-entry', '{!!trans_url('admin/returns/returns/0')!!}');
    oTable = $('#returns-returns-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/returns/returns') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#returns-returns-list .search_bar input, #returns-returns-list .search_bar select').each(
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
                   {data :'user_id'},
                   {data :'product'},
                    {data :'return_reason_id'},
                    {data :'status'},                    
            {data :'created_at'},
            {data :'updated_at'},
             
        ],
        "pageLength": 25
    });

    $('#returns-returns-list tbody').on( 'click', 'tr', function () {

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var d = $('#returns-returns-list').DataTable().row( this ).data();

        $('#returns-returns-entry').load('{!!trans_url('admin/returns/returns')!!}' + '/' + d.id);
    });

    $("#returns-returns-list .search_bar input, #returns-returns-list .search_bar select").on('keyup select', function (e) {
        e.preventDefault();
        console.log(e.keyCode);
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });

    $("#returns-returns-list .search_bar select,.datepick").on('change', function (e) {
        e.preventDefault();
        oTable.api().draw();
    });
});
</script>
@stop

@section('style')
@stop

