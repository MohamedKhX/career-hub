<?php

namespace App\Services;

use App\Models\JobPost;
use App\Models\JobApplication;
use App\Models\Recruiter;
use App\Models\User;
use App\Enums\JobPostStateEnum;
use App\Enums\JobApplicationStateEnum;
use App\Enums\UserTypeEnum;
use Illuminate\Support\Facades\DB;

class StatisticsService
{
    public function getMonthName(int $month): string
    {
        $months = [
            1 => 'يناير',
            2 => 'فبراير',
            3 => 'مارس',
            4 => 'أبريل',
            5 => 'مايو',
            6 => 'يونيو',
            7 => 'يوليو',
            8 => 'أغسطس',
            9 => 'سبتمبر',
            10 => 'أكتوبر',
            11 => 'نوفمبر',
            12 => 'ديسمبر',
        ];

        return $months[$month] ?? '';
    }

    public function getJobPostsStats()
    {
        return [
            'total' => JobPost::count(),
            'open' => JobPost::where('state', JobPostStateEnum::Open)->count(),
            'closed' => JobPost::where('state', JobPostStateEnum::Closed)->count(),
            'by_type' => JobPost::select('job_type', DB::raw('count(*) as count'))
                ->groupBy('job_type')
                ->pluck('count', 'job_type')
                ->toArray(),
        ];
    }

    public function getApplicationsStats()
    {
        $monthly = JobApplication::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('count(*) as count')
        )
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Convert month numbers to Arabic names
        $monthlyWithNames = [];
        foreach ($monthly as $month => $count) {
            $monthlyWithNames[$this->getMonthName($month)] = $count;
        }

        return [
            'total' => JobApplication::count(),
            'by_state' => JobApplication::select('state', DB::raw('count(*) as count'))
                ->groupBy('state')
                ->pluck('count', 'state')
                ->toArray(),
            'monthly' => $monthlyWithNames,
        ];
    }

    public function getUsersStats()
    {
        $byType = User::select('type', DB::raw('count(*) as count'))
            ->groupBy('type')
            ->pluck('count', 'type')
            ->toArray();

        // Translate user types to Arabic
        $translatedByType = [];
        foreach ($byType as $type => $count) {
            $translatedByType[__($type)] = $count;
        }

        return [
            'total' => User::count(),
            'by_type' => $translatedByType,
            'recruiters' => Recruiter::count(),
        ];
    }

    public function getTopCategories()
    {
        return JobPost::select('categories.name', DB::raw('count(*) as count'))
            ->join('categories', 'job_posts.category_id', '=', 'categories.id')
            ->groupBy('categories.name')
            ->orderByDesc('count')
            ->limit(5)
            ->pluck('count', 'name')
            ->toArray();
    }

    public function getTopCities()
    {
        return JobPost::select('cities.name', DB::raw('count(*) as count'))
            ->join('cities', 'job_posts.city_id', '=', 'cities.id')
            ->groupBy('cities.name')
            ->orderByDesc('count')
            ->limit(5)
            ->pluck('count', 'name')
            ->toArray();
    }
} 