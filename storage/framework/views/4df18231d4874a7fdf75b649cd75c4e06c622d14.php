

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <div class="d-flex align-items-center">
                        <h2><?php echo e($question->title); ?></h2>
                        <div class="ml-auto">
                            <a href="<?php echo e(route( 'questions.index')); ?>" class="btn btn-outline-secondary">back to all questions</a>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="media">
                <!-- <?php echo $__env->make('shared._vote', [
                'model' => $question
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
                <vote :model="<?php echo e($question); ?>" name="question"></vote>


                   <div class="media-body">
                   <?php echo $question->body_html; ?>

                   <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4"></div>
                        <div class="col-4">
                            <user-info :model="<?php echo e($question); ?>" label="Asked"></user-info>
                        </div>
                   </div>
                   
                   </div>
                </div>

            </div>
                
            </div>
        </div>
    </div>
    
    <!-- <answers :answers="<?php echo e($question->answers); ?>" :count="<?php echo e($question->answers_count); ?>"></answers> -->
    <answers :question="<?php echo e($question); ?>"></answers>

    <?php echo $__env->make('answers._create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel-Q-A\resources\views/questions/show.blade.php ENDPATH**/ ?>