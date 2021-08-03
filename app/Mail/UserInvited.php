<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserInvited extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = User::find(1);
        return $this->from('no-reply@example.com')
                    ->subject($user->name . ' has invited you to join the ' . config('app.name') . ' workspace')
                    ->markdown('emails.users.invited');

        // TODO:: Generate password reset link to use in this email instead of password resets email.
    }
}
