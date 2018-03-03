        <div class="container page-container">
            <div class="page-content">
                <div class="card card-signup">
                        <?php echo Form::vertical_open()
                        ->id('login')
                        ->method('POST'); ?>

                        <?php $guard = ($guard == '')?'web': $guard; ?>
                        <div class="header header-primary text-center">
                            <h4>Sign In</h4>
                            <div class="social-line">
                                <a href="<?php echo trans_url($guard . '/login/facebook'); ?>" class="btn btn-simple btn-just-icon"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="<?php echo trans_url($guard . '/login/twitter'); ?>" class="btn btn-simple btn-just-icon"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="<?php echo trans_url($guard . '/login/google'); ?>" class="btn btn-simple btn-just-icon"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="<?php echo trans_url($guard . '/login/linkedin'); ?>" class="btn btn-simple btn-just-icon"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </div>  
                        <p class="text-divider mb10">Or Be Classical</p>
                        <?php echo $__env->make('public::notifications', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <div class="content">                        
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">account_circle</i>
                                </span>
                                <div class="form-group label-floating">
                                    <label for="username" class="control-label">Username</label>
                                    <?php echo Form::email('email','')->raw(); ?>

                                </div>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock</i>
                                </span>
                                <div class="form-group label-floating">
                                    <label for="pass" class="control-label">Password</label>
                                    <?php echo Form::password('password','')->raw(); ?>

                                </div>
                            </div>
                        </div>                   
                        <div class="footer text-center mt20">
                            <button type="submit"  class="btn btn-raised btn-danger">Sign In</button>
                        </div>
                    <?php echo Form::close(); ?>

                </div>

                <div class="text-center">
                    <a href="<?php echo e(trans_url("$guard/password/reset")); ?>" class="inline-block">Forgot Passowrd?</a>
                </div>
                
            </div>
        </div>
