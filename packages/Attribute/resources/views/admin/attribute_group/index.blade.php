@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('attribute::attribute_group.name') !!} <small> {!! trans('app.manage') !!} {!! trans('attribute::attribute_group.names') !!}</small>
@stop

@section('title')
{!! trans('attribute::attribute_group.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('app.home') !!} </a></li>
    <li class="active">{!! trans('attribute::attribute_group.names') !!}</li>
</ol>
@stop

@section('entry')
<div id='attribute-attribute_group-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="attribute-attribute_group-list" class="table table-striped data-table">
    <thead class="list_head">
        <th>{!! trans('attribute::attribute_group.label.name')!!}</th>
                    <th>{!! trans('attribute::attribute_group.label.order')!!}</th>
                    <th>{!! trans('attribute::attribute_group.label.created_at')!!}</th>
                    <th>{!! trans('attribute::attribute_group.label.updated_at')!!}</th>
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
    app.load('#attribute-attribute_group-entry', '{!!trans_url('admin/attribute/attribute_group/0')!!}');
    oTable = $('#attribute-attribute_group-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/attribute/attribute_group') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#attribute-attribute_group-list .search_bar input, #attribute-attribute_group-list .search_bar select').each(
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

    $('#attribute-attribute_group-list tbody').on( 'click', 'tr', function () {

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var d = $('#attribute-attribute_group-list').DataTable().row( this ).data();

        $('#attribute-attribute_group-entry').load('{!!trans_url('admin/attribute/attribute_group')!!}' + '/' + d.id);
    });

    $("#attribute-attribute_group-list .search_bar input, #attribute-attribute_group-list .search_bar select").on('keyup select', function (e) {
        e.preventDefault();
        console.log(e.keyCode);
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });

    $("#attribute-attribute_group-list .search_bar select,.datepick").on('change', function (e) {
        e.preventDefault();
        oTable.api().draw();
    });
});
</script>
@stop

@section('style')
@stop

