<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $appointment->price = $request->price;
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


    public function fetchUserAppointments(User $user)
    {
        $appointments = [];
        foreach ($user->appointments as $appointment) {
            $appointments[] = [
                "id" => $appointment->id,
                "appointment_id" => Str::padLeft($appointment->id, 7, 0),
                "test_type" => $appointment->testType->test_type
            ];
        }
        return $appointments;
    }
}
