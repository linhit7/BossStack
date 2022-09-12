<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $usermail;

    public function __construct($usermail)
    {
        $this->usermail = $usermail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('rbookscorp@gmail.com', 'Quản lý nhân sự')->subject('Thông tin duyệt')->view('mail.newAccount')->with(['usermail' => $this->usermail]);
    }
}
