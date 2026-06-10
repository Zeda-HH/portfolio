#!/bin/bash
# DataFolio Quick Setup Script

echo "🚀 Setting up DataFolio Portfolio..."

# Check PHP
if ! command -v php &> /dev/null; then
    echo "❌ PHP not found. Please install PHP 8.2+"
    exit 1
fi

# Check Composer
if ! command -v composer &> /dev/null; then
    echo "❌ Composer not found. Install from https://getcomposer.org"
    exit 1
fi

echo "📦 Installing dependencies..."
composer install --no-interaction

echo "🔑 Generating app key..."
cp .env.example .env
php artisan key:generate

echo ""
echo "⚙️  IMPORTANT: Edit .env with your PostgreSQL credentials before continuing"
echo "   DB_DATABASE=portfolio"
echo "   DB_USERNAME=postgres"
echo "   DB_PASSWORD=your_password"
echo ""
read -p "Press Enter when .env is configured..."

echo "🗄️  Running migrations..."
php artisan migrate

echo "🌱 Seeding database..."
php artisan db:seed

echo "🔗 Creating storage link..."
php artisan storage:link

echo ""
echo "✅ Setup complete!"
echo ""
echo "👤 Admin credentials:"
echo "   Email: admin@portfolio.com"
echo "   Password: password"
echo "   ⚠️  Change these in the database immediately!"
echo ""
echo "🌐 Start server: php artisan serve"
echo "   Portfolio: http://localhost:8000"
echo "   Admin: http://localhost:8000/admin/login"
