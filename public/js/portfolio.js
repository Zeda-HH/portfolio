/**
 * DataFolio — Portfolio JavaScript
 */

document.addEventListener('DOMContentLoaded', function () {

  // ─── Theme Toggle ───
  const themeToggle = document.getElementById('themeToggle');
  const themeIcon = document.getElementById('themeIcon');
  const html = document.documentElement;

  const savedTheme = localStorage.getItem('portfolio-theme') || 'dark';
  html.setAttribute('data-theme', savedTheme);
  updateThemeIcon(savedTheme);

  if (themeToggle) {
    themeToggle.addEventListener('click', () => {
      const current = html.getAttribute('data-theme');
      const next = current === 'dark' ? 'light' : 'dark';
      html.setAttribute('data-theme', next);
      localStorage.setItem('portfolio-theme', next);
      updateThemeIcon(next);
    });
  }

  function updateThemeIcon(theme) {
    if (!themeIcon) return;
    themeIcon.className = theme === 'dark' ? 'bi bi-sun-fill' : 'bi bi-moon-fill';
  }

  // ─── Active Nav Link on Scroll ───
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.nav-link');

  function updateActiveNav() {
    let current = '';
    sections.forEach(section => {
      const top = section.offsetTop - 120;
      if (window.scrollY >= top) current = section.getAttribute('id');
    });
    navLinks.forEach(link => {
      link.classList.remove('active');
      if (link.getAttribute('href') === '#' + current) link.classList.add('active');
    });
  }

  window.addEventListener('scroll', updateActiveNav, { passive: true });

  // ─── Navbar scroll shadow ───
  const nav = document.getElementById('mainNav');
  window.addEventListener('scroll', () => {
    if (!nav) return;
    nav.style.boxShadow = window.scrollY > 50 ? '0 4px 24px rgba(0,0,0,0.3)' : 'none';
  }, { passive: true });

  // ─── Counter Animation ───
  function animateCounter(el) {
    const target = parseInt(el.getAttribute('data-count'));
    if (!target) return;
    let current = 0;
    const step = target / 40;
    const timer = setInterval(() => {
      current = Math.min(current + step, target);
      el.textContent = Math.floor(current);
      if (current >= target) clearInterval(timer);
    }, 40);
  }

  const counters = document.querySelectorAll('[data-count]');
  const counterObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateCounter(entry.target);
        counterObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.5 });
  counters.forEach(c => counterObserver.observe(c));

  // ─── Skill Bar Animation ───
  const bars = document.querySelectorAll('.skill-bar-fill');
  const barObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const bar = entry.target;
        const w = bar.getAttribute('data-width');
        setTimeout(() => { bar.style.width = w + '%'; }, 200);
        barObserver.unobserve(bar);
      }
    });
  }, { threshold: 0.3 });
  bars.forEach(b => barObserver.observe(b));

  // ─── Reveal on Scroll ───
  const revealEls = document.querySelectorAll('.reveal-up');
  const revealObserver = new IntersectionObserver(entries => {
    entries.forEach((entry, i) => {
      if (entry.isIntersecting) {
        const el = entry.target;
        const delay = el.closest('.row') ?
          Array.from(el.closest('.row').children).indexOf(el.closest('[class*="col"]')) * 100 : 0;
        setTimeout(() => el.classList.add('revealed'), delay);
        revealObserver.unobserve(el);
      }
    });
  }, { threshold: 0.1 });
  revealEls.forEach(el => revealObserver.observe(el));

  // ─── Contact Form ───
  const contactForm = document.getElementById('contactForm');
  const formAlert = document.getElementById('formAlert');
  const submitBtn = document.getElementById('submitBtn');

  if (contactForm) {
    contactForm.addEventListener('submit', async function (e) {
      e.preventDefault();

      const btnText = submitBtn.querySelector('.btn-text');
      const btnLoading = submitBtn.querySelector('.btn-loading');
      submitBtn.disabled = true;
      btnText.classList.add('d-none');
      btnLoading.classList.remove('d-none');

      const formData = new FormData(contactForm);
      const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

      try {
        const response = await fetch('/contact', {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(Object.fromEntries(formData)),
        });

        const data = await response.json();

        formAlert.className = 'alert';
        if (data.success) {
          formAlert.classList.add('alert-success');
          formAlert.innerHTML = '<i class="bi bi-check-circle-fill me-2"></i>' + data.message;
          contactForm.reset();
        } else {
          formAlert.classList.add('alert-danger');
          formAlert.innerHTML = '<i class="bi bi-exclamation-circle-fill me-2"></i>Something went wrong. Please try again.';
        }
        formAlert.classList.remove('d-none');

        setTimeout(() => formAlert.classList.add('d-none'), 5000);
      } catch (err) {
        formAlert.className = 'alert alert-danger';
        formAlert.innerHTML = '<i class="bi bi-exclamation-circle-fill me-2"></i>Network error. Please try again.';
        formAlert.classList.remove('d-none');
      } finally {
        submitBtn.disabled = false;
        btnText.classList.remove('d-none');
        btnLoading.classList.add('d-none');
      }
    });
  }

  // ─── Smooth Scroll for Nav Links ───
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (!target) return;
      e.preventDefault();

      // Close mobile menu
      const navCollapse = document.getElementById('navMenu');
      if (navCollapse && navCollapse.classList.contains('show')) {
        const bsCollapse = bootstrap.Collapse.getInstance(navCollapse);
        if (bsCollapse) bsCollapse.hide();
      }

      window.scrollTo({ top: target.offsetTop - 80, behavior: 'smooth' });
    });
  });

  // ─── Data Particles (Hero) ───
  const particleContainer = document.getElementById('heroParticles');
  if (particleContainer) {
    for (let i = 0; i < 20; i++) {
      const p = document.createElement('div');
      p.style.cssText = `
        position: absolute;
        width: ${Math.random() * 3 + 1}px;
        height: ${Math.random() * 3 + 1}px;
        background: rgba(6, 182, 212, ${Math.random() * 0.4 + 0.1});
        border-radius: 50%;
        left: ${Math.random() * 100}%;
        top: ${Math.random() * 100}%;
        animation: particleDrift ${Math.random() * 20 + 15}s linear infinite;
        animation-delay: ${Math.random() * -20}s;
      `;
      particleContainer.appendChild(p);
    }

    // Add CSS keyframe for particles
    const style = document.createElement('style');
    style.textContent = `
      @keyframes particleDrift {
        0% { transform: translateY(0) translateX(0); opacity: 0; }
        10% { opacity: 1; }
        90% { opacity: 1; }
        100% { transform: translateY(-100vh) translateX(${(Math.random() - 0.5) * 200}px); opacity: 0; }
      }
    `;
    document.head.appendChild(style);
  }

});
