<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RejectedRequestNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public string $rejectionReason)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('❌ Your Agent Request Has Been Rejected')
        ->greeting('Hello ' . $notifiable->name . ',')
        ->line('We appreciate your interest in becoming an Agent on **' . config('app.name') . '**.')
        ->line('Unfortunately, your request has been declined.')
        ->line('**Reason for Rejection:**')
        ->line($this->rejectionReason) // السبب المخصص
        ->line('You are welcome to update your information and reapply in the future.')
        ->salutation('Best regards,  The ' . config('app.name') . ' Team');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
