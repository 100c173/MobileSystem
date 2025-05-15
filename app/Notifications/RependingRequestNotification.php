<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RependingRequestNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(){}

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
        ->subject('🔄 Your Agent Request Will Be Reconsidered')
        ->greeting('Hello ' . $notifiable->name . ',')
        ->line('Thank you for your interest in becoming an Agent at **' . config('app.name') . '**.')
        ->line('Your agent request has been reconsidered after initial rejection.')
        ->line('We value your application, and we will be reviewing it once again.')
        ->line('We appreciate your patience and will notify you once a final decision is made.')
        ->salutation('Best regards, The ' . config('app.name') . ' Team');
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
