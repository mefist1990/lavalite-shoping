<?php $__empty_1 = true; $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$blog): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
    <div class="post-card-item">
        <div class="item-thumb">
            <a href="<?php echo url('blogs/'.$blog['slug']); ?>">
                <img src="<?php echo url($blog->defaultImage('lg','images')); ?>" alt="" class="img-responsive">
            </a>
        </div>
        <div class="post-card-body">
            <div class="post-card-description">
                <ul class="list-inline">
                    <li><i class="fa fa-calendar"></i> <?php echo format_date($blog->posted_on); ?> </li>
                    <li><i class="fa fa-eye"></i> <a href="<?php echo url('blogs/'.$blog['slug']); ?>" rel="category tag"><?php echo @$blog->viewcount; ?></a></li>
                </ul>
                <h3><a href="<?php echo url('blogs/'.$blog['slug']); ?>"><?php echo @$blog->title; ?></a></h3>
                <p><?php echo strip_tags(substr(@$blog->details,0,90)); ?></p>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
<?php endif; ?>