@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('product::product.name') !!} <small> {!! trans('app.manage') !!} {!! trans('product::product.names') !!}</small>
@stop

@section('title')
{!! trans('product::product.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('app.home') !!} </a></li>
    <li class="active">{!! trans('product::product.names') !!}</li>
</ol>
@stop

@section('entry')
<div id='product-product-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="product-product-list" class="table table-striped data-table">
    <thead class="list_head">
                  
                    <th>{!! trans('product::product.label.name')!!}</th>
                    <th>{!! trans('product::product.label.model')!!}</th>
                    <th>{!! trans('product::product.label.price')!!}</th>
                    <th>{!! trans('product::product.label.quantity')!!}</th>
                    <th>{!! trans('product::product.label.status')!!}</th>
                    <th>{!! trans('product::product.label.created_at')!!}</th>
                    <th>{!! trans('product::product.label.updated_at')!!}</th>
    </thead>
    <thead  class="search_bar">
                   
                    <th>{!! Form::text('search[name]')->raw()!!}</th>
                    <th>{!! Form::text('search[model]')->raw()!!}</th>
                    <th>{!! Form::number('search[price]')->raw()!!}</th>
                     <th>{!! Form::text('search[quantity]')->raw()!!}</th>
                    
                    <th>{!! Form::select('search[status]')->options([''=>'All']+trans('product::product.options.status'))->raw()!!}</th>
                    <th>{!! Form::date('search[created_at]')->addClass('datepick')->raw()!!}</th>
                    <th>{!! Form::date('search[updated_at]')->addClass('datepick')->raw()!!}</th>
    </thead>
</table>
@stop

@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    app.load('#product-product-entry', '{!!trans_url('admin/product/product/0')!!}');
    oTable = $('#product-product-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/product/product') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#product-product-list .search_bar input, #product-product-list .search_bar select').each(
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
                    {data :'model'},
                    {data :'price'},
                    {data :'quantity'},
                    {data :'status'},
                    {data :'created_at'},
                    {data :'updated_at'},
        ],
        "pageLength": 25
    });

    $('#product-product-list tbody').on( 'click', 'tr', function () {

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var d = $('#product-product-list').DataTable().row( this ).data();

        $('#product-product-entry').load('{!!trans_url('admin/product/product')!!}' + '/' + d.id);
    });

    $("#product-product-list .search_bar input, #product-product-list .search_bar select").on('keyup select', function (e) {
        e.preventDefault();
        console.log(e.keyCode);
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });

    $("#product-product-list .search_bar select,.datepick").on('change', function (e) {
        e.preventDefault();
        oTable.api().draw();
    });
});
</script>
@stop

@section('style')
@stop

