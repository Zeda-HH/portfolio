<?php $__env->startSection('title', isset($project->id) ? 'Edit Project' : 'Add Project'); ?>
<?php $__env->startSection('content'); ?>
<div style="max-width:720px">
  <a href="<?php echo e(route('admin.projects.index')); ?>" class="project-link mb-4 d-inline-flex"><i class="bi bi-arrow-left"></i> Back</a>
  <div class="admin-card mt-3">
    <form action="<?php echo e(isset($project->id) ? route('admin.projects.update', $project) : route('admin.projects.store')); ?>" method="POST">
      <?php echo csrf_field(); ?>
      <?php if(isset($project->id)): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>
      <div class="row g-3">
        <div class="col-12">
          <label class="form-label">Project Title *</label>
          <input type="text" name="title" class="form-control" value="<?php echo e(old('title', $project->title)); ?>" required>
          <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div style="color:#ff5050;font-size:0.8rem;margin-top:4px"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="col-12">
          <label class="form-label">Description *</label>
          <textarea name="description" class="form-control" rows="4" required><?php echo e(old('description', $project->description)); ?></textarea>
        </div>
        <div class="col-12">
          <label class="form-label">Technologies (comma-separated)</label>
          <input type="text" name="technologies_input" class="form-control"
                 value="<?php echo e(old('technologies_input', is_array($project->technologies) ? implode(', ', $project->technologies) : '')); ?>"
                 placeholder="Power BI, SQL, Excel, Python">
        </div>
        <div class="col-md-6">
          <label class="form-label">GitHub URL</label>
          <input type="url" name="github_url" class="form-control" value="<?php echo e(old('github_url', $project->github_url)); ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">LinkedIn/Showcase URL</label>
          <input type="url" name="linkedin_url" class="form-control" value="<?php echo e(old('linkedin_url', $project->linkedin_url)); ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">Live URL (optional)</label>
          <input type="url" name="live_url" class="form-control" value="<?php echo e(old('live_url', $project->live_url)); ?>">
        </div>
        <div class="col-md-3">
          <label class="form-label">Sort Order</label>
          <input type="number" name="sort_order" class="form-control" value="<?php echo e(old('sort_order', $project->sort_order ?? 0)); ?>">
        </div>
        <div class="col-md-3 d-flex align-items-end">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="featured" value="1" id="featured"
                   <?php echo e(old('featured', $project->featured) ? 'checked' : ''); ?>

                   style="background-color:var(--bg-secondary);border-color:var(--border-color)">
            <label class="form-check-label" for="featured" style="color:var(--text-secondary);font-size:0.875rem">Featured</label>
          </div>
        </div>
        <div class="col-12 d-flex gap-3 pt-2">
          <button type="submit" class="btn-primary-custom">
            <i class="bi bi-check-lg"></i> <?php echo e(isset($project->id) ? 'Update' : 'Create'); ?> Project
          </button>
          <a href="<?php echo e(route('admin.projects.index')); ?>" class="btn-outline-custom">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Zeda\mypp\resources\views/admin/projects/form.blade.php ENDPATH**/ ?>