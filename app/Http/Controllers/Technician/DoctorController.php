<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function showDoctors()
    {
        $doctors = Doctor::all();
        return view('technician-views.doctors', compact('doctors'));
    }
}
