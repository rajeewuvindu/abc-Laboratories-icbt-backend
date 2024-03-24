<?php

namespace App\Http\Controllers;

use App\Mail\PaymentConfirmationMail;
use App\Models\Appointment;
use App\Models\Payment;
use App\Models\Report;
use App\Models\Technician;
use App\Models\TestType;
use App\Models\User;
use App\Services\InvoicePdfGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PatientController extends Controller
{
    public function user(Request $request)
    {
        return $request->user();
    }


    public function updateProfile(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'name' => 'required|string',
            'street_code' => 'required|string',
            'street' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'contact_number' => 'required|string',
            'gender' => 'required|string',
        ]);


        $user = User::find($request->id);

        if ($request->email != $user->email) {
            $duplicates = User::where('email', $request->email)->count();

            if ($duplicates > 0) {
                return response([
                    'message' => 'Email already exists.'
                ], 403);
            }
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->street_code = $request->street_code;
        $user->street = $request->street;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;
        $user->contact_number = $request->contact_number;
        $user->gender = $request->gender;
        $user->save();

        if ($user) {
            return response([
                'message' => 'Changes Saved Successfully.'
            ], 200);
        }
    }

    public function checkLogin(Request $request)
    {
        return $request->user();
    }

    public function addAppointment(Request $request)
    {
        $appointment = new Appointment();

        $appointment->user()->associate($request->user()->id);
        $appointment->testType()->associate($request->test_type_id);

        $appointment->age = $request->age;
        // $appointment->name = $request->name;
        // $appointment->gender = $request->gender;
        $appointment->status = 'pending_confirmation';

        $appointment->save();

        // $technicians = Technician::all();

        // foreach ($technicians as $technician) {
        //     $data = array('name' => "Virat Gandhi");

        //     Mail::send(['text' => 'mail'], $data, function ($message) {
        //         $message->to('uvindutharinda@gmail.com', 'Tutorials Point')->subject('Laravel Basic Testing Mail');
        //         $message->from('uvindutharinda@gmail.com', 'Virat Gandhi');
        //     });
        //     // $technician->email;
        // }

        // return $request->user();

        if ($appointment) {
            return response([
                'message' => 'Appointment Added Successfully.'
            ], 201);
        }
    }

    public function getAppointments(Request $request)
    {
        $user = User::find($request->user()->id);
        // $appointments = 
        $appointments = Appointment::where('user_id', $request->user()->id)->with('doctor', 'testType')->get();
        return $appointments;
    }

    public function getPayments(Request $request)
    {
        $payments = Payment::where('user_id', $request->user()->id)->with('appointment')->get();
        $payments_array = [];

        foreach ($payments as $payment) {
            $appointment = Appointment::find($payment->appointment_id);
            $appointment_test_type = $appointment->testType->test_type;
            $file_path = env('HOST_URL');
            $file = "";
            $invoice_file = $payment->invoice_path;

            if (Storage::exists($invoice_file)) {
                $file = Storage::url($invoice_file);
            }
            $payments_array[] = [
                "appointment_id" =>  Str::padLeft($payment->appointment_id, 7, 0),
                "test_type" => $appointment_test_type,
                "amount" => $payment->amount,
                'invoice_file' => 'http://127.0.0.1:8000'. $file,
                "created_at" => $payment->created_at,
            ];
        }
        return $payments_array;
    }

    public function getReports(Request $request)
    {
        $reports = Report::where('user_id', $request->user()->id)->with('user')->get();
        $reports_array = [];
        foreach ($reports as $report) {
            $report_file = $report->file_path;
            $file = "";
            if (Storage::exists($report_file)) {
                $file = Storage::url($report_file);
            }
            $user_name = $report->user->name;
            $file_path = env('HOST_URL');
            $reports_array[] = [
                'file' => 'http://127.0.0.1:8000'. $file,
                'appointment_id' =>  Str::padLeft($report->appointment_id, 7, 0),
                'user_name' => $user_name,
            ];
        }
        return $reports_array;
    }

    public function makePayment(Request $request)
    {
        // return $request;
        $payment = new Payment();
        $payment->user()->associate($request->user()->id);
        $payment->appointment()->associate($request->id);

        $payment->invoice_path = "sample";
        if ($request->price) {
            $payment->amount = $request->price;
        } else {
            $payment->amount = 0.00;
        }
        $payment->save();

        $appointment = Appointment::find($request->id);
        $appointment->status = 'paid';
        $appointment->save();

        $invoiceData = [
            'appointmentId' => Str::padLeft($appointment->id, 7, 0),
            'testType' => $appointment->TestType->test_type,
            'appointmentDate' => $appointment->date,
            'paymentDate' => $payment->created_at,
            'doctorAssigned' => $appointment->doctor->name,
            'patientId' => $request->user()->patient_id,
            'patientName' => $request->user()->name,
        ];

        // Generate PDF
        InvoicePdfGenerator::generateInvoice($invoiceData, $payment, $request->user());
        // $report_file = $request->file($pdf)->store('pdfs');


        // Save or serve PDF as needed
        // For example, serve as download
        // return response()->streamDownload(function () use ($pdf) {
        //     echo $pdf;
        // }, 'invoice.pdf');


        if ($payment && $appointment) {
            return response([
                'message' => 'Payment Done Successfull.'
            ], 200);
        }
    }

    public function getTestTypes(Request $request)
    {
        $test_types = TestType::all();
        return $test_types;
    }
}
