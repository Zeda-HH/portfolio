<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Skill;
use App\Models\Certificate;
use App\Models\Project;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Portfolio Admin',
            'email' => env('ADMIN_EMAIL', 'admin@portfolio.com'),
            'password' => Hash::make(env('ADMIN_PASSWORD', 'Admin@123456')),
            'is_admin' => true,
        ]);

        // Seed skills
        $skills = [
            ['name' => 'SQL', 'percentage' => 90, 'icon' => 'database', 'sort_order' => 1],
            ['name' => 'Excel', 'percentage' => 95, 'icon' => 'table', 'sort_order' => 2],
            ['name' => 'Power BI', 'percentage' => 90, 'icon' => 'bar-chart', 'sort_order' => 3],
            ['name' => 'Python (NumPy, Pandas, Matplotlib)', 'percentage' => 85, 'icon' => 'code', 'sort_order' => 4],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        // Seed certificates
        $certificates = [
            [
                'title' => 'ALX Data Analytics Certified',
                'issuer' => 'ALX Africa',
                'description' => 'Comprehensive data analytics program covering SQL, Python, Excel, and business intelligence tools including Power BI and Tableau.',
                'issued_date' => '2023-12-01',
                'sort_order' => 1,
            ],
            [
                'title' => 'Udacity Data Analytics Foundation',
                'issuer' => 'Udacity',
                'description' => 'Foundations of data analytics including data wrangling, exploratory data analysis, and data visualization with Python.',
                'issued_date' => '2023-06-01',
                'sort_order' => 2,
            ],
        ];

        foreach ($certificates as $cert) {
            Certificate::create($cert);
        }

        // Seed sample projects
        $projects = [
            [
                'title' => 'Sales Performance Dashboard',
                'description' => 'Interactive Power BI dashboard analyzing 3-year sales trends, regional performance KPIs, and revenue forecasting for a retail company with 50+ stores.',
                'technologies' => json_encode(['Power BI', 'SQL', 'Excel', 'DAX']),
                'github_url' => 'https://github.com/yourusername/sales-dashboard',
                'linkedin_url' => 'https://linkedin.com/in/yourprofile',
                'featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Customer Segmentation Analysis',
                'description' => 'Python-based customer segmentation using K-means clustering on e-commerce data to identify high-value customer groups and optimize marketing spend.',
                'technologies' => json_encode(['Python', 'Pandas', 'Scikit-learn', 'Matplotlib', 'Seaborn']),
                'github_url' => 'https://github.com/yourusername/customer-segmentation',
                'linkedin_url' => 'https://linkedin.com/in/yourprofile',
                'featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'HR Analytics Report',
                'description' => 'Comprehensive HR analytics report built with Excel and Power Query, tracking employee attrition, performance metrics, and workforce diversity trends.',
                'technologies' => json_encode(['Excel', 'Power Query', 'SQL', 'Power BI']),
                'github_url' => 'https://github.com/yourusername/hr-analytics',
                'linkedin_url' => 'https://linkedin.com/in/yourprofile',
                'featured' => false,
                'sort_order' => 3,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
