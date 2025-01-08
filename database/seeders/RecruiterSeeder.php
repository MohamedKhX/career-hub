<?php

namespace Database\Seeders;

use App\Models\Recruiter;
use App\Models\User;
use App\Enums\UserTypeEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RecruiterSeeder extends Seeder
{
    public function run(): void
    {
        $companies = [
            [
                'company_name' => 'شركة النفط الليبية',
                'description' => 'شركة رائدة في مجال النفط والغاز في ليبيا',
                'city' => 'طرابلس',
            ],
            [
                'company_name' => 'مصرف الجمهورية',
                'description' => 'من أكبر المصارف في ليبيا',
                'city' => 'طرابلس',
            ],
            [
                'company_name' => 'شركة المدار للاتصالات',
                'description' => 'شركة اتصالات رائدة في ليبيا',
                'city' => 'طرابلس',
            ],
            [
                'company_name' => 'شركة ليبيا للتأمين',
                'description' => 'شركة تأمين رائدة في ليبيا',
                'city' => 'بنغازي',
            ],
            [
                'company_name' => 'شركة الإنماء للنفط والغاز',
                'description' => 'شركة متخصصة في مجال النفط والغاز',
                'city' => 'مصراتة',
            ],
        ];

        foreach ($companies as $index => $company) {
            $recruiter = Recruiter::create([
                'company_name' => $company['company_name'],
                'company_website' => 'https://www.example.com',
                'description' => $company['description'],
                'phone_number' => '218' . rand(911111111, 999999999),
                'address' => 'عنوان الشركة',
                'city' => $company['city'],
            ]);

            User::create([
                'name' => 'مسؤول التوظيف ' . ($index + 1),
                'email' => 'recruiter' . ($index + 1) . '@example.com',
                'password' => Hash::make('password'),
                'type' => UserTypeEnum::Recruiter,
                'recruiter_id' => $recruiter->id,
            ]);
        }
    }
}
