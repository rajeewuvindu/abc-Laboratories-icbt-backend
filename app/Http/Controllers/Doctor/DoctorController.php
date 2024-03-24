<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function showAppointments(Request $request)
    {
        $appointments = Appointment::where('doctor_id', $request->user()->id)->where('status', '!=', 'completed')->get();
        return view('doctor-views.appointments', compact('appointments'));
    }
    public function index()
    {
        return view('doctor-views.dashboard');
    }
}
