@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('newsletter::newsletter.name') !!} <small> {!! trans('app.manage') !!} {!! trans('newsletter::newsletter.names') !!}</small>
@stop

@section('title')
{!! trans('newsletter::newsletter.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('app.home') !!} </a></li>
    <li class="active">{!! trans('newsletter::newsletter.names') !!}</li>
</ol>
@stop

@section('entry')
<div id='newsletter-newsletter-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="newsletter-newsletter-list" class="table table-striped data-table">
    <thead class="list_head">
        <th>{!! trans('newsletter::newsletter.label.name')!!}</th>
                    <th>{!! trans('newsletter::newsletter.label.email')!!}</th>
                    <th>{!! trans('newsletter::newsletter.label.phone')!!}</th>
                    <th>{!! trans('newsletter::newsletter.label.created_at')!!}</th>
    </thead>
    <thead  class="search_bar">
        <th>{!! Form::text('search[name]')->raw()!!}</th>
                    <th>{!! Form::text('search[email]')->raw()!!}</th>
                    <th>{!! Form::text('search[phone]')->raw()!!}</th>
                    <th>{!! Form::date('search[created_at]')->id('created_at')->raw()!!}</th>
    </thead>
</table>
@stop

@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    app.load('#newsletter-newsletter-entry', '{!!trans_url('admin/newsletter/newsletter/0')!!}');
    oTable = $('#newsletter-newsletter-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/newsletter/newsletter') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#newsletter-newsletter-list .search_bar input, #newsletter-newsletter-list .search_bar select').each(
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
                    {data :'email'},
                    {data :'phone'},
            {data :'created_at'},
        ],
        "pageLength": 25
    });

    $('#newsletter-newsletter-list tbody').on( 'click', 'tr', function () {

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var d = $('#newsletter-newsletter-list').DataTable().row( this ).data();

        $('#newsletter-newsletter-entry').load('{!!trans_url('admin/newsletter/newsletter')!!}' + '/' + d.id);
    });

    $("#newsletter-newsletter-list .search_bar input, #newsletter-newsletter-list .search_bar select").on('keyup select', function (e) {
        e.preventDefault();
        console.log(e.keyCode);
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });
    $("#newsletter-newsletter-list .search_bar #created_at").on('change', function (e) {
    
            oTable.api().draw();
       
    });
});
</script>
@stop

@section('style')
@stop

