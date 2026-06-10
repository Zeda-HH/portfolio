<?php $__env->startSection('title', 'Projects'); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
  <p style="color:var(--text-muted);margin:0"><?php echo e($projects->count()); ?> projects total</p>
  <a href="<?php echo e(route('admin.projects.create')); ?>" class="btn-primary-custom"><i class="bi bi-plus-lg"></i> Add Project</a>
</div>
<div class="admin-table">
  <table class="table table-borderless mb-0">
    <thead><tr>
      <th>Title</th><th>Technologies</th><th>Featured</th><th>Order</th><th>Actions</th>
    </tr></thead>
    <tbody>
      <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <tr>
        <td><div style="font-weight:500"><?php echo e($p->title); ?></div><div style="font-size:0.75rem;color:var(--text-muted)"><?php echo e(Str::limit($p->description,60)); ?></div></td>
        <td>
          <div style="display:flex;flex-wrap:wrap;gap:4px">
           <?php $__currentLoopData = array_slice(is_array($p->technologies) ? $p->technologies : (json_decode($p->technologies, true) ?? []), 0, 3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <span class="tech-tag"><?php echo e($t); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </td>
        <td>
          <?php if($p->featured): ?><span style="color:var(--accent-gold)"><i class="bi bi-star-fill"></i></span>
          <?php else: ?><span style="color:var(--text-muted)"><i class="bi bi-star"></i></span><?php endif; ?>
        </td>
        <td style="color:var(--text-muted)"><?php echo e($p->sort_order); ?></td>
        <td>
          <div class="d-flex gap-2">
            <a href="<?php echo e(route('admin.projects.edit', $p)); ?>" class="project-link"><i class="bi bi-pencil"></i></a>
            <form action="<?php echo e(route('admin.projects.destroy', $p)); ?>" method="POST" onsubmit="return confirm('Delete this project?')">
              <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
              <button type="submit" class="project-link" style="border-color:rgba(255,80,80,0.3);color:#ff5050"><i class="bi bi-trash"></i></button>
            </form>
          </div>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <tr><td colspan="5" class="text-center" style="padding:2rem;color:var(--text-muted)">No projects yet. <a href="<?php echo e(route('admin.projects.create')); ?>">Add one</a>.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Zeda\mypp\resources\views/admin/projects/index.blade.php ENDPATH**/ ?>