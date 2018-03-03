@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('coupon::coupon.name') !!} <small> {!! trans('app.manage') !!} {!! trans('coupon::coupon.names') !!}</small>
@stop

@section('title')
{!! trans('coupon::coupon.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('app.home') !!} </a></li>
    <li class="active">{!! trans('coupon::coupon.names') !!}</li>
</ol>
@stop

@section('entry')
<div id='coupon-coupon-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="coupon-coupon-list" class="table table-striped data-table">
    <thead class="list_head">
        <th>{!! trans('coupon::coupon.label.name')!!}</th>
                    <th>{!! trans('coupon::coupon.label.code')!!}</th>
                    <th>{!! trans('coupon::coupon.label.type')!!}</th>
                    <th>{!! trans('coupon::coupon.label.discount')!!}</th>
                    <th>{!! trans('coupon::coupon.label.start_date')!!}</th>
                    <th>{!! trans('coupon::coupon.label.end_date')!!}</th>
                    <th>{!! trans('coupon::coupon.label.status')!!}</th>
                    <th>{!! trans('coupon::coupon.label.created_at')!!}</th>
                    <th>{!! trans('coupon::coupon.label.updated_at')!!}</th>
    </thead>
    <thead  class="search_bar">
        <th>{!! Form::text('search[name]')->raw()!!}</th>
                    <th>{!! Form::text('search[code]')->raw()!!}</th>
                    <th>{!! Form::select('search[type]')->options([''=>'All']+trans('coupon::coupon.options.type'))->raw()!!}</th>
                    <th>{!! Form::text('search[discount]')->raw()!!}</th>
                    <th>{!! Form::date('search[start_date]')->addClass('datepick')->raw()!!}</th>
                    <th>{!! Form::date('search[end_date]')->addClass('datepick')->raw()!!}</th>
                    <th>{!! Form::select('search[status]')->options([''=>'All']+trans('coupon::coupon.options.status'))->raw()!!}</th>
                    <th>{!! Form::date('search[created_at]')->addClass('datepick')->raw()!!}</th>
                    <th>{!! Form::date('search[updated_at]')->addClass('datepick')->raw()!!}</th>
    </thead>
</table>
@stop

@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    app.load('#coupon-coupon-entry', '{!!trans_url('admin/coupon/coupon/0')!!}');
    oTable = $('#coupon-coupon-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/coupon/coupon') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#coupon-coupon-list .search_bar input, #coupon-coupon-list .search_bar select').each(
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
                {data :'code'},
                {data :'type'},
                {data :'discount'},
                {data :'start_date'},
                {data :'end_date'},
                {data :'status'},
                {data :'created_at'},
                {data :'updated_at'},
        ],
        "pageLength": 25
    });

    $('#coupon-coupon-list tbody').on( 'click', 'tr', function () {

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var d = $('#coupon-coupon-list').DataTable().row( this ).data();

        $('#coupon-coupon-entry').load('{!!trans_url('admin/coupon/coupon')!!}' + '/' + d.id);
    });

    $("#coupon-coupon-list .search_bar input, #coupon-coupon-list .search_bar select").on('keyup select', function (e) {
        e.preventDefault();
        console.log(e.keyCode);
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });

    $("#coupon-coupon-list .search_bar select,.datepick").on('change', function (e) {
        e.preventDefault();
        oTable.api().draw();
    });
});
</script>
@stop

@section('style')
@stop

