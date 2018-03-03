@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('returns::return_reason.name') !!} <small> {!! trans('app.manage') !!} {!! trans('returns::return_reason.names') !!}</small>
@stop

@section('title')
{!! trans('returns::return_reason.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('app.home') !!} </a></li>
    <li class="active">{!! trans('returns::return_reason.names') !!}</li>
</ol>
@stop

@section('entry')
<div id='returns-return_reason-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="returns-return_reason-list" class="table table-striped data-table">
    <thead class="list_head">
                    <th>{!! trans('returns::return_reason.label.name')!!}</th>
                    
                    <th>{!! trans('returns::return_reason.label.created_at')!!}</th>
                    <th>{!! trans('returns::return_reason.label.updated_at')!!}</th>
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
    app.load('#returns-return_reason-entry', '{!!trans_url('admin/returns/return_reason/0')!!}');
    oTable = $('#returns-return_reason-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/returns/return_reason') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#returns-return_reason-list .search_bar input, #returns-return_reason-list .search_bar select').each(
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

    $('#returns-return_reason-list tbody').on( 'click', 'tr', function () {

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var d = $('#returns-return_reason-list').DataTable().row( this ).data();

        $('#returns-return_reason-entry').load('{!!trans_url('admin/returns/return_reason')!!}' + '/' + d.id);
    });

    $("#returns-return_reason-list .search_bar input, #returns-return_reason-list .search_bar select").on('keyup select', function (e) {
        e.preventDefault();
        console.log(e.keyCode);
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });

    $("#returns-return_reason-list .search_bar select,.datepick").on('change', function (e) {
        e.preventDefault();
        oTable.api().draw();
    });
});
</script>
@stop

@section('style')
@stop

