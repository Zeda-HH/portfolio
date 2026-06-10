/* Portfolio App JS */

document.addEventListener('DOMContentLoaded', function () {

  /* ---- THEME TOGGLE ---- */
  const themeToggle = document.getElementById('themeToggle');
  const html = document.documentElement;
  const savedTheme = localStorage.getItem('theme') || 'dark';

  function setTheme(t) {
    html.setAttribute('data-theme', t);
    localStorage.setItem('theme', t);
    const icon = themeToggle?.querySelector('i');
    if (icon) {
      icon.className = t === 'dark' ? 'bi bi-sun' : 'bi bi-moon-stars';
    }
  }

  setTheme(savedTheme);

  themeToggle?.addEventListener('click', () => {
    setTheme(html.getAttribute('data-theme') === 'dark' ? 'light' : 'dark');
  });

  /* ---- NAVBAR ACTIVE LINK on scroll ---- */
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.nav-link[href^="#"]');

  function updateNav() {
    let cur = '';
    sections.forEach(s => {
      if (window.scrollY >= s.offsetTop - 100) cur = s.id;
    });
    navLinks.forEach(l => {
      l.classList.toggle('active', l.getAttribute('href') === '#' + cur);
    });
  }

  window.addEventListener('scroll', updateNav, { passive: true });

  /* ---- SCROLL ANIMATIONS ---- */
  const fadeEls = document.querySelectorAll('.fade-up');
  const obs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('visible');
        obs.unobserve(e.target);
      }
    });
  }, { threshold: 0.12 });

  fadeEls.forEach(el => obs.observe(el));

  /* ---- SKILL BAR ANIMATION ---- */
  const skillObs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.querySelectorAll('.skill-fill').forEach(bar => {
          bar.style.width = bar.dataset.pct + '%';
        });
        skillObs.unobserve(e.target);
      }
    });
  }, { threshold: 0.3 });

  const skillSection = document.querySelector('.skills-wrap');
  if (skillSection) skillObs.observe(skillSection);

  /* ---- CONTACT FORM ---- */
  const contactForm = document.getElementById('contactForm');
  if (contactForm) {
    const btn = contactForm.querySelector('[type="submit"]');
    contactForm.addEventListener('submit', function () {
      if (btn) {
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Sending...';
      }
    });
  }

  /* ---- AUTO-DISMISS ALERTS ---- */
  document.querySelectorAll('.auto-dismiss').forEach(el => {
    setTimeout(() => {
      el.style.opacity = '0';
      el.style.transition = 'opacity 0.5s';
      setTimeout(() => el.remove(), 500);
    }, 4000);
  });

  /* ---- MOBILE SIDEBAR TOGGLE (admin) ---- */
  const sidebarToggle = document.getElementById('sidebarToggle');
  const sidebar = document.querySelector('.admin-sidebar');

  sidebarToggle?.addEventListener('click', () => {
    sidebar?.classList.toggle('open');
  });

  document.addEventListener('click', e => {
    if (sidebar?.classList.contains('open') &&
        !sidebar.contains(e.target) &&
        e.target !== sidebarToggle) {
      sidebar.classList.remove('open');
    }
  });

  /* ---- TYPED EFFECT (hero) ---- */
  const typedEl = document.getElementById('typedText');
  if (typedEl) {
    const roles = ['Data Analyst', 'BI Developer', 'Python Enthusiast', 'SQL Expert'];
    let ri = 0, ci = 0, deleting = false;

    function type() {
      const cur = roles[ri];
      typedEl.textContent = deleting ? cur.substring(0, ci--) : cur.substring(0, ci++);

      let delay = deleting ? 60 : 110;
      if (!deleting && ci > cur.length) { delay = 1800; deleting = true; }
      else if (deleting && ci < 0)      { deleting = false; ri = (ri + 1) % roles.length; delay = 300; }

      setTimeout(type, delay);
    }
    type();
  }

  /* ---- SMOOTH SCROLL for anchor links ---- */
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      const target = document.querySelector(a.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  /* ---- COUNTER ANIMATION (hero stats) ---- */
  function animateCounter(el) {
    const target = parseInt(el.dataset.target);
    const dur = 1500;
    const step = target / (dur / 16);
    let cur = 0;
    const tick = () => {
      cur = Math.min(cur + step, target);
      el.textContent = Math.floor(cur) + (el.dataset.suffix || '');
      if (cur < target) requestAnimationFrame(tick);
    };
    requestAnimationFrame(tick);
  }

  const counterObs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.querySelectorAll('[data-target]').forEach(animateCounter);
        counterObs.unobserve(e.target);
      }
    });
  }, { threshold: 0.5 });

  const heroStats = document.querySelector('.hero-stats');
  if (heroStats) counterObs.observe(heroStats);

});
