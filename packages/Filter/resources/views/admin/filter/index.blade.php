@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('filter::filter.name') !!} <small> {!! trans('app.manage') !!} {!! trans('filter::filter.names') !!}</small>
@stop

@section('title')
{!! trans('filter::filter.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('app.home') !!} </a></li>
    <li class="active">{!! trans('filter::filter.names') !!}</li>
</ol>
@stop

@section('entry')
<div id='filter-filter-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="filter-filter-list" class="table table-striped data-table">
    <thead class="list_head">
                    <th>{!! trans('filter::filter.label.filter_id')!!}</th>
                    <th>{!! trans('filter::filter.label.name')!!}</th>
                    <th>{!! trans('filter::filter.label.order')!!}</th>
                    <th>{!! trans('filter::filter.label.created_at')!!}</th>
                    <th>{!! trans('filter::filter.label.updated_at')!!}</th>
    </thead>
    <thead  class="search_bar">
                    <th>{!! Form::select('search[filter_id]')->options([''=>'All']+Filter::groups())->raw()!!}</th>
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
    app.load('#filter-filter-entry', '{!!trans_url('admin/filter/filter/0')!!}');
    oTable = $('#filter-filter-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/filter/filter') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#filter-filter-list .search_bar input, #filter-filter-list .search_bar select').each(
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
                    {data :'filter_id'},
            {data :'name'},
                    {data :'order'},
            {data :'created_at'},
            {data :'updated_at'},
        ],
        "pageLength": 25
    });

    $('#filter-filter-list tbody').on( 'click', 'tr', function () {

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var d = $('#filter-filter-list').DataTable().row( this ).data();

        $('#filter-filter-entry').load('{!!trans_url('admin/filter/filter')!!}' + '/' + d.id);
    });

    $("#filter-filter-list .search_bar input, #filter-filter-list .search_bar select").on('keyup select', function (e) {
        e.preventDefault();
        console.log(e.keyCode);
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });

    $("#filter-filter-list .search_bar select,.datepick").on('change', function (e) {
        e.preventDefault();
        oTable.api().draw();
    });
});
</script>
@stop

@section('style')
@stop

