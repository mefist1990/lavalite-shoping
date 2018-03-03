@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('attribute::attribute.name') !!} <small> {!! trans('app.manage') !!} {!! trans('attribute::attribute.names') !!}</small>
@stop

@section('title')
{!! trans('attribute::attribute.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('app.home') !!} </a></li>
    <li class="active">{!! trans('attribute::attribute.names') !!}</li>
</ol>
@stop

@section('entry')
<div id='attribute-attribute-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="attribute-attribute-list" class="table table-striped data-table">
    <thead class="list_head">
        <th>{!! trans('attribute::attribute.label.group_id')!!}</th>
                    <th>{!! trans('attribute::attribute.label.name')!!}</th>
                    <th>{!! trans('attribute::attribute.label.order')!!}</th>
                    <th>{!! trans('attribute::attribute.label.created_at')!!}</th>
                    <th>{!! trans('attribute::attribute.label.updated_at')!!}</th>
    </thead>
    <thead  class="search_bar">
        <th>{!! Form::select('search[group_id]')->options([''=>'All']+Attribute::groups())->raw()!!}</th> 
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
    app.load('#attribute-attribute-entry', '{!!trans_url('admin/attribute/attribute/0')!!}');
    oTable = $('#attribute-attribute-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/attribute/attribute') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#attribute-attribute-list .search_bar input, #attribute-attribute-list .search_bar select').each(
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
            {data :'group_id'},
                    {data :'name'},
                    {data :'order'},
            {data :'created_at'},
            {data :'updated_at'},
        ],
        "pageLength": 25
    });

    $('#attribute-attribute-list tbody').on( 'click', 'tr', function () {

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var d = $('#attribute-attribute-list').DataTable().row( this ).data();

        $('#attribute-attribute-entry').load('{!!trans_url('admin/attribute/attribute')!!}' + '/' + d.id);
    });

    $("#attribute-attribute-list .search_bar input, #attribute-attribute-list .search_bar select").on('keyup select', function (e) {
        e.preventDefault();
        console.log(e.keyCode);
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });

    $("#attribute-attribute-list .search_bar select,.datepick").on('change', function (e) {
        e.preventDefault();
        oTable.api().draw();
    });
});
</script>
@stop

@section('style')
@stop

