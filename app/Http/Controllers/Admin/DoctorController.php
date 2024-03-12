<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function showDoctors()
    {
        $doctors = Doctor::all();
        return view('admin-views.doctors', compact('doctors'));
    }

    public function showAddDoctorForm()
    {
        return view('admin-views.add-doctor-form');
    }

    public function AddDoctor(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|unique:doctors,email',
            'name' => 'required|string',
        ]);

        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->save();

        if ($doctor) {
            return redirect()->back()->with('success', "Doctor Added Successfully");
        } else {
            return redirect()->back()->with('error', "Failed to add Doctor");
        }
        // return $request;
    }

    public function showEditDoctorForm(Doctor $doctor)
    {
        return view('admin-views.edit-doctor-form', compact('doctor'));
    }

    public function updateDoctor(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'name' => 'required|string',
        ]);

        $doctor = Doctor::find($request->id);

        if ($doctor->email != $request->email) {
            $duplicates = Doctor::where('email', $request->email)->count();

            if ($duplicates > 0) {
                return redirect()->back()->with('error', 'The email has already been taken.');
            }
        }
        
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->save();

        if ($doctor) {
            return redirect()->back()->with('success', "Changes Saved Successfully");
        } else {
            return redirect()->back()->with('error', "Failed to edit Doctor");
        }
    }
}
