<?php $__env->startSection('title', 'Certificates'); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
  <p style="color:var(--text-muted);margin:0"><?php echo e($certificates->count()); ?> certificates</p>
  <a href="<?php echo e(route('admin.certificates.create')); ?>" class="btn-primary-custom"><i class="bi bi-plus-lg"></i> Add Certificate</a>
</div>
<div class="admin-table">
  <table class="table table-borderless mb-0">
    <thead><tr><th>Title</th><th>Issuer</th><th>Issued</th><th>Actions</th></tr></thead>
    <tbody>
      <?php $__empty_1 = true; $__currentLoopData = $certificates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <tr>
        <td style="font-weight:500"><?php echo e($c->title); ?></td>
        <td><span style="color:var(--accent-gold);font-size:0.85rem"><?php echo e($c->issuer); ?></span></td>
        <td style="color:var(--text-muted);font-size:0.85rem"><?php echo e($c->issued_date ? $c->issued_date->format('M Y') : '—'); ?></td>
        <td>
          <div class="d-flex gap-2">
            <a href="<?php echo e(route('admin.certificates.edit', $c)); ?>" class="project-link"><i class="bi bi-pencil"></i></a>
            <form action="<?php echo e(route('admin.certificates.destroy', $c)); ?>" method="POST" onsubmit="return confirm('Delete?')">
              <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
              <button type="submit" class="project-link" style="border-color:rgba(255,80,80,0.3);color:#ff5050"><i class="bi bi-trash"></i></button>
            </form>
          </div>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <tr><td colspan="4" class="text-center" style="padding:2rem;color:var(--text-muted)">No certificates. <a href="<?php echo e(route('admin.certificates.create')); ?>">Add one</a>.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Zeda\mypp\resources\views/admin/certificates/index.blade.php ENDPATH**/ ?>