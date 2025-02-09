<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AcceptedApplicationNotification extends Notification
{
    use Queueable;

    public $date;
    public $recruiter;
    public $jobPost;

    /**
     * Create a new notification instance.
     */
    public function __construct($recruiter, $jobPost, $date)
    {
        $this->jobPost = $jobPost;
        $this->recruiter = $recruiter;
        $this->date = $date;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        $company_name = $this->recruiter->company_name;

        return [
            'message'   => "تم قبول طلبك",
            'date'      => $this->date,
            'recruiter' => $this->recruiter,
            'jobPost'   => $this->jobPost
        ];
    }
}
