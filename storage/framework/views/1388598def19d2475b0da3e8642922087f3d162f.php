<answer :answer="<?php echo e($answer); ?>" inline-template>
    <div class="media post">

        <!-- <?php echo $__env->make('shared._vote', ['model' => $answer], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->

        <vote :model="<?php echo e($answer); ?>" name="answer"></vote>

        <!-- <div class="d-flex flex-column vote-controls">
        
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
        </div> -->
        
        <div class="media-body">
            <form v-if="editing" @submit.prevent="update">
                <div class="form-group">
                <textarea rows="10" v-model="body" class="form-control" required></textarea>
                </div>
                <button class="btn btn-primary" :disabled="isInvalid">Update</button>
                <button class="btn btn-outline-secondary" type="button" @click="cancel">Cancel</button>

            </form>
            <div v-else>
            <div v-html="bodyHtml"></div>
                <!-- <?php echo $answer->body_html; ?> -->
                <div class="row">
                    <div class="col-4">
                            <div class="ml-auto">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $answer)): ?>
                            <!-- href="<?php echo e(route('questions.answers.edit', [$question->id, $answer->id])); ?>" -->
                                <a @click.prevent="edit" class="btn btn-sm btn-outline-info">Edit</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $answer)): ?>
                                <!-- <form class="form-delete" action="<?php echo e(route('questions.answers.destroy', [$question->id, $answer->id])); ?>" method="POST">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>                               
                                </form> -->
                                <button class="btn btn-sm btn-outline-danger" @click="destroy">Delete</button>
                            <?php endif; ?>
                            </div>
                    </div>
                    <div class="col-4"></div>

                    <div class="col-4">
                        <user-info :model="<?php echo e($answer); ?>" label="Answered"></user-info>
                    </div>

                </div>
            </div>
        </div>
    </div>
</answer><?php /**PATH C:\xampp\htdocs\Laravel-Q-A\resources\views/answers/_answer.blade.php ENDPATH**/ ?>