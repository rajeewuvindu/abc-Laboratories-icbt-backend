<?php

namespace App\Services;

use App\Models\Payment;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;

class InvoicePdfGenerator
{
    public static function generateInvoice($data, $payment)
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('view-invoice', $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        // return $dompdf->output();
        $pdfContent = $dompdf->output();

        // Store the PDF in the storage
        $fileName = 'invoice_' . uniqid() . '.pdf';
        $invoice_file = Storage::put('invoices/' . $fileName, $pdfContent);

        $payment_data = Payment::find($payment->id);
        $payment_data->invoice_path = 'invoices/' . $fileName;
        // $payment_data->invoice_path = $invoice_file;
        $payment_data->save();

        // Return the file path for further use
        return $invoice_file;
    }
}
