<section class="bg-grey track-order">
    <div class="container">
        <div class="track-order-page">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading-title">Track your Order</h2>
                    <span class="title-tag mm20">Please enter your Order ID in the box below and press Enter. This was given to you on your receipt and in the confirmation email you should have received. </span>
                    {!!Form::vertical_open()->id('track-order-form')->addClass('register-form mt20')!!}
                        <div class="form-group">
                            <label class="info-title" for="order_id">Order ID</label>
                            <input type="text" name="order_id" class="form-control unicase-form-control text-input" id="order_id" required="true">
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="email">Billing Email</label>
                            <input type="email" name="email" class="form-control unicase-form-control text-input" id="email" required="true">
                        </div>
                        <button type="button" id="track-order" class="btn-upper btn btn-primary checkout-page-button">Track</button>
                    {!! Form::close() !!} 
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="popup-status" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Order Status</h4>
            </div>
            <div class="modal-body">
                <div class="tab-content">
                    <div class="tab-pane active clearfix" style=" padding-top: 60px;">
                        Your Order Status : <b id="statustr"></b>
                    </div>
                </div>
            
            </div>    
            <div class="modal-footer ">
                <a type="button" class="btn btn-primary pull-right btn-sm m-l-5" data-dismiss="modal"><i class="fa fa-times-circle"></i>&nbsp;Back</a>
            </div>
        </div>          
    </div>
</div>


<script type="text/javascript">
    
        $("#track-order").click(function(){
            var form = $('#track-order-form');
            var order = $("#order_id").val();
            var email = $("#email").val();
 
            
            
            if(form.valid() == false) {
                  toastr.error('Please enter valid information.', 'Error');
                  return false;
              }

            $.ajax( {
               url: "{{URL::to('orders/order/track/status')}}",
               type: 'POST',
               data: {order:order,email:email},
               success:function(data, textStatus, jqXHR)
               {
                    if(data!='')
                    {
                        document.getElementById("statustr").innerHTML = data;
                        $('#popup-status').modal('show');
                    }
                    else
                    {
                        toastr.error('Please enter valid information.', 'Error');
                        return false;
                    }
               },
               error: function(jqXHR, textStatus, errorThrown)
               {
               }
            });
        });

</script>

<style type="text/css">
.header{
        background: #22A7F0;
        color: white;
    }
</style>