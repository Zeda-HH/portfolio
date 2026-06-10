<?php $__env->startSection('title', 'Messages'); ?>
<?php $__env->startSection('content'); ?>
<div class="admin-table">
  <table class="table table-borderless mb-0">
    <thead><tr><th>From</th><th>Subject</th><th>Date</th><th>Status</th><th>Actions</th></tr></thead>
    <tbody>
      <?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <tr style="<?php echo e(!$msg->read ? 'background:rgba(0,212,255,0.03)' : ''); ?>">
        <td>
          <div style="font-weight:<?php echo e($msg->read ? '400' : '600'); ?>"><?php echo e($msg->name); ?></div>
          <div style="font-size:0.75rem;color:var(--text-muted)"><?php echo e($msg->email); ?></div>
        </td>
        <td style="font-weight:<?php echo e($msg->read ? '400' : '600'); ?>"><?php echo e($msg->subject); ?></td>
        <td style="color:var(--text-muted);font-size:0.8rem;white-space:nowrap"><?php echo e($msg->created_at->format('d M Y')); ?></td>
        <td>
          <?php if(!$msg->read): ?><span style="font-size:0.7rem;font-weight:700;color:var(--accent-cyan);background:rgba(0,212,255,0.1);padding:0.2rem 0.6rem;border-radius:100px">New</span>
          <?php else: ?><span style="font-size:0.7rem;color:var(--text-muted)">Read</span><?php endif; ?>
        </td>
        <td>
          <div class="d-flex gap-2">
            <a href="<?php echo e(route('admin.messages.show', $msg)); ?>" class="project-link primary"><i class="bi bi-eye"></i></a>
            <form action="<?php echo e(route('admin.messages.destroy', $msg)); ?>" method="POST" onsubmit="return confirm('Delete?')">
              <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
              <button type="submit" class="project-link" style="border-color:rgba(255,80,80,0.3);color:#ff5050"><i class="bi bi-trash"></i></button>
            </form>
          </div>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <tr><td colspan="5" class="text-center" style="padding:3rem;color:var(--text-muted)">
        <i class="bi bi-inbox" style="font-size:2rem;display:block;margin-bottom:0.5rem;opacity:0.4"></i>No messages yet.
      </td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
<div class="mt-3"><?php echo e($messages->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Zeda\mypp\resources\views/admin/messages/index.blade.php ENDPATH**/ ?>