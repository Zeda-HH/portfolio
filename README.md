# Data Analyst Portfolio — Laravel 12 + PostgreSQL

A modern, responsive personal portfolio website for a Data Analyst, built with Laravel 12, PostgreSQL, Bootstrap 5, and deployed on Railway.

---

## 🚀 Features

- **Portfolio Homepage** — Hero section, About with animated skill bars, Certificates, Projects, Contact form
- **Dark/Light Theme** — Toggle with localStorage persistence
- **Admin Panel** — Secure CRUD management for Projects, Certificates, Skills, Messages
- **PostgreSQL** — Full migrations, models, and seeders
- **Railway Ready** — One-click deployment with PostgreSQL integration

---

## 📋 Tech Stack

| Layer | Technology |
|---|---|
| Backend | Laravel 12 (PHP 8.2+) |
| Database | PostgreSQL |
| Frontend | Bootstrap 5, Vanilla JS |
| Fonts | Space Grotesk + Inter (Google Fonts) |
| Icons | Bootstrap Icons |
| Deployment | Railway |

---

## ⚙️ Local Setup

### Prerequisites
- PHP 8.2+
- Composer
- PostgreSQL (or use SQLite for quick start)
- Node.js (optional, for assets)

### 1. Clone & Install

```bash
git clone https://github.com/yourusername/portfolio.git
cd portfolio
composer install
cp .env.example .env
php artisan key:generate
```

### 2. Configure Database

Edit `.env` for local PostgreSQL:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=portfolio
DB_USERNAME=postgres
DB_PASSWORD=your_password
```

Or use SQLite for quick local testing:

```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database/database.sqlite
```

### 3. Migrate & Seed

```bash
php artisan migrate
php artisan db:seed
```

Default admin credentials (change in .env before seeding):
- Email: `admin@portfolio.com`
- Password: `Admin@123456`

### 4. Run

```bash
php artisan storage:link
php artisan serve
```

Visit `http://localhost:8000`  
Admin panel: `http://localhost:8000/admin/login`

---

## 🚂 Railway Deployment

### Step 1: Push to GitHub

```bash
git init
git add .
git commit -m "Initial portfolio"
git remote add origin https://github.com/yourusername/portfolio.git
git push -u origin main
```

### Step 2: Create Railway Project

1. Go to [railway.app](https://railway.app)
2. Click **New Project** → **Deploy from GitHub Repo**
3. Select your repository
4. Add a **PostgreSQL** service to the project

### Step 3: Set Environment Variables

In Railway dashboard → your app service → Variables:

```
APP_KEY=base64:your-generated-key-here
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-app.railway.app
ADMIN_EMAIL=your@email.com
ADMIN_PASSWORD=YourSecurePassword123!
```

> The `DB_*` variables are automatically injected by Railway's PostgreSQL service.

### Step 4: Generate APP_KEY

Run this locally and copy the output:
```bash
php artisan key:generate --show
```

---

## 📁 Project Structure

```
portfolio/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── PortfolioController.php     # Public portfolio
│   │   │   ├── AuthController.php          # Admin login/logout
│   │   │   └── Admin/
│   │   │       ├── DashboardController.php
│   │   │       ├── ProjectController.php
│   │   │       ├── CertificateController.php
│   │   │       ├── SkillController.php
│   │   │       └── MessageController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   └── Models/
│       ├── User.php, Skill.php, Certificate.php
│       ├── Project.php, Contact.php
├── database/
│   ├── migrations/       # All 5 tables
│   └── seeders/          # Demo data seeder
├── public/
│   ├── css/app.css       # Custom styles (dark/light theme)
│   ├── js/app.js         # Theme toggle, animations, scroll
│   ├── images/           # Place profile.jpg here
│   └── cv/               # Place resume.pdf here
├── resources/views/
│   ├── layouts/          # app.blade.php, admin.blade.php
│   ├── partials/         # navbar.blade.php, footer.blade.php
│   ├── portfolio/        # index.blade.php (main page)
│   ├── auth/             # login.blade.php
│   └── admin/            # dashboard, projects, certificates, skills, messages
├── routes/web.php
├── railway.toml          # Railway deployment config
└── nixpacks.toml         # Build configuration
```

---

## 🎨 Customization

### Personal Info
Update these in `resources/views/portfolio/index.blade.php`:
- Your name (search "Your Name")
- Bio paragraphs
- Phone number, email, GitHub, LinkedIn URLs

### Profile Photo
Place your photo at `public/images/profile.jpg` and update the hero section:
```blade
{{-- Replace placeholder with: --}}
<img src="{{ asset('images/profile.jpg') }}" class="hero-avatar" alt="Your Name">
```

### CV/Resume
Place your PDF at `public/cv/resume.pdf`

### Colors
Edit CSS variables in `public/css/app.css` under `:root`:
```css
--accent-cyan: #00d4ff;   /* Primary accent */
--accent-gold: #ffd166;   /* Secondary accent */
```

---

## 🔐 Admin Panel

| URL | Description |
|---|---|
| `/admin/login` | Login page |
| `/admin/dashboard` | Overview & stats |
| `/admin/projects` | Manage projects |
| `/admin/certificates` | Manage certificates |
| `/admin/skills` | Manage skill bars |
| `/admin/messages` | View contact messages |

---

## 📄 License

MIT — free for personal and commercial use.
