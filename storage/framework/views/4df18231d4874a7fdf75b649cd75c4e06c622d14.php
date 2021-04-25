

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
                <div class="d-flex flex-column vote-controls">
                    <a title="This Question is useful" class="vote-up" href=""><i class="fas fa-caret-up fa-3x"></i></a>
                    <span class="vote-count">1280</span>
                    <a title="This Question is not useful" class="vote-down off" href=""><i class="fas fa-caret-down fa-3x"></i></a>
                    <a title="Click to mark as favourite question(click again to undo)" class="favourite" href="">
                    <i class="fas fa-star fa-3x"></i>
                    <span class="favourites-count">123</span>
                    </a>


                </div>
                   <div class="media-body">
                   <?php echo $question->body_html; ?>

                   <div class="float-right">
                        <span class="text-muted">Asked by <?php echo e($question->created_date); ?></span>
                        <div class="media mt-2">
                            <a href="<?php echo e($question->user->url); ?>" class="pr-2">
                            <img src="<?php echo e($question->user->avater); ?>" alt="">
                            </a>
                            <div class="media-body mt-1">
                                <a href="<?php echo e($question->user->url); ?>"><?php echo e($question->user->name); ?></a>
                            </div>
                        </div>
                  </div>
                   </div>
                </div>
            </div>
                
            </div>
        </div>
    </div>

    <div class="row mt-4 justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2><?php echo e($question->answers_count." ". Str::plural('Answer',$question->answers_count)); ?></h2>
                    </div><hr>
                    <?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="media">
                        <div class="media-body">
                            
                            <?php echo $answer->body_html; ?>

                            <div class="float-right">
                                <span class="text-muted">Answered <?php echo e($answer->created_date); ?></span>
                                <div class="media mt-2">
                                    <a href="<?php echo e($answer->user->url); ?>" class="pr-2">
                                    <img src="<?php echo e($answer->user->avater); ?>" alt="">
                                    </a>
                                    <div class="media-body mt-1">
                                        <a href="<?php echo e($answer->user->url); ?>"><?php echo e($answer->user->name); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel-Q-A\resources\views/questions/show.blade.php ENDPATH**/ ?>