<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login — Portfolio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="login-wrapper">
  <div class="hero-grid-bg"></div>
  <div class="login-card">
    <div class="text-center mb-4">
      <div style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:1.5rem;color:var(--accent-cyan)">
        DA<span style="color:var(--accent-gold)">.</span>Admin
      </div>
      <p style="color:var(--text-muted);font-size:0.875rem;margin-top:0.5rem">Sign in to manage your portfolio</p>
    </div>

    @if($errors->any())
      <div class="alert-custom alert-danger-custom mb-3">
        <i class="bi bi-exclamation-triangle me-2"></i>{{ $errors->first() }}
      </div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label class="form-label">Email Address</label>
        <input type="email" name="email" class="form-control" placeholder="admin@portfolio.com"
               value="{{ old('email') }}" required autofocus>
      </div>
      <div class="mb-4">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
      </div>
      <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="remember" id="remember"
                 style="background-color:var(--bg-secondary);border-color:var(--border-color)">
          <label class="form-check-label" for="remember" style="font-size:0.85rem;color:var(--text-secondary)">
            Remember me
          </label>
        </div>
      </div>
      <button type="submit" class="btn-primary-custom w-100 justify-content-center">
        <i class="bi bi-shield-lock"></i> Sign In
      </button>
    </form>

    <div class="text-center mt-4">
      <a href="{{ route('portfolio') }}" style="font-size:0.8rem;color:var(--text-muted)">
        <i class="bi bi-arrow-left me-1"></i>Back to Portfolio
      </a>
    </div>
  </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
