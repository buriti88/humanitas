<?php

namespace App\Notifications;

use App\Mail\WelcomeMail;
use App\Notifications\Abstracts\WelcomeUserNotification;
use App\User;
use Illuminate\Bus\Queueable;

class WelcomeNotification extends WelcomeUserNotification
{
    use Queueable;

    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new WelcomeMail($this->user))
            ->with('user', $notifiable->name)
            ->to($notifiable->email, $notifiable->name);
    }
}
