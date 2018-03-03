<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container">    
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo e(trans_url('/')); ?>"><img src="<?php echo e(theme_asset('img/logo-white.svg')); ?>" alt=""></a>
        </div>
        <div class="collapse navbar-collapse">       
            
            <ul class="nav navbar-nav navbar-right">
                <?php if(Request::is('*login')): ?>
                <li><a href="<?php echo url('client.web/register'); ?>">Register</a></li>
                <?php else: ?>
                <li><a href="<?php echo url('client.web/login'); ?>">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>