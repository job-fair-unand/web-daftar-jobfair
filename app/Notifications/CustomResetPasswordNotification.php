<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class CustomResetPasswordNotification extends ResetPassword
{
    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->subject('Reset Password - ACEED EXPO Universitas Andalas 2025')
            ->view('emails.reset-password', [
                'user' => $notifiable,
                'url' => $url,
                'expire' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')
            ]);
    }
}