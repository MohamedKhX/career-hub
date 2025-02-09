<?php

namespace Database\Seeders;

use App\Models\Recruiter;
use App\Models\User;
use App\Enums\UserTypeEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class RecruiterSeeder extends Seeder
{
    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function run(): void
    {
        $companies = [
            [
                'company_name' => 'شركة النفط الليبية',
                'description' => 'شركة رائدة في مجال النفط والغاز في ليبيا',
                'city' => 'طرابلس',
                'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSo_3e36XkiuSi_p6y0puge4znICSjsW9E1uw&s'
            ],
            [
                'company_name' => 'مصرف الجمهورية',
                'description' => 'من أكبر المصارف في ليبيا',
                'city' => 'طرابلس',
                'logo' => 'https://media.licdn.com/dms/image/v2/C4E0BAQEf0II85Zrh5Q/company-logo_200_200/company-logo_200_200/0/1630564399591?e=2147483647&v=beta&t=L5-7c-U7qIRhSdZ2jL0nQwXjnNCkFwJPb5HHTGH5EPE'
            ],
            [
                'company_name' => 'شركة المدار للاتصالات',
                'description' => 'شركة اتصالات رائدة في ليبيا',
                'city' => 'طرابلس',
                'logo' => 'https://media.licdn.com/dms/image/v2/C560BAQE3lamzvXvIRQ/company-logo_200_200/company-logo_200_200/0/1630668274104/almadar_aljadid_logo?e=2147483647&v=beta&t=PfnIEcfDN3GtHVwRvatPhTJQzY0gcUAI9h-Umfzq3SQ'
            ],
            [
                'company_name' => 'شركة ليبيا للتأمين',
                'description' => 'شركة تأمين رائدة في ليبيا',
                'city' => 'بنغازي',
                'logo' => 'https://www.libtamin.ly/uploads/settings/16942775944547.gif'
            ],
            [
                'company_name' => 'شركة الإنماء للنفط والغاز',
                'description' => 'شركة متخصصة في مجال النفط والغاز',
                'city' => 'مصراتة',
                'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmYQLDY4xEVgvAZR5Pt8u0aMbQZCEv6jtlGA&s'
            ],
        ];

        foreach ($companies as $index => $company) {
            $recruiter = Recruiter::create([
                'company_name' => $company['company_name'],
                'company_website' => 'https://www.example.com',
                'description' => $company['description'],
                'phone_number' => '0910000000',
                'address' => 'عنوان الشركة',
                'city' => $company['city'],
            ]);

            $recruiter->addMediaFromUrl($company['logo'])
                ->toMediaCollection('logo');

            User::create([
                'first_name' => null,
                'email' => 'recruiter' . ($index + 1) . '@example.com',
                'password' => Hash::make('password'),
                'type' => UserTypeEnum::Recruiter,
                'recruiter_id' => $recruiter->id,
            ]);
        }
    }
}
