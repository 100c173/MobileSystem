<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class NewUserRegisterNotification extends Notification
{
    use Queueable;
    protected $user;

    /**
     * Create a new notification instance.
     */
    public function __construct($user)
    {
        $this->user =$user;
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

    /**
     * Get the mail representation of the notification.
     */
    public function toDatabase( $notifiable)
    {
        return[
            'message' => 'New user registered',
            'user_id' => $this->user->id,
            'email'   => $this->user->email,
            'time'    => now()->toDayDateTimeString(),
        ];
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
