 <section class="blog-section bg-grey">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">

                            <div class="login-register-section">
                                <div class="overlay"></div>
                                 <div class="container">
                                   <h3 class="text-center">Subscribe our Newsletter</h3>
                                   <div class="sign-box center-block">
                                       {!!Form::vertical_open()
                                        ->id('newsletter-newsletter-edit')
                                        ->method('POST')
                                        ->class('apply-form')
                                        ->enctype('multipart/form-data')
                                        ->action(trans_url('/newsletters/update/'. $newsletter->slug))!!}

                                                {!! Form::token() !!}


                                        {!! Form::text('email')
                                         -> label(trans('newsletter::newsletter.label.email'))
                                         -> placeholder(trans('newsletter::newsletter.placeholder.email'))
                                         -> disabled()!!}

                                        {!! Form::text('name')
                                         -> label(trans('newsletter::newsletter.label.name'))
                                         -> placeholder(trans('newsletter::newsletter.placeholder.name'))
                                         -> required()!!}

                                         {!! Form::text('phone')
                                         -> label(trans('newsletter::newsletter.label.phone'))
                                         -> placeholder(trans('newsletter::newsletter.placeholder.phone'))
                                         -> required()!!}
                                     
                                      <button id="subscribe-news" type="button" class="btn btn-primary text-uppercase">Subscribe</button>
                                     {!! Form::close() !!}
                                   </div>    
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<script type="text/javascript">
  $(function(){

      $('#subscribe-news').click(function(){
          $('#newsletter-newsletter-edit').submit();
      })
      $('#newsletter-newsletter-edit').submit(function(){
            if($(this).valid() == false) {
            toastr.error('Please enter valid information.', 'Error');
            return false;
        }
              var formData=new FormData();
              var params=$(this).serializeArray();
              $.each(params, function(i, val) {
                  formData.append(val.name, val.value);
              });
              var url=$(this).attr('action');
              $.ajax( {
                url: url,
                type: 'POST',
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                dataType: 'json',
                success:function(data, textStatus, jqXHR)
                {
                  swal("Success.!",'Newsletter subscribed successsfully', "success");
                  setTimeout("window.location.href='{{url('/')}}';",3000);
                }

              })
  })
})
</script>



<style type="text/css">
        sup 
        {
            color:red;
        }
</style>