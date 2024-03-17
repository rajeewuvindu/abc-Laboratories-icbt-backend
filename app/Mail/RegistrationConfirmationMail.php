<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $patientID;
    /**
     * Create a new message instance.
     *
     * @return void
     */



    public function __construct($user, $patientID)
    {
        $this->user = $user;
        $this->patientID = $patientID;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('patient-registration-mail')->subject('Registration Confirmation');
    }
}
