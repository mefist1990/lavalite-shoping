@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('cart::cart.name') !!} <small> {!! trans('app.manage') !!} {!! trans('cart::cart.names') !!}</small>
@stop

@section('title')
{!! trans('cart::cart.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('app.home') !!} </a></li>
    <li class="active">{!! trans('cart::cart.names') !!}</li>
</ol>
@stop

@section('entry')
<div id='cart-cart-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="cart-cart-list" class="table table-striped data-table">
    <thead class="list_head">
        <th>{!! trans('cart::cart.label.identifier')!!}</th>
                    <th>{!! trans('cart::cart.label.instance')!!}</th>
                    <th>{!! trans('cart::cart.label.content')!!}</th>
                    <th>{!! trans('cart::cart.label.status')!!}</th>
                    <th>{!! trans('cart::cart.label.created_at')!!}</th>
                    <th>{!! trans('cart::cart.label.updated_at')!!}</th>
    </thead>
    <thead  class="search_bar">
        <th>{!! Form::text('search[identifier]')->raw()!!}</th>
                    <th>{!! Form::text('search[instance]')->raw()!!}</th>
                    <th>{!! Form::text('search[content]')->raw()!!}</th>
                    <th>{!! Form::text('date[status]')->raw()!!}</th>
                    <th>{!! Form::text('date[created_at]')->raw()!!}</th>
                    <th>{!! Form::text('date[updated_at]')->raw()!!}</th>
    </thead>
</table>
@stop

@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    app.load('#cart-cart-entry', '{!!trans_url('admin/cart/cart/0')!!}');
    oTable = $('#cart-cart-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/cart/cart') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#ca.rt-cart-list .search_bar input, #cart-cart-list .search_bar select').each(
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
            {data :'identifier'},
                    {data :'instance'},
                    {data :'content'},
                {data :'status'},
            {data :'created_at'},
            {data :'updated_at'},
        ],
        "pageLength": 25
    });

    $('#cart-cart-list tbody').on( 'click', 'tr', function () {

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var d = $('#cart-cart-list').DataTable().row( this ).data();

        $('#cart-cart-entry').load('{!!trans_url('admin/cart/cart')!!}' + '/' + d.id);
    });

    $("#cart-cart-list .search_bar input, #cart-cart-list .search_bar select").on('keyup select', function (e) {
        e.preventDefault();
        console.log(e.keyCode);
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });

    $("#cart-cart-list .search_bar select,.datepick").on('change', function (e) {
        e.preventDefault();
        oTable.api().draw();
    });
});
</script>
@stop

@section('style')
@stop

