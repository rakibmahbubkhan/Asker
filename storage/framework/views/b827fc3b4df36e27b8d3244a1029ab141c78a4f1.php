

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Ask Questions</h2>
                        <div class="ml-auto">
                            <a href="<?php echo e(route( 'questions.index')); ?>" class="btn btn-outline-secondary">back to all questions</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                   <form action="<?php echo e(route('questions.store')); ?>" method="POST">
                       <?php echo csrf_field(); ?>
                       <?php echo $__env->make('questions._form', ['buttonText' => 'Ask Question'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel-Q-A\resources\views/questions/create.blade.php ENDPATH**/ ?>