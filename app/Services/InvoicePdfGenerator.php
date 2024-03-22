<?php

namespace App\Services;

use App\Mail\PaymentConfirmationMail;
use App\Models\Payment;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class InvoicePdfGenerator
{
    public static function generateInvoice($data, $payment, $user)
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('view-invoice', $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        // return $dompdf->output();
        $pdfContent = $dompdf->output();

        // Store the PDF in the storage
        $fileName = 'invoice_' . uniqid() . '.pdf';
        $invoicePath = 'invoices/' . $fileName;
        $invoice_file = Storage::put('invoices/' . $fileName, $pdfContent);

        $payment_data = Payment::find($payment->id);
        $payment_data->invoice_path = $invoicePath;
        // $payment_data->invoice_path = $invoice_file;
        $payment_data->save();

        Mail::to($user->email)->send(new PaymentConfirmationMail($user, $user->patient_id, $invoicePath));

        // Return the file path for further use
        return $invoice_file;
    }
}
