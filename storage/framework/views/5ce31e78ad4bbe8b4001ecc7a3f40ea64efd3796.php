<div class="row mt-4 justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3>Your Answer</h3>
                    </div>
                    <hr>
                    <form action="<?php echo e(route('questions.answers.store', $question->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <textarea class="form-control <?php echo e($errors->has('body') ? 'is-invalid' : ''); ?>" name="body" id="" rows="7"></textarea>
                            <?php if($errors->has('body')): ?>
                            <div class="invalid-feedback">
                                <strong><?php echo e($errors->first('body')); ?></strong>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-outline-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><?php /**PATH C:\xampp\htdocs\Laravel-Q-A\resources\views/answers/_create.blade.php ENDPATH**/ ?>