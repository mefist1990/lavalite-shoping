        <div class="container page-container">
            <div class="page-content">
                <div class="card card-signup">
                        <?php echo Form::vertical_open()
                        ->id('contact')
                        ->method('POST'); ?>

                        <?php $guard = ($guard == '')?'web': $guard; ?>
                        <div class="header header-primary text-center">
                            <h4><?php echo trans('client.register'); ?></h4>                            
                            <div class="social-line">
                                <a href="<?php echo trans_url($guard . '/login/facebook'); ?>" class="btn btn-simple btn-just-icon"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="<?php echo trans_url($guard . '/login/twitter'); ?>" class="btn btn-simple btn-just-icon"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="<?php echo trans_url($guard . '/login/google'); ?>" class="btn btn-simple btn-just-icon"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="<?php echo trans_url($guard . '/login/linkedin'); ?>" class="btn btn-simple btn-just-icon"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </div>                         
                        <p class="text-divider mb10"><?php echo trans('client.or_be_classical'); ?></p>
                        <?php echo $__env->make('public::notifications', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <div class="content">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">account_circle</i>
                                </span>
                                <div class="form-group label-floating">
                                    <label for="username" class="control-label"><?php echo trans('client.username'); ?></label>
                                    <?php echo Form::text('name' ,'')->raw(); ?>

                                </div>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">account_circle</i>
                                </span>
                                <div class="form-group label-floating">
                                    <label for="username" class="control-label"><?php echo trans('client.sex'); ?></label>
                                    
                                        <select class="form-control" name="sex">
                                              <option value="female"><?php echo trans('client.female'); ?></option>
                                              <option value="male"><?php echo trans('client.male'); ?></option>

                                            </select>


                                </div>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">mail</i>
                                </span>
                                <div class="form-group label-floating">
                                    <label for="username" class="control-label"><?php echo trans('client.email'); ?></label>
                                    <?php echo Form::email('email', '')->raw(); ?>

                                </div>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock</i>
                                </span>
                                <div class="form-group label-floating">
                                    <label for="username" class="control-label"><?php echo trans('client.password'); ?></label>
                                    <?php echo Form::password('password', '')->raw(); ?>

                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock</i>
                                </span>
                                <div class="form-group label-floating">
                                    <label for="username" class="control-label"><?php echo trans('client.confirm_password'); ?></label>
                                    <?php echo Form::password('password_confirmation', '')->raw(); ?>

                                </div>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="optionsCheckboxes" required>
                                    <?php echo trans('client.i_agree_to_the_terms_and_conditions'); ?>

                                </label>
                            </div>
                        </div> 

                        <div class="footer text-center mt20">
                            <button type="submit" class="btn btn-raised btn-danger"><?php echo trans('client.register_now'); ?></button>
                        </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
