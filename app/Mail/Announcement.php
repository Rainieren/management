<?php

namespace App\Mail;

use App\Models\User;
use http\Env\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Announcement extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $content;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $content, User $user)
    {
        $this->title = $title;
        $this->content = $content;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@management.com')
            ->subject($this->title)
            ->markdown('emails.announcements.index');
    }
}
