<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class PaymentConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $patientID;
    public $invoicePath;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $patientID, $invoicePath)
    {
        $this->user = $user;
        $this->patientID = $patientID;
        $this->invoicePath = $invoicePath;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('patient-payment-confirmation-mail')->subject('Payment Confirmation')->attach(Storage::path($this->invoicePath), [
            'as' => 'payment_receipt.pdf',
            'mime' => 'application/pdf',
        ]);;
    }
}
