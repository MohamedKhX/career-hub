<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'تطوير البرمجيات',
            'إدارة المشاريع',
            'التسويق',
            'الموارد البشرية',
            'المحاسبة والمالية',
            'المبيعات',
            'خدمة العملاء',
            'التصميم',
            'الهندسة',
            'التدريس',
            'الطب والصحة',
            'القانون',
            'الإدارة',
            'الأمن والسلامة',
            'البحث والتطوير',
        ];

        foreach ($categories as $categoryName) {
            Category::create(['name' => $categoryName]);
        }
    }
}
