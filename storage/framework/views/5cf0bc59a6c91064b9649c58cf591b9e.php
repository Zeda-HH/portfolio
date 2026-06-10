<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>

<div class="row g-3 mb-4">
  <div class="col-6 col-lg-3">
    <div class="stat-card">
      <div class="stat-icon" style="background:rgba(0,212,255,0.1);color:var(--accent-cyan)"><i class="bi bi-folder2-open"></i></div>
      <div>
        <div class="stat-num"><?php echo e($stats['projects']); ?></div>
        <div class="stat-label">Projects</div>
      </div>
    </div>
  </div>
  <div class="col-6 col-lg-3">
    <div class="stat-card">
      <div class="stat-icon" style="background:rgba(255,209,102,0.1);color:var(--accent-gold)"><i class="bi bi-patch-check"></i></div>
      <div>
        <div class="stat-num"><?php echo e($stats['certificates']); ?></div>
        <div class="stat-label">Certificates</div>
      </div>
    </div>
  </div>
  <div class="col-6 col-lg-3">
    <div class="stat-card">
      <div class="stat-icon" style="background:rgba(124,92,191,0.1);color:var(--accent-purple)"><i class="bi bi-lightning-charge"></i></div>
      <div>
        <div class="stat-num"><?php echo e($stats['skills']); ?></div>
        <div class="stat-label">Skills</div>
      </div>
    </div>
  </div>
  <div class="col-6 col-lg-3">
    <div class="stat-card">
      <div class="stat-icon" style="background:rgba(0,212,100,0.1);color:#00d464"><i class="bi bi-chat-text"></i></div>
      <div>
        <div class="stat-num"><?php echo e($stats['messages']); ?></div>
        <div class="stat-label">Messages <span style="font-size:0.7rem;color:var(--accent-cyan)">(<?php echo e($stats['unread']); ?> new)</span></div>
      </div>
    </div>
  </div>
</div>

<div class="row g-3">
  <div class="col-lg-8">
    <div class="admin-card">
      <div class="d-flex align-items-center justify-content-between mb-3">
        <h3 style="font-size:1rem;font-weight:600;margin:0">Recent Messages</h3>
        <a href="<?php echo e(route('admin.messages.index')); ?>" class="project-link">View All</a>
      </div>
      <?php $__empty_1 = true; $__currentLoopData = $recentMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <div style="padding:0.875rem 0;border-bottom:1px solid var(--border-color);display:flex;align-items:center;gap:1rem">
        <div style="width:36px;height:36px;border-radius:50%;background:rgba(0,212,255,0.1);display:flex;align-items:center;justify-content:center;flex-shrink:0;color:var(--accent-cyan);font-size:0.9rem">
          <?php echo e(strtoupper(substr($msg->name, 0, 1))); ?>

        </div>
        <div style="flex:1;min-width:0">
          <div style="font-size:0.875rem;font-weight:500;color:var(--text-primary)">
            <?php echo e($msg->name); ?>

            <?php if(!$msg->read): ?><span class="badge-unread">New</span><?php endif; ?>
          </div>
          <div style="font-size:0.75rem;color:var(--text-muted);overflow:hidden;text-overflow:ellipsis;white-space:nowrap"><?php echo e($msg->subject); ?></div>
        </div>
        <div style="font-size:0.7rem;color:var(--text-muted);white-space:nowrap"><?php echo e($msg->created_at->diffForHumans()); ?></div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p style="color:var(--text-muted);font-size:0.875rem;text-align:center;padding:2rem 0">No messages yet.</p>
      <?php endif; ?>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="admin-card">
      <h3 style="font-size:1rem;font-weight:600;margin-bottom:1rem">Quick Actions</h3>
      <div class="d-flex flex-column gap-2">
        <a href="<?php echo e(route('admin.projects.create')); ?>" class="btn-outline-custom justify-content-start"><i class="bi bi-plus-circle"></i> Add Project</a>
        <a href="<?php echo e(route('admin.certificates.create')); ?>" class="btn-outline-custom justify-content-start"><i class="bi bi-plus-circle"></i> Add Certificate</a>
        <a href="<?php echo e(route('admin.skills.index')); ?>" class="btn-outline-custom justify-content-start"><i class="bi bi-lightning-charge"></i> Manage Skills</a>
        <a href="<?php echo e(route('portfolio')); ?>" class="btn-outline-custom justify-content-start" target="_blank"><i class="bi bi-eye"></i> Preview Site</a>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Zeda\mypp\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>