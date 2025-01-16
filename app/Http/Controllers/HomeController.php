<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\JobPost;
use App\Models\Recruiter;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $jobPostsCount = JobPost::count();
        $companiesCount = Recruiter::count();
        $jobApplicationsCount = JobApplication::count();
        $userCount = User::count();

        $companies = Recruiter::take(4)->get();

        return view('home', [
            'jobPostsCount' => $jobPostsCount,
            'companiesCount' => $companiesCount,
            'jobApplicationsCount' => $jobApplicationsCount,
            'userCount' => $userCount,
            'companies' => $companies,
        ]);
    }
}
