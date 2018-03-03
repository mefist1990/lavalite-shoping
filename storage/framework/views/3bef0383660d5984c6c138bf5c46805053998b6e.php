 <ul class="nav">                       
<?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <?php if($menu->hasChildren()): ?>
    <li class="<?php echo e(isset($menu->active) ? $menu->active : ''); ?>">
        <a href="<?php echo e(trans_url($menu->url)); ?>" ><i class="<?php echo e($menu->icon); ?>"></i><p><?php echo e($menu->name); ?></p></a>
        <?php echo $__env->make('menu::menu.sub.aside', array('menus' => $menu->getChildren()), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </li>
    <?php else: ?>  
    <li  class="<?php echo e(isset($menu->active) ? $menu->active : ''); ?>">
        <a href="<?php echo e(trans_url($menu->url)); ?>"><i class="<?php echo e($menu->icon); ?>"></i><p><?php echo e($menu->name); ?></p></a>
    </li>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</ul>