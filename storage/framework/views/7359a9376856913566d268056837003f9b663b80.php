                <?php if(get_guard('url') == 'user'): ?>
                    <div class="logo">
                        <a href="<?php echo url('home'); ?>" class="logo-image">
                            <img src="<?php echo theme_asset('img/logo-white.png'); ?>" alt="logo" title="Lavalite">
                        </a>
                    </div>
                    <div class="logo logo-mini">
                        <a href="<?php echo url('home'); ?>" class="logo-image">
                            <img src="<?php echo theme_asset('img/logo.png'); ?>" alt="logo-mini" title="Lavalite">
                        </a>
                    </div>
                <?php else: ?>
                    <div class="logo">
                        <a href="<?php echo url(get_guard('url')); ?>" class="logo-image">
                            <img src="<?php echo theme_asset('img/logo-white.png'); ?>" alt="logo" title="Lavalite">
                        </a>
                    </div>
                    <div class="logo logo-mini">
                        <a href="<?php echo url(get_guard('url')); ?>" class="logo-image">
                            <img src="<?php echo theme_asset('img/logo.png'); ?>" alt="logo-mini" title="Lavalite">
                        </a>
                    </div>
                <?php endif; ?> 
                

                <div class="sidebar-wrapper">
                    <div class="user">
                        <div class="photo">
                            <img src="<?php echo e(users('picture')); ?>" class="img-responsive img-circle" alt="user">                           
                        </div>
                        <div class="info">
                            <h3><?php echo e(users('name')); ?></h3>
                        </div>
                        <div class="user-links">
                            <a href="<?php echo e(url(config('auth.guard').'/profile')); ?>"><i class="pe-7s-tools"></i><span>Settings</span></a>
                            <a href="<?php echo e(url('logout')); ?>"><i class="pe-7s-power"></i><span>Log Out</span></a>
                        </div>
                    </div>

                
                    <?php if(get_guard('url') == 'user'): ?>
                        <?php echo Menu::menu('user'); ?>

                    <?php elseif(get_guard('url') == 'client'): ?>
                        <?php echo Menu::menu('client','menu::menu.user'); ?>

                    <?php endif; ?>    
                </div>
                <div class="sidebar-background" style="display: block;"></div>



