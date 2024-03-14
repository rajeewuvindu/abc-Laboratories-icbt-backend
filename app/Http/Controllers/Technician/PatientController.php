<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function showPatients()
    {
        $patients = User::all();
        return view('technician-views.patients', compact('patients'));
    }
}
