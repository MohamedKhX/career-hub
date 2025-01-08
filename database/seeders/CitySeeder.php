<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $cities = [
            'طرابلس',
            'بنغازي',
            'مصراتة',
            'الزاوية',
            'سبها',
            'زليتن',
            'صبراتة',
            'غريان',
            'البيضاء',
            'طبرق',
            'اجدابيا',
            'سرت',
            'درنة',
            'الخمس',
            'ترهونة',
            'غدامس',
            'الكفرة',
            'مرزق',
            'براك',
            'نالوت',
            'يفرن',
            'زوارة',
            'الجميل',
            'رقدالين',
            'العجيلات'
        ];

        foreach ($cities as $cityName) {
            City::create(['name' => $cityName]);
        }
    }
}
