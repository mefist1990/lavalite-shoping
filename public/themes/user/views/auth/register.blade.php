        <div class="container page-container">
            <div class="page-content">
                <div class="card card-signup">
                        {!!Form::vertical_open()
                        ->id('contact')
                        ->method('POST')!!}
                        <?php $guard = ($guard == '')?'web': $guard; ?>
                        <div class="header header-primary text-center">
                            <h4>{!!trans('client.register')!!}</h4>                            
                            <div class="social-line">
                                <a href="{!!trans_url($guard . '/login/facebook')!!}" class="btn btn-simple btn-just-icon"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="{!!trans_url($guard . '/login/twitter')!!}" class="btn btn-simple btn-just-icon"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="{!!trans_url($guard . '/login/google')!!}" class="btn btn-simple btn-just-icon"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="{!!trans_url($guard . '/login/linkedin')!!}" class="btn btn-simple btn-just-icon"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </div>                         
                        <p class="text-divider mb10">{!!trans('client.or_be_classical')!!}</p>
                        @include('public::notifications')
                        <div class="content">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">account_circle</i>
                                </span>
                                <div class="form-group label-floating">
                                    <label for="username" class="control-label">{!!trans('client.username')!!}</label>
                                    {!! Form::text('name' ,'')->raw()!!}
                                </div>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">account_circle</i>
                                </span>
                                <div class="form-group label-floating">
                                    <label for="username" class="control-label">{!!trans('client.sex')!!}</label>
                                    
                                        <select class="form-control" name="sex">
                                              <option value="female">{!!trans('client.female')!!}</option>
                                              <option value="male">{!!trans('client.male')!!}</option>

                                            </select>


                                </div>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">mail</i>
                                </span>
                                <div class="form-group label-floating">
                                    <label for="username" class="control-label">{!!trans('client.email')!!}</label>
                                    {!! Form::email('email', '')->raw()!!}
                                </div>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock</i>
                                </span>
                                <div class="form-group label-floating">
                                    <label for="username" class="control-label">{!!trans('client.password')!!}</label>
                                    {!! Form::password('password', '')->raw()!!}
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock</i>
                                </span>
                                <div class="form-group label-floating">
                                    <label for="username" class="control-label">{!!trans('client.confirm_password')!!}</label>
                                    {!! Form::password('password_confirmation', '')->raw()!!}
                                </div>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="optionsCheckboxes" required>
                                    {!!trans('client.i_agree_to_the_terms_and_conditions')!!}
                                </label>
                            </div>
                        </div> 

                        <div class="footer text-center mt20">
                            <button type="submit" class="btn btn-raised btn-danger">{!!trans('client.register_now')!!}</button>
                        </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
