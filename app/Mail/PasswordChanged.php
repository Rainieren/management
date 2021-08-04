<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordChanged extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $invited;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $invited)
    {
        $this->user = $user;
        $this->invited = $invited;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->user->password ? 'Password changed' : 'Thank you for joining ' . config('app.name') . '!';

        return $this->from('no-reply@management.com')
                    ->subject($subject)
                    ->markdown('emails.users.passwordChanged');
    }
}
