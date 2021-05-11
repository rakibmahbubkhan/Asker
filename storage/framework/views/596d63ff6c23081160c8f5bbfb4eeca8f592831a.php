<a title="Click to mark as favourite question (Click again to undo)" 
                class="favourite mt-2 <?php echo e(Auth::guest() ? 'off' : ($model->is_favourited ? 'favourited' : '')); ?>" onclick="event.preventDefault(); document.getElementById('favourite-question-<?php echo e($model->id); ?>').submit()"
                >
    <i class="fas fa-star fa-2x"></i>
    <span class="favourites-count"><?php echo e($model->favourites_count); ?></span>
    </a>

    <form id="favourite-question-<?php echo e($model->id); ?>" action="<?php echo e($model->id); ?>/favourites" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
        <?php if($model->is_favourited): ?>
            <?php echo method_field('DELETE'); ?>
        <?php endif; ?>
    </form><?php /**PATH C:\xampp\htdocs\Laravel-Q-A\resources\views/shared/_favourite.blade.php ENDPATH**/ ?>