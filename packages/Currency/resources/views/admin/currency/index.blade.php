@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('currency::currency.name') !!} <small> {!! trans('app.manage') !!} {!! trans('currency::currency.names') !!}</small>
@stop

@section('title')
{!! trans('currency::currency.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('app.home') !!} </a></li>
    <li class="active">{!! trans('currency::currency.names') !!}</li>
</ol>
@stop

@section('entry')
<div id='currency-currency-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="currency-currency-list" class="table table-striped data-table">
    <thead class="list_head">
        <th>{!! trans('currency::currency.label.title')!!}</th>
                    <th>{!! trans('currency::currency.label.code')!!}</th>
                    <th>{!! trans('currency::currency.label.status')!!}</th>
                    <th>{!! trans('currency::currency.label.created_at')!!}</th>
                    <th>{!! trans('currency::currency.label.updated_at')!!}</th>
    </thead>
    <thead  class="search_bar">
        <th>{!! Form::text('search[title]')->raw()!!}</th>
                    <th>{!! Form::text('search[code]')->raw()!!}</th>
                    <th>{!! Form::select('search[status]')->options([''=>'All']+trans('currency::currency.options.status'))->raw()!!}</th>
                    <th>{!! Form::date('search[created_at]')->addClass('datepick')->raw()!!}</th>
                    <th>{!! Form::date('search[updated_at]')->addClass('datepick')->raw()!!}</th>
    </thead>
</table>
@stop

@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    app.load('#currency-currency-entry', '{!!trans_url('admin/currency/currency/0')!!}');
    oTable = $('#currency-currency-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/currency/currency') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#currency-currency-list .search_bar input, #currency-currency-list .search_bar select').each(
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
            {data :'title'},
                    {data :'code'},
                {data :'status'},
            {data :'created_at'},
            {data :'updated_at'},
        ],
        "pageLength": 25
    });

    $('#currency-currency-list tbody').on( 'click', 'tr', function () {

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var d = $('#currency-currency-list').DataTable().row( this ).data();

        $('#currency-currency-entry').load('{!!trans_url('admin/currency/currency')!!}' + '/' + d.id);
    });

    $("#currency-currency-list .search_bar input, #currency-currency-list .search_bar select").on('keyup select', function (e) {
        e.preventDefault();
        console.log(e.keyCode);
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });

    $("#currency-currency-list .search_bar select,.datepick").on('change', function (e) {
        e.preventDefault();
        oTable.api().draw();
    });
});
</script>
@stop

@section('style')
@stop

