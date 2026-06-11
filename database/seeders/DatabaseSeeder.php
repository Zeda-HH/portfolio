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
        // Only create admin if doesn't exist
        if (!User::where('email', env('ADMIN_EMAIL', 'admin@portfolio.com'))->exists()) {
            User::create([
                'name' => 'Portfolio Admin',
                'email' => env('ADMIN_EMAIL', 'admin@portfolio.com'),
                'password' => Hash::make(env('ADMIN_PASSWORD', 'Admin@123456')),
                'is_admin' => true,
            ]);
        }

        // Only seed skills if empty
        if (Skill::count() === 0) {
            $skills = [
                ['name' => 'SQL', 'percentage' => 90, 'icon' => 'database', 'sort_order' => 1],
                ['name' => 'Excel', 'percentage' => 95, 'icon' => 'table', 'sort_order' => 2],
                ['name' => 'Power BI', 'percentage' => 90, 'icon' => 'bar-chart', 'sort_order' => 3],
                ['name' => 'Python (NumPy, Pandas, Matplotlib)', 'percentage' => 85, 'icon' => 'code', 'sort_order' => 4],
            ];
            foreach ($skills as $skill) {
                Skill::create($skill);
            }
        }

        // Only seed certificates if empty
        if (Certificate::count() === 0) {
            $certificates = [
                [
                    'title' => 'ALX Data Analytics Certified',
                    'issuer' => 'ALX Africa',
                    'description' => 'Comprehensive data analytics program covering SQL, Python, Excel, and business intelligence tools.',
                    'issued_date' => '2023-12-01',
                    'sort_order' => 1,
                ],
                [
                    'title' => 'Udacity Data Analytics Foundation',
                    'issuer' => 'Udacity',
                    'description' => 'Foundations of data analytics including data wrangling, exploratory data analysis, and visualization.',
                    'issued_date' => '2023-06-01',
                    'sort_order' => 2,
                ],
            ];
            foreach ($certificates as $cert) {
                Certificate::create($cert);
            }
        }

        // Only seed projects if empty
        if (Project::count() === 0) {
            $projects = [
                [
                    'title' => 'Sales Performance Dashboard',
                    'description' => 'Interactive Power BI dashboard analyzing 3-year sales trends and revenue forecasting.',
                    'technologies' => json_encode(['Power BI', 'SQL', 'Excel', 'DAX']),
                    'github_url' => 'https://github.com/Zeda-HH',
                    'linkedin_url' => 'https://www.linkedin.com/in/zemen-heliso',
                    'featured' => true,
                    'sort_order' => 1,
                ],
                [
                    'title' => 'Customer Segmentation Analysis',
                    'description' => 'Python-based customer segmentation using K-means clustering on e-commerce data.',
                    'technologies' => json_encode(['Python', 'Pandas', 'Scikit-learn', 'Matplotlib']),
                    'github_url' => 'https://github.com/Zeda-HH',
                    'linkedin_url' => 'https://www.linkedin.com/in/zemen-heliso',
                    'featured' => true,
                    'sort_order' => 2,
                ],
            ];
            foreach ($projects as $project) {
                Project::create($project);
            }
        }
    }
}