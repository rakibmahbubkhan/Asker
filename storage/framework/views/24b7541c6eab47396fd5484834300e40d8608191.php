<?php echo csrf_field(); ?>
<div class="form-group">
                           <label for="question-title">Title</label>
                           <input type="text" name="title" value="<?php echo e(old('title', $question->title)); ?>" id="question-title" class="form-control <?php echo e($errors->has('title') ? 'is-invalid' : ''); ?>">
                           <?php if($errors->has('title')): ?>
                            <div class="invalid-feedback">
                                <strong><?php echo e($errors->first('title')); ?></strong>
                            </div>
                           <?php endif; ?>
                       </div>
                       <div class="form-group">
                           <label for="question-body">Description</label>
                           <textarea name="body" id="question-body" cols="30" rows="10" class="form-control <?php echo e($errors->has('body') ? 'is-invalid' : ''); ?>"><?php echo e(old('body',$question->body)); ?></textarea>
                           <?php if($errors->has('body')): ?>
                            <div class="invalid-feedback">
                                <strong><?php echo e($errors->first('body')); ?></strong>
                            </div>
                           <?php endif; ?>
                       </div>
                       <div class="form-group">
                           <button type="submit" class="btn btn-outline-primary btn-lg"><?php echo e($buttonText); ?></button>
                       </div><?php /**PATH C:\xampp\htdocs\Laravel-Q-A\resources\views/questions/_form.blade.php ENDPATH**/ ?>