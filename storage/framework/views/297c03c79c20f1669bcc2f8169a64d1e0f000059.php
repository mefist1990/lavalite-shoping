<div class="panel panel-default alt with-footer">
    <div class="heading clearfix">
        <h2 class="title">Activity feed</h2>
        <div class="ctrls">
            <div class="badge badge-info"><?php echo @count($tasks); ?></div>
        </div>
    </div>
    <?php $icon=['in_progress'=>'ion-android-sync','to_do'=>'ion-refresh','completed'=>'ion-checkmark-circled'];
     $color=['in_progress'=>'blue','to_do'=>'purple','completed'=>'green']?>
    <div class="panel-body pn" style="max-height: 270px;overflow-x: auto;">
        <ul class="media-list scroll-content mn">
        <?php $__empty_1 = true; $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
            <li class="media b-bl">
                            <a href="#">
                                <div class="media-left">
                                   <span class="icon <?php echo @$color[$value['status']]; ?>"><i class="<?php echo @$icon[$value['status']]; ?>"></i></span>
                                </div>
                                <div class="media-body">
                                    <span class="name"><?php echo @$value->user['name']; ?></span>  assigned  a task <?php echo @$value['task']; ?>

                                      <span class="time" datetime="<?php echo $value->created_at; ?>" title="<?php echo $value->created_at; ?>"> <?php echo $value->created_at; ?></span>
                                </div>
                            </a>
                        </li>                               
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
            <li class="media b-bl">
                <div class="media-content">
                    <p>No Task Scheduled</p>
                </div>
            </li>
            <?php endif; ?>
        </ul>
    </div>
    <div class="footer">
        <button class="btn btn-danger btn-raised btn-sm">See more</button>
    </div>
</div>
<script type="text/javascript">
$(function(){
  jQuery(".time").timeago();
})
  
</script>
