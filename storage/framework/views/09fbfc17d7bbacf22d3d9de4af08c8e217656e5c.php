<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('accept', $model)): ?>
<a title="Mark this answer as best answer" class="<?php echo e($model->status); ?> mt-2" href="" 
onclick="event.preventDefault(); document.getElementById('accept-answer-<?php echo e($model->id); ?>').submit();"> 
<i class="fas fa-check fa-2x"></i>
<span class="favourites-count">123</span>
</a>
<form id="accept-answer-<?php echo e($model->id); ?>" action="<?php echo e(route('answers.accept', $model->id)); ?>" method="POST" style="display: none;">
<?php echo csrf_field(); ?>
</form>
<?php else: ?>
<?php if($model->is_best): ?>
<a title="The question owner accepted this answer as best answer" class="<?php echo e($model->status); ?> mt-2" href=""> 
<i class="fas fa-check fa-2x"></i>
<!-- <span class="favourites-count">123</span> -->
</a>
<?php endif; ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Laravel-Q-A\resources\views/shared/_accept.blade.php ENDPATH**/ ?>