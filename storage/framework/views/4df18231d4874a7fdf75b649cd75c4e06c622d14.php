

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
                
                    <a title="This Question is useful" class="vote-up <?php echo e(Auth::guest() ? 'off' : ''); ?>" onclick="event.preventDefault(); document.getElementById('up-vote-question-<?php echo e($question->id); ?>').submit()" href="">
                        <i class="fas fa-caret-up fa-3x"></i></a>
                        <form id="up-vote-question-<?php echo e($question->id); ?>" action="<?php echo e($question->id); ?>/vote" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="vote" value="1">
                    </form>

                    <span class="votes-count"><?php echo e($question->votes_count); ?></span>

                    <a title="This Question is not useful" class="vote-down <?php echo e(Auth::guest() ? 'off' : ''); ?>" onclick="event.preventDefault(); document.getElementById('down-vote-question-<?php echo e($question->id); ?>').submit()" href="">
                        <i class="fas fa-caret-down fa-3x"></i>
                    </a>
                    <form id="down-vote-question-<?php echo e($question->id); ?>" action="<?php echo e($question->id); ?>/vote" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="vote" value="-1">
                    </form>

                    <a title="Click to mark as favourite question (Click again to undo)" 
                                class="favourite mt-2 <?php echo e(Auth::guest() ? 'off' : ($question->is_favourited ? 'favourited' : '')); ?>" onclick="event.preventDefault(); document.getElementById('favourite-question-<?php echo e($question->id); ?>').submit()"
                                >
                    <i class="fas fa-star fa-2x"></i>
                    <span class="favourites-count"><?php echo e($question->favourites_count); ?></span>
                    </a>

                    <form id="favourite-question-<?php echo e($question->id); ?>" action="<?php echo e($question->id); ?>/favourites" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                        <?php if($question->is_favourited): ?>
                            <?php echo method_field('DELETE'); ?>
                        <?php endif; ?>
                    </form>
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
    <?php echo $__env->make('answers._index', [
        'answers' => $question->answers,
        'answersCount' => $question->answers_count,
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('answers._create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel-Q-A\resources\views/questions/show.blade.php ENDPATH**/ ?>