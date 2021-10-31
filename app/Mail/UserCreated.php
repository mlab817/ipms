<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $password;

    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $password)
    {
        $app = config('app.name');
        $this->user     = $user;
        $this->password = $password;
        $this->subject  = "[{$app}] Welcome to PIPS, @{$user->username}!";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.mailers.username'))
            ->markdown('emails.users.created', [
                'subject'   => "Welcome to PIPS, @{$this->user->username}!",
                'email'     => $this->user->email,
                'username'  => $this->user->username,
                'password'  => $this->password,
                'url'       => route('login'),
            ]);
    }
}
