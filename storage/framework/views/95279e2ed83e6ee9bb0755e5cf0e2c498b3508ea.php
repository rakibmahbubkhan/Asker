<div class="row mt-4 justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2><?php echo e($answersCount." ". Str::plural('Answer', $answersCount)); ?></h2>
                </div><hr>
                <?php echo $__env->make('layouts._messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="media">
                    <div class="d-flex flex-column vote-controls">
                    
                    <a title="This answer is useful" 
                                class="vote-up <?php echo e(Auth::guest() ? 'off' : ''); ?>"
                                onclick="event.preventDefault(); document.getElementById('up-vote-answer-<?php echo e($answer->id); ?>').submit();"
                                >
                                <i class="fas fa-caret-up fa-3x"></i>
                            </a>
                            <form id="up-vote-answer-<?php echo e($answer->id); ?>" action="../answers/<?php echo e($answer->id); ?>/vote" method="POST" style="display:none;">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="vote" value="1">
                            </form>

                            <span class="votes-count"><?php echo e($answer->votes_count); ?></span>

                            <a title="This answer is not useful" 
                                class="vote-down <?php echo e(Auth::guest() ? 'off' : ''); ?>"
                                onclick="event.preventDefault(); document.getElementById('down-vote-answer-<?php echo e($answer->id); ?>').submit();"
                                >
                                <i class="fas fa-caret-down fa-3x"></i>
                            </a>
                            <form id="down-vote-answer-<?php echo e($answer->id); ?>" action="../answers/<?php echo e($answer->id); ?>/vote" method="POST" style="display:none;">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="vote" value="-1">
                            </form>

                    
                    </div>
                <div class="media-body">
                    <?php echo $answer->body_html; ?>

                    <div class="row">
                    <div class="col-4">
                            <div class="ml-auto">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $answer)): ?>
                                <a href="<?php echo e(route('questions.answers.edit', [$question->id, $answer->id])); ?>" class="btn btn-sm btn-outline-info">Edit</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $answer)): ?>
                                <form class="form-delete" action="<?php echo e(route('questions.answers.destroy', [$question->id, $answer->id])); ?>" method="POST">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            <?php endif; ?>
                            </div>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4">
                    
                        <?php echo $__env->make('shared._author', [
                        'model' => $answer,
                        'label' => 'answered'
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        
                    </div>
                    </div>
                    
                </div>
            </div>
            <hr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\Laravel-Q-A\resources\views/answers/_index.blade.php ENDPATH**/ ?>