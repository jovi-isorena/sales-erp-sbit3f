<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Employee;
use App\Models\User;

class AccountCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $employee, $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Employee $employee, User $user)
    {
        $this->employee = $employee;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
                ->subject('Employee Account Created')
                ->markdown('emails.accountcreated');
    }
}
