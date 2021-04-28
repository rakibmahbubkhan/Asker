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
                        <a title="This Answer is useful" class="vote-up" href=""><i class="fas fa-caret-up fa-3x"></i></a>
                        <span class="votes-count">1280</span>
                        <a title="This Answer is not useful" class="vote-down off" href=""><i class="fas fa-caret-down fa-3x"></i></a>
                        <a title="Mark this answer as best answer" class="<?php echo e($answer->status); ?> mt-2 favourited" href=""> 
                        <i class="fas fa-check fa-2x"></i>
                        <span class="favourites-count">123</span>
                        </a>
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
                        
                    </div>
                </div>
                <hr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div><?php /**PATH C:\xampp\htdocs\Laravel-Q-A\resources\views/answers/_index.blade.php ENDPATH**/ ?>