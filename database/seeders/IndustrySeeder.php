<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    public function run(): void
    {
        $industries = [
            'تكنولوجيا المعلومات',
            'النفط والغاز',
            'البناء والتشييد',
            'التعليم',
            'الرعاية الصحية',
            'الخدمات المالية',
            'التجارة والبيع بالتجزئة',
            'السياحة والضيافة',
            'الاتصالات',
            'النقل والخدمات اللوجستية',
            'الصناعات الغذائية',
            'الإعلام والترفيه',
            'العقارات',
            'الزراعة',
            'الخدمات الحكومية',
        ];

        foreach ($industries as $industryName) {
            Industry::create(['name' => $industryName]);
        }
    }
}
