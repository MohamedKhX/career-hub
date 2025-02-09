<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RejectedApplicationNotification extends Notification
{
    use Queueable;

    public $recruiter;
    public $jobPost;

    /**
     * Create a new notification instance.
     */
    public function __construct($recruiter, $jobPost)
    {
        $this->recruiter = $recruiter;
        $this->jobPost = $jobPost;
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
        return [
            'message'   => 'تم رفض طلبك بنجاح',
            'recruiter' => $this->recruiter,
            'jobPost' => $this->jobPost
        ];
    }
}
