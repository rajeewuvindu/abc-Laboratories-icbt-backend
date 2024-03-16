<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Payment;
use App\Models\Report;
use App\Models\Technician;
use App\Models\User;
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

    public function addAppointment(Request $request)
    {
        $appointment = new Appointment();

        $appointment->user()->associate($request->user()->id);
        $appointment->testType()->associate($request->test_type_id);
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

        return $request->user();
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
            $payments_array[] = [
                "appointment_id" =>  Str::padLeft($payment->appointment_id, 7, 0),
                "test_type" => $appointment_test_type,
                "amount" => $payment->amount,
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
                'file' => $file_path . $file,
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
        if ($request->price) {
            $payment->amount = $request->price;
        } else {
            $payment->amount = 0.00;
        }
        $payment->save();

        $appointment = Appointment::find($request->id);
        $appointment->status = 'paid';
        $appointment->save();

        if ($payment && $appointment) {
            return response([
                'message' => 'Payment Done Successfull.'
            ], 200);
        }
        // return $payment;
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
    }
}
