<?php

namespace App\Mail;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserPasswordReset extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $newPassword;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $newPassword)
    {
        //
        $this->user = $user;
        $this->newPassword = $newPassword;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hossam@technoband.org','DiMax')
        ->subject("DiMax | Password Reset")
        ->to($this->user->email)
        ->with([
            'newPassword'=>$this->newPassword,
            'adminName'=>$this->user->name
        ])
        ->markdown('emails.auth.reset_password_user');
    }
}
