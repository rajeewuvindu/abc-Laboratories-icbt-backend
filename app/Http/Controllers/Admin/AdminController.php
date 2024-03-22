<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Payment;
use App\Models\Report;
use App\Models\Technician;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        $users = User::all();
        $technicians = Technician::all();
        $doctors = Doctor::all();
        $reports = Report::all();
        $payments = Payment::sum('amount');
        return view('admin-views.dashboard', compact('appointments', 'users', 'technicians', 'doctors', 'reports', 'payments'));
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
