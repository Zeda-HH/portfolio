<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $__env->yieldContent('title', 'Admin'); ?> — Portfolio Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
  <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>

  <!-- Sidebar -->
  <aside class="admin-sidebar">
    <div class="admin-sidebar-brand">
      <i class="bi bi-bar-chart-line me-2"></i>Port<span>folio</span>
    </div>
    <nav class="flex-grow-1 py-2">
      <a href="<?php echo e(route('admin.dashboard')); ?>" class="admin-nav-link <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
        <i class="bi bi-grid-1x2"></i> Dashboard
      </a>
      <a href="<?php echo e(route('admin.projects.index')); ?>" class="admin-nav-link <?php echo e(request()->routeIs('admin.projects*') ? 'active' : ''); ?>">
        <i class="bi bi-folder2-open"></i> Projects
      </a>
      <a href="<?php echo e(route('admin.certificates.index')); ?>" class="admin-nav-link <?php echo e(request()->routeIs('admin.certificates*') ? 'active' : ''); ?>">
        <i class="bi bi-patch-check"></i> Certificates
      </a>
      <a href="<?php echo e(route('admin.skills.index')); ?>" class="admin-nav-link <?php echo e(request()->routeIs('admin.skills*') ? 'active' : ''); ?>">
        <i class="bi bi-lightning-charge"></i> Skills
      </a>
      <a href="<?php echo e(route('admin.messages.index')); ?>" class="admin-nav-link <?php echo e(request()->routeIs('admin.messages*') ? 'active' : ''); ?>">
        <i class="bi bi-chat-text"></i> Messages
        <?php $unread = \App\Models\Contact::where('read', false)->count(); ?>
        <?php if($unread > 0): ?><span class="badge-unread"><?php echo e($unread); ?></span><?php endif; ?>
      </a>
      <div style="margin-top:1rem; border-top:1px solid var(--border-color); padding-top:0.5rem;">
        <a href="<?php echo e(route('portfolio')); ?>" class="admin-nav-link" target="_blank">
          <i class="bi bi-box-arrow-up-right"></i> View Portfolio
        </a>
      </div>
    </nav>
    <div style="padding:1rem 1.5rem; border-top:1px solid var(--border-color);">
      <div style="font-size:0.75rem; color:var(--text-muted); margin-bottom:0.5rem;">
        Signed in as <strong style="color:var(--text-secondary)"><?php echo e(auth()->user()->name); ?></strong>
      </div>
      <form action="<?php echo e(route('logout')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <button type="submit" class="admin-nav-link w-100 text-start" style="background:none;border:none;padding:0.5rem 0;cursor:pointer;">
          <i class="bi bi-box-arrow-left"></i> Logout
        </button>
      </form>
    </div>
  </aside>

  <!-- Main Content -->
  <div class="admin-content">
    <div class="admin-topbar">
      <div class="d-flex align-items-center gap-3">
        <button class="btn btn-sm d-md-none" id="sidebarToggle" style="color:var(--text-secondary);background:none;border:1px solid var(--border-color)">
          <i class="bi bi-list fs-5"></i>
        </button>
        <h1 class="mb-0" style="font-size:1.1rem;font-weight:600;"><?php echo $__env->yieldContent('title', 'Dashboard'); ?></h1>
      </div>
      <div class="d-flex align-items-center gap-2">
        <button class="theme-toggle" id="themeToggle" title="Toggle theme">
          <i class="bi bi-sun"></i>
        </button>
      </div>
    </div>

    <div class="admin-main">
      <?php if(session('success')): ?>
        <div class="alert-custom alert-success-custom mb-3 auto-dismiss">
          <i class="bi bi-check-circle me-2"></i><?php echo e(session('success')); ?>

        </div>
      <?php endif; ?>
      <?php if(session('error')): ?>
        <div class="alert-custom alert-danger-custom mb-3 auto-dismiss">
          <i class="bi bi-exclamation-circle me-2"></i><?php echo e(session('error')); ?>

        </div>
      <?php endif; ?>

      <?php echo $__env->yieldContent('content'); ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo e(asset('js/app.js')); ?>"></script>
  <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\Zeda\mypp\resources\views/layouts/admin.blade.php ENDPATH**/ ?>