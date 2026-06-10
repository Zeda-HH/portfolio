/**
 * DataFolio — Admin JavaScript
 */

document.addEventListener('DOMContentLoaded', function () {

  // ─── Sidebar Toggle (Mobile) ───
  const sidebarToggle = document.getElementById('sidebarToggle');
  const sidebar = document.getElementById('adminSidebar');

  if (sidebarToggle && sidebar) {
    sidebarToggle.addEventListener('click', () => {
      sidebar.classList.toggle('show');
    });

    // Close on outside click
    document.addEventListener('click', (e) => {
      if (!sidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
        sidebar.classList.remove('show');
      }
    });
  }

  // ─── Mark messages as read via AJAX ───
  document.querySelectorAll('[data-mark-read]').forEach(btn => {
    btn.addEventListener('click', async function () {
      const id = this.getAttribute('data-mark-read');
      const csrf = document.querySelector('meta[name="csrf-token"]').content;
      try {
        await fetch(`/admin/contacts/${id}/read`, {
          method: 'PATCH',
          headers: { 'X-CSRF-TOKEN': csrf, 'Accept': 'application/json' }
        });
      } catch (e) { /* silently handle */ }
    });
  });

  // ─── Confirm Delete ───
  document.querySelectorAll('[data-confirm-delete]').forEach(form => {
    form.addEventListener('submit', (e) => {
      if (!confirm('Are you sure you want to delete this? This cannot be undone.')) {
        e.preventDefault();
      }
    });
  });

  // ─── Auto-dismiss alerts ───
  const alerts = document.querySelectorAll('.alert:not(.alert-permanent)');
  alerts.forEach(alert => {
    setTimeout(() => {
      if (alert.parentNode) {
        alert.style.opacity = '0';
        alert.style.transition = 'opacity 0.5s';
        setTimeout(() => alert.remove(), 500);
      }
    }, 4000);
  });

});
