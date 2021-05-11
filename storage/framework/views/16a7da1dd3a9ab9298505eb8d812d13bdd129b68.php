<div class="float-right">
                            <span class="text-muted"><?php echo e($label." ".$model->created_date); ?></span>
                            <div class="media mt-2">
                                <a href="<?php echo e($model->user->url); ?>" class="pr-2">
                                <img src="<?php echo e($model->user->avater); ?>" alt="">
                                </a>
                                <div class="media-body mt-1">
                                    <a href="<?php echo e($model->user->url); ?>"><?php echo e($model->user->name); ?></a>
                                </div>
                            </div>
                        </div><?php /**PATH C:\xampp\htdocs\Laravel-Q-A\resources\views/shared/_author.blade.php ENDPATH**/ ?>