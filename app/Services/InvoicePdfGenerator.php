<?php

namespace App\Services;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;

class InvoicePdfGenerator
{
    public static function generateInvoice($data)
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('view-invoice', $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        // return $dompdf->output();
        $pdfContent = $dompdf->output();

        // Store the PDF in the storage
        $fileName = 'invoice_' . uniqid() . '.pdf';
        Storage::put('invoices/' . $fileName, $pdfContent);

        // Return the file path for further use
        return $fileName;
    }
}
