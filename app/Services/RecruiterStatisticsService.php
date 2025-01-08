<?php

namespace App\Services;

use App\Models\JobPost;
use App\Models\JobApplication;
use App\Enums\JobPostStateEnum;
use App\Enums\JobApplicationStateEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RecruiterStatisticsService
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
        $recruiterId = Auth::user()->recruiter_id;

        return [
            'total' => JobPost::where('recruiter_id', $recruiterId)->count(),
            'open' => JobPost::where('recruiter_id', $recruiterId)
                ->where('state', JobPostStateEnum::Open)
                ->count(),
            'closed' => JobPost::where('recruiter_id', $recruiterId)
                ->where('state', JobPostStateEnum::Closed)
                ->count(),
            'by_type' => JobPost::where('recruiter_id', $recruiterId)
                ->select('job_type', DB::raw('count(*) as count'))
                ->groupBy('job_type')
                ->pluck('count', 'job_type')
                ->toArray(),
        ];
    }

    public function getApplicationsStats()
    {
        $recruiterId = Auth::user()->recruiter_id;

        $monthly = JobApplication::join('job_posts', 'job_applications.job_post_id', '=', 'job_posts.id')
            ->where('job_posts.recruiter_id', $recruiterId)
            ->select(
                DB::raw('MONTH(job_applications.created_at) as month'),
                DB::raw('count(*) as count')
            )
            ->whereYear('job_applications.created_at', date('Y'))
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Convert month numbers to Arabic names
        $monthlyWithNames = [];
        foreach ($monthly as $month => $count) {
            $monthlyWithNames[$this->getMonthName($month)] = $count;
        }

        return [
            'total' => JobApplication::join('job_posts', 'job_applications.job_post_id', '=', 'job_posts.id')
                ->where('job_posts.recruiter_id', $recruiterId)
                ->count(),
            'by_state' => JobApplication::join('job_posts', 'job_applications.job_post_id', '=', 'job_posts.id')
                ->where('job_posts.recruiter_id', $recruiterId)
                ->select('job_applications.state', DB::raw('count(*) as count'))
                ->groupBy('job_applications.state')
                ->pluck('count', 'state')
                ->toArray(),
            'monthly' => $monthlyWithNames,
        ];
    }

    public function getTopJobPosts()
    {
        $recruiterId = Auth::user()->recruiter_id;

        return JobPost::where('recruiter_id', $recruiterId)
            ->select('title', DB::raw('count(job_applications.id) as applications_count'))
            ->leftJoin('job_applications', 'job_posts.id', '=', 'job_applications.job_post_id')
            ->groupBy('job_posts.id', 'job_posts.title')
            ->orderByDesc('applications_count')
            ->limit(5)
            ->pluck('applications_count', 'title')
            ->toArray();
    }

    public function getApplicationsByState()
    {
        $recruiterId = Auth::user()->recruiter_id;

        $stats = JobApplication::join('job_posts', 'job_applications.job_post_id', '=', 'job_posts.id')
            ->where('job_posts.recruiter_id', $recruiterId)
            ->select('job_applications.state', DB::raw('count(*) as count'))
            ->groupBy('job_applications.state')
            ->pluck('count', 'state')
            ->toArray();

        // Translate states
        $translatedStats = [];
        foreach ($stats as $state => $count) {
            $translatedStats[__($state)] = $count;
        }

        return $translatedStats;
    }
} 