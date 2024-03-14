<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Technician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
}
