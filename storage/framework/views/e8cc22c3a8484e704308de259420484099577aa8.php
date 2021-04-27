

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row mt-4 justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h1>Editing answer for Question: <strong><?php echo e($question->title); ?></strong></h1>
                        </div>
                        <hr>
                        <form action="<?php echo e(route('questions.answers.update', [$question->id, $answer->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <div class="form-group">
                                <textarea class="form-control <?php echo e($errors->has('body') ? 'is-invalid' : ''); ?>" name="body" id="" rows="7"><?php echo e(old('body', $answer->body)); ?></textarea>
                                <?php if($errors->has('body')): ?>
                                <div class="invalid-feedback">
                                    <strong><?php echo e($errors->first('body')); ?></strong>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-outline-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel-Q-A\resources\views/answers/edit.blade.php ENDPATH**/ ?>