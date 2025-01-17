<?php

namespace Database\Seeders;

use App\Models\JobApplication;
use App\Models\JobPost;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class JobApplicationSeeder extends Seeder
{
    public function run(): void
    {
        $jobPosts = JobPost::all();
        $users = User::where('type', 'job seeker')->get();

        $libyanNames = [
            'first' => [
                'محمد', 'أحمد', 'علي', 'عمر', 'خالد', 'إبراهيم', 'عبدالله', 'يوسف', 'حسن', 'مصطفى',
                'فاطمة', 'عائشة', 'مريم', 'زينب', 'خديجة', 'أسماء', 'نور', 'سارة', 'ليلى', 'هدى'
            ],
            'middle' => [
                'علي', 'محمد', 'سالم', 'عمر', 'خالد', 'إبراهيم', 'عبدالله', 'يوسف', 'حسن', 'مصطفى'
            ],
            'last' => [
                'الليبي', 'المصراتي', 'الطرابلسي', 'البنغازي', 'الزاوي', 'الورفلي', 'القذافي', 'السنوسي', 'المحمودي', 'العبيدي'
            ]
        ];

        $coverLetters = [
            'أتقدم بكل حماس للعمل في شركتكم الموقرة، حيث أمتلك الخبرة والمهارات المطلوبة للوظيفة. أتطلع للمساهمة في نجاح الشركة وتطوير مهاراتي المهنية.',
            'بعد الاطلاع على متطلبات الوظيفة، أجد نفسي مؤهلاً تماماً لها. لدي خبرة عملية في نفس المجال وأسعى لتوظيف مهاراتي لخدمة مؤسستكم.',
            'أرغب في الانضمام لفريق عملكم المتميز، حيث أمتلك المؤهلات العلمية والخبرة العملية التي تؤهلني للنجاح في هذا المنصب.',
            'يسعدني التقدم لهذه الوظيفة في شركتكم الرائدة. أثق في قدرتي على الإضافة لفريق العمل وتحقيق النتائج المرجوة.',
            'كوني حاصل على المؤهلات المطلوبة ولدي خبرة في نفس المجال، أتقدم بكل ثقة لهذه الوظيفة. أتطلع للمساهمة في نجاح الشركة.'
        ];

        $residences = [
            'طرابلس - حي الأندلس',
            'طرابلس - عين زارة',
            'طرابلس - تاجوراء',
            'بنغازي - وسط المدينة',
            'مصراتة - المدينة القديمة',
            'الزاوية - وسط المدينة',
            'سبها - حي الجديد',
            'زليتن - المدينة',
            'صبراتة - وسط المدينة',
            'غريان - المدينة'
        ];

        foreach($jobPosts as $jobPost) {
            $numberOfApplications = rand(3, 8);

            for($i = 0; $i < $numberOfApplications; $i++) {
                $firstName = $libyanNames['first'][array_rand($libyanNames['first'])];
                $middleName = $libyanNames['middle'][array_rand($libyanNames['middle'])];
                $lastName = $libyanNames['last'][array_rand($libyanNames['last'])];

                $application = JobApplication::create([
                    'job_post_id' => $jobPost->id,
                    'user_id' => $users->random()->id,
                    'first_name' => $firstName,
                    'middle_name' => $middleName,
                    'last_name' => $lastName,
                    'email' => strtolower(transliterator_transliterate('Any-Latin; Latin-ASCII', $firstName)) . rand(1000, 9999) . '@gmail.com',
                    'phone' => '218' . rand(911111111, 999999999),
                    'date_of_birth' => fake()->dateTimeBetween('-35 years', '-20 years')->format('Y-m-d'),
                    'place_of_residence' => $residences[array_rand($residences)],
                    'years_of_experience' => rand(1, 10),
                    'expected_salary' => rand(2000, 8000),
                    'cover_letter' => $coverLetters[array_rand($coverLetters)],
                ]);

                // Add sample attachments (CV and certificates)
                $sampleFiles = [
                    storage_path('app/samples/cv-template.pdf'),
                    storage_path('app/samples/certificate-template.pdf'),
                ];

                foreach($sampleFiles as $file) {
                    if(file_exists($file)) {
                        $application->addMedia($file)
                            ->preservingOriginal()
                            ->toMediaCollection('attachments');
                    }
                }
            }
        }
    }
}
