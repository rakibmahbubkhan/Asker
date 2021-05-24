<?php if($model instanceof App\Models\Question): ?>
    <?php
        $name = 'question';
        $firstURISegment = 'questions';
    ?>
<?php elseif($model instanceof App\Models\Answer): ?>
    <?php
        $name = 'answer';
        $firstURISegment = 'answers';
    ?>
<?php endif; ?>

<?php
    $formId = $name . "-" . $model->id;
    $formAction = "../{$firstURISegment}/{$model->id}/vote";
?>

<div class="d-flex flex-column vote-controls">

    <a title="This <?php echo e($name); ?> is useful" class="vote-up <?php echo e(Auth::guest() ? 'off' : ''); ?>" onclick="event.preventDefault(); document.getElementById('up-vote-<?php echo e($formId); ?>').submit();" href="">
        <i class="fas fa-caret-up fa-3x"></i></a>
    <form id="up-vote-<?php echo e($formId); ?>" action="<?php echo e($formAction); ?>" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="vote" value="1">
    </form>

    <span class="votes-count"><?php echo e($model->votes_count); ?></span>

    <a title="This <?php echo e($name); ?> is not useful" class="vote-down <?php echo e(Auth::guest() ? 'off' : ''); ?>" onclick="event.preventDefault(); document.getElementById('down-vote-<?php echo e($formId); ?>').submit();" href="">
        <i class="fas fa-caret-down fa-3x"></i>
    </a>
    <form id="down-vote-<?php echo e($formId); ?>" action="<?php echo e($formAction); ?>" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="vote" value="-1">
    </form>

<?php if($model instanceof App\Models\Question): ?>
    <favourite :question="<?php echo e($model); ?>"></favourite>
<?php elseif($model instanceof App\Models\Answer): ?>
    <?php echo $__env->make('shared._accept', [
    'model' => $model
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
</div><?php /**PATH C:\xampp\htdocs\Laravel-Q-A\resources\views/shared/_vote.blade.php ENDPATH**/ ?>