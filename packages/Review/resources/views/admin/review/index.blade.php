@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('review::review.name') !!} <small> {!! trans('app.manage') !!} {!! trans('review::review.names') !!}</small>
@stop

@section('title')
{!! trans('review::review.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('app.home') !!} </a></li>
    <li class="active">{!! trans('review::review.names') !!}</li>
</ol>
@stop

@section('entry')
<div id='review-review-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="review-review-list" class="table table-striped data-table">
    <thead class="list_head">
        <th>{!! trans('review::review.label.product_id')!!}</th>
        <th>{!! trans('review::review.label.score')!!}</th>
                    <th>{!! trans('review::review.label.status')!!}</th>
                    <th>{!! trans('review::review.label.created_at')!!}</th>
                    <th>{!! trans('review::review.label.updated_at')!!}</th>
    </thead>
    <thead  class="search_bar">
                    <th>{!! Form::select('search[product_id]')->options([''=>'All']+Product::productsList())->raw()!!}</th>
                    <th>{!! Form::number('search[score]')->raw()!!}</th>
                    <th>{!! Form::select('search[status]')->options([''=>'All']+trans('review::review.options.status'))->raw()!!}</th>
                    <th>{!! Form::date('search[created_at]')->addClass('datepick')->raw()!!}</th>
                    <th>{!! Form::date('search[updated_at]')->addClass('datepick')->raw()!!}</th>
    </thead>
</table>
@stop

@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    app.load('#review-review-entry', '{!!trans_url('admin/review/review/0')!!}');
    oTable = $('#review-review-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/review/review') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#review-review-list .search_bar input, #review-review-list .search_bar select').each(
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
            {data :'product_id'},
                      
                    {data :'score'},
                {data :'status'},
            {data :'created_at'},
            {data :'updated_at'},
        ],
        "pageLength": 25
    });

    $('#review-review-list tbody').on( 'click', 'tr', function () {

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var d = $('#review-review-list').DataTable().row( this ).data();

        $('#review-review-entry').load('{!!trans_url('admin/review/review')!!}' + '/' + d.id);
    });

    $("#review-review-list .search_bar input, #review-review-list .search_bar select").on('keyup select', function (e) {
        e.preventDefault();
        console.log(e.keyCode);
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });
     $("#review-review-list .search_bar select,.datepick").on('change', function (e) {
        e.preventDefault();
        oTable.api().draw();
    });
});
</script>
@stop

@section('style')
@stop

