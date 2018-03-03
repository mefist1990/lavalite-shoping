    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('returns::returns.name') !!}</a></li>
            <div class="box-tools pull-right">
                @include('returns::admin.returns.partial.workflow')
                <!-- <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#returns-returns-entry' data-href='{{trans_url('admin/returns/returns/create')}}'><i class="fa fa-times-circle"></i> {{ trans('app.new') }}</button> -->
                @if($returns->id )
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" href="#popup-action" id="action"><i class="fa fa-plus-circle"></i> Add Action</button>
                <!-- <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#returns-returns-entry' data-href='{{ trans_url('/admin/returns/returns') }}/{{$returns->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button> -->
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#returns-returns-entry' data-datatable='#returns-returns-list' data-href='{{ trans_url('/admin/returns/returns') }}/{{$returns->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('returns-returns-show')
        ->method('POST')
        ->files('true')
        ->action(URL::to('admin/returns/returns'))!!}
            <div class="tab-content clearfix disabled">
                <!-- <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('returns::returns.name') !!}  [{!! $returns->name !!}] </div> -->
                <div class="tab-pane active" id="details">
                    @include('returns::admin.returns.partial.entry')
                </div>
            </div>
        {!! Form::close() !!}
    </div>

    <div class="modal fade" id="popup-action" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Add Action</h4>
            </div>
            <div class="modal-body">
            {!!Form::vertical_open()->id('action-form')!!}
                <div class="tab-content">
                    <div class="tab-pane active clearfix" style=" padding: 10px;">

                            {!! Form::select('return_action')
                            -> options(trans('returns::returns.options.return_action'))
                            -> label(trans('returns::returns.label.return_action'))
                            -> placeholder(trans('returns::returns.placeholder.return_action'))
                            -> id('retrn_actn')
                            -> required()!!}

                            {!! Form::select ('status')
                            -> options(trans('returns::returns.options.status'))
                            -> label(trans('returns::returns.label.status'))
                            -> placeholder(trans('returns::returns.placeholder.status'))
                            -> id('retrn_stat')
                            -> required()!!}                      

                    </div>
                </div>
            {!! Form::close() !!}
            </div>    
            <div class="modal-footer ">
              <a type="button" class="btn btn-danger pull-right btn-sm m-l-5" data-dismiss="modal"><i class="fa fa-times-circle"></i>&nbsp;&nbsp;Cancel</a>
              <button type="button" id="action-save" class="btn btn-primary btn-sm" id="btn-block"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add</button>
            </div>
        </div>          
      </div>
    </div>

    <script type="text/javascript">

    $(document).on("click", "#action-save", function(e) {
            var form = $('#action-form');

            var return_action = $("#retrn_actn").val();
            var status = $("#retrn_stat").val();

            if(form.valid() == false) {
                  toastr.error('Please enter valid information.', 'Error');
                  return false;
              }            
          
            $.ajax( {
               url: "{{URL::to('admin/returns/returns/action')}}/{{$returns->getRouteKey()}}",
               type: 'GET',
               data: {return_action:return_action,status:status},
               beforeSend:function()
               {
               },
               success:function(data, textStatus, jqXHR)
               {
                  location.reload();
                  $('#popup-action').modal('hide');
               },
               error: function(jqXHR, textStatus, errorThrown)
               {
               }
            });
        });

        
</script>

<style type="text/css">
.header{
        background: #dd4b39;
        color: white;
    }
</style>