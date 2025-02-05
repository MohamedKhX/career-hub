<?php


use App\Enums\JobApplicationStateEnum;
use App\Enums\JobPostStateEnum;
use App\Enums\JobTypeEnum;
use App\Enums\UserTypeEnum;

return [
    'user_type_enum' => [
        UserTypeEnum::Admin->value => 'مدير',
        UserTypeEnum::Recruiter->value => 'موظف التوظيف',
        UserTypeEnum::JobSeeker->value => 'طالب عمل',
    ],

    'job_type_enum' => [
        JobTypeEnum::FullTime->value => 'دوام كامل',
        JobTypeEnum::PartTime->value => 'دوام جزئي',
        JobTypeEnum::Freelancer->value => 'عمل حر',
    ],

    'job_post_state_enum' => [
        JobPostStateEnum::Open->value => 'مفتوح',
        JobPostStateEnum::Closed->value => 'مغلق',
    ],

    'job_application_state_enum' => [
        JobApplicationStateEnum::Pending->value => 'قيد الانتظار',
        JobApplicationStateEnum::Accepted->value => 'مقبول',
        JobApplicationStateEnum::Rejected->value => 'مرفوض',
    ],

    'rating_enum' => [
        \App\Enums\RatingEnum::Terrible->value => 'سيئ جدا',
        \App\Enums\RatingEnum::Bad->value => 'سيء',
        \App\Enums\RatingEnum::Average->value => 'متوسط',
        \App\Enums\RatingEnum::Good->value => 'جيد',
        \App\Enums\RatingEnum::Excellent->value => 'ممتاز',
    ]
];
