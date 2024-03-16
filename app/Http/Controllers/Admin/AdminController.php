<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin-views.dashboard');
    }

    public function showAppointments()
    {
        $appointments = Appointment::all();
        return view('admin-views.appointments', compact('appointments'));
    }

    public function showPatients()
    {
        $patients = User::all();
        return view('admin-views.patients', compact('patients'));
    }

    
    public function showPatientAppointments(User $user)
    {
        $appointments = $user->appointments;
        return view('admin-views.patient-appointments', compact('appointments', 'user'));
    }

  
}
