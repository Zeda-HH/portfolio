<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand" href="{{ route('portfolio') }}">DA<span>.</span>Portfolio</a>
    <div class="d-flex align-items-center gap-2 d-lg-none">
      <button class="theme-toggle" id="themeToggleMobile" title="Toggle theme"><i class="bi bi-sun"></i></button>
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" style="color:var(--text-secondary)">
        <i class="bi bi-list fs-4"></i>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto align-items-lg-center gap-1">
        <li class="nav-item"><a class="nav-link" href="#hero">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#certificates">Certificates</a></li>
        <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        <li class="nav-item ms-lg-2">
          <button class="theme-toggle d-none d-lg-flex" id="themeToggle" title="Toggle theme"><i class="bi bi-sun"></i></button>
        </li>
      </ul>
    </div>
  </div>
</nav>
