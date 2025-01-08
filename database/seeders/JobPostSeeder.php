<?php

namespace Database\Seeders;

use App\Models\JobPost;
use App\Models\Category;
use App\Models\Industry;
use App\Models\City;
use App\Models\Recruiter;
use App\Enums\JobTypeEnum;
use App\Enums\JobPostStateEnum;
use Illuminate\Database\Seeder;

class JobPostSeeder extends Seeder
{
    public function run(): void
    {
        $jobTitles = [
            'مطور برمجيات',
            'محاسب',
            'مدير مشروع',
            'مهندس نفط',
            'مدير تسويق',
            'مدير موارد بشرية',
            'مندوب مبيعات',
            'طبيب',
            'مدرس',
            'مصمم جرافيك',
        ];

        $requirements = [
            'خبرة لا تقل عن 3 سنوات',
            'شهادة جامعية في المجال',
            'إجادة اللغة الإنجليزية',
            'مهارات تواصل ممتازة',
            'القدرة على العمل ضمن فريق',
        ];

        $categories = Category::all();
        $industries = Industry::all();
        $cities = City::all();
        $recruiters = Recruiter::all();
        $jobTypes = JobTypeEnum::cases();

        foreach ($jobTitles as $title) {
            JobPost::create([
                'title' => $title,
                'description' => 'وصف تفصيلي للوظيفة وشروطها ومتطلباتها',
                'requirements' => json_encode($requirements),
                'salary' => rand(2000, 10000),
                'job_type' => $jobTypes[array_rand($jobTypes)]->value,
                'state' => JobPostStateEnum::Open,
                'recruiter_id' => $recruiters->random()->id,
                'category_id' => $categories->random()->id,
                'industry_id' => $industries->random()->id,
                'city_id' => $cities->random()->id,
            ]);
        }
    }
}
