<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function showAppointments()
    {
        $doctors = Doctor::all();
        $appointments = Appointment::whereIn('status', ['pending_confirmation', 'confirmed', 'paid'])->get();
        // return $appointments->count();
        return view('technician-views.appointments', compact('appointments', 'doctors'));
    }

    public function assignDoctor(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|integer',
            'appointment_id' => 'required|integer',
        ]);

        $appointment = Appointment::find($request->appointment_id);
        $appointment->doctor()->associate($request->doctor_id);
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->status = 'confirmed';
        $appointment->save();


        if ($appointment) {
            return redirect()->back()->with('success', "Doctor Assigned Successfully");
        } else {
            return redirect()->back()->with('error', "Failed to Assign Doctor");
        }
        



    }

    public function completeAppointment(Appointment $appointment)
    {
        // $request->validate([
        //     'doctor_id' => 'required|integer',
        //     'appointment_id' => 'required|integer',
        // ]);

        $appointment->status = 'completed';
        $appointment->save();

        
        if ($appointment) {
            return redirect()->back()->with('success', "Doctor Assigned Successfully");
        } else {
            return redirect()->back()->with('error', "Failed to Assign Doctor");
        }
        



    }
}
